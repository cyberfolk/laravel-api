<?php

namespace App\Http\Requests\Technology;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTechnologyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'       => ['required', Rule::unique('types', 'name')->ignore($this->type), 'max:100'],
            'link_cover' => ['nullable', 'image', 'max:1024']
        ];
    }
}
