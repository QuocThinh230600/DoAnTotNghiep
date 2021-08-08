<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('administrator.partials.main_navbar', 'App\View\Composers\NavbarComposer');
        View::composer('administrator.partials.main_sidebar', 'App\View\Composers\MainSideBarComposer');
        View::composer('website.partials.header', 'App\View\Composers\HeaderComposer');
        View::composer('website.partials.cate_header_mobile', 'App\View\Composers\HeaderMobileComposer');
        View::composer('website.partials.footer_showroom', 'App\View\Composers\FooterComposer');
        View::composer('website.partials.footer_service', 'App\View\Composers\FooterServiceComposer');
        View::composer('website.partials.head', 'App\View\Composers\HeadComposer');

    }
}
