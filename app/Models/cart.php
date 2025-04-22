<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $fillable = [
        'customer_id',
        'external_id',
        'total_price',
        'status',
    ];
    // public function items()
    // {
    //     return $this->hasMany(cart_item::class);
    // }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function cart_items()
    {
        return $this->hasMany(cart_item::class);
    }
}
