<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Keygen\Keygen;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property int $category_id 分类外键
 * @property string|null $code 内部编码
 * @property string $title 标题
 * @property string|null $slug 链接slug
 * @property string $description 描述
 * @property array $images 图片
 * @property int $views 浏览数
 * @property int $likes 点赞数
 * @property int $status 状态（1可见）
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Spec[] $specs
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product findSimilarSlugs(\Illuminate\Database\Eloquent\Model $model, $attribute, $config, $slug)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product findBySlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product findBySlugOrFail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product withoutTrashed()
 */
class Product extends Model
{
    use SoftDeletes, Sluggable, SluggableScopeHelpers;

    protected $fillable = [
        'category_id',
        'code',
        'title',
        'slug',
        'description',
        'images',
        'views',
        'likes',
        'status'
    ];

    public $incrementing = false;
    protected $dates = ['deleted_at'];
    protected $with = ['category', 'specs'];
    protected $appends = ['thumbs', 'url', 'media_path'];

    public function sluggable ()
    {
        return [
            'slug' => [
                'source' => 'title',
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function specs()
    {
        return $this->belongsToMany(\App\Models\Spec::class);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    public function setImagesAttribute($images)
    {
        if (is_array($images))
        {
            $this->attributes['images'] = json_encode($images);
        }
    }

    public function getImagesAttribute($images)
    {
        if(is_array($images))
        {
            return $images;
        }
        return json_decode($images, true);
    }

    public function getThumbsAttribute()
    {
        $thumbnails = [];
        foreach ($this->images as $image)
        {
            $path_parts = pathinfo($image);
            $dir = $path_parts['dirname'];
            $file_name = $path_parts['filename']; // without extension
            $ext = '.'.$path_parts['extension'];

            $path = str_finish($dir, '/').$file_name.'_thumb'.$ext;
            $thumbnails[] = $path;
        }
        return $thumbnails;
    }

    public function getUrlAttribute()
    {
        return  url("products/{$this->slug}");
    }

    public function getMediaPathAttribute()
    {
        return Storage::disk('media')->url('');
    }

    protected static function boot ()
    {
        parent::boot();

        static::creating(function (Product $product) {
            $id = $product->_generatePrimaryKey();
            while (Product::whereId($id)->count() > 0)
            {
                $id = $product->_generatePrimaryKey();
            }
            $product->id = $id;
            $source = blank($product->slug) ? $product->title : $product->slug;
            $product->slug = SlugService::createSlug(Product::class, 'slug', $source, ['unique' => true]);

            if (request()->hasFile('images'))
            {
                // 移动图片到产品id目录下，同时修改images路径
                $product->_processImages();
            }
        });

        static::updating(function(Product $product){
            $source = blank($product->slug) ? $product->title : $product->slug;
            $product->slug = SlugService::createSlug(Product::class, 'slug', $source, ['unique' => false]);
            if (request()->hasFile('images'))
            {
                // 编辑时可能有新图增加
                $product->_processImages();
            }
        });

        static::updated(function(Product $product){
            if (request()->has('_file_del_'))
            {
                // 每次更新完成，都检查是否还有没使用的缩略图，有则删除
                $product->_clearThumbnails();
            }
        });

        // TODO: 需要增加永久删除/清理已删除的记录
        static::deleting(function (Product $product){
            $product->status = 2;
            $product->save();
        });
    }

    /**
     * 私有处理函数
     * =======================================================================================
     */

    /**
     * @brief 用于随机生成产品的9位主键id
     * 依赖库: composer require gladcodes/keygen，见: https://github.com/gladchinda/keygen-php
     * @Author: Yuri Young<yuri.young@qq.com>
     * @return string
     */
    private function _generatePrimaryKey()
    {
        return Keygen::numeric(7)
            ->prefix(mt_rand(1, 9))
            ->suffix(mt_rand(1, 9))
            ->generate(true);
    }

    /**
     * @brief 上传图片，时默认存储位置在media/images目录下，需要将图片移动到产品id目录下，同时处理图片大小和水印。
     *  PS:如果是更新状态，只是部分图片需要移动，依靠图片存储的目录判断是否是新加的图片再移动
     * @Author: Yuri Young<yuri.young@qq.com>
     * @return $this
     */
    private function _processImages()
    {
        $storage = Storage::disk('media');
        $default_path = config('admin.upload.directory.image');
        $images_new = [];
        foreach ($this->images as $index => $img)
        {
            $ext = '.' . pathinfo($img, PATHINFO_EXTENSION);
            $base_name = pathinfo($img, PATHINFO_BASENAME);// with extension
            //$file_name = pathinfo($img, PATHINFO_FILENAME);// without extension
            $folder = pathinfo($img, PATHINFO_DIRNAME);
            if ($folder == $default_path)
            {
                $new_name = $index === 0 ? $this->slug.$ext : $this->slug.'_'.$index.$ext;
                $destination = str_finish("products/{$this->id}/{$folder}", '/').$new_name;
                $ok = $storage->move($img, $destination);
                if($ok)
                {
                    $images_new[] = $destination;//! important
                    $this->_resize_image("media/{$destination}", 760, 500, true);
                    $this->_insert_watermark("media/{$destination}", public_path('images/logo-watermark.png'));
                }
            }
            else
            {
                $images_new[] = $img;
            }
        }
        $this->images = $images_new;

        return $this;
    }

    /**
     * @brief 检查当前产品目录下是否存在已经不使用的缩略图，删除之。文件名以_thumb结尾的为缩略图
     * @Author: Yuri Young<yuri.young@qq.com>
     */
    private function _clearThumbnails()
    {
        $storage = Storage::disk('media');
        $files = $storage->allFiles("products/{$this->id}/images");
        $thumbnails = $this->thumbs;
        foreach ($files as $file)
        {
            $file_name = pathinfo($file, PATHINFO_FILENAME);
            $is_thumbnail = ends_with($file_name, '_thumb');
            if($is_thumbnail && !in_array($file, $thumbnails) )
            {
                $storage->delete($file);
            }
        }
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
            $resizeImg->resize(268, 167);
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
