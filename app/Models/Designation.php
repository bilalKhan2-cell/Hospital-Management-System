<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Designation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'comments',
        'user_id'
    ];

    public function user_data(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function user_count(){
        return $this->hasMany(User::class,'user_id','id');
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = ucwords($value);
    }
}
