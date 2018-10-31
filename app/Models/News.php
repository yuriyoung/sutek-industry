<?php

namespace App\Models;

use Encore\Admin\Auth\Database\Administrator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Services\SlugService;

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

    public function getImageAttribute()
    {
        preg_match_all( '~<img [^>]* />~', $this->body, $matchs );
        $count = count($matchs[0]);
        if ($count > 0)
        {
            preg_match('/<img.+src=\"?(.+\.(jpg|jpeg|gif|bmp|bnp|PNG))\"?.+>/i', $matchs[0][0], $match);
            return $match[1];
        }
        return null;
    }

    public function getUrlAttribute()
    {
        return  url("news/{$this->slug}");
    }

    protected static function boot ()
    {
        parent::boot();

        static::creating(function (News $news) {
            $news->user_id = auth('admin')->id();
            $source = blank($news->slug) ? $news->title : $news->slug;
            $news->slug = SlugService::createSlug(News::class, 'slug', $source, ['unique' => true]);
        });

        static::updating(function (News $news){
            $source = blank($news->slug) ? $news->title : $news->slug;
            $news->slug = SlugService::createSlug(News::class, 'slug', $source, ['unique' => false]);
        });
    }
}
