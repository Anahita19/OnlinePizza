<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'post_code' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }

  public function messages()
  {
    return [
      'name.required' => 'name is  required ',
      'last_name.required' => 'last_name is  required ',
      'address.required' => 'address is  required ',
      'phone.required' => 'phone is  required ',
      'post_code.required' => 'post_code is  required ',
      'email.required' => 'email is  required ',
      'password.required' => 'password is  required ',

    ];
  }
}
