<?php

namespace App\Http\Requests;

use App\Interfaces\FormRequestInterface;
use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest implements FormRequestInterface
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
        return $this->isMethod("POST") ? $this->store() : $this->update();
    }

    public function store(): array
    {
        return [
            'name' => 'min:4',
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return $this->isMethod("POST") ? $this->messageStore() : $this->messageUpdate();
    }

    public function update(): array
    {
        return [];
    }

    public function messageStore(): array
    {
        return [
            'name.min' => 'this name is too short',
            'email.required' => 'This email is required',
            'email.email' => 'This element is not email',
            'password.required' => 'This password is required'
        ];
    }

    public function messageUpdate(): array
    {
        return [];
    }
}
