<?php

namespace App\Models;

use Encore\Admin\Form\Field\HasMany;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Keygen\Keygen;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name 名称
 * @property string $slug 标识
 * @property string|null $description 描述
 * @property int $parent_id 父分类
 * @property int $sort 排序
 * @property string|null $icon 图标
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $children
 * @property-read \App\Models\Category $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category findSimilarSlugs(\Illuminate\Database\Eloquent\Model $model, $attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereHot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category findBySlugOrFail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereUpdatedAt($value)
 */
class Category extends Model
{
    use AdminBuilder, Sluggable, SluggableScopeHelpers;
    use  ModelTree { ModelTree::boot as treeBoot;}

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'description',
        'sort',
        'views',
        'icon',
    ];

    public $incrementing = false;

    public function __construct (array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');
        $this->setOrderColumn('sort');
        $this->setTitleColumn('name');
    }

    /**
     * @pref to use generate slug url
     * @Author: Yuri Young<yuri.young@qq.com
     * @return array
     */
    public function sluggable ()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * 取每个根分类下的子分类
     * @Author: Yuri Young<yuri.young@qq.com>
     * @param int $max
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function priorityCategories($max = 9)
    {
        // ORDER BY sort ASC
        $roots = Category::with(['children' => function($query) use ($max) {
            $query->withCount('products')->limit($max);
        }])->withCount('products')->whereParentId(0)->get();

        $cats = [];
        foreach ($roots as $root)
        {
            $cats = array_merge($cats, $root->children->all());
        }

        return $cats;
    }

    public function products() //: HasMany
    {
        return $this->hasMany(\App\Models\Product::class, 'category_id', 'id');
    }

    /**
     * Detach models from the relationship.
     *
     * @return void
     */
    protected static function boot()
    {
        static::treeBoot();

        static::creating(function (Category $category) {
            $id = $category->_generatePrimaryKey();
            while (Category::whereId($id)->count() > 0)
            {
                $id = $category->_generatePrimaryKey();
            }
            $category->id = $id;
        });

//        static::deleting(function (Category $model) {
//            $model->products()->detach();
//        });
    }

    private function _generatePrimaryKey()
    {
        return Keygen::numeric(7)
            ->prefix(mt_rand(1, 9))
            ->suffix(mt_rand(1, 9))
            ->generate(true);
    }
}
