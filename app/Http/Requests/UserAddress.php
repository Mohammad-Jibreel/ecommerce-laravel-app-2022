<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddress extends FormRequest
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
          'address_line_1'=>'required',
          'address_line_2'=>'nullable',
          'city'=>'required',
          'state'=>'nullable',
          'country'=>'required',
          'postal_code'=>'required|numeric',
          'user_id'=>'required'
        ];
    }
}
