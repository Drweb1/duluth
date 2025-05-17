<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule_task extends Model
{
    use HasFactory;
    public function get_task()
    {
        return $this->belongsTo(task::class,'task_id');
    }
}
