<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable

{
    public function orders()
{
    return $this->hasMany(order::class);
}
public function cart()
{
    return $this->hasOne(cart::class);
}
}
