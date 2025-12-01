<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'min:3',
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.min' => 'A name is too short',
            'email.required' => 'A email is required',
            'password.required' => 'A password is required'
        ];
    }
}
