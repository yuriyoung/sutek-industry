<?php

namespace App\Models;

use Encore\Admin\Auth\Database\Administrator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $title 标题
 * @property string $slug 别名
 * @property int $user_id 作者
 * @property string $summary 概要
 * @property string $body 正文
 * @property array|null $images 图片
 * @property int $views 浏览数
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 */
class News extends Model
{
    use SoftDeletes, Sluggable, SluggableScopeHelpers;

    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'summary',
        'body',
        'images',
        'views',
    ];

    public function sluggable ()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function author()
    {
        return $this->belongsTo(Administrator::class, 'user_id');
    }

    public function setImagesAttribute($images)
    {
        if (is_string($images))
        {
            $images = array_wrap($images);
        }

        $this->attributes['images'] = json_encode($images);
    }

    public function getImagesAttribute($images)
    {
        if(is_array($images))
        {
            return $images;
        }
        return json_decode($images, true);
    }

    public function getUrlAttribute()
    {
        return  url("news/{$this->slug}");
    }
}
