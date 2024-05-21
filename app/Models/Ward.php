<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Department, Block};

class Ward extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'comments',
        'user_id',
        'block_id',
        'department_id'
    ];

    public function get_block()
    {
        return $this->belongsTo(Block::class, 'block_id');
    }

    public function get_department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function setNameAttribute($value){
        return $this->attributes['name'] = ucwords($value);
    }
}
