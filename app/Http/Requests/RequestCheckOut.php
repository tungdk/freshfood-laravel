<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCheckOut extends FormRequest
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
            'name'     =>'required',
            'address'  =>'required',
            'email' => 'required|email',
            'phone' => 'required',
            'city' => 'required',
            'district' => 'required',
            'ward' => 'required',

        ];
    }
    public function messages(){
        return[
            //
            'name.required'     =>'Dữ liệu không được trống',
            'city.required'     =>'Dữ liệu không được trống',
            'district.required'     =>'Dữ liệu không được trống',
            'ward.required'     =>'Dữ liệu không được trống',
            'address.required'  =>'Dữ liệu không được trống',
            'phone.required'  =>'Dữ liệu không được trống',
            'email.required'  =>'Dữ liệu không được trống',
            'email.email'  =>'Email chưa đúng định dạng',
        ];
    }

}
