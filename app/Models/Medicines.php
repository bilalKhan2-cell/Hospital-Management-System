<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Medicines extends Model
{
    use HasFactory;

    protected $table = "items";

    protected $fillable = ['name', 'description', 'strength', 'dosage_form', 'unit_price', 'user_id'];

    public function created_by()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static $rules = [
        'name' => "required",
        "strength" => "required",
        "dosage_form" => "required",
        "unit_price" => "required|numeric"
    ];

    public static $messages = [
        'name.required' => "Please Enter Medicine Name",
        "strength.required" => "Please Enter Medicine Strength",
        "dosage_form.required" => "Please Select Dosage Form",
        "unit_price.required" => "Please Enter Price",
        "unit_price.numeric" => "Invalid Price Format"
    ];

    public static $dosage_forms = [
        'Tablet' => "Tablet",
        "Drip" => "Drip",
        "Capsule" => "Capsule",
        "Syrup" => "Syrup",
        "Suspension" => "Suspension",
        "Solution" => "Solution",
        "Injection" => "Injection",
        "Cream" => "Cream",
        "Ointment" => "Ointment",
        "Gel" => "Gel",
        "Lotion" => "Lotion",
        "Drops" => "Drops",
        "Inhaler" => "Inhaler",
        "Patch" => "Patch",
        "Aerosol" => "Aerosol",
        "Spray" => "Spray",
        "Foam" => "Foam"
    ];

    public function setNameAttribute($value){
        return $this->attributes['name'] = ucwords($value);
    }
}
