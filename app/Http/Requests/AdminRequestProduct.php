<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestProduct extends FormRequest
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
            'name'=>'required|max:190|min:6|unique:products,name,'.$this->id,
            'price'=>'required',
            'info'=>'required',
            'number'=>'required',
            'qty'=>'required',
            'subcategory_id'=>'required',
            'publisher_id'=>'required',
            'unit_id'=>'required',
//            'picture'=>'required',
        ];
    }
}
