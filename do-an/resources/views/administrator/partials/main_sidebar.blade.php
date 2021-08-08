<!-- Main sidebar -->
<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-1 mt-1">
                        <a href="#">
                            <img class="rounded-circle" height="44" width="44" src="{{ auth()->user()->avatar ?? asset(GLOBAL_ASSETS_IMG . 'avatar.svg') }}">
                        </a>
                    </div>

                    <div class="media-body ml-2">
                        <div class="media-title font-weight-semibold">{{ auth()->user()->full_name ?? auth()->user()->email  }}</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-calendar font-size-sm"></i> <span class="show_clock"></span>
                        </div>
                        <div class="font-size-xs opacity-50 mt-1">
                            <i class="icon-location3 font-size-sm"></i> {{ get_client_ip() }}
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="{{ route('admin.personal.show') }}" class="text-white"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="icon-home4"></i>
                        <span>
                            {{ module('dashboard')  }}
                        </span>
                    </a>
                </li>

                @foreach (menu($roles) as $name_group => $data_menu)


                    <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">{{ module($name_group) }}</div> <i class="icon-menu" title="Main"></i></li>

                    @foreach ($data_menu as $menu)
                        @if ($menu["status"])
                            <li class="nav-item nav-item-submenu {{ (request()->is('admin/'.$menu["module"]) || request()->is('admin/'.$menu["module"].'/*')) ? 'nav-item-expanded nav-item-open' : '' }}">
                                <a href="" class="nav-link"><i class="{{ $menu["icon"] }}"></i> <span>{{ $menu["name"] }}</span></a>
                                <ul class="nav nav-group-sub" data-submenu-title="{{ $menu["name"] }}">
                                    @foreach ($menu["action"] as $submenu)
                                        @if ($submenu["status"])
                                            <li class="nav-item"><a href="{{ route($submenu["route"]) }}" class="nav-link {{ request()->is($submenu["request"]) ? 'active' : '' }}">{{ $submenu["name"] }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                @endforeach
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
<!-- /main sidebar -->

<!-- Secondary sidebar -->

<!-- /secondary sidebar -->
