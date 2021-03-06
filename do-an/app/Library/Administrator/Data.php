<?php
if (!function_exists('role_permissions')) {
    /**
     * Generate permission checkbox
     * @return array
     * @author 
     */
    function role_permissions(): array
    {
        $modules = array(
            "user",
            "role",
            "category",
            "news",
            // "promotion",
            "coupon",
            "page",
            "content",
            "position",
            "image",
            "showRoom",
            "province",
            "district",
            "ward",
            "producer",
            "attribute",
            "product",
            "cart",
            'questionProduct',
            "review",
            'contact'
        );

        if (config('app.multi_language')) {
            $modules[] = "language";
        }

        $permission = array();

        foreach ($modules as $module) {
            $permission[$module] = array(
                [
                    'value' => $module . '_index',
                    'name'  => title_module($module, 'index'),
                ],
                [
                    'value' => $module . '_create',
                    'name'  => title_module($module, 'create'),
                ],
                [
                    'value' => $module . '_edit',
                    'name'  => title_module($module, 'edit'),
                ],
                [
                    'value' => $module . '_destroy',
                    'name'  => title_module($module, 'destroy'),
                ]
            );
        }

        $permission["contact"] = array(
            [
                'value' => 'contact_index',
                'name'  => title_module('contact', 'index'),
            ],
            [
                'value' => 'contact_destroy',
                'name'  => title_module('contact', 'destroy'),
            ],
            [
                'value' => 'contact_reply',
                'name'  => title_module('contact', 'reply'),
            ]
        );

        $permission["backup"] = array(
            [
                'value' => 'backup_index',
                'name'  => title_module('backup', 'index'),
            ],
            [
                'value' => 'backup_create',
                'name'  => title_module('backup', 'create'),
            ],
            [
                'value' => 'backup_download',
                'name'  => title_module('backup', 'download'),
            ],
            [
                'value' => 'backup_destroy',
                'name'  => title_module('backup', 'destroy'),
            ]
        );

        $permission["log_error"] = array(
            [
                'value' => 'log_error_statistical',
                'name'  => title_module('log_error', 'statistical'),
            ],
            [
                'value' => 'log_error_index',
                'name'  => title_module('log_error', 'index'),
            ],
            [
                'value' => 'activity_index',
                'name'  => title_module('activity', 'index'),
            ]
        );

        $permission["config"] = array(
            [
                'value' => 'config_edit',
                'name'  => title_module('config', 'edit'),
            ],
        );

        $permission["review"] = array(
            [
                'value' => 'review_index',
                'name'  => title_module('review', 'index'),
            ],
            [
                'value' => 'review_edit',
                'name'  => title_module('review', 'edit'),
            ],
            [
                'value' => 'review_destroy',
                'name'  => title_module('review', 'destroy'),
            ]
        );
        $permission["cart"] = array(
            [
                'value' => 'cart_index',
                'name'  => title_module('cart', 'index'),
            ],
            [
                'value' => 'cart_edit',
                'name'  => title_module('cart', 'edit'),
            ]
        );
        return $permission;
    }
}

if (!function_exists('level')) {
    /**
     * Generate data level of user
     * @return string
     * @author 
     */
    function level()
    {

        $level = array(
            [
                'id'   => 1,
                'name' => label('user.admin'),
            ],
            [
                'id'   => 2,
                'name' => label('user.member'),
            ]
        );

        return json_decode(json_encode($level), false);
    }
}

if (!function_exists('cat_news')) {
    /**
     * Generate data level of user
     * @return string
     * @author 
     */
    function cat_news()
    {

        $cat_news = array(
            [
                'id'   => 1,
                'name' => label('news.sale'),
            ],
            [
                'id'   => 2,
                'name' => label('news.recruitment'),
            ]
        );

        return json_decode(json_encode($cat_news), false);
    }
}

if(!function_exists('status_cart')){

    /**
     * Generate data status cart
     * @return string
     * @author 
     */
    function status_cart()
    {
        $status_cart = array(
            [
                'id'   => '1',
                'name' => label('status_cart.pending')
            ],
            [
                'id'   => '2',
                'name' => label('status_cart.success')
            ],
            [
                'id'   => '3',
                'name' => label('status_cart.delevery')
            ],
            [
                'id'   => '4',
                'name' => label('status_cart.success_delevery')
            ],
            [
                'id'   => '5',
                'name' => label('status_cart.cancel')
            ]
        );

        return json_decode(json_encode($status_cart), false);
    }
}

