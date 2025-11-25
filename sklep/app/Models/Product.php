<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function image()
    {
        return $this->hasMany(Product_image::class);
    }
}
?>