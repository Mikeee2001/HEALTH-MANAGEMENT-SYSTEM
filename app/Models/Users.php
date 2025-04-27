<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Admin;
use App\Models\Patients;
use App\Models\Appointments;
use Laravel\Sanctum\HasApiTokens;
use App\Models\AppointmentStatuses;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'username',
        'firstname',
        'lastname',
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
        'password' => 'hashed',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class,'id');
    }

    public function Appointments()
    {
        return $this->hasMany(Appointments::class,'user_id','id');
    }

    public function AppointmentsStatus()
    {
        return $this->belongsTo(AppointmentStatuses::class,'id');
    }

    // public function Patients()
    // {
    //     return $this->hasMany(Patients::class,'id');
    // }

}
