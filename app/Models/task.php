<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    public function get_schedule(){
        return $this->hasMany(task::class,'id','task_id');
    }
}
