<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_special_requirement extends Model
{
    use HasFactory;
    public function get_requirement()
    {
        return $this->belongsTo(special_requirement::class, 'special_requirement_id', 'id');
    }
}
