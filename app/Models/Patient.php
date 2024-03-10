<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'fname', 'age', 'gender', 'address', 'contact_info', 'cnic', 'doctor_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static $rules = [
        'name' => 'required',
        'address' => 'required',
        "gender" => "required",
        'fname' => "required",
        'age' => "required|numeric"
    ];

    public static $messages = [
        'name.required' => "Patient Name is Required",
        "address.required" => "Address is Required",
        "gender.required" => "Please Select Gender",
        'fname.required' => "Father Name is Required",
        'age.required' => "Patient Age is Required",
        'age.numeric' => "Age should be numeric"
    ];

    public static function getRules(array $overrides = [])
    {
        return array_merge(static::$rules, $overrides);
    }

    public function setNameAttribute($value){
        return $this->attributes['name'] = 'MR-'.ucwords($value);
    }

    public function setFNameAttribute($value){
        return $this->attributes['fname'] = ucwords($value);
    }
}
