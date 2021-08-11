@extends('administrator.master')
@section('module', module('dashboard'))
@section('action', behavior('action.index'))
@section('title', title_module('dashboard','index'))

@push('themejs')
    @if (env('ANALYTICS_VIEW_ID') != NULL)
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'tables/datatables/extensions/buttons.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'tables/datatables/extensions/responsive.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'visualization/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'maps/jvectormap/jvectormap.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'maps/jvectormap/map_files/world.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'maps/jvectormap/map_files/countries/usa.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'maps/jvectormap/map_files/countries/germany.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'maps/jvectormap/gdp_data.js') }}"></script>
    <script src="{{ asset(ASSETS_JS.'statistical.js') }}"></script>
    @endif
@endpush

@section('content')

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Tổng Sản Phẩm Hiện Có</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($product)}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Tổng Số Đơn Hàng</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($order)}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tổng Số Tin Tức
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{count($news)}}</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: {{count($news)}}%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
