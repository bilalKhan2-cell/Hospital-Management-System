<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    User,
    Block
};

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'block_id',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function setNameAttribute($value){
        return $this->attributes['name'] = ucwords($value);
    }

    public function block(){
        return $this->belongsTo(Block::class,'block_id');
    }
}
