<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectValidationRequest extends FormRequest
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
            'title' => 'required',
            'description' =>'required',
            'start_date' => 'required|date',
            'end_date' =>'required|date|after_or_equal:start_date',
            'duration' =>'required',
            'department' => 'required'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Please enter a title.',
            'description.required' =>'Enter a short description for the project.',
            'start_date.required' => 'Please enter the start date of the project.',
            'end_date.required' =>'Please enter the end date of the project.',
            'end_date.after_or_equal' =>'The end date must be after the start date.',
            'duration.required' =>"Please enter the project's duration.",
            'department.required' => "Please enter the project's department."
        ];
    }
}
