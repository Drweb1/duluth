<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_language extends Model
{
    use HasFactory;
   public function get_language()
{
    return $this->belongsTo(Language::class, 'language_id', 'id');
}

}
