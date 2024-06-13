<?php

namespace App\Http\Requests\Admin\User;

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
            $emailRule = 'required|unique:users,email,'.($userId ?: 'NULL').',id';
        }

        return [
            'first_name'     => 'required',
            'last_name'      => 'required',
            'email'          => $emailRule,
            'role'           => 'required|not_in:Select Role'
        ];
    }
}
