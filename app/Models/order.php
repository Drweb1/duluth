<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function customer()
        {
            return $this->belongsTo(customer::class, 'customer_id');
        }
        public function item()
        {
            return $this->belongsTo(item::class);
        }
        public function order_items()
        {
            return $this->hasMany(order_item::class);
        }
    
}
