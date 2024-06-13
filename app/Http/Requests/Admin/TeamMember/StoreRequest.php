<?php

namespace App\Http\Requests\Admin\TeamMember;

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
            'center_id' => 'required|not_in:Select Center',
            'supervisor_id' => 'required|not_in:Select Supervisor',
            'team_id' => 'required|not_in:Select Team',
            'project_id' => 'required|not_in:Select Project',
        ];
    }
}
