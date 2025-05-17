<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function get_profile()
    {
        return $this->belongsTo(user_profile::class,'id','user_id');
    }
    public function get_requirements()
    {
        return $this->hasMany(client_special_requirement::class, 'user_id', 'id');
    }
    public function get_conditions()
    {
        return $this->hasMany(client_medical_condition::class, 'user_id', 'id');
    }
    public function get_specialities()
    {
        return $this->hasMany(user_specialization::class, 'user_id', 'id');
    }
    public function medical_conditions()
    {
        return $this->belongsToMany(medical_condition::class, 'client_medical_conditions');
    }

    public function special_requirements()
    {
        return $this->belongsToMany(special_requirement::class, 'client_special_requirements');
    }
    public function get_availabilities()
    {
        return $this->hasMany(user_availability::class, 'user_id', 'id');
    }
    public function get_languages()
    {
        return $this->hasMany(user_language::class, 'user_id', 'id');
    }
    public function specializations()
    {
        return $this->belongsToMany(specialization::class, 'user_specializations');
    }
    public function languages()
    {
        return $this->belongsToMany(language::class, 'user_languages');
    }

}
