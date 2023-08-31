<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'content' => 'min:20',
            'image' => 'required|image|dimensions:min_width=100,min_height=100'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'content.min' => 'This content is too short'
        ];
    }
}
