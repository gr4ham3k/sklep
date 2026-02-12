<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

use function Symfony\Component\Clock\now;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'sale_price',
        'sale_start',
        'sale_end',
        'stock_quantity',
        'category_id',
    ];

    protected $casts = [
        'sale_start' => 'datetime',
        'sale_end' => 'datetime',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function image()
    {
        return $this->hasOne(Product_image::class);
    }

    public function isOnSale(): bool
    {
        if(!$this->sale_price)
        {
            return false;
        }

        $now = Carbon::now();

        return (!$this->sale_start || $now->gte($this->sale_start))  
                && (!$this->sale_end || $now->lte($this->sale_end));
    }

    public function finalPrice()
    {
        $now = Carbon::now();

        if ($this->sale_price !== null &&
            (!$this->sale_start || $now->gte($this->sale_start)) &&
            (!$this->sale_end || $now->lte($this->sale_end))
        ) {
            return $this->sale_price;
        }
        
        return $this->price;
    }
}
?>