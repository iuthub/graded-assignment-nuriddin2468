<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'newTask' => 'required|min:5|regex:/(\w.+\s).+/'
        ];
    }

    public function messages()
    {
        return [
            'newTask.regex' => 'You need to add 2 or more words'
        ];
    }
}
