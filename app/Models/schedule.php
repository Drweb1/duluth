<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;
    public function get_client()
    {
        return $this->belongsTo(user::class, 'client_id')->where('type','client');
    }

    public function get_nurse()
    {
        return $this->belongsTo(user::class, 'nurse_id')->where('type','nurse');
    }

    public function get_caregiver()
    {
        return $this->belongsTo(user::class, 'caregiver_id')->where('type','caregiver');
    }

}
