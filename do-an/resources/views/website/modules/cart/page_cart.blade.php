@extends('website.master')

@push('themejs')
    <script class="lozad" data-src="{{ asset(GLOBAL_ASSETS_PLUG.'notifications/pnotify.min.js') }}"></script>
    <script class="lozad" data-src="{{ asset(GLOBAL_ASSETS_PLUG.'notifications/sweet_alert.min.js') }}"></script>
@endpush

@section('content')
<main class="cart">
    <div class="container">
        <div class="cart__title">
            <a href="{{route('home')}}">
                <img class="lozad" data-src="{{$pageContent[0]['image']}}" alt="">
                {!! strip_tags($pageContent[0]['content']) !!}
            </a>
            <span>{!! strip_tags($pageContent[1]['content']) !!}</span>
        </div>
        <div class="cart__main">
            <div class="show-cart">
            </div>
            <div class="cart__main-voucher">
                <a class="voucher-btn" href="javascript:(0)"><img class="lozad" data-src="{{$pageContent[2]['image']}}" alt="">{!! strip_tags($pageContent[2]['content']) !!}</a>
                <div class="voucher-input">
                    <input type="text" id="voucher" placeholder="Nhập mã giảm giá">
                    <a class="" id="checkVoucher" data-url="{{route('checkVoucher')}}" href="javascript:(0)">{!! strip_tags($pageContent[3]['content']) !!}</a><br>
                    <i style="color: red; display:none" id="voucherNull">{!! strip_tags($pageContent[4]['content']) !!}</i>
                    <i style="color: red; display:none" id="voucherError">{!! strip_tags($pageContent[5]['content']) !!}</i>
                    <i style="color: rgb(95, 224, 95); display:none; margin:10px 0" id="voucherSuccess" >{!! strip_tags($pageContent[6]['content']) !!}</i>
                </div>
                
                <div class="cart__main-voucher--price">
                    <p>Tạm tính (<span class="total-count"></span> sản phẩm)</p>
                    <span class="total-cart"></span>
                </div>
                <div class="cart__main-voucher--price" id="showtotaldiscount">
                    <p>{!! strip_tags($pageContent[7]['content']) !!}</p>
                    <span class="total-discount">0</span>
                </div>
                <div class="cart__main-voucher--total">
                    <p>{!! strip_tags($pageContent[8]['content']) !!}</p>
                    <span class="total-after-discount"></span>
                </div>
            </div>
            <form method="POST" action="{{route('storeCart')}}"  class="formAjaxCart">
                @csrf
                @method('POST')
                <div class="cart__main-info">
                    <p>{!! strip_tags($pageContent[9]['content']) !!}</p>
                    <div class="gender">
                        <label for="gender1"> <input type="radio" name="gender1" id="gender1" value="Anh" checked>Nam</label>
                        <label for="gender2"> <input type="radio" name="gender1" id="gender2" value="Chị">Nữ</label>
                    </div>
                    <div class="info">
                        <input type="text" name="fullname" placeholder="Họ và tên">
                        <input type="number" name="phone" placeholder="Số điện thoại">
                    </div>
                </div>
                <div class="cart__main-delivery">
                    <p>{!! strip_tags($pageContent[10]['content']) !!}</p>
                    <div class="cart__main-delivery--address">
                        <div class="delivery-checkbox">
                            <label for="delivery1"><input type="radio" name="delivery" value="1" id="delivery1" checked
                                    data-delivery="1">{!! strip_tags($pageContent[11]['content']) !!}</label>
                            <label for="delivery2"><input type="radio" name="delivery" value="2" id="delivery2"
                                    data-delivery="2">{!! strip_tags($pageContent[12]['content']) !!}</label>
                        </div>
                        <div class="delivery-tab delivery-tab-active" id="deliveryTab1">
                            <div class="delivery-tab__info">
                                <p>{!! strip_tags($pageContent[13]['content']) !!}</p>
                                <select name="province_id" id="">
                                    <option value="">{!! strip_tags($pageContent[14]['content']) !!}</option>
                                    @foreach ($province as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <select name="district_id" id="" data-url="{{ route('getDistrict') }}">
                                    <option value="">{!! strip_tags($pageContent[15]['content']) !!}</option>
                                </select>
                                <select name="ward_id" id="" data-url="{{ route('getWard') }}">
                                    <option value="">{!! strip_tags($pageContent[16]['content']) !!}</option>
                                </select>
                                
                                <input type="text" name="address" placeholder="Số nhà, tên đường">
                                <div class="cart-confirm">
                                    <div class="cart-confirm__header">
                                        <span id="deliveryDateTime1">Giao {{timeChoose()[0]->id}} {{dateChoose()[0]->name}}</span>
                                        <a class="time-delivery-btn" href="javascript:(0)">{!! strip_tags($pageContent[17]['content']) !!}</a>
                                    </div>
                                    <div class="cart-confirm__time-delivery">
                                        <select name="deliveryDate1" id="">
                                            @foreach (dateChoose() as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <select name="deliveryTime1" id="">
                                            @foreach (timeChoose() as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="cart-confirm__product show_cart2">
                                        
                                    </div>
                                    <div class="cart-confirm__fee">
                                        <p>Phí chuyển hàng: <b class="feeCart">0đ</b></p>
                                        <span>Không hoàn lại</span>
                                    </div>
                                </div>
                            </div>
                            <div class="delivery-tab__other">
                                <input type="text" name="content1" placeholder="Yêu cầu khác (không bắt buộc)">
                                <ul>
                                    <li>
                                        <label for="deliveryOther1">
                                            <input type="checkbox" id="deliveryOther1" name="receive_person"> {!! strip_tags($pageContent[18]['content']) !!}
                                        </label>
                                        <div class="form-deliveryOther1">
                                            <div class="gender-checkbox">
                                                <label for="male">
                                                    <input type="radio" name="gender2" id="male" value="Anh" checked>
                                                    Anh
                                                </label>
                                                <label for="female">
                                                    <input type="radio" name="gender2" id="female" value="Chị">
                                                    Chị
                                                </label>
                                            </div>
                                            <input type="text" placeholder="Họ và tên người nhận" name="name_receive">
                                            <input type="text" placeholder="Số điện thoại người nhận" name="phone_receive">
                                        </div>
                                    </li>
                                    <li>
                                        <label for="deliveryOther2">
                                            <input type="checkbox" name="guide" id="deliveryOther2"> {!! strip_tags($pageContent[19]['content']) !!}
                                        </label>
                                    </li>
                                    <li>
                                        <label for="deliveryOther3">
                                            <input type="checkbox" name="issue1" id="deliveryOther3">{!! strip_tags($pageContent[20]['content']) !!}
                                        </label>
                                        <div class="form-deliveryOther3">
                                            <input type="text" placeholder="Tên công ty" name="companyname1">
                                            <input type="text" placeholder="Địa chỉ công ty" name="companyaddress1">
                                            <input type="text" placeholder="Mã số thuế" name="companyid1">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="delivery-tab" id="deliveryTab2">
                            <div class="delivery-tab__info">
                                <select id="province_delivery" data-url="{{route('getDistrictShowroom')}}">
                                    <option value="">{!! strip_tags($pageContent[14]['content']) !!}</option>
                                    @foreach ($provinceShowroom as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <select id="district_delivery" data-url="{{route('getWardShowroom')}}">
                                    <option value="">{!! strip_tags($pageContent[15]['content']) !!}</option>
                                </select>
                                <ul class="showroom-list">
                                    @foreach ($showroom as $item)
                                    <li>
                                        <label for="{{$item->uuid}}">
                                            <input type="radio" id="{{$item->uuid}}" name="deliveryShowroom" value="{{$item->name . ', '.$item->address . ', '.$item->ward->name . ', '.$item->district->name . ', '.$item->province->name }}">
                                            {{$item->name . ', '.$item->address . ', '.$item->ward->name . ', '.$item->district->name . ', '.$item->province->name }}
                                        </label>
                                    </li>  
                                    @endforeach
                                </ul>
                                <div class="cart-confirm">
                                    <div class="cart-confirm__header">
                                        <span id="deliveryDateTime2">Giao {{timeChoose()[0]->id}} {{dateChoose()[0]->name}}</span>
                                        <a class="time-delivery-btn" href="javascript:(0)">{!! strip_tags($pageContent[21]['content']) !!}</a>
                                    </div>
                                    <div class="cart-confirm__time-delivery">
                                        <select name="deliveryDate2" id="">
                                            @foreach (dateChoose() as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <select name="deliveryTime2" id="">
                                            @foreach (timeChoose() as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="cart-confirm__product show_cart2">
                                        
                                    </div>
                                    <div class="cart-confirm__fee">
                                        <p>Phí chuyển hàng: <b>Miễn phí</b></p>
                                        <span>Không hoàn lại</span>
                                    </div>
                                </div>
                            </div>
                            <div class="delivery-tab__other">
                                <input type="text" name="content2" placeholder="Yêu cầu khác (không bắt buộc)">
                                <ul>
                                    <li>
                                        <label for="deliveryOther4">
                                            <input type="checkbox" name="issue2" id="deliveryOther4">{!! strip_tags($pageContent[20]['content']) !!}
                                        </label>
                                        <div class="form-deliveryOther4">
                                            <input type="text" placeholder="Tên công ty" name="companyname2">
                                            <input type="text" placeholder="Địa chỉ công ty" name="companyaddress2">
                                            <input type="text" placeholder="Mã số thuế" name="companyid2">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart__main-pay">
                    <h6>{!! strip_tags($pageContent[22]['content']) !!}</h6>
                    <a href="javascript:(0)" class="cart__main-pay--item paymentmethod" data-paymentmethod="1">
                        <p>{!! strip_tags($pageContent[23]['content']) !!}</p>
                    </a>
                    <a href="javascript:(0)" class="cart__main-pay--item paymentmethod"  data-paymentmethod="2">
                        <p>{!! strip_tags($pageContent[24]['content']) !!}</p>
                    </a>
                </div>
                <input type="hidden" name="voucher" >
                <input type="hidden" name="payment_method">
                <div class="cart__main-btn">
                    <div class="cart__main-btn--total">
                        <p>Tổng tiền</p>
                        <span class="total-final"></span>
                    </div>
                    @include('website.partials.alert')
                    <button class="order-btn" type="submit">ĐẶT HÀNG</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection