<?php

namespace App\Http\Controllers\Admin;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Tree;
use Encore\Admin\Form;
use Encore\Admin\Layout\Row;
use Encore\Admin\Layout\Column;

class CategoryController extends Controller
{
    use HasResourceActions;

    /**
     * Display a listing of the resource.
     *
     * @return Content
     */
    public function index()
    {
        Admin::script("$('#name').on('input', function(e){ $('#slug').val(e.delegateTarget.value); });");

        return Admin::content(function (Content $content) {
            $content->header(trans('admin.category'));
            $content->description(trans('admin.list'));
            $content->row(function (Row $row) {

                // left
                $row->column(6, Category::tree(function (Tree $tree){
                    $tree->disableCreate();
                })->render());

                // right
                $row->column(6, function (Column $column){
                    $form = new \Encore\Admin\Widgets\Form();
                    $form->action(admin_url('categories'));

                    $form->select('parent_id', trans('admin.category_parent'))->options(Category::selectOptions())->help(trans('admin.helper.category_parent'));
                    $form->text('name', trans('admin.category'))->rules('required|min:2|max:20')->help(trans('admin.helper.category'));
                    $form->url('slug', trans('admin.slug'))->prepend('<i class="fa fa-internet-explorer fa-fw"></i>')->help(trans('admin.helper.slug'));
                    $form->text('description', trans('admin.description'))->help(trans('admin.helper.description.category'));
                    $form->html(__('admin.helper.category_notice'));

                    $column->append((new Box(trans('admin.new'), $form))->style('info'));
                });
            });
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->action('\App\Http\Controllers\Admin\CategoryController@edit', ['id' => $id]);
    }

    public function options()
    {
        return response()->json(Category::selectOptions());
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header(trans('admin.category'));
            $content->description(trans('admin.edit'));
            $content->row($this->form($id)->edit($id));
        });
    }

    /**
     * Make a form builder.
     * @param  int  $id
     * @return Form
     */
    public function form($id = null)
    {
        Admin::script("$('#name').on('input', function(e){ " . (!$id ? "$('#slug').val(e.delegateTarget.value);" : "") . " });");

        $category = Category::find($id);

        return Category::form(function (Form $form) use($category) {
            $form->disableViewCheck();
            $form->tools(function (Form\Tools $tools){
                $tools->disableDelete();
            });

            $form->display('id', 'ID')->setWidth(2);
            $form->select('parent_id', trans('admin.category_parent'))->options(Category::selectOptions())->setWidth(4);
            $form->text('name', trans('admin.category'))->rules('required|min:2|max:20');
            $form->text('slug', trans('admin.slug'))->prepend('<i class="fa fa-internet-explorer fa-fw"></i>')->help(trans('admin.helper.slug'));;
            $form->text('description', trans('admin.description'))->help('分类描述（可选）');
            $form->number('views', trans('admin.hot'));
            $form->datetime('created_at', trans('admin.created_at'));
            $form->datetime('updated_at', trans('admin.updated_at'));

            $form->saving(function (Form $form){
                if ($form->slug)
                {
                    $form->slug = SlugService::createSlug(Category::class, 'slug', $form->slug, ['unique' => true]);
                }
            });
        });
    }
}
