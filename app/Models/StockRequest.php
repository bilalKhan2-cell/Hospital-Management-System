<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicines;
use App\Models\User;

class StockRequest extends Model
{
    use HasFactory;

    protected $table = 'stock_requests';

    protected $fillable = ['initiated_by','approved_by','quantity','approved_quantity','medicine_id'];

    public function initator(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function approver(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function medicine(){
        return $this->belongsTo(Medicines::class,'medicine_id');
    }
}
