<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\{
    Department,
    Block,
    Ward,
    Designation
};

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'block_id',
        'department_id',
        'ward_id',
        'pass_code',
        'address',
        'cnic',
        'contact_info',
        'designation_id',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function user_ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }

    public function user_block()
    {
        return $this->belongsTo(Block::class, 'block_id');
    }

    public function user_department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function user_designation(){
        return $this->belongsTo(Designation::class,'designation_id');
    }
}
