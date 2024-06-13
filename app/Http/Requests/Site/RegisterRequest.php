<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'center_id'       => 'required|not_in:Select Center',
            'name'            => 'required',
            'university_id'   => 'required|numeric|unique:students,university_id',
            'email'           => 'required|unique:students,email',
            'password'        => 'required',
            'phone'           => 'required|numeric|unique:students,phone',
            'image'           => 'required',
        ];
    }
}
