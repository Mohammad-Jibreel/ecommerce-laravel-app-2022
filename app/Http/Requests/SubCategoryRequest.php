<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'name'=>'required|string|unique:sub_categories,name',
            'category_id'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name'=>'please enter the name',
         'category_id'=>'please select category name'
        ];
    }
}
