<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductCreateRequest extends FormRequest
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
            'name' => ['required', 'min:10'],
            'article' => ['required', 'regex:/^[a-zA-Z]+$/', Rule::unique('products', 'article')]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле name обязательно для заполнения',
            'name.min' => 'Поле name должно быть не менее 10 символов',
            'article.required' => 'Поле article обязательно для заполнения',
            'article.regex' => 'Поле article должно содержать только латинские символы',
            'article.unique' => 'Поле article с таким значением уже существует',
        ];
    }
}
