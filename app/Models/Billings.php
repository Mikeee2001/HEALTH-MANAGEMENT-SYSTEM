<?php

namespace App\Models;

use App\Models\Users;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Billings extends Model
{
    use HasFactory;

    protected $table = 'billings';

    protected $fillable =  [
        'billing_date',
        'issue_date',
        'total_ammount',
        'paid_amount',
        'paid_amount',
        'balance',
        'billing_statuses_id',
    ];

    public function user()
    {
        return $this->hasMany(Users::class,'billings_id');
    }
}
