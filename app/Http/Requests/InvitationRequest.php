<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvitationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'data' => ['required', 'array'],
            'data.*' => ['required_with:data', 'required', 'array:name,email,role'],
            'data.*.name' => ['required', 'string', 'min:2'],
            'data.*.email' => ['required', 'email:rfc,dns'],
            'data.*.role' => ['required', 'string', 'exists:App\Models\Role,name']
        ];
    }
}
