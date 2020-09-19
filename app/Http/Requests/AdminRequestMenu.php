<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestMenu extends FormRequest
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
            'name'=>'required|max:190|min:6|unique:menus'
        ];

    }

    public function messages(){
        return[
            //
            'name.required'     =>'Dữ liệu không được trống',
            'name.unique'       =>'Dữ liệu đã tồn tại',
            'name.max'          =>'Dữ liệu không quá 190 ký tự',
            'name.min'          =>'Dữ liệu phải nhiều hơn 6 ký tự',
        ];
    }
}
