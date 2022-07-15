<?php

namespace App\Http\Requests\Student;

use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        $validator = [
            'name'=> 'required',
            'age' => 'required',
            'gender' => 'required', 
            'reporting_teacher' => 'required',
        ];
        return $validator;
    }

   

}
