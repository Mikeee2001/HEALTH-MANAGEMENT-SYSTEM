<?php

namespace App\Models;

use App\Models\User;
use App\Models\Admin;
use App\Models\Users;
use App\Models\Doctors;
use App\Models\AppointmentStatuses;
use Illuminate\Database\Eloquent\Model;
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
    ];

    public function Admin()
    {
        return $this->belongsTo(Admin::class,'id');
    }

    public function Appointment_status()
    {
        return $this->belongsTo(AppointmentStatuses::class,'appointment_status_id', 'id');
    }

    public function Users()
    {
        return $this->belongsTo(Users::class,'user_id','id');
    }

    public function Doctors()
    {
        return $this->belongsTo(Doctors::class,'id');
    }

}
