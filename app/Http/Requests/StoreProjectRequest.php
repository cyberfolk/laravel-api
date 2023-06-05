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
            /*             'slug' => 'required|max:100', */
            'thumb' =>  'nullable|max:200', //image?
            'start_date' =>  'required|date|before_or_equal:today|after:1900-01-01",',
            'last_commit' =>  'nullable|date|before_or_equal:today|after:sale_date",',
            'code_line' =>  'nullable',
            'folders' =>  'nullable',
        ];
    }
}
