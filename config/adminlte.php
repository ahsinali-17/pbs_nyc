<?php

use App\Filters\RolesFilter;

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'PBS - Property Management Portal',
    'title_prefix' => 'PBS - Property Management Portal | ',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<img src="/images/logo.png" />',
    'logo_img' => 'images/logo.png',
    'logo_img_class' => 'brand-image-xl',
    'logo_img_xl' => 'images/logo@2x.png',
    'logo_img_xl_class' => 'brand-image-xl',
    'logo_img_alt' => 'PBS.nyc',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can setup an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    | For detailed instructions you can look the auth logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'images/logo.png',
            'alt' => 'PBS.NYC',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    |
    | Here you can change the preloader animation configuration.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => true,
        'img' => [
            'path' => 'images/logo@2x.png',
            'alt' => 'PBS.NYC Preloader',
            'effect' => 'animation__shake',
            'width' => 60,
            'height' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-gray-dark',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => false,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Extra Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#66-classes
    |
    */

    'classes_body' => 'text-sm',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => 'container-fluid',
    'classes_content' => 'container-fluid',
    'classes_sidebar' => 'elevation-4 sidebar-dark-navy',
    'classes_sidebar_nav' => 'nav-child-indent nav-compact',
    'classes_topnav' => 'navbar-gray-dark navbar-dark',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => false,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => true,
    'dashboard_url' => 'portal.index',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password.request',
    'password_email_url' => 'password.email',
    'profile_url' => 'profile',

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        [
            'search' => true,
            'text' => 'search',
            'topnav_right' => true,
        ],
        ['header' => 'PBS Member Portal',
            'level' => '3',
        ],
        //Hidden
        [
            'text' => 'Property Search',
            'url' => 'portal/search',
            'icon' => 'fas fa-fw fa-search',
            'level' => '6',
        ],
        //Hidden
        [
            'text' => 'Property List',
            'url' => 'portal/list',
            'icon' => 'fas fa-fw fa-list',
            'level' => '6',
        ],
        //adminmenu
        ['text' => 'Admin Area',
            'level' => '6',
            'icon' => 'fas fa-fw fa-cog',
            'topnav' => true,
            'footer' => true,
            'submenu' => [
                [
                    'text' => 'Users',
                    'url' => 'portal/users',
                    'icon' => 'fas fa-fw fa-user',
                    'level' => '4',
                ],
                [
                    'text' => 'Roles',
                    'url' => 'portal/roles',
                    'icon' => 'fas fa-fw fa-user-lock',
                    'level' => '4',
                ],
                [
                    'text' => 'Activity Log',
                    'url' => 'portal/activity',
                    'icon' => 'fas fa-fw fa-clipboard-list',
                    'level' => '4',
                ],
                [
                    'text' => 'Sync Status',
                    'url' => 'portal/sync-status',
                    'icon' => 'fas fa-fw fa-star',
                    'level' => '4',
                ]
            ]
        ],
        ['header' => 'account_settings',],
        [
            'text' => 'profile',
            'url' => 'admin/settings',
            'icon' => 'fas fa-fw fa-user',
        ],
        [
            'topnav_user' => true,
            'text' => 'Reset Password',
            'url' => 'portal/password/reset',
            'icon' => 'fas fa-fw fa-lock',
            'level' => '3',
        ],
        ['text' => 'Dashboard',
            'level' => '3',
            'icon' => 'fas fa-fw fa-mail-bulk',
            'topnav' => false,
            'submenu' => [
                [
                    'text' => 'Home',
                    'url' => 'portal',
                    'icon' => 'fas fa-fw fa-home',
                    'level' => '3',
                ],
                [
                    'text' => 'Property Overview',
                    'url' => 'portal/buildingQuickview',
                    'icon' => 'fas fa-fw fa-user-lock',
                    'level' => '3',
                ],
                [
                    'text' => 'Building Profiles',
                    'url' => 'portal/buildingProfiles',
                    'icon' => 'fas fa-fw fa-qrcode',
                    'level' => '3',
                ],
                [
                    'text' => 'Calender',
                    'url' => 'portal/calender',
                    'icon' => 'fas fa-fw fa-calendar-alt',
                    'level' => '3',
                ],
                [
                    'text' => 'Records Quickview',
                    'url' => 'portal/recordsQuickview',
                    'icon' => 'fas fa-fw fa-clipboard-list',
                    'level' => '6',
                ],
            ]
        ],//userDashboardMenu
//        ['text' => 'Reports',
//            'level' => '4',
//            'icon' => 'fas fa-fw fa-cog',
//            'topnav' => false,
//            'submenu' => [
//                [
//                    'text' => 'Custom Report',
//                    'url' => 'portal/records',
//                    'icon' => 'fas fa-fw fa-clipboard-list',
//                    'level' => '4',
//                ],
//                [
//                    'text' => 'Yearly Summary',
//                    'url' => 'portal/yearlySummary',
//                    'icon' => 'fas fa-fw fa-user',
//                    'level' => '4',
//                ],
//                [
//                    'text' => 'Top Units',
//                    'url' => 'portal/list',
//                    'icon' => 'fas fa-fw fa-user-lock',
//                    'level' => '4',
//                ],
//            ]
//        ],
        //reportMenu


//-DOB
        ['text' => 'DOB',
            'level' => '3',
            'icon' => 'fas fa-fw fa-city',
            'submenu' => [
//DOBLiveViolations
                [
                    'text' => 'Violations',
                    'url' => 'portal/DOBliveViolations',
                    'icon' => 'fas fa-fw fa-list-ol',
                    'level' => '3',
                ],
//DOBLiveSWO/VO
                [
                    'text' => 'Stop Work/Vacate Orders',
                    'url' => 'portal/DOBswo',
                    'icon' => 'fas fa-fw fa-list-ol',
                    'level' => '3',
                ],
//DOBcomplaints
                [
                    'text' => 'Complaints',
                    'url' => 'portal/DOBcomplaints',
                    'icon' => 'fas fa-fw fa-list-ol',
                    'level' => '3',
                ]
            ],
        ],

//-ECB
        ['text' => 'ECB',
            'level' => '3',
            'icon' => 'fas fa-fw fa-pencil-ruler',
            'submenu' => [
//ECB Hearings
                [
                    'text' => 'Hearings',
                    'url' => 'portal/ECBliveHearings',
                    'icon' => 'fas fa-fw fa-file-contract',
                    'level' => '3',
                ],
//ECB Live Due
                [
                    'text' => 'Penalties',
                    'icon' => 'fas fa-fw fa-file-contract',
                    'level' => '3',
                    'submenu' => [
//ECB Live Due Altı
                        [
                            'text' => 'All Penalties',
                            'url' => 'portal/ECBliveDue',
                            'icon' => 'fas fa-fw fa-reply-all',
                            'level' => '3',
                        ],
                        [
                            'text' => 'Defaulted',
                            'url' => 'portal/defaulted',
                            'icon' => 'fas fa-fw fa-bullseye',
                            'level' => '3',
                        ],
                        [
                            'text' => 'Imposed',
                            'url' => 'portal/imposed',
                            'icon' => 'fas fa-fw fa-exclamation-triangle',
                            'level' => '3',
                        ],
                        [
                            'text' => 'Overpaid',
                            'url' => 'portal/overpaid',
                            'icon' => 'fas fa-fw fa-money-check-alt',
                            'level' => '3',
                        ],


                    ],
                ],
//ECB Savings
                [
                    'text' => 'Savings',
                    'url' => 'portal/ECBsavings',
                    'icon' => 'fas fa-fw fa-user',
                    'level' => '6',
                ],
//ECB Corrections
                [
                    'text' => 'Corrections',
                    'url' => 'portal/ECBcorrections',
                    'icon' => 'fas fa-fw fa-signature',
                    'level' => '3',
                ],
//ECB Complaints
                [
                    'text' => 'Complaints',
                    'url' => 'portal/ECBcomplaints',
                    'icon' => 'fas fa-fw fa-not-equal',
                    'level' => '3',
                ],
//ECB Requests
                [
                    'text' => 'Requests',
                    'url' => 'portal/ECBrequests',
                    'icon' => 'fas fa-fw fa-user',
                    'level' => '6',
                ],
//ECB Settlements
                [
                    'text' => 'Settlements',
                    'url' => 'portal/ECBsettlements',
                    'icon' => 'fas fa-fw fa-user',
                    'level' => '6',
                ],
            ],
        ],

//-FDNY
        ['text' => 'FDNY',
            'level' => '3',
            'icon' => 'fas fa-fw fa-fire-alt',
            'submenu' => [
//FDNY live Hearings
                [
                    'text' => 'FDNY Hearings',
                    'url' => 'portal/FDNYliveHearings',
                    'icon' => 'fas fa-fw fa-file-contract',
                    'level' => '3',
                ],
//FDNY Corrections
                [
                    'text' => 'FDNY Corrections',
                    'url' => 'portal/FDNYcorrections',
                    'icon' => 'fas fa-fw fa-signature',
                    'level' => '3',
                ],
//FDNY Dues
                [
                    'text' => 'Penalties',
                    'url' => 'portal/FDNYliveDue',
                    'icon' => 'fas fa-fw fa-clock',
                    'level' => '3',
                ],
//FDNY Crim TODO:BAKILACAK BIRA
                [
                    'text' => 'Criminal Summons',
                    'url' => 'portal/FDNYsummons',
                    'icon' => 'fas fa-fw fa-user',
                    'level' => '6',
                ],
//FDNY INSPECTIONS
                [
                    'text' => 'Inspections',
                    'url' => 'portal/FDNYinspections',
                    'icon' => 'fas fa-fw fa-user',
                    'level' => '6',
                ],
//FDNYActiveViolOrders
                [
                    'text' => 'Violation Orders',
                    'url' => 'portal/FDNYactiveViolOrders',
                    'icon' => 'fas fa-fw fa-hockey-puck',
                    'level' => '3',
                ],
//FDNY Permit Accounts
                [
                    'text' => 'Permit Accounts',
                    'url' => 'portal/FDNYcofPermits',
                    'icon' => 'fas fa-fw fa-sticky-note',
                    'level' => '6',
                ],
//FDNY Cert of Fitness
                [
                    'text' => 'Cert of Fitness',
                    'url' => 'portal/FDNYcofPermits',
                    'icon' => 'fas fa-fw fa-certificate',
                    'level' => '6',
                ],
//FDNYComplaints
                [
                    'text' => 'Complaints',
                    'url' => 'portal/FDNYcomplaints',
                    'icon' => 'fas fa-fw fa-not-equal',
                    'level' => '3',
                ],
//FDNYincidents
                [
                    'text' => 'Incidents',
                    'url' => 'portal/FDNYincidents',
                    'icon' => 'fas fa-fw fa-user',
                    'level' => '6',
                ],
//FDNYloa
                [
                    'text' => 'Letter of Approval',
                    'url' => 'portal/FDNYloa',
                    'icon' => 'fas fa-fw fa-user',
                    'level' => '6',
                ],

            ],
        ],

//-HPD
        ['text' => 'HPD',
            'level' => '3',
            'icon' => 'fas fa-fw fa-house-damage',
            'submenu' => [
//Top100 -> TODO: Bakılacak
                [
                    'text' => 'Top 100 Units',
                    'url' => 'portal/HPDtop100',
                    'icon' => 'fas fa-fw fa-user',
                    'level' => '6',
                ],
//HPD Live Violations
                [
                    'text' => 'Violations',
                    'url' => 'portal/HPDliveViolations',
                    'icon' => 'fas fa-fw fa-hockey-puck',
                    'level' => '3',
                ],
//HPD Complaints
                [
                    'text' => 'Complaints',
                    'url' => 'portal/HPDcomplaints',
                    'icon' => 'fas fa-fw fa-not-equal',
                    'level' => '3',
                ],
//HPD Litigations
                [
                    'text' => 'Litigations',
                    'url' => 'portal/HPDlitigations',
                    'icon' => 'fas fa-fw fa-toolbox',
                    'level' => '3',
                ],
//HPDregistrations
                [
                    'text' => 'Registrations',
                    'url' => 'portal/HPDregistrations',
                    'icon' => 'fas fa-fw fa-sign-in-alt',
                    'level' => '3',
                ],
//HPDrepairs
                [
                    'text' => 'Repairs',
                    'url' => 'portal/HPDrepairs',
                    'icon' => 'fas fa-fw fa-redo-alt',
                    'level' => '3',
                ]
            ],
        ],

//-Inspections
        ['text' => 'Inspections',
            'level' => '3',
            'icon' => 'fas fa-fw fa-check',
            'submenu' => [

//DOBboilerinspections
                [
                    'text' => 'DOB Boiler',
                    'url' => 'portal/DOBinspections',
                    'icon' => 'fas fa-fw fa-oil-can',
                    'level' => '3',
                ],
//DEPinspections
                [
                    'text' => 'DEP Boiler',
                    'url' => 'portal/DEPinspections',
                    'icon' => 'fas fa-fw fa-oil-can',
                    'level' => '3',
                ],
//FACADEinspections
                [
                    'text' => 'Façade',
                    'url' => 'portal/FACADEinspections',
                    'icon' => 'fas fa-fw fa-industry',
                    'level' => '3',
                ],
//FDNYinspections
                [
                    'text' => 'FDNY',
                    'url' => 'portal/FDNYinspections',
                    'icon' => 'fas fa-fw fa-fire-alt',
                    'level' => '6',
                ],
//LL84inspections
                [
                    'text' => 'LL84',
                    'url' => 'portal/LL84inspections',
                    'icon' => 'fas fa-fw fa-balance-scale',
                    'level' => '6',
                ],
//LL87inspections
                [
                    'text' => 'LL87',
                    'url' => 'portal/LL87inspections',
                    'icon' => 'fas fa-fw fa-balance-scale',
                    'level' => '6',
                ],
//LL152inspections
                [
                    'text' => 'LL152',
                    'url' => 'portal/LL152inspections',
                    'icon' => 'fas fa-fw fa-balance-scale',
                    'level' => '6',
                ],
//Others
                [
                    'text' => 'Others',
                    'url' => 'portal/Otherinspections',
                    'icon' => 'fas fa-fw fa-undo',
                    'level' => '3',
                ],
            ],
        ],

//-Permits
        ['text' => 'Permits',
            'level' => '3',
            'icon' => 'fas fa-fw fa-stream',
            'submenu' => [
//DOB
                [
                    'text' => 'DOB',
                    'icon' => 'fas fa-fw fa-city',
                    'level' => '3',
                    'submenu' => [
//DOB Altı
//DOB Permits
                        [
                            'text' => 'DOB Permits',
                            'url' => 'portal/DOBpermits',
                            'icon' => 'fas fa-fw fa-city',
                            'level' => '3',
                        ],
//DOB Appr. Permits
                        [
                            'text' => 'DOB NOW Permits',
                            'url' => 'portal/DOBapprovedPermits',
                            'icon' => 'fas fa-fw fa-city',
                            'level' => '3',
                        ],
//DOB Boil. Permits
                        [
                            'text' => 'DOB Boil. Permits',
                            'url' => 'portal/DOBboilerPermits',
                            'icon' => 'fas fa-fw fa-city',
                            'level' => '6',
                        ],
//DOB Elev. Permits
                        [
                            'text' => 'DOB Elev. Permits',
                            'url' => 'portal/DOBelevatorPermits',
                            'icon' => 'fas fa-fw fa-city',
                            'level' => '3',
                        ],

                    ],
                ],
//DOB AHV
                [
                    'text' => 'DOB AHV',
                    'url' => 'portal/DOBahvPermits',
                    'icon' => 'fas fa-fw fa-th-list',
                    'level' => '3',
                ],


//FDNY Account
                [
                    'text' => 'FDNY Account',
                    'url' => 'portal/FDNYcofPermits',
                    'icon' => 'fas fa-fw fa-fire-extinguisher',
                    'level' => '3',
                ],
//FDNY COF
                [
                    'text' => 'FDNY COF',
                    'url' => 'portal/FDNYcofPermits',
                    'icon' => 'fas fa-fw fa-user',
                    'level' => '6',
                ],
//DEC Tank
                [
                    'text' => 'DEC Tank',
                    'url' => 'portal/DECtankPermits',
                    'icon' => 'fas fa-fw fa-user',
                    'level' => '6',
                ],
//DEP
                [
                    'text' => 'DEP',
                    'url' => 'portal/DEPpermits',
                    'icon' => 'fas fa-fw fa-user',
                    'level' => '6',
                ],
//DOH
                [
                    'text' => 'DOH',
                    'url' => 'portal/DOHpermits',
                    'icon' => 'fas fa-fw fa-user',
                    'level' => '6',
                ],
//DOT
                [
                    'text' => 'DOT',
                    'url' => 'portal/DOTpermits',
                    'icon' => 'fas fa-fw fa-user',
                    'level' => '6',
                ],
//ELEVATORinspections
                [
                    'text' => 'Elevator',
                    'url' => 'portal/ELEVATORinspections',
                    'icon' => 'fas fa-fw fa-person-booth',
                    'level' => '3',
                ],
//Open Applications
                [
                    'text' => 'Open Applications',
                    'icon' => 'fas fa-fw fa-certificate',
                    'level' => '3',
                    'submenu' => [
//Open Applications Altı
//DOB Job Filn.
                        [
                            'text' => 'DOB Job Filn.',
                            'url' => 'portal/DOBjobFilings',
                            'icon' => 'fas fa-fw fa-network-wired',
                            'level' => '3',
                        ],
//DOB NOW Job Fil.
                        [
                            'text' => 'DOB NOW Job Fil.',
                            'url' => 'portal/DOBnowJobFilings',
                            'icon' => 'fas fa-fw fa-network-wired',
                            'level' => '3',
                        ],
//BSA Applications.
                        [
                            'text' => 'BSA Applications',
                            'url' => 'portal/BSAApplications',
                            'icon' => 'fas fa-fw fa-network-wired',
                            'level' => '3',
                        ],
                    ],
                ],

//Place of Assembly
                [
                    'text' => 'Place of Assembly',
                    'url' => 'portal/POApermits',
                    'icon' => 'fas fa-fw fa-user',
                    'level' => '6',
                ],
//DOB LAA Apps
                [
                    'text' => 'DOB LAA Apps',
                    'url' => 'portal/DOBllaAppsPermits',
                    'icon' => 'fas fa-fw fa-user',
                    'level' => '6',
                ],
//Electrical Apps
                [
                    'text' => 'Electrical Apps',
                    'url' => 'portal/ELECTRICALappsPermits',
                    'icon' => 'fas fa-fw fa-user',
                    'level' => '6',
                ],
            ],
        ],
//SUPPORT
        [
            'text' => 'Support',
            'url' => 'portal/tickets',
            'icon' => 'fas fa-fw fa-calendar-check',
            'level' => '3',
        ],
        [
            'text' => 'HPD Mailings',
            'url' => 'portal/hpdmailing',
            'icon' => 'fas fa-fw fa-mail-bulk',
            'level' => '4',
        ],
        [
            'text' => 'Clients',
            'url' => 'portal/clients',
            'icon' => 'fas fa-fw fa-sign-in-alt fa-flip-horizontal',
            'level' => '5',
        ],
        [
            'text' => 'Blog',
            'icon' => 'fab fa-fw fa-microblog',
            'level' => '5',
            'submenu' => [
                [
                    'text' => 'Articles',
                    'url' => 'portal/blog/article',
                    'icon' => 'fab fa-fw fa-microblog',
                    'level' => '5',
                ],
                [
                    'text' => 'Categories',
                    'url' => 'portal/blog/category',
                    'icon' => 'fab fa-fw fa-microblog',
                    'level' => '5',
                ],

            ],
        ],
        [
            'text' => 'Newsletter',
            'icon' => 'fas fa-fw fa-at',
            'level' => '5',
            'submenu' => [
                [
                    'text' => 'Campaigns',
                    'route' => 'campaign.index',
                    'icon' => 'fas fa-fw fa-mail-bulk',
                    'level' => '5',
                ],
                [
                    'text' => 'Subscriber Lists',
                    'route' => 'lists.index',
                    'icon' => 'fas fa-fw fa-user-check',
                    'level' => '5',
                ]
            ]
        ],
        [
            'text' => 'Settings',
            'route' => 'settings.index',
            'icon' => 'fas fa-fw fa-tools',
            'level' => '5',
        ],
        [
            'text' => 'OpenData Status',
            'route' => 'sync.status',
            'icon' => 'fas fa-fw fa-sync-alt fa-spin',
            'level' => '5',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        //JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
//        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        //JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
        RolesFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/js/sweetalert2.all.min.js',
                ],
            ],
        ],
        'Pace' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '/vendor/pace-progress/themes/silver/pace-theme-top-center-flash.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/vendor/pace-progress/pace.min.js',
                ],
            ],
        ],
        'Knob' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js',
                ],
            ],
        ],
         'Summernote' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js',
                ],
            ],
        ],
       'Bootstrap-Switch' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css'
                ],
                ['type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js'
                ]
            ]
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,

    /*
    |--------------------------------------------------------------------------
    | Assets
    |--------------------------------------------------------------------------
    |
    | Here we can modify the asset loading behavior
    |
    */
    'asset_url' => env('ASSET_URL', null),
    //'force_https' => env('APP_ENV') === 'production',
    'force_https' => false,
];
