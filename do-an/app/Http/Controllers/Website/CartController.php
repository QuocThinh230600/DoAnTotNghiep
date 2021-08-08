<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Ward\WardRepository;
use Illuminate\Database\Eloquent\Builder;
use App\Repositories\Cart\PayorderRepository;
use App\Repositories\Coupon\CouponRepository;
use App\Repositories\Cart\PaydetailsRepository;
use App\Repositories\Product\ProductRepository;
use App\Http\Requests\Website\Cart\StoreRequest;
use App\Repositories\Content\ContentRepository;
use App\Repositories\District\DistrictRepository;
use App\Repositories\Page\PageRepository;
use App\Repositories\Province\ProvinceRepository;
use App\Repositories\ShowRoom\ShowRoomRepository;

class CartController extends Controller
{
    private $province;

    private $showroom;

    private $district;
    
    private $ward;

    private $coupon;

    private $payorder;
    
    private $paydetails;

    private $product;

    private $content;

    private $page;

    public function __construct(ProvinceRepository $province,
                                ShowRoomRepository $showroom,
                                DistrictRepository $district,
                                WardRepository $ward,
                                CouponRepository $coupon,
                                PayorderRepository $payorder,
                                PaydetailsRepository $paydetails,
                                ProductRepository $product,
                                ContentRepository $content,
                                PageRepository $page)
    {
        $this->province = $province;
        $this->showroom = $showroom;
        $this->district = $district;
        $this->ward = $ward;
        $this->coupon = $coupon;
        $this->payorder = $payorder;
        $this->paydetails = $paydetails;
        $this->product = $product;
        $this->content      = $content;
        $this->page     = $page;
    }

    function index(){
        $data['province']= $this->province->getAll();
        $data['showroom']= $this->showroom->getAll();
        $data['provinceShowroom'] = $this->province->query()->whereHas('showroom', function (Builder $query) {
            $query->where('status', 'like', 'on');
        })->get();
        $data['pageContent']      =   $this->content->getContentWithPage(14);
        $data['meta']             = $this->page->query()->where('id',14)->first();
        return view('website.modules.cart.page_cart',$data);
    }

    function confirm(String $uuid){
        $data['order']=$this->payorder->getByUuid($uuid);
        $data['details']= $this->paydetails->query()->where('payorders_id',$data['order']->id)->get();
        $data['pageContent']      =   $this->content->getContentWithPage(15);
        $data['meta']             = $this->page->query()->where('id',15)->first();
        return view('website.modules.cart.cart_confirm',$data);
    }

    public function addRowCart(Request $request)
    {
        $data["pro"] = $request->pro;
        $view       = view('components.ajax_cart', $data)->render();
        $view2      = view('components.ajax_cart2', $data)->render();
        return json_encode(['view'=> $view, 'view2'=>$view2]);
    }

    public function store(StoreRequest $request){
        $myItem = '';
        if(isset($_COOKIE['shoppingCart'])) {
            $myItem = $_COOKIE['shoppingCart'];
        }
        if($myItem!="[]"){
            $myItem=json_decode($myItem);
            $total=0;
            $fee=0;
            $data=[];
            foreach ($myItem as $p) {
                $tam= $this->product->getByUuid($p->uuid);
                if($p->count<0){
                    return response()->json(
                        [
                            'status'   => 'error',
                            'message'  => 'Số lượng sản phẩm không được nhỏ hơn 1!'
                        ], 201);
                }
                $priceTam=$tam->price;
                if($tam->discount != null){
                    $priceTam=$tam->discount;
                }
                $total+=$p->count * $priceTam;
                $data[]=[
                    'product_id'        => $tam->product_id,
                    'price'             => $priceTam,
                    'quantity'          => $p->count,
                    'total'             => $priceTam * $p->count
                ];
                
            }
            $order['fullname']   = $request->gender1 . ' ' . $request->fullname;
            $order['phone']      = $request->phone;
            $order['delivery']   = $request->delivery;
            $order['payment_method']   = $request->payment_method;
            $order['total'] = $total;
            $order['status'] = 1;
            $order['fee'] = 0;
            if($request->voucher != null){
                $coupons= $this->coupon->getCouponByCode($request->voucher);
                if(count($coupons) == 0){
                    return response()->json(
                        [
                            'status'            => 'error',
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
                            'status'            => 'error',
                            'message'           => 'Voucher này đã hết hạn!',
                        ], 201); 
                }
                $order['coupon_id']  = $objcoupon->id;
                $order['total'] = $order['total'] * (100 - $objcoupon->percent) / 100;
            }
            if($request->delivery !=2){
                $province = $this->province->getById($request->province_id);
                $district = $this->district->getById($request->district_id);
                $ward = $this->ward->getById($request->ward_id);
                $order['fee'] = $province->fee;
                $order['address'] = $request->address. ', '. $ward->name. ', '. $district->name .', '. $province->name ;
                $order['note'] = 'Giao '. $request->deliveryTime1 . ' ' . $request->deliveryDate1. '<br>';
                $order['note'] .= 'Ghi chú thêm: '. $request->content1 . '<br>';
                if ($request->receive_person) {
                    $order['name_receive'] = $request->gender2 .' '.$request->name_receive;
                    $order['phone_receive'] = $request->phone_receive;
                }
                if($request->guide){
                    $order['note'] .= 'Hướng dẫn sử dụng, giải đáp thắc mắc sản phẩm <br>';
                }
                if ($request->issue1) {
                    $order['note'] .= 'Xuất hóa đơn cho công ty: <br>';
                    $order['note'] .= 'Tên công ty: '. $request->companyname1 . '<br>';
                    $order['note'] .= 'Địa chỉ công ty: '. $request->companyaddress1 . '<br>';
                    $order['note'] .= 'Mã số thuế: '. $request->companyid1 . '<br>';
                }
            }else{
                $order['address'] = $request->deliveryShowroom;
                $order['note'] = 'Giao '. $request->deliveryTime2 . ' ' . $request->deliveryDate2. '<br>';
                $order['note'] .= 'Ghi chú thêm: '. $request->content2 . '<br>';
                if ($request->issue2) {
                    $order['note'] .= 'Xuất hóa đơn cho công ty: <br>';
                    $order['note'] .= 'Tên công ty: '. $request->companyname2 . '<br>';
                    $order['note'] .= 'Địa chỉ công ty: '. $request->companyaddress2. '<br>';
                    $order['note'] .= 'Mã số thuế: '. $request->companyid2 . '<br>';
                }
            }
            $order            = $this->payorder->create($order);
            foreach ($data as $orderdetail) {
                $orderdetail['payorders_id'] = $order->id;
                $details            = $this->paydetails->create($orderdetail);
            }
            return response()->json(
                [
                    'status'   => 'success',
                    'redirect' => route('cart_confirm',['uuid'=>$order->uuid])
                ], 201);
        }else{
            return response()->json(
                [
                    'status'   => 'error',
                    'message'  => 'Chưa có sản phẩm trong giỏ hàng!'
                ], 201);
        }
    }
}
