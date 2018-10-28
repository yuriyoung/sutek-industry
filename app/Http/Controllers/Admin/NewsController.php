<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Encore\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class NewsController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('News')
            ->description('description')
            ->body($this->grid());
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
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create News')
            ->description('description')
            ->body($this->form());
    }

    public function uploadImage(Request $request)
    {
        if (is_array($request->file()))
        {
            /**
             * @var Collection $collection
             */
            $collection = collect($request->file())->map(function (UploadedFile $file) {
                if ($file->isValid())
                {

                    $filename = $file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
                    $url = url('media/'.$file->store('images'));
                    return ['uploaded' => 1, 'fileName' => $filename, 'url' => $url,];
                }

                return [
                    'uploaded' => 0,
                    "error" => ["message" => "上传失败，不支持的文件格式或超出2MB的限制."]
                ];
            });
            return $collection->first();
        }

        $file = $request->file();
        if ($file->isValid())
        {
            $filename = $file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
            $url = url('media/'.$file->store('images'));
            return response()->json([
                'uploaded' => 1,
                'fileName' => $filename,
                'url' => $url,
            ]);
        }

        return response()->json([
            'uploaded' => 0,
            "error" => [
                "message" => "上传失败，不支持的文件格式或超出2MB的限制."
            ]
        ]);
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new News());
        $grid->model()->orderBy('updated_at', 'desc');

        $grid->id('ID')->sortable();
        $grid->title(trans('admin.title'))->editable();
        $grid->slug(trans('admin.slug'))->display(function ($slug) {
            $link = url('news/' . $slug);
            return "<a href='{$link}' target='_blank'>" .str_limit($slug, 28) ."</a>";
        });
        $grid->author()->name(trans('admin.user'))->sortable();
        $grid->summary(trans('admin.summary'));
        $grid->views(trans('admin.views'))->sortable();

        $grid->created_at(trans('admin.created_at'))->sortable();
        $grid->updated_at(trans('admin.updated_at'))->sortable();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        Admin::script("$('.box-body').children('img').each(function(){
    $(this).addClass('img-responsive');
  });");

        $show = new Show(News::findOrFail($id));

        $show->id('ID');
        $show->title(trans('admin.title'));
        $show->slug(trans('admin.slug'));
        $show->body(trans('admin.body'))->unescape();
        $show->summary(trans('admin.summary'));
        $show->author()->name(trans('admin.author'));
        $show->views(trans('admin.views'));

        $show->created_at(trans('admin.created_at'));
        $show->updated_at(trans('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new News());

        $form->display('id', 'ID');
        $form->text('title', trans('admin.title'));
        $form->text('slug', trans('admin.slug'))->prepend('<i class="fa fa-internet-explorer fa-fw"></i>'.str_finish(url('news'), '/'))->help(trans('admin.helper.slug'));
        $form->ckeditor('body', trans('admin.body'))->options([
            'filebrowserImageUploadUrl' => '/admin/news/upload?_token='.csrf_token().'&type=images&responseType=json',
            'imageUploadUrl' =>'/admin/news/upload?_token='.csrf_token().'&type=images&by=drop_or_clipboard_up&responseType=json',
//            'filebrowserBrowseUrl' => '/admin/news?'.csrf_token().'&type=Files',
//            'filebrowserUploadUrl' => '/admin/news/upload?'.csrf_token().'&type=Files'
        ]);
        $form->textarea('summary', trans('admin.summary'));
        $form->display('author.name', trans('admin.author'))->with(function ($value) {
            // it is creating mode
            return $this->id ?  $value : auth('admin')->user()->name;
        });
        $form->number('views', trans('admin.views'));
        $form->display('created_at', trans('admin.created_at'));
        $form->display('updated_at', trans('admin.updated_at'));

        return $form;
    }
}
