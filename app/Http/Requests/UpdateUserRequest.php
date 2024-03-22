<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Whoops\Run;

class UpdateUserRequest extends FormRequest
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
        $rules = [
            'name' => 'nullable|string',
            'username' => 'nullable|string',
            'email' => 'nullable|email:dns',
            'password' => 'nullable'
        ];

        if ($this->input('username') !==  $this->old('username') ) {
            $rules['username'] = 'required|string|unique:users|alpha';
        }
        if ($this->input('email') !==  $this->old('email') ) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        return $rules;

    }
}
