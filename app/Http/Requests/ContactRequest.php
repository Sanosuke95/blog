<?php

namespace App\Http\Requests;

use App\Interfaces\FormRequestInterface;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest implements FormRequestInterface
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

    public function messages()
    {
        return $this->isMethod("POST") ? $this->messageStore() : $this->messageUpdate();
    }

    public function store(): array
    {
        return [
            'email' => 'required|email',
            'title' => 'required',
            'content' => 'min:6'
        ];
    }

    public function messageStore(): array
    {
        return [
            'email.required' => 'This email is required',
            'email.email' => 'This email is not compliant',
            'title.required' => 'This title is required',
            'content.min' => 'This content is too short'
        ];
    }

    public function update(): array
    {
        return [];
    }

    public function messageUpdate(): array
    {
        return [];
    }
}