if(!function_exists('payment_method')){

    /**
     * Generate data payment method
     * @return string
     * @author 
     */
    function payment_method()
    {
        $payment_method = array(
            [
                'id'   => '1',
                'name' => label('payment_method.cod')
            ],
            [
                'id'   => '2',
                'name' => label('payment_method.tranfes')
            ]
        );

        return json_decode(json_encode($payment_method), false);
    }
}

if (!function_exists('backup')) {
    /**
     * Generate data type of backup
     * @return string
     * @author 
     */
    function backup()
    {

        $backup = array(
            [
                'id'   => 1,
                'name' => label('backup.database'),
            ],
            [
                'id'   => 2,
                'name' => label('backup.source'),
            ],
            [
                'id'   => 3,
                'name' => label('backup.all'),
            ]
        );

        return json_decode(json_encode($backup), false);
    }
}

if (!function_exists('robot')) {
    /**
     * Generate data meta robot for SEO
     * @return string
     * @author 
     */
    function robot()
    {

        $robot = array(
            [
                'id'   => 'index',
                'name' => 'Index',
            ],
            [
                'id'   => 'follow',
                'name' => 'Follow',
            ],
            [
                'id'   => 'all',
                'name' => 'All',
            ],
            [
                'id'   => 'nofollow',
                'name' => 'No Follow',
            ],
            [
                'id'   => 'noindex',
                'name' => 'No Index',
            ],
            [
                'id'   => 'none',
                'name' => 'None',
            ],
            [
                'id'   => 'noarchive',
                'name' => 'No Archive',
            ],
            [
                'id'   => 'nosnippet',
                'name' => 'No Snippet',
            ],
            [
                'id'   => 'max-snippet',
                'name' => 'Max Snippet',
            ],
        );

        return json_decode(json_encode($robot), false);
    }
}

if (!function_exists('open_link')) {
    /**
     * Generate data open link for tag
     * @return string
     * @author 
     */
    function open_link()
    {

        $open = array(
            [
                'id'   => '_self',
                'name' => label('link.self')
            ],
            [
                'id'   => '_blank',
                'name' => label('link.blank')
            ],
            [
                'id'   => '_parent',
                'name' => label('link.parent')
            ],
            [
                'id'   => '_top',
                'name' => label('link.top')
            ]
        );

        return json_decode(json_encode($open), false);
    }
}

if (!function_exists('template_detail_news')) {
    /**
     * Generate data template detail news
     * @return string
     * @author 
     */
    function template_detail_news()
    {
        $template_detail_news = array(
            [
                'id'   => '1',
                'name' => label('news.detail_page')
            ],
            [
                'id'   => '2',
                'name' => label('news.e_magazine_page')
            ]
        );

        return json_decode(json_encode($template_detail_news), false);
    }
}

if (!function_exists('template_detail_product')) {
    /**
     * Generate data template detail news
     * @return string
     * @author 
     */
    function template_detail_product()
    {
        $template_detail_product = array(
            [
                'id'   => '1',
                'name' => label('product.detail_page')
            ]
        );

        return json_decode(json_encode($template_detail_product), false);
    }
}

if (!function_exists('status')) {
    /**
     * Generate data status
     * @return string
     * @author 
     */
    function status()
    {
        $status = array(
            // [
            //     'id'   => '1',
            //     'name' => label('status.in_process')
            // ],
            // [
            //     'id'   => '2',
            //     'name' => label('status.draft')
            // ],
            // [
            //     'id'   => '3',
            //     'name' => label('status.pending')
            // ],
            [
                'id'   => '4',
                'name' => label('status.published')
            ],
            // [
            //     'id'   => '5',
            //     'name' => label('status.retired')
            // ],
            // [
            //     'id'   => '6',
            //     'name' => label('status.close')
            // ]
        );

        return json_decode(json_encode($status), false);
    }
}

if (!function_exists('featured')) {
    /**
     * Generate data featured
     * @return string
     * @author 
     */
    function featured()
    {
        $featured = array(
            [
                'id'   => '1',
                'name' => label('featured.un_featured')
            ],
            [
                'id'   => '2',
                'name' => label('featured.most_outstanding')
            ],
            [
                'id'   => '3',
                'name' => label('featured.featured')
            ],
            [
                'id'   => '4',
                'name' => label('featured.combo')
            ],
            [
                'id'   => '5',
                'name' => label('featured.pricesock')
            ],
            [
                'id'   => '6',
                'name' => label('featured.dealhot')
            ]
        );

        return json_decode(json_encode($featured), false);
    }
}

