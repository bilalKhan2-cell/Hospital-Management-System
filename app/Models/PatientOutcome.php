<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PatientRecieving;

class PatientOutcome extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_outcome',
        'result_date',
        'patient_recieving_id',
        'user_id',
        'final_notes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function patient_recieving()
    {
        return $this->belongsTo(PatientRecieving::class, 'patient_recieving_id');
    }
}
