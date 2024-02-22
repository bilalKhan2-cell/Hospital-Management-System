<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Department,
    User
};

class Ward extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','department_id','user_id'];

    public function uploaded_by(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }

    public function setNameAttribute($value){
        return $this->attributes['name'] = ucwords($value);
    }
}
