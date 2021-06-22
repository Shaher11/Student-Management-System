<?php

namespace App\Http\Requests;

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
        return [
            "first_name" => "required|alpha|max:100",
            "middle_name" => "required|alpha|max:100",
            "last_name" => "required|alpha|max:100",
            "identifier" => "required|max:10|unique:students",
            "email" => "required|email:rfc,dns|unique:students",
            "birthdate" => "required|date",
            "level_id" => "required",
            "program_id" => "required",
            
            // "gender" => "required",
        ];
    }
}