<?php

namespace App\Http\Requests;

use App\Interfaces\FormRequestInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ContactRequest extends FormRequest implements FormRequestInterface
{

    /**
     * message
     *
     * @var array
     */
    public array $customMessage;

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

        $method = match ($this->method()) {
            'POST' => $this->postRule(),
            'PUT' => $this->updateRule(),
            default => $this->postRule()
        };

        return $method;
    }

    /**
     * custom message
     *
     * @return array
     */
    public function messages(): array
    {
        return $this->customMessage;
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                $validator->errors();
            }
        ];
    }

    /**
     * post rule
     *
     * @return array
     */
    public function postRule(): array
    {
        $this->customMessage = $this->postMessage();
        return [
            'title' => 'required|min:4|',
            'email' => 'required|email',
            'content' => 'min:6'
        ];
    }

    /**
     * post message
     *
     * @return array
     */
    public function postMessage(): array
    {
        return [
            'title.required' => 'A title is required',
            'title.min' => 'A title is too short',
            'email.required' => 'A email is required',
            'email.email' => 'This is not email',
            'content.min' => 'Content is to short'
        ];
    }

    public function updateRule(): array
    {
        $this->customMessage = $this->updateMessage();
        return [];
    }

    public function updateMessage(): array
    {
        return [];
    }
}
