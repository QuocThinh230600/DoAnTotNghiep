@extends('administrator.master')
@section('module', module('coupon'))
@section('action', behavior('action.create'))
@section('title', title_module('coupon', 'create'))

@canany(['coupon_index', 'coupon_edit', 'coupon_destroy'])
    @section('index', route('admin.coupon.index'))
@endcanany

@push('themejs')
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'ui/dragula.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'forms/styling/switch.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'media/fancybox.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'notifications/pnotify.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'notifications/sweet_alert.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'pickers/pickadate/picker.date.js') }}"></script>
    @include('ckfinder::setup')
@endpush

@section('content')
    <form action="{{ route('admin.coupon.store') }}" method="POST" enctype="multipart/form-data" class="formAjax">
        @csrf
        @method('POST')

        <div class="row">
            @include('administrator.partials.button', ['exit' => route('admin.coupon.index')])

            <div class="col-lg-12">
                <x-card title="action.info" id="forms-target-left">
                    <div class="row">
                        <div class="col-lg-12">
                            <x-text label="coupon.name" type="text" name="name" placeholder="coupon.name" required="required">
                                {{ old('name') }}
                            </x-text>
                        </div> 
                        <div class="col-lg-6">
                            <x-text label="coupon.code" type="text" name="code" placeholder="coupon.code" required="required">
                                {{ old('name') }}
                            </x-text>
                        </div>  
                        <div class="col-lg-6">
                            <x-text label="coupon.percent" max="100" min="0" type="number" name="percent" placeholder="coupon.percent" required="required">
                                {{ old('name') }}
                            </x-text>
                        </div>
                        <div class="col-md-4">
                            <x-datetime label="product.date_start" name="date_start" placeholder="product.date_start">
                                {{ date('d/m/Y',time()) }}
                            </x-datetime>
                        </div>

                        <div class="col-md-2">
                            <label>{{ label('product.time_start') }}</label>
                            <select name="time_start" class="form-control">
                                {!! time_24_hours() !!}
                            </select>
                        </div>

                        <div class="col-md-4">
                            <x-datetime label="product.date_end" name="date_end" placeholder="product.date_end">
                                {{ date('d/m/Y') }}
                            </x-datetime>
                        </div>

                        <div class="col-md-2">
                            <label>{{ label('product.time_end') }}</label>
                            <select name="time_end" class="form-control">
                                {!! time_24_hours() !!}
                            </select>
                        </div>  
                    </div>
                    <x-toggle label="element.status" name="status" on="element.status_enable" off="element.status_disable" required="required">
                        {{ old('status','on') }}
                    </x-toggle>
                </x-card>
            </div>
        </div>
    </form>
@endsection
