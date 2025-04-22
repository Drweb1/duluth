<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cart_item extends Model
{
    protected $fillable = [
        'cart_id',
        'item_id',
        'price',
    ];
    public function cart()
    {
        return $this->belongsTo(cart::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id'); // Make sure to specify the foreign key if it's not 'item_id'
    }

}
