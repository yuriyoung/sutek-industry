<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Keygen\Keygen;

/**
 * App\Models\Attribute
 *
 * @property int $id
 * @property string $name 属性名
 * @property string $value 属性值
 * @property string $slug 链接标题
 * @property string|null $icon 图标
 * @property int $views 查看量
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Spec findSimilarSlugs(\Illuminate\Database\Eloquent\Model $model, $attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Spec whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Spec whereViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Spec whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Spec whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Spec whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Spec whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Spec whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Spec findBySlugOrFail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Spec whereIcon($value)
 */
class Spec extends Model
{
    use Sluggable, SluggableScopeHelpers;

    protected $fillable = ['name', 'value', 'slut', 'views', 'icon'];
    public $incrementing = false;

    public function sluggable ()
    {
        return [
            'slug' => [
                'source' => 'value'
            ]
        ];
    }

    public function products()
    {
        return $this->belongsToMany(\App\Models\Product::class)->withTimestamps();
    }

    static public function names()
    {
        $names = Spec::select('name')->groupBy('name')->get()->toArray();

        $options = [];
        foreach (array_flatten($names) as $name)
        {
            $options[$name] = ucfirst($name);
        }
        return $options;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Spec $spec) {
            $id = $spec->_generatePrimaryKey();
            while (Spec::whereId($id)->count() > 0)
            {
                $id = $spec->_generatePrimaryKey();
            }
            $spec->id = $id;
            $source = blank($spec->slug) ? $spec->title : $spec->slug;
            $spec->slug = SlugService::createSlug(Spec::class, 'slug', $source, ['unique' => true]);
        });

        static::updating(function (Spec $spec) {
            $source = blank($spec->slug) ? $spec->title : $spec->slug;
            $spec->slug = SlugService::createSlug(Spec::class, 'slug', $source, ['unique' => false]);
        });
    }

    private function _generatePrimaryKey()
    {
        return Keygen::numeric(7)
            ->prefix(mt_rand(1, 9))
            ->suffix(mt_rand(1, 9))
            ->generate(true);
    }
}
