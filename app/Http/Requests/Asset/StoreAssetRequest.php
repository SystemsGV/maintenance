<?php

namespace App\Http\Requests\Asset;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssetRequest extends FormRequest
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
            'name' => 'required|string',
            'code' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'departament' => 'required|string',
            'country' => 'required|string',
            'area_code' => ['nullable'],
            'priority' => 'required|string',
            'latitude' => ['nullable'],
            'longitude' => ['nullable'],
            'type' => ['nullable'],
            'cost' => ['nullable'],
        ];
    }
}
