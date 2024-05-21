<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required',
            'block_id' => "required|numeric"
        ];
    }

    public function messages(): array {
        return [
            'title.required' => "Department Name is Required",
            'block_id.required' => "Please Select Block"
        ];
    }
}
