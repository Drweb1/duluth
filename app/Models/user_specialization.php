<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_specialization extends Model
{
    use HasFactory;
    public function get_speciality()
    {
        return $this->belongsTo(specialization::class, 'specialization_id', 'id');
    }

}
