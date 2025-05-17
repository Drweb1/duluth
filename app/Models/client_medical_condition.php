<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_medical_condition extends Model
{
    use HasFactory;
    public function get_medical_condition()
    {
        return $this->belongsTo(medical_condition::class, 'medical_condition_id', 'id');
    }
}
