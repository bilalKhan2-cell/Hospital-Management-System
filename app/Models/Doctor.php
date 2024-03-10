<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Department, User};

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'user_id', 'dob', 'contact_info', 'address', 'specialization', 'email', 'cnic', 'department_id', 'joining_date', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function doctor_department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public static $specializations = [
        'Allergy and Immunology' => 'Allergy and Immunology',
        "Anesthesiology" => "Anesthesiology",
        "Cardiology" => "Cardiology",
        "Dermatology" => "Dermatology",
        "Endocrinology" => "Endocrinology",
        "Gastroenterology" => "Gastroenterology",
        "Hematology" => "Hematology",
        "Nephrology" => "Nephrology",
        "Neurology" => "Neurology",
        "Obstetrics and Gynecology (OB/GYN)" => "Obstetrics and Gynecology (OB/GYN)",
        "Oncology" => "Oncology",
        "Ophthalmology" => "Ophthalmology",
        "Orthopedics" => "Orthopedics",
        "Otolaryngology" => "Otolaryngology",
        "Pediatrics" => "Pediatrics",
        "Pulmonology" => "Pulmonology",
        "Psychiatry" => "Psychiatry",
        "Radiology" => "Radiology",
        "Rheumatology" => "Rheumatology",
        "Urology" => "Urology"
    ];

    public static $rules = [
        'name' => "required",
        "gender" => "required",
        "dob" => "required|date",
        "contact_info" => "required",
        "address" => "required",
        "specialization" => "required",
        "email" => "required|email|unique:doctors,email",
        "cnic" => "required|unique:doctors,cnic",
        "department_id" => "required",
        "joining_date" => "required|date",
        'status' => 'required|numeric'
    ];

    public static $messages = [
        'name.required' => "Doctor Name is Required",
        "gender.required" => "Please Select Doctor Gender",
        "dob.required" => "Please Enter Date of Birth",
        "dob.date" => "Invalid Date-of-Birth Format",
        "contact_info.required" => "Doctor Contact No. is Required",
        "address.required" => "Doctor Permenant Address is Required",
        "specialization.required" => "Please Select Doctor Specialization",
        "email.required" => "Please Enter Doctor Email Address",
        "email.email" => "Invalid Email Format",
        "email.unique" => "This Email Address is Already Registered",
        "cnic.required" => "Doctor CNIC is Required",
        "cnic.unique" => "Doctor With This CNIC is Already Registered",
        "department_id" => "Please Select Department",
        "joining_date.date" => "Invalid Joining Date Format",
        "joining_date.required" => "Joining Date is Required",
        "status.numeric" => "Invalid Profile Status Provided"
    ];

    public static function getRules(array $overrides = [])
    {
        return array_merge(static::$rules, $overrides);
    }

    public function setNameAttribute($value){
        return $this->attributes['name'] = 'DR-'.ucwords($value);
    }
}
