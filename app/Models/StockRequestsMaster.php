<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Supplier;

class StockRequestsMaster extends Model
{
    use HasFactory;

    protected $table = 'stock_requests_master';

    protected $fillable = ['initiated_by','approved_by','is_approved','notes','supplier_id'];

    public function initiator(){
        return $this->belongsTo(User::class,'initiated_by');
    }

    public function approver(){
        return $this->belongsTo(User::class,'approved_by');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
}
