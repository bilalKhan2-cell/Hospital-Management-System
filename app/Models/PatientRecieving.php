<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Ward;
use App\Models\Patient;

class PatientRecieving extends Model
{
    use HasFactory;

    protected $fillable = [
        'attendant_name',
        'attendant_contact_info',
        'attendant_cnic',
        'patient_id',
        'user_id',
        'ward_id',
        'is_admitted',
        'notes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }
}
