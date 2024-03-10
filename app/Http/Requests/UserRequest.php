<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users,email',
            'cnic' => 'required|unique:users,cnic',
            'contact_info' => "required",
            "designation_id" => "required"
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Username is Required",
            "address.required" => "User Address is Required",
            "email.required" => "Email Address is Required",
            "email.email" => "Invalid Email Address Format Provided.",
            "email.unique" => "This Email Address is Already Existed",
            "cnic.required" => "CNIC is Required",
            "cnic.unique" => "This CNIC Number is Already Registered In Our System",
            "contact_info.required" => "Contact No. Is Required..",
            "designation_id.required" => "Please Select Designation"
        ];
    }
}