if (!function_exists('featured_cat')) {
    /**
     * Generate data featured
     * @return string
     * @author 
     */
    function featured_cat()
    {
        $featured_cat = array(
            [
                'id'   => '1',
                'name' => label('featured.un_featured')
            ],
            [
                'id'   => '3',
                'name' => label('featured.featured')
            ],
        );

        return json_decode(json_encode($featured_cat), false);
    }
}

if (!function_exists('installment')) {
    /**
     * Generate data installment
     * @return string
     * @author 
     */
    function installment()
    {
        $installment = array(
            [
                'id'   => '1',
                'name' => label('installment.un_installment')
            ],
            [
                'id'   => '2',
                'name' => label('installment.payment-with-interest')
            ],
            [
                'id'   => '3',
                'name' => label('installment.interest-free')
            ]
        );

        return json_decode(json_encode($installment), false);
    }
}

if (!function_exists('dateChoose')) {
    /**
     * Generate data installment
     * @return string
     * @author 
     */
    function dateChoose()
    {
        $dateChoose = [];
        $date =date('Y-m-d H:i:s');
        for ($i=0; $i < 4; $i++) { 
            $next = date('d/m', strtotime($date . ' +'.$i.' day'));
            $weekday = date("l", strtotime($date . ' +'.$i.' day'));
            $weekday = strtolower($weekday);
            switch($weekday) {
                case 'monday':
                    $weekday = 'Th??? hai';
                    break;
                case 'tuesday':
                    $weekday = 'Th??? ba';
                    break;
                case 'wednesday':
                    $weekday = 'Th??? t??';
                    break;
                case 'thursday':
                    $weekday = 'Th??? n??m';
                    break;
                case 'friday':
                    $weekday = 'Th??? s??u';
                    break;
                case 'saturday':
                    $weekday = 'Th??? b???y';
                    break;
                default:
                    $weekday = 'Ch??? nh???t';
                    break;
            }
            $array=[
                'id'    => $weekday.' ('.$next.')',
                'name'  => $weekday.' ('.$next.')'
            ];
            $dateChoose[]=$array;
        }

        return json_decode(json_encode($dateChoose), false);
    }
}

if (!function_exists('timeChoose')) {
    /**
     * Generate data installment
     * @return string
     * @author 
     */
    function timeChoose()
    {
        $timeChoose = [];
        for ($i=0; $i < 24; $i++) {
            $array=[
                'id'    => 'tr?????c '.$i.'h',
                'name'    => 'Tr?????c '.$i.'h'
            ];
            $timeChoose[]= $array; 
        }

        return json_decode(json_encode($timeChoose), false);
    }
}

if (!function_exists('status_contact')) {
    /**
     * Generate data featured
     * @return string
     * @author 
     */
    function status_contact()
    {
        $status_contact = array(
            [
                'id'   => '1',
                'name' => label('status_contact.not_contacted')
            ],
            [
                'id'   => '2',
                'name' => label('status_contact.contacted')
            ]
        );

        return json_decode(json_encode($status_contact), false);
    }
}

if (!function_exists('format_date')) {
    /**
     * Generate data format date
     * @return string
     * @author 
     */
    function format_date()
    {

        $format_date = array(
            [
                'id'   => "dd-mm-yyyy",
                'name' => "dd-mm-yyyy",
            ],
            [
                'id'   => "dd/mm/yyyy",
                'name' => "dd/mm/yyyy",
            ],
            [
                'id'   => "yyyy-mm-dd",
                'name' => "yyyy-mm-dd",
            ],
            [
                'id'   => "yyyy/mm/dd",
                'name' => "yyyy/mm/dd",
            ]
        );

        return json_decode(json_encode($format_date), false);
    }
}

