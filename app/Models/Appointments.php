<?php

namespace App\Models;

use App\Models\User;
use App\Models\Admin;
use App\Models\Users;
use App\Models\Doctors;
use App\Models\AppointmentStatuses;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointments extends Model
{
    use HasFactory;

    protected $table = 'appointments';

    protected $fillable = [
        'appointment_name',
        'date_time',
        'appointment_type',
        'user_id',
        'appointment_status_id',
        'doctor_id',
    ];

    protected $casts = [
        'date_time' => 'datetime', // Ensures it is a Carbon instance
    ];

    public function Admin()
    {
        return $this->belongsTo(Admin::class,'id');
    }

    public function appointmentStatus()
    {
        return $this->belongsTo(AppointmentStatuses::class, 'appointment_status_id');
    }

    public function Users()
    {
        return $this->belongsTo(Users::class,'user_id','id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctors::class,'doctor_id');
    }

}
