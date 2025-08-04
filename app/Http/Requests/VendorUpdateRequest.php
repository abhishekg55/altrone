<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class VendorUpdateRequest extends FormRequest
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
            'email' => 'required|email|max:256|unique:users,email,'. request()->uuid .',uuid',
            'password' => 'nullable|string',
            'status' => 'required|numeric|min:0|max:1',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vendor name field is required.',
            'email.required' => 'Email field is required.',
            'email.unique' => 'Email already been taken.',
            'status.required' => 'Status field is required.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
