<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'fname' => ['required', 'string', 'max:50'],
            'lname' => ['required', 'string', 'max:50'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users'
            ],
            'password' => 'required|min:8|max:255'
        ];
    }
    public function messages()
    {
        return [
            'fname.required' => 'The First Name is Required',
            'lname.required' => 'The Last Name is Required',
            'email.required' => 'The Email is Required',
            'password.required' => 'The Password is Required',
        ];
    }

}
