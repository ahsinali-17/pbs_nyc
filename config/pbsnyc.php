<?php

return [

    'sitename' => 'PBS | Proactive Building Solutions',
    'menu' => [
        [
            'text' => 'Home',
            'href' => 'home',
            'icon' => 'icon-home',
            'class' => 'active',
            'submenu' => []
        ],
        [
            'text' => 'Services & Solutions',
            'href' => '#',
            'icon' => 'icon-hands-helping',
            'class' => '',
            'submenu' => [
                [
                    'text' => 'Alerts',
                    'href' => 'alerts',
                    'icon' => 'icon-user-clock',
                    'class' => '',
                    'submenu' => []
                ],
                [
                    'text' => 'Property Development',
                    'href' => '#',
                    'icon' => 'icon-truck-loading',
                    'class' => '',
                    'submenu' => [
                        [
                            'text' => 'General Contracting',
                            'href' => 'generalcontracting',
                            'icon' => 'icon-line-paper',
                            'class' => '',
                            'submenu' => []
                        ],
//                        [
//                            'text' => 'Construction Management',
//                            'href' => 'constructionmanagement',
//                            'icon' => 'icon-group',
//                            'class' => '',
//                            'submenu' => []
//                        ],
//                        [
//                            'text' => 'Superintendent',
//                            'href' => 'superintendent',
//                            'icon' => 'icon-address-card1',
//                            'class' => '',
//                            'submenu' => []
//                        ],
                        [
                            'text' => 'Network',
                            'href' => 'network',
                            'icon' => 'icon-connectdevelop',
                            'class' => '',
                            'submenu' => []
                        ],
//                        [
//                            'text' => 'Maintenance',
//                            'href' => 'maintenance',
//                            'icon' => 'icon-wrench1',
//                            'class' => '',
//                            'submenu' => []
//                        ],
//                        [
//                            'text' => 'Planning tool (coming soon)',
//                            'href' => '#',
//                            'icon' => 'icon-ruler-combined',
//                            'class' => '',
//                            'submenu' => []
//                        ],
//                        [
//                            'text' => 'Development tool (coming soon)',
//                            'href' => '#',
//                            'icon' => 'icon-user-clock',
//                            'class' => '',
//                            'submenu' => []
//                        ],
                    ]
                ],
                [
                    'text' => 'Property Management',
                    'href' => '#',
                    'icon' => 'icon-city',
                    'class' => '',
                    'submenu' => [
                        [
                            'text' => 'Member Portal',
                            'href' => 'memberportal',
                            'icon' => 'icon-people-carry',
                            'class' => '',
                            'submenu' => []
                        ],
                        [
                            'text' => 'Violation Correction',
                            'href' => 'violationcorrection',
                            'icon' => 'icon-phone-square',
                            'class' => '',
                            'submenu' => []
                        ],
                        [
                            'text' => 'Filing Representation',
                            'href' => 'filingrepresentation',
                            'icon' => 'icon-user-clock',
                            'class' => '',
                            'submenu' => []
                        ],
                    ]
                ],


            ]
        ],
        [
            'text' => 'Resources Library',
            'href' => '#',
            'icon' => 'icon-readme',
            'class' => '',
            'submenu' => [
                [
                    'text' => 'NYC DOB Code',
                    'href' => 'nycdobcode',
                    'icon' => 'icon-book',
                    'class' => '',
                    'submenu' => []
                ],
                [
                    'text' => 'DOB Service Updates',
                    'href' => 'nycdepcode',
                    'icon' => 'icon-book-open',
                    'class' => '',
                    'submenu' => []
                ],
                [
                    'text' => 'NYC FDNY Code',
                    'href' => 'nycfdnycode',
                    'icon' => 'icon-book-reader',
                    'class' => '',
                    'submenu' => []
                ],
            ]
        ],
        [
            'text' => 'About Us',
            'href' => 'aboutus',
            'icon' => 'icon-users-cog',
            'class' => '',
            'submenu' => []
        ],
        [
            'text' => 'Contact',
            'href' => 'contactus',
            'icon' => 'icon-comments2',
            'class' => '',
            'submenu' => []
        ],
        [
            'text' => 'Blog',
            'href' => 'frontend.blog.show',
            'icon' => 'icon-rss',
            'class' => '',
            'submenu' => []
        ],
        [
            'text' => 'Portal',
            'href' => 'portal.index',
            'icon' => 'icon-line2-login',
            'class' => '',
            'submenu' => []
        ],

    ]


];
