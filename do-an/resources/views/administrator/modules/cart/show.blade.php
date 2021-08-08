@extends('administrator.master')
@section('module', module('orderdetail'))
@section('action', behavior('action.index'))
@section('title', title_module('orderdetail','index'))

@can('cart_edit')
    @section('index',route('admin.cart.index'))
@endcan


@push('themejs')
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'tables/datatables/extensions/buttons.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'tables/datatables/extensions/responsive.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'notifications/sweet_alert.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'notifications/pnotify.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'editors/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'ui/dragula.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'media/fancybox.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'forms/inputs/maxlength.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'forms/tags/tokenfield.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'forms/styling/switch.min.js') }}"></script>
    
    @include('ckfinder::setup')
@endpush

@section('content')
    <x-card title="action.null" table="true">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title d-flex align-items-top">
                          Tổng giá trị đơn hàng: <b class="text-danger"> {{number_format($order->total)}}đ</b>&ensp;
                          @if ($order->coupon_id != null)
                            <span class="badge badge-pill badge-success" style="font-size: 10px; display: inline-table">Đã dùng mã: {{$order->coupon->code}}</span>
                          @endif
                        </h3>
                        <p class="card-text">
                          Phí giao hàng: <b class="text-danger"> {{number_format($order->fee)}}đ</b> / 
                          Thời gian tạo: {{date_format(date_create($order->created_at),"H:i d/m/Y")}}
                        </p>
                    </div>
                  </div>
            </div>
            @canany(['cart_edit', 'cart_destroy'])
            @if ($order->status<>4 && $order->status<>5)
            <div class="col">
                <div class="card">
                    <div class="card-body text-right">
                            @if($order->status==1)
                                <a href="{{ route('admin.changestatusorder', ['uuid' => $order->uuid,'status' => 2]) }}" class="btn btn-success mb-4 mr-3 accept_change_status"><i class="icon-checkmark3"></i> {{ behavior('action.success') }}</a>
                                <a href="{{ route('admin.changestatusorder', ['uuid' => $order->uuid,'status' => 5]) }}" class="btn btn-danger mb-4 mr-3 accept_change_status"><i class="icon-trash"></i> {{ behavior('action.cancel') }}</a>
                            @elseif($order->status==2)
                                <a href="{{ route('admin.changestatusorder', ['uuid' => $order->uuid,'status' => 3]) }}" class="btn btn-dark mb-4 mr-3 accept_change_status text-white"><i class="icon-truck"></i> {{ behavior('action.delevery') }}</a>
                                <a href="{{ route('admin.changestatusorder', ['uuid' => $order->uuid,'status' => 5]) }}" class="btn btn-danger mb-4 mr-3 accept_change_status"><i class="icon-trash"></i> {{ behavior('action.cancel') }}</a>
                            @elseif($order->status==3)
                                <a href="{{ route('admin.changestatusorder', ['uuid' => $order->uuid,'status' => 4]) }}" class="btn btn-primary mb-4 mr-3 accept_change_status"><i class="icon-task"></i> {{ behavior('action.success_delevery') }}</a>
                                <a href="{{ route('admin.changestatusorder', ['uuid' => $order->uuid,'status' => 5]) }}" class="btn btn-danger mb-4 mr-3 accept_change_status"><i class="icon-trash"></i> {{ behavior('action.cancel') }}</a>
                            @endif                                          
                    </div>
                  </div>
                
            </div>
            @endif
            
            @endcanany
            
        </div>
        
    </x-card>
    @canany(['cart_edit', 'cart_destroy'])
    <x-card title="action.null" table="true">
        <div class="row p-4">
            <div class="col">
                <label for="exampleFormControlInput1">{{label('cart.full_name')}}: </label>
                <h5>{{$order->fullname}}</h5>
            </div>
            <div class="col ">
                <label for="exampleFormControlInput1">{{label('cart.phone')}}: </label>
                <h5>
                    {{$order->phone}}
                </h5>
            </div>
        </div>
        <div class="row px-4  pb-4">
            <div class="col">
                <label for="exampleFormControlInput1">{{$order->delivery=='1' ? label('cart.home') : label('cart.store')}}: </label>
                <h5>{{$order->address}}</h5>
            </div>
        </div>

        @if ($order->name_receive != null)
            <div class="row px-4 pb-4">
                <div class="col">
                    <label for="exampleFormControlInput1">{{label('cart.name_receive')}}: </label>
                    <h5>{{$order->name_receive}}</h5>
                </div>
                <div class="col ">
                    <label for="exampleFormControlInput1">{{label('cart.phone_receive')}}: </label>
                    <h5>
                        {{$order->phone_receive}}
                    </h5>
                </div>
            </div>
        @endif

        <div class="row px-4 pb-4">
            <div class="col">
                <label for="exampleFormControlInput1">{{ label('cart.note') }}: </label>
                <h4>{!! $order->note !!}</h4>
            </div>
            
            <div class="col">
                <label for="exampleFormControlInput1">{{ label('cart.payment_method') }}: </label>
                <h4>
                    @php
                    foreach (payment_method() as $item) {
                        if($order->payment_method == $item->id){
                            echo $item->name;
                        }
                    }
                    @endphp
                </h4>
            </div>
            
            <div class="col">
                <label for="exampleFormControlInput1">{{ label('element.status') }}: </label><br>
                @switch($order->status)
                    @case(1)
                    <div class="badge badge-pill badge-info">{{label('status_cart.pending')}}</div>
                    @break
                    @case(2)
                    <div class="badge badge-pill badge-success">{{label('status_cart.success')}}</div>
                    @break
                    @case(3)
                    <div class="badge badge-pill bg-warning text-dark">{{label('status_cart.delevery')}}</div>
                        @break
                    @case(4)
                    <div class="badge badge-pill badge-primary">{{label('status_cart.success_delevery')}}</div>
                        @break
                    @case(5)
                    <div class="badge badge-pill badge-danger">{{label('status_cart.cancel')}}</div>
                    @break

                        
                @endswitch
               
            </div>

        </div>

        
    </x-card>

@endcanany

  
    

    <x-card title="action.null" table="true">
        <table class="table table-hover table-responsive" >
            <thead>
              <tr>
                <th>{{ label('product.image') }}</th>
                <th>{{ label('product.name') }}</th>
                <th>{{ label('cart.attribute') }}</th>
                <th>{{ label('cart.quantity') }}</th>
                <th>{{ label('product.price') }}</th>
                <th>{{ label('cart.total') }}</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($orderdetail as $item)
                <tr>
                    <td><img height="30" src="{{$item->image}}" alt="{{$item->name}}"></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->attribute}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{number_format($item->price)}}đ</td>
                    <td>{{number_format($item->total)}}đ</td>
                 </tr>
                @endforeach
              
            </tbody>
          </table>
    </x-card>
@endsection