if (!function_exists('menu')) {
    /**
     * Generate menu sidebar
     * @param array $role
     * @return array
     * @author 
     */
    function menu(array $role): array
    {
        $data_menu = array(
            "main_group"          => array(
                "category" => "icon-stack3",
            ),
            "area_group"          => array(
                "province" => "icon-city",
                "district" => "icon-office",
                "ward"     => "icon-home9",
            ),
            "article_group"       => array(
                "news" => "icon-newspaper",
                "page" => "icon-file-text2",
                // "promotion" => "icon-percent",
            ),
            "product_group"       => array(
                "producer"  => "icon-store2",
                "attribute" => "icon-eyedropper2",
                'coupon'    => "icon-color-sampler",
                "product"   => "icon-cube2",
            ),
            "cart_group"          => array(
                'cart'      => 'icon-cart4'
            ),
            "member_group"        => array(
                "user" => "icon-user",
                "role" => "icon-shield2"
            ),
            "media_group"         => array(
                "position" => "icon-target",
                "image"    => "icon-image2"
            ),
            "showroom_group"    => array(
                'showRoom'=> "icon-location4"
            ),
            "customer_care_group"=> array(
                'questionProduct' => "icon-question3",
                'review'          => "icon-star-empty3"
            ),
            "manage_system_group" => array(
                "backup" => "icon-database",
            ),
            
        );

        if (config('app.multi_language')) {
            $data_menu["main_group"]["language"] = "icon-earth";
        }

        $menu = array();
        foreach ($data_menu as $name_group => $menu_item) {
            foreach ($menu_item as $module => $icon) {
                $slug = str_replace("_", "-", $module);

                $menu[$name_group][$module] = array(
                    'name'    => module($slug),
                    'route'   => 'admin.' . $slug . '.index',
                    'status'  => (in_array($module . '_index', $role)) || (in_array($module . '_create', $role)) || (in_array($module . '_edit', $role)) || (in_array($module . '_destroy', $role)),
                    'request' => 'admin/' . $module . '/*',
                    'module'  => $module,
                    'icon'    => $icon,
                    'action'  => array(
                        'index'  => array(
                            'name'    => title_module($slug, 'index'),
                            'route'   => 'admin.' . $slug . '.index',
                            'status'  => (in_array($module . '_index', $role)) || (in_array($module . '_edit', $role)) || (in_array($module . '_destroy', $role)),
                            'request' => 'admin/' . $module,
                        ),
                        'create' => array(
                            'name'    => title_module($slug, 'create'),
                            'route'   => 'admin.' . $slug . '.create',
                            'status'  => in_array($module . '_create', $role),
                            'request' => 'admin/' . $module . '/create',
                        ),
                    )
                );
            }
        }

        $menu['customer_care_group']['contact'] = array(
            'name'    => module('contact'),
            'route'   => 'admin.contact.index',
            'status'  => (in_array('contact_index', $role)) || (in_array('contact_reply', $role)) || (in_array('contact_destroy', $role)),
            'request' => 'admin/contact/*',
            'module'  => 'contact',
            'icon'    => 'icon-mailbox',
            'action'  => array(
                'index' => array(
                    'name'    => title_module('contact', 'index'),
                    'route'   => 'admin.contact.index',
                    'status'  => (in_array('contact_index', $role)) || (in_array('contact_reply', $role)) || (in_array('contact_destroy', $role)),
                    'request' => 'admin/reply-contact',
                ),
            )
        );

        // $menu['manage_system_group']['log_error'] = array(
        //     'name'    => module('log_error'),
        //     'route'   => 'log-viewer::logs.list',
        //     'status'  => (in_array('log_error_statistical', $role)) || (in_array('log_error_index', $role)),
        //     'request' => 'admin/log-viewer/*',
        //     'module'  => 'log-viewer',
        //     'icon'    => 'icon-bug2',
        //     'action'  => array(
        //         'statistical' => array(
        //             'name'    => title_module('log_error', 'statistical'),
        //             'route'   => 'log-viewer::dashboard',
        //             'status'  => (in_array('log_error_statistical', $role)),
        //             'request' => 'admin/log-viewer',
        //         ),
        //         'index'       => array(
        //             'name'    => title_module('log_error', 'index'),
        //             'route'   => 'log-viewer::logs.list',
        //             'status'  => (in_array('log_error_index', $role)),
        //             'request' => 'admin/log-viewer/logs',
        //         )
        //     )
        // );

        $menu['manage_system_group']['activity'] = array(
            'name'    => module('activity'),
            'route'   => 'admin.activity.index',
            'status'  => in_array('activity_index', $role),
            'request' => 'admin/activity/*',
            'module'  => 'activity',
            'icon'    => 'icon-multitouch',
            'action'  => array(
                'index' => array(
                    'name'    => title_module('activity', 'index'),
                    'route'   => 'admin.activity.index',
                    'status'  => in_array('activity_index', $role),
                    'request' => 'admin/activity',
                )
            )
        );

        $menu['manage_system_group']['config'] = array(
            'name'    => module('config'),
            'route'   => 'admin.config.edit',
            'status'  => in_array('config_edit', $role),
            'request' => 'admin/config/*',
            'module'  => 'config',
            'icon'    => 'icon-cog5',
            'action'  => array(
                'index' => array(
                    'name'    => title_module('config', 'edit'),
                    'route'   => 'admin.config.edit',
                    'status'  => in_array('config_edit', $role),
                    'request' => 'admin/activity',
                )
            )
        );

        return $menu;
    }
}

