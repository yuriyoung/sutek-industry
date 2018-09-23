<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use Encore\Admin\Widgets\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Spec;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManagerStatic as Image;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Grid;
use Encore\Admin\Form;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    use ModelForm;

    /**
     * Display a listing of the resource.
     *
     * @return \Encore\Admin\Layout\Content
     */
    public function index()
    {
        return Admin::content(function (Content $content){
            $content->header(trans('admin.product'));
            $content->description(trans('admin.list'));
            $content->body($this->grid()->render());
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int|string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product)
            $product = Product::findBySlugOrFail($id);


        return response()->json($product);
    }

    /**
     * 仅作为修改图片存储位置后，恢复之前已上传的产品图片路径不正确问题
     *
     * @Author: Yuri Young<yuri.young@qq.com>
     * @data 2018-09-06 21：24：43
     */
    public function recoverImages()
    {
        return response()->json(['nothing to do']);

        // 按产品ID扫描media目录下以id命令的的文件夹下子文件夹内的图片
        // 重新保存到产品目录下
        // 将新的文件全路径更新到产品表
        // 完成
        $errors = [];
        $total = 0;
        $product_count = 0;
        $storage = Storage::disk('media');
        $storage->deleteDirectory('products');
        $products = Product::all();
        foreach ($products as $product )
        {
            $files = $storage->allFiles($product->id);
            $product_path = 'products/'.$product->id;
            $ok = $storage->makeDirectory($product_path);
            if( $ok )
            {
                // move or copy file to new directory
                $index = 0;
                $thumb_index = 0;
                $images = [];
                foreach ($files as $file)
                {
                    $ext = '.'.pathinfo($file, PATHINFO_EXTENSION);
                    $name = pathinfo($file, PATHINFO_FILENAME);
                    $new_name = $product->slug.'_'.$index.$ext;
                    if ($name == 'thumb')
                    {
                        $new_name = $product->slug.'_'.$thumb_index.'_thumb.jpeg';
                        ++$thumb_index;
                    }
                    else
                    {
                        ++$index;
                        array_push($images, "products/{$product->id}/images/".$new_name);
                    }
                    $storage->copy($file, $product_path.'/images/'.$new_name);
//                    $storage->move($file, $product_path.'/images/'.$new_name);
                    ++$total;
                }

                ++$product_count;

                // update to table
                $product->images = $images;
                $product->save();
            }
            else
            {
//                Handler::error('Error', 'Can not make directory ' . $product_path);
                $errors[] = "Error, Can not make directory [{$product->id}]  {$product_path}";
            }
        }

        $results = [
            'total files' => $total,
            'tota_products' => $product_count,
            'errors' => $errors
        ];

        return response()->json($results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Encore\Admin\Layout\Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header(trans('admin.product'));
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
            $content->header(trans('admin.product'));
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
        return Admin::grid(Product::class, function (Grid $grid)  {

            $grid->id('ID')->sortable();
            $grid->title(trans('admin.title'))->editable();
            $grid->slug(trans('admin.slug'))->display(function ($slug) {
                // TODO: 修改成前台地址
                $link = url('products/' . $slug);
                return "<a href='{$link}' target='_blank'>" .str_limit($slug, 28) ."</a>";
            });
            $grid->category()->name(trans('admin.category'))->sortable();
            $grid->description(trans('admin.description'))->limit(120);
            $grid->thumbs(trans('admin.image'))->display(function ($thumbs) {
                // TODO: 是否应该用slider方式显示多张图片
                // TODO: 应该显示缩略图(图片文件名带_thumb后缀)
                return count($thumbs) > 0 ? $thumbs[0] : (count($this->images) > 0 ? $this->images[0]: null);
                /**
                 * issues: image(url('media'), 100, 80); => http://xxx.com/media[here not a '/']xxx.jpg
                 * issues by yuri.young@qq.com
                 * see: https://github.com/z-song/laravel-admin/issues/2403
                 */
            })->image(url('media'), 100, 80);

            $grid->views(trans('admin.views'))->sortable();
            $grid->likes(trans('admin.likes'))->sortable();
            $grid->status(trans('admin.status'))->sortable()->display(function ($status) {
                switch ($status)
                {
                    case 0: return trans('admin.draft');
                    case 1: return trans('admin.published');
                    case 2: return trans('admin.trashed');
                    default: return trans('admin.error');
                }
            });

            $grid->created_at(trans('admin.created_at'))->sortable();
            $grid->updated_at(trans('admin.updated_at'))->sortable();
            $grid->model()->orderBy('updated_at', 'desc');

            $grid->actions(function (Grid\Displayers\Actions $actions) {
                if($actions->row->status == 2)
                {
                    $actions->disableDelete();
                    $actions->disableEdit();
                }
            });

            $grid->filter(function (Grid\Filter $filter) {
//                $filter->disableIdFilter();
                $filter->like('title', trans('admin.title'));

                $filter->scope('published', trans('admin.published'))->where('status', 1);
                $filter->scope('draft', trans('admin.draft'))->where('status', 0);
                $filter->scope('trashed', trans('admin.trashed'))->onlyTrashed();
            });

        });
    }

    /**
     * Make a form builder.
     * only one form for tabs
     * specs is many to many relation
     *
     * @return Form
     *
     */
    public function form($id = null)
    {
        Admin::script("$('#title').on('input', function(e){ $('#slug').val(e.delegateTarget.value); $('#title').slugIt(); })");

        return Admin::form(Product::class, function (Form $form) use ($id) {

            $form->tab('基本', function (Form $form){
                $form->display('id', 'ID');
                $form->select('category_id',trans('admin.category'))->options(Category::selectOptions())->help(__('admin.helper.product_category', ['url' => admin_url('categories')]));
                $form->text('title', trans('admin.title'))->rules('required|min:8|max:64')->help(__('admin.helper.product_title', ['max' => '64']));
                $form->url('slug', trans('admin.slug'))->readOnly()->help(__('admin.helper.slug'));
                $form->editor('description', trans('admin.description'))->rules('required');
                $form->html(__('admin.helper.description.product'));
                $form->multipleImage('images', trans('admin.image'))
                    ->uniqueName()
                    ->removable()->rules('mimes:jpeg,jpg,png')
                    ->help(__('admin.helper.product_image'));
                $form->select('status', trans('admin.status'))->options([0 => '草稿', 1 => '发布'])->setWidth(2)->default(1);
                $form->number('views', trans('admin.views'))->default('0');
                $form->number('likes', trans('admin.likes'))->default('0');

                $form->datetime('created_at', trans('admin.created_at'));
                $form->datetime('updated_at', trans('admin.updated_at'));
            });
            $form->tab('规格', function (Form $form){
                $notice = __('admin.helper.product_notice', ['url' => admin_url('specs/create')]);
                $form->html("<span class='text-warning'><i class='fa fa-exclamation'></i> {$notice}</span>", '');
                $names = Spec::names();
                foreach ($names as $name)
                {
                    $form->multipleSelect('specs', ucfirst($name))->options(function () use($name) {
                        return Spec::whereName($name)->pluck('value', 'id');
                    })->setWidth(4)->placeholder(trans('admin.select') . trans('admin.spec') . ' ' . ucfirst($name));
                }
            });

            $form->tab('尺寸', function (Form $form) use($id) {
                $grid = Admin::Grid(Size::class, function (Grid $grid) use($id) {
                    $grid->model()->where('product_id', $id);
                });
                $grid->id('ID')->sortable();
                $grid->product_id('Product')->sortable();
                $grid->dia('DIA')->editable()->sortable();
                $grid->dec('DEC')->editable()->sortable();
                $grid->flute_length('Flute length')->editable()->sortable();
                $grid->shank_dia('Shank DIA')->editable()->sortable();
                $grid->oal('OAL')->editable()->sortable();
                $grid->flutes('Number of Flutes')->editable()->sortable();

                $grid->disableFilter();
                $grid->disableExport();
                $grid->disablePagination();
                $grid->tools->disableRefreshButton();
                $grid->tools->disableFilterButton();
                $grid->tools->disableBatchActions();

                $form->html($grid->render())->setWidth(12);
            });

            $form->ignore('slug');
        });
    }

    private function _sequenceName(UploadedFile $file)
    {
        $idx = 0;
        $ext = $file->getClientOriginalExtension();
        $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $sep = ends_with($file_name, '_') ? '' : '_';
        $new_name =  $file_name . '.' . $ext;

        while (Storage::disk(config('admin.upload.disk'))->exists("/images/{$new_name}"))
        {
            ++$idx;
            $new_name = $file_name.$sep.$idx.'.'.$ext;
        }
        return $new_name;
    }

    /**
     * @brief The _resize_image provides resizing image size to 760x500 and create a thumbnail
     * @Author: Yuri Young<yuri.young@qq.com>
     * @param string $full_path
     * @param int $width
     * @param int $height
     * @param bool $thumbnail
     */
    private function _resize_image($full_path, $width, $height, $thumbnail = false)
    {
        $resizeImg = Image::make($full_path);
        $resizeImg->resize($width, $height);
        $resizeImg->save();

        if ($thumbnail)
        {
            $ext = '.' . pathinfo($full_path, PATHINFO_EXTENSION);
            $base_name = pathinfo($full_path, PATHINFO_BASENAME);// with extension
            $file_name = pathinfo($full_path, PATHINFO_FILENAME);// without extension
            $path = pathinfo($full_path, PATHINFO_DIRNAME);

            $thumb_file = str_finish($path, '/').$file_name.'_thumb'.$ext;
            $resizeImg->resize(254, 167);
            $resizeImg->save($thumb_file, 80);
        }
    }

    /**
     * @brief The _make_watermark provides add a logo watermark
     * @author Yuri Young<yuri.young@qq.com>
     * @param string $file_path
     * @param string $watermark
     */
    private function _insert_watermark($full_path, $watermark)
    {
        // add watermark
        $img = Image::make($full_path);
//        $img->insert(public_path('images/logo.png'));
        $img->insert($watermark);
        $img->save();
    }

}
