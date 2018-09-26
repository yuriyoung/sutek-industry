<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'product_size';

    protected $fillable = ['product_id', 'diameter', 'equivalence', 'flute_length', 'shank_diameter', 'overall_length', 'flutes', 'square_size'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
