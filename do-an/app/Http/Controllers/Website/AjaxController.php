<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Ward\WardRepository;
use Illuminate\Database\Eloquent\Builder;
use App\Repositories\Coupon\CouponRepository;
use App\Repositories\Review\ReviewRepository;
use App\Repositories\Contact\ContactRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\District\DistrictRepository;
use App\Repositories\Province\ProvinceRepository;
use App\Repositories\ReplyContact\ReplyContactRepository;

class AjaxController extends Controller
{
    private $district;

    private $ward;

    private $coupon;

    private $province;

    private $contact;

    private $reply;
    
    private $review;
    
    private $product;
    /**
     * AjaxController constructor.
     * @param DistrictRepository $district
     * @param WardRepository $ward
     */
    public function __construct(DistrictRepository $district,
                                WardRepository $ward,
                                ProvinceRepository $province,
                                CouponRepository $coupon,
                                ContactRepository $contact,
                                ReplyContactRepository $reply,
                                ReviewRepository $review,
                                ProductRepository $product)
    {
        $this->district = $district;
        $this->ward     = $ward;
        $this->coupon     = $coupon;
        $this->province     = $province;
        $this->contact     = $contact;
        $this->reply     = $reply;
        $this->review     = $review;
        $this->product     = $product;
    }

    
    public function getDistrict(Request $request)
    {
        $xhtml = '<option value="">' . label('address.please_choose_district') . '</option>';

        $province = $request->province_id;

        if (!empty($province)) {
            $districts = $this->district->getDistrictByProvince($province);

            foreach ($districts as $district) {
                $xhtml .= '<option value="' . $district->id . '">' . $district->name . '</option>';
            }
        }

        $province=$this->province->getById($province);

        return json_encode(['xhtml'=> $xhtml, 'fee' => $province->fee]);
    }

    /**
     * Get ward by district
     * @param Request $request
     * @return mixed
     * @author 
     */
    public function getWard(Request $request)
    {
        $xhtml = '<option value="">' . label('address.please_choose_ward') . '</option>';

        $district = $request->district_id;

        if (!empty($district)) {
            $wards = $this->ward->getWardByDistrict($district);

            foreach ($wards as $ward) {
                $xhtml .= '<option value="' . $ward->id . '">' . $ward->name . '</option>';
            }
        }

        return $xhtml;
    }

    public function checkVoucher(Request $request){
        if(!$request->voucher){
            return response()->json(
                [
                    'status'            => 'false',
                    'message'           => 'Chưa nhập voucher!',
                ], 201); 
        }
        $coupons= $this->coupon->getCouponByCode($request->voucher);
        if(count($coupons) == 0){
            return response()->json(
                [
                    'status'            => 'false',
                    'message'           => 'Voucher này không tồn tại!',
                ], 201); 
        }

        $objcoupon= '';
        foreach ($coupons as $coupon) {
            $start = strtotime($coupon->date_start . ' ' . $coupon->time_start);
            $end = strtotime($coupon->date_end . ' ' . $coupon->time_end);
            $now = strtotime(date('Y-m-d H:i:s'));
            if ($now >= $start && $now <= $end ) {
                $objcoupon = $coupon;
                break;
            }
        }

        if($objcoupon == ''){
            return response()->json(
                [
                    'status'            => 'false',
                    'message'           => 'Voucher này đã hết hạn!',
                ], 201); 
        }

        return response()->json(
            [
                'status'            => 'true',
                'price'             => $objcoupon->percent
            ], 201); 
    }

    public function getDistrictShowroom(Request $request)
    {
        $xhtml = '<option value="">' . label('address.please_choose_district') . '</option>';

        $province = $request->province_id;

        if (!empty($province)) {
            $districts = $this->district->query()->where('province_id', $province)->whereHas('showroom', function (Builder $query) {
                $query->where('status', 'like', 'on');
            })->get();

            foreach ($districts as $district) {
                $xhtml .= '<option value="' . $district->id . '">' . $district->name . '</option>';
            }
        }

        $data['showroom']=$this->province->getById($province)->showroom()->get();

        $showroom = view('components.ajax_showroom',$data)->render();

        return json_encode(['xhtml'=> $xhtml, 'xhtml2' => $showroom]);
    }

    public function getWardShowroom(Request $request)
    {
        $district = $request->district_id;

        $data['showroom']=$this->district->getById($district)->showroom()->get();

        $showroom = view('components.ajax_showroom',$data)->render();

        return $showroom;
    }

    public function storeReview(Request $request)
    {
        $slug=$request->uuid;
        $product = $this->product->query()->whereHas('product_translation', function (Builder $query) use ($slug) {
            $query->where('slug', $slug);
        })->first();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone ?? '';
        $data['email'] = $request->email ?? '';
        $data['content'] = $request->content;
        $data['votes'] = $request->votes;
        $data['product_id'] = $product->id;
        $data['status'] = 'on';
        $result = $this->review->create($data);
        return 'success';
    }

    public function storeContact(Request $request)
    {
        $slug=$request->uuid;
        $product = $this->product->query()->whereHas('product_translation', function (Builder $query) use ($slug) {
            $query->where('slug', $slug);
        })->first();
        $data['full_name'] = $request->full_name;
        $data['message'] = $request->message ;
        $data['product_id'] = $product->id;
        $result = $this->contact->create($data);
        return $result;
    }

    public function storeReply(Request $request)
    {
        $contact = $this->contact->getByUuid($request->uuid);
        $data['full_name'] = $request->full_name;
        $data['reply'] = $request->reply ;
        $data['contact_id'] = $contact->id;
        $data['status'] = 1;
        $result = $this->reply->create($data);
        return $result;
    }
}
