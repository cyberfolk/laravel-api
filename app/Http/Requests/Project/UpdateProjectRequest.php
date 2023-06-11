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
            'title' => ['required', Rule::unique('projects', 'title')->ignore($this->project), 'max:50'],
            /* 'slug' => 'required|max:100', */ // Not required
            'description' => 'nullable',
            'link_cover' =>  'required|max:200', //image?
            'link_live' =>  'required|max:200',
            'link_code' =>  'nullable|max:200',
            'start_date' =>  'required|date|before_or_equal:today|after:1900-01-01",',
            'last_commit' =>  'nullable|date|before_or_equal:today|after:sale_date",',
            'code_line' =>  'nullable',
            'folders' =>  'nullable',
            'type_id' => ['nullable', 'exists:types,id']
        ];
    }
}
