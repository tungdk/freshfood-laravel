<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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
            //
            'email'     =>'required|max:190|min:6|unique:users,email',
            'name'      =>'required|max:20|min:6|',
            'phone'     =>'required',
            'password'  =>'required',
        ];
    }
    public function messages(){
        return[
            //
            'email.required'     =>'Dữ liệu không được trống',
            'email.unique'       =>'Dữ liệu đã tồn tại',
            'name.required'      =>'Dữ liệu không được trống',
            'name.max'          =>'Dữ liệu không quá 25 ký tự',
            'name.min'          =>'Dữ liệu phải nhiều hơn 6 ký tự',
            'phone.required'     =>'Dữ liệu không được trống',
            'password.required'  =>'Dữ liệu không được trống',
        ];
    }
}
