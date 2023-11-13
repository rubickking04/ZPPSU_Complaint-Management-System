<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationRequest extends FormRequest
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
            'student_id' => 'required|unique:information|string|max:255',
            'department' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'year_level' => 'required|string',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
        ];
    }

    /**
     * Customize the validation messages that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages()
    {
        return [
            'student_id.required' => 'Student ID is required!',
        ];
    }
}
