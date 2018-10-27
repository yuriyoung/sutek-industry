<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\UploadedFile;

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
            ->header('Index')
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
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    public function uploadImage(Request $request)
    {
        $data = collect($request->file())->map(function ($file) {
            if ($file->isValid())
            {
                return url('media/'. $file->store('media', 'news'));
            }
        });

        $data = $data->values()->toArray();
        if (empty($data)) {
            return <<<EOT
<script type="text/javascript">alert('upload with wrong way and config!')</script>
EOT;
        }


    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new News());

        $grid->id('ID')->sortable();
        $grid->title(trans('admin.title'))->sortable();
        $grid->slug(trans('admin.slug'));
        $grid->author()->name(trans('admin.user'))->sortable();
        $grid->summary(trans('admin.summary'));
        $grid->views(trans('admin.views'))->sortable();

        $grid->created_at(trans('admin.created_at'));
        $grid->updated_at(trans('admin.updated_at'));

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
        $show = new Show(News::findOrFail($id));

        $show->id('ID');
        $show->title(trans('admin.title'));
        $show->slug(trans('admin.slug'));
        $show->author()->name(trans('admin.user'));
        $show->summary(trans('admin.summary'));
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
        $form->text('slug', trans('admin.slug'));
        $form->display('author.name', trans('admin.user'));
        $form->textarea('summary', trans('admin.summary'));
        $form->ckeditor('body', trans('admin.body'));
//        $form->multipleImage('images', trans('admin.image'))->uniqueName()->removable();
        $form->number('views', trans('admin.views'));

        $form->display('created_at', trans('admin.created_at'));
        $form->display('updated_at', trans('admin.updated_at'));

        return $form;
    }
}
