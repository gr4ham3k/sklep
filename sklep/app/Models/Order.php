<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'address_id',
        'total',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function address()
    {
        //to do
    }

    public function getTotalCalculatedAttribute()
    {
        return $this->items()->sum(function($item){
            return $item->quantity * $item->price;
        });
    }
}
