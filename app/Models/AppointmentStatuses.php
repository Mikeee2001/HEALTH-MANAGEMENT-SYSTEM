<?php

namespace App\Models;

use App\Models\Users;
use App\Models\Appointments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppointmentStatuses extends Model
{
    use HasFactory;

    protected $table = 'appointment_statuses';

    protected $fillable = [
        'status',
        'appointment_status_id',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointments::class,  'appointment_status_id');
    }

    public function User()
    {
        return $this->hasMany(Users::class, 'id');
    }

}
