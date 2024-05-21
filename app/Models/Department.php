<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Block;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'comments',
        'user_id',
        'block_id'
    ];

    public function dept_block()
    {
        return $this->belongsTo(Block::class, 'block_id');
    }

    public function setTitleAttribute($value){
        return $this->attributes['title'] = ucwords($value);
    }
}
