<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'title' => 'required|max:50',
            'description' => 'nullable',
            /* 'slug' => 'required|max:100', */ // Not required
            'link_cover' =>  'required|max:200', //image?
            'link_live' =>  'nullable|max:200',
            'link_code' =>  'required|max:200',
            'start_date' =>  'required|date|before_or_equal:today|after:1900-01-01"',
            'last_commit' =>  'nullable|date|before_or_equal:today|after:sale_date"', //after:after:sale_date not work
            'code_line' =>  'nullable',
            'folders' =>  'nullable',
        ];
    }
}
