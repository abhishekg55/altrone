<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class VendorStoreRequest extends FormRequest
{
    public $validator = null;

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
            'name' => 'required|string|max:256',
            'email' => 'required|unique:users,email|email|max:256',
            'password' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vendor name field is required.',
            'email.required' => 'Email field is required.',
            'email.unique' => 'Email already been taken.',
            'password.required' => 'Password field is required.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
