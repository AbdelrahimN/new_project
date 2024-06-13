<?php

namespace App\Http\Requests\Site\Apply;

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
            'supervisor_id'          => 'required|not_in:Select Supervisor',
            'teaching_assistants_id' => 'required|not_in:Select teaching assistants',
            'student_id'             => 'nullable',
            'title'                  => 'required',
            'description'            => 'required',
            'member_id.*'            => 'required|max:5|not_in:Select Students'
        ];
    }
}
