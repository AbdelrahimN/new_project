<?php

namespace App\Http\Requests\Admin\Student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $userId = $this->user ? $this->user->id : null;
        $emailRule = 'nullable';

        if ($this->user && $this->email != $this->user->email) {
            $emailRule = 'required|unique:students,email,'.($userId ?: 'NULL').',id';
        }
        return [
            'center_id'       => 'required|not_in:Select Center',
            'name'            => 'required',
            'university_id'   => 'required|numeric',
            'email'           =>  $emailRule,
            'phone'           => 'required|numeric',
            'image'           => 'nullable',
        ];
    }
}
