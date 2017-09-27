<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class customRequest extends FormRequest
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
          'user_name' => 'required|min:8|max:12|alpha_num|unique:users',
		  			'user_email' => 'required|email|unique:user_profiles',
			'user_password' => 'required|min:8|max:12|bannedUserwords|different:user_name|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/',
			'confirm_password' => 'required|same:user_password'
        ];
    }
}
