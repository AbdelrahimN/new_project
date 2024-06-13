<?php

namespace App\Http\Requests\Admin\Supervisor;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'             => 'required',
            'email'            => 'required|unique:supervisors,email',
            'phone'            => 'required|numeric',
            'role'             => 'required|not_in:Select Role',
            'university_id'    => 'required|numeric',
            'password'         => 'required',
            'center_id'        => 'required|not_in:Select Center'
        ];
    }
}
