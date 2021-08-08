<?php

namespace App\Http\Requests\Website\Cart;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function rules()
    {
        if ($this->delivery ==1) {
            return [
                'fullname' =>['required'],
                'phone' =>['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
                'delivery' =>['required'],
                'province_id' =>['required'],
                'district_id' =>['required'],
                'ward_id' =>['required'],
                'address' =>['required'],
                'payment_method' =>['required'],
            ];
        } else {
            return [
                'fullname' =>['required'],
                'phone' =>['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
                'delivery' =>['required'],
                'deliveryShowroom' =>['required'],
                'payment_method' =>['required'],
            ];
        }
        
        
    }

    /**
     * Get the validation error messages.
     *
     * @return array
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function messages()
    {
        return [
            //
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function attributes()
    {
        return [
            'fullname'     => attr('cart.full_name'),
            'phone'        => attr('cart.phone'),
            'delivery'        => attr('cart.delivery'),
            'province_id'        => attr('address.province'),
            'district_id'        => attr('address.district'),
            'ward_id'        => attr('address.ward'),
            'address'        => attr('address.address'),
            'deliveryShowroom' => attr('cart.delivery'),
            'payment_method'    => attr('cart.payment_method')
        ];
    }
}
