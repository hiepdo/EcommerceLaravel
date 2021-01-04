<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkoutRequest extends FormRequest
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
            'shipping_name' => 'bail|required|min:6',
            'shipping_email' => 'bail|required|email',
            'shipping_phone' => 'bail|required|numeric',
            'shipping_address' => 'bail|required',
        ];
    }

    public function messages()
    {
        return [
            'shipping_name.required' => 'Hãy nhập vào họ tên của bạn',

            'shipping_name.min' => 'Họ tên của bạn phải tối thiểu 6 kí tự',
    
            'shipping_email.email' => 'Email không đúng định dạng',

            'shipping_email.required' => 'Hãy nhập vào email của bạn',
    
            'shipping_phone.required' => 'Hãy nhập vào số điện thoại của bạn',

            'shipping_phone.numeric' => 'Số điện thoại chỉ được bao gồm các chữ số',
    
            'shipping_address.required' => 'Hãy nhập vào địa chỉ của bạn',
        ];
    }
}
