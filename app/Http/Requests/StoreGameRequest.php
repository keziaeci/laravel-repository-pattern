<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
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
            'title' => 'required',
            'size' => 'required',
            'lang' => 'required',
            'genre_id' => 'required',
            'publisher_id' => 'required',
        ];
    }

    function messages(): array {
        return [
            'title.required' => 'The title cannot be empty darling!',
            'size.required' => 'Although size doesn\'t matter, it doesn\'t mean that it can be none tho!',
            'lang.required' => 'You ain\'t talk?',
        ];
    }
}
