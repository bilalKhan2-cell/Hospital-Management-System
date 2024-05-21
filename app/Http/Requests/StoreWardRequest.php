<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWardRequest extends FormRequest
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
            'block_id' => 'required|numeric',
            'department_id' => "required|numeric"
        ];
    }

    public function messages(): array {
        return [
            'name.required' => "Ward Name Is Required",
            'department_id.required' => "Please Select Department",
            'block_id.required' => "Please Select Block",
            "block_id.numeric" => "Invalid Block ID",
            'department_id.numeric' => "Invalid Department ID",
        ];
    }
}
