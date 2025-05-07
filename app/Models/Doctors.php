<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Users;
use App\Models\Appointments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctors extends Model
{
    use HasFactory;

    protected $table = 'doctors';

    protected $fillable = [
        'firstname',
        'lastname',
        'specialty',
        'qualification',
        'doctor_image',
    ];

    public function Admin()
    {
        return $this->belongsTo(Admin::class,'id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointments::class,'doctor_id','id');
    }

}
