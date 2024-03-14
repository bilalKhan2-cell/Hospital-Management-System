<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','contact_info','address','user_id'];

    public function registered_by(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function setNameAttribute($value){
        return $this->attributes['name'] = ucwords($value);
    }
}
