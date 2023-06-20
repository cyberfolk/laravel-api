<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'init'  => ['required', 'date', 'before_or_equal:today', 'after:1900-01-01'],
            'image'  => ['nullable', 'image', 'max:1024'],
            'type_id'     => ['nullable', 'exists:types,id'],
            'link'   => ['required', 'max:200'],
            'info' => ['nullable'],
        ];
    }
}
