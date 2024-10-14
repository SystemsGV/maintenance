<?php

namespace App\Http\Requests\CheckList;

use Illuminate\Foundation\Http\FormRequest;

class StoreCheckListRequest extends FormRequest
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
            'archive' => 'boolean',
            'type' => 'string',
            'game_id' => ['required', 'exists:games,id'],
            'period_id' => ['required', 'exists:periods,id'],
        ];
    }
}
