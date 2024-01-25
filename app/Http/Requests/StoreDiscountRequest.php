<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StoreDiscountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    private function checkExists(string $table, $value)
    {
        return DB::table($table)
            ->where('id', $value)
            // ->whereNot('deleted_at', null)
            ->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type_id' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) {
                    if (!$this->checkExists('categories', $value) || !$this->checkExists('items', $value)) {
                        return $fail("The provided $attribute is not valid.");
                    }
                }
            ],
            'type'       => [
                'required',
                'string',
                'max:255',
                Rule::in(config('custom.menu_type'))
            ],
            'percentage' => 'required|integer|digits_between:1,100'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'type_id' => 'menu type',
            'type'    => 'menu type',
        ];
    }
}
