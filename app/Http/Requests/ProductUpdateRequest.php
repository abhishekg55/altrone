<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class ProductUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:256|unique:products,name,' . request()->uuid . ',uuid',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:png,jpg|max:1024',
            'description' => 'required|string',
            'status' => 'required|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Product name field is required.',
            'name.unique' => 'Product name already been taken.',
            'price.required' => 'Price field is required.',
            'stock.required' => 'Stock field is required.',
            'image.required' => 'Product Image is required.',
            'image.image' => 'Product Image type only jpg and png allowed.',
            'image.mimes' => 'Product Image type only jpg and png allowed.',
            'image.mimes' => 'Product Image size should not be more than 1 MB.',
            'description.required' => 'Description field required.',
            'status.required' => 'Status field is required.'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
