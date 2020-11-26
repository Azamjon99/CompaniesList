<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class Req extends FormRequest
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
            'name'=>'required|min:4|max:10|alpha_dash',
            'email'=>'email',
            ValidationRule::unique('companies_lists', 'email')->ignore($this->route('id'))  ,
            'website'=>'required|url',
            'logo'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ];
    }
}
