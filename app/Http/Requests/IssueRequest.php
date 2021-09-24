<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IssueRequest extends FormRequest
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
            'student_id' => 'required',
            'book_id' => 'required',
            'batch_id' => 'required',
            'user_id' => 'required',
            'return_date' => 'required|date|date_format:Y-m-d|after:xxxx'



        ];
    }
}
