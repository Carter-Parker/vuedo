<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
    * @return array
    */
    public function rules()
    {
        return [

            'task_category_id' => ['required', 'exists:task_categories,id'],

            'title' => 'required',

            'description' => 'required',

            'due_date' => ['required', 'date_format:d/m/Y'],

            'archived' => ['required', 'boolean']
        ];
    }

    public function messages()
    {
        return [
            'task_category_id.exists' => 'Please choose a valid category',
        ];
    }
}
