<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreCategoryRequest extends FormRequest
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
            'name'  => 'required|string|max:255',
            'slug'  => 'required|string|max:255|unique:categories,slug',
            'level' => 'required|integer|in:' . config('custom.category_level')
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug'  => Str::slug($this->get('name')),
            'level' => config('custom.category_level')
        ]);
    }
}
