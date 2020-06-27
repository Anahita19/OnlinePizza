<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
//        'title' => 'required',
//
//
//        'description' => 'required',
//        'meta_desc' => 'required',
//        'meta_title' => 'required',
//        'meta_keywords' => 'required',
    ];
  }

  public function messages()
  {
    return [
//        'title.required' => 'please Enter title of product',
//        'price.required' => ' pleaseEnter Price of product',
//        'slug.required' => ' please Enter slug  ',
//        'slug.unique' => 'please enter another slug',
//        'status.required' => ' please Enter status  ',
//        'photo.required' => 'please Select a photo',
//        'description.required' => ' please Enter discription  ',
//        'meta_desc.required' => ' please Enter meta_desc  ',
//        'meta_title.required' => ' please Enter meta_title  ',
//        'meta_keywords.required' => ' please Enter meta_keywords  ',
    ];
  }
}
