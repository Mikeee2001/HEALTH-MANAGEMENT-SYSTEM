<?php

namespace App\Models;

use App\Models\Users;
use App\Models\Doctor;
use App\Models\Doctors;
use App\Models\Appointments;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $attributes = [
        'admin_id' => 1,
    ];

    protected $table = 'admins';
    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'email',
        'password',
        'admin_id',
        'role'
    ];

    public function Users()
    {
        return $this->hasMany(Users::class,'admin_id');
    }

    public function Appointments()
    {
        return $this->hasMany(Appointments::class,'admin_id');
    }

    public function Doctors()
    {
        return $this->hasMany(Doctors::class,'admin_id');
    }



}
