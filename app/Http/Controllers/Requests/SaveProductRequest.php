<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductRequest extends FormRequest
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

//    protected function prepareForValidation()
//    {
//        if($this->input('slug')){
//            $this->merge(['slug' => make_slug($this->input('slug'))]);
//        }else{
//            $this->merge(['slug' => make_slug($this->input('title'))]);
//        }
//    }
    public function rules()
    {
        return [
            'title' => 'required',
            'price' => 'required',
            'slug' => 'unique:products',
            'slug' => 'required',
            'status' => 'required',
            'price' => 'required',

            'description' => 'required',
            'meta_desc' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'please Enter title of product',
            'price.required' => ' pleaseEnter Price of product',
            'slug.required' => ' please Enter slug  ',
            'slug.unique' => 'please enter another slug',
            'status.required' => ' please Enter status  ',

            'description.required' => ' please Enter discription  ',
            'meta_desc.required' => ' please Enter meta_desc  ',
            'meta_title.required' => ' please Enter meta_title  ',
            'meta_keywords.required' => ' please Enter meta_keywords  ',
        ];
    }
}
