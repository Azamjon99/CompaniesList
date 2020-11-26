<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReqEmployee extends FormRequest
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
            'f_name'=>'required|min:4|max:10|alpha_dash',
            'l_name'=>'required|min:4|max:10|alpha_dash',
            'phone'=>'numeric|min:6',
            'email'=>'|email',
            Rule::unique('employees', 'email')->ignore($this->route('id'))  ,

        ];
    }
}
