<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Block extends Model
{
    use HasFactory;

    public static $rules = [
        'name' => "required|unique:blocks,name"
    ];

    public static $messages = [
        'name.required' => "Block Name is Required",
        "name.unique" => "This Block Name is Already Exist"
    ];

    protected $fillable = ['name','description','user_id'];

    public function setNameAttribute($value){
        return $this->attributes['name'] = ucfirst($value);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
