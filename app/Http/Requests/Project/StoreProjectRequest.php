<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
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
            'title'       => ['required', Rule::unique('projects', 'title')->ignore($this->project), 'max:100'],
            'start_date'  => ['required', 'date', 'before_or_equal:today', 'after:1900-01-01'],
            'last_commit' => ['nullable', 'date', 'before_or_equal:today', 'after:sale_date'], //after:after:sale_date not work
            'link_cover'  => ['nullable', 'image', 'max:1024'],
            'type_id'     => ['nullable', 'exists:types,id'],
            'link_code'   => ['required', 'max:200'],
            'link_live'   => ['nullable', 'max:200'],
            'code_line'   => ['nullable'],
            'folders'     => ['nullable'],
            'description' => ['nullable'],
        ];
    }
}
