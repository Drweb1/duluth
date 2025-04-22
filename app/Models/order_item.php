<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    public function items()
    {
        return $this->belongsTo(item::class, 'item_id');
    }
    public function order()
{
    return $this->belongsTo(Order::class);
}
}
