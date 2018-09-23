<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'product_size';

    protected $fillable = ['product_id', 'dia', 'dec', 'flute_length', 'shank_dia', 'oal', 'flutes'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
