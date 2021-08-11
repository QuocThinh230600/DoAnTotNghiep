<?php

namespace App\Http\Requests\Administrator\Coupon;

use App\Repositories\Coupon\CouponRepository;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    protected $coupon;

    /**
     * UpdateRequest constructor.
     * @param CouponRepository $color
     * @author 
     */
    public function __construct(CouponRepository $coupon)
    {
        parent::__construct();
        $this->coupon = $coupon;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     * @author 
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @author 
     */
    public function rules()
    {
        $id = $this->coupon->getIdByUuid($this->route('coupon'));

        return [
            'name' => ['bail', 'required', 'unique:coupons,name,' . $id . ',id,deleted_at,NULL'],
            'code' => ['bail', 'required', 'unique:coupons,name,' . $id . ',id,deleted_at,NULL'],
            'percent' => ['required','numeric','min:0','max:100'],
        ];
    }

    /**
     * Get the validation error messages.
     *
     * @return array
     * @author 
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
     * @author 
     */
    public function attributes()
    {
        return [
            'name' => attr('coupon.name'),
            'code' => attr('coupon.code'),
            'percent' => attr('coupon.percent'),
        ];
    }
}
