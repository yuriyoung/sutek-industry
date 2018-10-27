<?php

namespace App\Http\Controllers\Admin;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Models\Spec;
use App\Http\Controllers\Controller;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Layout\Content;
use Encore\Admin\Grid;
use Encore\Admin\Form;

class SpecController extends Controller
{
    use HasResourceActions;

    /**
     * Display a listing of the resource.
     *
     * @return \Encore\Admin\Layout\Content
     */
    public function index()
    {
        return Admin::content(function (Content $content){
            $content->header(trans('admin.spec'));
            $content->description(__('admin.list'));
            $content->body($this->grid()->render());
        });
    }

    /**
     * Show interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header(trans('admin.detail'))
            ->description(trans('admin.description'))
            ->body($this->detail($id));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Encore\Admin\Layout\Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header(trans('admin.spec'));
            $content->description(trans('admin.create'));
            $content->body($this->form());
        });
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Encore\Admin\Layout\Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header(trans('admin.spec'));
            $content->description(trans('admin.edit'));
            $content->body($this->form($id)->edit($id));
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Spec::class, function (Grid $grid) {

            $options = Spec::names();

            $grid->number('#');
            $grid->rows(function ($row, $number) { $row->column('number', $number+1); });
            $grid->id('ID')->sortable();
            $grid->name(trans('admin.spec_name'))->editable('select', $options)->sortable();
            $grid->value(trans('admin.spec_value'))->editable()->sortable();
            $grid->slug(trans('admin.slug'));
            $grid->views(trans('admin.views'))->sortable();


            $grid->created_at(trans('admin.created_at'))->sortable();
            $grid->updated_at(trans('admin.updated_at'))->sortable();

            $grid->filter(function (Grid\Filter $filter) use($options) {
                $filter->disableIdFilter();
                $filter->like('name', trans('admin.spec_name'));
                $filter->like('value', trans('admin.spec_value'));

                foreach ($options as $option)
                {
                    $filter->scope($option)->where('name', $option);
                }
            });

        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Spec::findOrFail($id));

        $show->id('ID');
        $show->icon(trans('admin.icon'));
        $show->name(trans('admin.spec_name'));
        $show->value(trans('admin.spec_value'));
        $show->slug(trans('admin.slug'));
        $show->views(trans('admin.views'));
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @param  int  $id
     * @return Form
     */
    public function form($id = null)
    {
        Admin::script("$('#new_name').closest('.form-group').prop('hidden', $('[name=new_name_switch]').val() === 'off');");
        Admin::script("$('#new_name').on('input', function(e){ 
                    var txt = $(this).val().replace(/(^\s*)|(\s*$)/g, '') !== '' ? '确定' : '取消';
                    $('.bootstrap-switch-handle-on').text(txt);
                });");
        Admin::script("$('#value').on('input', function(e){ " . (!$id ? "$('#slug').val(e.delegateTarget.value);" : "") . " });");
        Admin::script("$('[name=new_name_switch]').on('change', function(e){
             var item = $('#new_name').closest('.form-group');
             if( $(this).val() === 'on') {
                 $('#new_name').val('');
                 item.fadeIn();
             }
             else {
                 var val = $('#new_name').val().replace(/(^\s*)|(\s*$)/g, '');
                 if(val !== '') {
                    var select = $(\"select[name='name']\");
                    var found = false;
                    select.each(function(i, opt) {
                        if( $(opt).val() === val )
                        {
                            found = true;
                            $(opt).attr('selected', true);
                            return false; /* ps: false means break, true means continue*/
                        }
                    });

                    if( !found ) select.prepend('<option value=\"'+ val +'\" selected>' + val + '</option>');
                 }
                 item.fadeOut(); 
             }
         });");

        $form = new Form(new Spec);
        $form->disableViewCheck();
        if (is_null($id))
        {
            $form->tools(function (Form\Tools $tools){
                $tools->disableDelete();
            });
        }

        $form->display('id', 'ID')->setWidth(2);
        $form->select('name', trans('admin.spec_name'))->options(Spec::names())
            ->rules('required')->setWidth(6)->help(trans('admin.helper.spec_name'));

        $states = [
            'off'  => ['value' => 0, 'text' => '新建', 'color' => 'success'],
            'on' => ['value' => 1, 'text' => '取消', 'color' => 'info'],
        ];
        $form->switch('new_name_switch', __('admin.spec_name_new_label'))->states($states);
        $form->text('new_name', trans('admin.spec_name_new'))->setWidth(6)
            ->rules('required_unless:new_name_switch,off')->help(trans('admin.helper.spec_new'));
        $form->text('value', trans('admin.spec_value'))->rules('required|min:2|max:32')->help(trans('admin.helper.spec_value'));
        $form->text('slug', trans('admin.slug'))->prepend('<i class="fa fa-internet-explorer fa-fw"></i>')->help(trans('admin.helper.slug'));
        $form->number('views', trans('admin.views'))->default(0);

        $form->datetime('created_at', trans('admin.created_at'));
        $form->datetime('updated_at', trans('admin.updated_at'));

        $form->ignore(['new_name_switch', 'new_name']);

        $form->saving(function (Form $form) {
            // check duplication
            $total = Spec::whereName($form->name)->whereValue($form->value)->count();
            if ($total > 0)
            {
                $error = new MessageBag([
                    'status' => false,
                    'message' => "规格参数为 '{$form->name}' 的值  '{$form->value}'  已经存在！"
                ]);
                return back()->with(compact('error'));
            }

            if ($form->slug)
            {
                $form->slug = SlugService::createSlug(Spec::class, 'slug', $form->slug, ['unique' => true]);
            }
        });

        return $form;
    }

}
