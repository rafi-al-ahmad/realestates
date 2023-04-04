<?php

return [
    "menu" => [
        [
            "name" => "dashboard",
            "icon" => "menu-icon tf-icons ti ti-smart-home",
            "slug" => "admin",
            "route" => 'admin',
            "url" => null,
        ],
        [
            "name" => "contact",
            "icon" => "menu-icon tf-icons ti ti-message",
            "slug" => [
                "contact",
            ],
            "route" => 'contact',
            "url" => null,
        ],
        [
            "name" => "users",
            "icon" => "menu-icon tf-icons ti ti-users",
            "slug" => [
                "users",
                "users.create",
                "users.update",
                "users.details",
            ],
            "route" => 'users',
            "url" => null,
        ],
        [
            "name" => "agents",
            "icon" => "menu-icon tf-icons ti ti-id-badge",
            "slug" => [
                "agents",
                "agents.create",
                "agents.update",
                "agents.details",
            ],
            "route" => 'agents',
            "url" => null,
        ],
        [
            "name" => "categories",
            "icon" => "menu-icon tf-icons ti ti-category",
            "slug" => [
                "categories",
                "categories.create",
                "categories.update",
                "categories.details",
            ],
            "route" => 'categories',
            "url" => null,
        ],
        [
            "name" => "blog",
            "icon" => "menu-icon tf-icons ti ti-article",
            "slug" => [
                "blogs",
                "blogs.create",
                "blogs.update",
                "blogs.details",
            ],
            "route" => 'blogs',
            "url" => null,
        ],
        [
            "name" => "cities",
            "icon" => "menu-icon tf-icons ti ti-map-pin",
            "slug" => [
                "cities",
                "cities.create",
                "cities.update",
                "cities.details",
            ],
            "route" => 'cities',
            "url" => null,
        ],
        [
            "name" => "properties",
            "icon" => "menu-icon tf-icons ti ti-home",
            "slug" => [
                "properties",
                "properties.create",
                "properties.update",
                "properties.details",
                "definitions",
                "definitions.create",
                "definitions.update",
                "definitions.details",
            ],
            "route" => 'properties',
            "url" => null,
            "submenu" => [
                [
                    "name" => "properties",
                    "icon" => "menu-icon tf-icons ti ti-home",
                    "slug" => [
                        "properties",
                        "properties.create",
                        "properties.update",
                        "properties.details",
                    ],
                    "route" => 'properties',
                    "url" => null,
                ],
                [
                    "name" => "definitions",
                    "icon" => "menu-icon tf-icons ti ti-list-details",
                    "slug" => [
                        "definitions",
                        "definitions.create",
                        "definitions.update",
                        "definitions.details",
                    ],
                    "route" => 'definitions',
                    "url" => null,
                ],
                // [
                //   "url" => "/layouts/vertical",
                //   "name" => "Vertical",
                //   "icon" => "menu-icon tf-icons ti ti-layout-distribute-vertical",
                //   "slug" => "layouts-vertical",
                //   "target" => "_blank"
                // ],
                // [
                //   "url" => "/layouts/fluid",
                //   "name" => "Fluid",
                //   "icon" => "menu-icon tf-icons ti ti-maximize",
                //   "slug" => "layouts-fluid"
                // ],
                // [
                //   "url" => "/layouts/container",
                //   "name" => "Container",
                //   "icon" => "menu-icon tf-icons ti ti-arrows-maximize",
                //   "slug" => "layouts-container"
                // ],
                // [
                //   "url" => "/layouts/blank",
                //   "name" => "Blank",
                //   "icon" => "menu-icon tf-icons ti ti-square",
                //   "slug" => "layouts-blank",
                //   "target" => "_blank"
                // ]
            ]
        ],
        // [
        //   "name" => "Layouts",
        //   "icon" => "menu-icon tf-icons ti ti-layout-sidebar",
        //   "slug" => "layouts",
        //   "submenu" => [
        //     [
        //       "url" => "/layouts/without-menu",
        //       "name" => "Without menu",
        //       "icon" => "menu-icon tf-icons ti ti-menu-2",
        //       "slug" => "layouts-without-menu"
        //     ],
        //     [
        //       "url" => "/layouts/vertical",
        //       "name" => "Vertical",
        //       "icon" => "menu-icon tf-icons ti ti-layout-distribute-vertical",
        //       "slug" => "layouts-vertical",
        //       "target" => "_blank"
        //     ],
        //     [
        //       "url" => "/layouts/fluid",
        //       "name" => "Fluid",
        //       "icon" => "menu-icon tf-icons ti ti-maximize",
        //       "slug" => "layouts-fluid"
        //     ],
        //     [
        //       "url" => "/layouts/container",
        //       "name" => "Container",
        //       "icon" => "menu-icon tf-icons ti ti-arrows-maximize",
        //       "slug" => "layouts-container"
        //     ],
        //     [
        //       "url" => "/layouts/blank",
        //       "name" => "Blank",
        //       "icon" => "menu-icon tf-icons ti ti-square",
        //       "slug" => "layouts-blank",
        //       "target" => "_blank"
        //     ]
        //   ]
        // ],
        // [
        //   "name" => "Apps",
        //   "icon" => "menu-icon tf-icons ti ti-layout-grid-add",
        //   "slug" => [
        //     "app",
        //     "laravel"
        //   ],
        //   "submenu" => [
        //     [
        //       "url" => "app/email",
        //       "name" => "Email",
        //       "icon" => "menu-icon tf-icons ti ti-mail",
        //       "slug" => "app-email"
        //     ],
        //     [
        //       "url" => "app/chat",
        //       "name" => "Chat",
        //       "icon" => "menu-icon tf-icons ti ti-messages",
        //       "slug" => "app-chat"
        //     ],
        //     [
        //       "url" => "app/calendar",
        //       "name" => "Calendar",
        //       "icon" => "menu-icon tf-icons ti ti-calendar",
        //       "slug" => "app-calendar"
        //     ],
        //     [
        //       "url" => "app/kanban",
        //       "name" => "Kanban",
        //       "icon" => "menu-icon tf-icons ti ti-layout-kanban",
        //       "slug" => "app-kanban"
        //     ],
        //     [
        //       "name" => "Invoice",
        //       "icon" => "menu-icon tf-icons ti ti-file-dollar",
        //       "slug" => "app-invoice",
        //       "submenu" => [
        //         [
        //           "url" => "/app/invoice/list",
        //           "name" => "List",
        //           "slug" => "app-invoice-list"
        //         ],
        //         [
        //           "url" => "/app/invoice/preview",
        //           "name" => "Preview",
        //           "slug" => "app-invoice-preview"
        //         ],
        //         [
        //           "url" => "/app/invoice/edit",
        //           "name" => "Edit",
        //           "slug" => "app-invoice-edit"
        //         ],
        //         [
        //           "url" => "/app/invoice/add",
        //           "name" => "Add",
        //           "slug" => "app-invoice-add"
        //         ]
        //       ]
        //     ],
        //     [
        //       "name" => "Users",
        //       "slug" => "app-user",
        //       "icon" => "menu-icon tf-icons ti ti-users",
        //       "submenu" => [
        //         [
        //           "url" => "/app/user/list",
        //           "name" => "List",
        //           "slug" => "app-user-list"
        //         ],
        //         [
        //           "name" => "View",
        //           "slug" => "app-user-view",
        //           "submenu" => [
        //             [
        //               "url" => "/app/user/view/account",
        //               "name" => "Account",
        //               "slug" => "app-user-view-account"
        //             ],
        //             [
        //               "url" => "/app/user/view/security",
        //               "name" => "Security",
        //               "slug" => "app-user-view-security"
        //             ],
        //             [
        //               "url" => "/app/user/view/billing",
        //               "name" => "Billing & Plans",
        //               "slug" => "app-user-view-billing"
        //             ],
        //             [
        //               "url" => "/app/user/view/notifications",
        //               "name" => "Notifications",
        //               "slug" => "app-user-view-notifications"
        //             ],
        //             [
        //               "url" => "/app/user/view/connections",
        //               "name" => "Connections",
        //               "slug" => "app-user-view-connections"
        //             ]
        //           ]
        //         ]
        //       ]
        //     ],
        //     [
        //       "name" => "Roles & Permissions",
        //       "icon" => "menu-icon tf-icons ti ti-settings",
        //       "slug" => "app-access",
        //       "submenu" => [
        //         [
        //           "url" => "/app/access-roles",
        //           "name" => "Roles",
        //           "slug" => "app-access-roles"
        //         ],
        //         [
        //           "url" => "/app/access-permission",
        //           "name" => "Permission",
        //           "slug" => "app-access-permission"
        //         ]
        //       ]
        //     ],
        //     [
        //       "name" => "Laravel Example",
        //       "icon" => "menu-icon tf-icons ti ti-brand-php",
        //       "slug" => "laravel-example",
        //       "submenu" => [
        //         [
        //           "url" => "laravel/user-management",
        //           "name" => "User Management",
        //           "slug" => "laravel-example-user-management"
        //         ]
        //       ]
        //     ]
        //   ]
        // ],
        // [
        //   "name" => "Pages",
        //   "icon" => "menu-icon tf-icons ti ti-file",
        //   "slug" => [
        //     "pages",
        //     "auth",
        //     "wizard-ex",
        //     "modal"
        //   ],
        //   "submenu" => [
        //     [
        //       "name" => "User Profile",
        //       "icon" => "menu-icon tf-icons ti ti-user-circle",
        //       "slug" => "pages-profile",
        //       "submenu" => [
        //         [
        //           "url" => "/pages/profile-user",
        //           "name" => "Profile",
        //           "slug" => "pages-profile-user"
        //         ],
        //         [
        //           "url" => "/pages/profile-teams",
        //           "name" => "Teams",
        //           "slug" => "pages-profile-teams"
        //         ],
        //         [
        //           "url" => "/pages/profile-projects",
        //           "name" => "Projects",
        //           "slug" => "pages-profile-projects"
        //         ],
        //         [
        //           "url" => "/pages/profile-connections",
        //           "name" => "Connections",
        //           "slug" => "pages-profile-connections"
        //         ]
        //       ]
        //     ],
        //     [
        //       "name" => "Account Settings",
        //       "icon" => "menu-icon tf-icons ti ti-settings",
        //       "slug" => "pages-account-settings",
        //       "submenu" => [
        //         [
        //           "url" => "/pages/account-settings-account",
        //           "name" => "Account",
        //           "slug" => "pages-account-settings-account"
        //         ],
        //         [
        //           "url" => "/pages/account-settings-security",
        //           "name" => "Security",
        //           "slug" => "pages-account-settings-security"
        //         ],
        //         [
        //           "url" => "/pages/account-settings-billing",
        //           "name" => "Billing & Plans",
        //           "slug" => "pages-account-settings-billing"
        //         ],
        //         [
        //           "url" => "/pages/account-settings-notifications",
        //           "name" => "Notifications",
        //           "slug" => "pages-account-settings-notifications"
        //         ],
        //         [
        //           "url" => "/pages/account-settings-connections",
        //           "name" => "Connections",
        //           "slug" => "pages-account-settings-connections"
        //         ]
        //       ]
        //     ],
        //     [
        //       "url" => "/pages/faq",
        //       "name" => "FAQ",
        //       "icon" => "menu-icon tf-icons ti ti-help",
        //       "slug" => "pages-faq"
        //     ],
        //     [
        //       "name" => "Help Center",
        //       "icon" => "menu-icon tf-icons ti ti-lifebuoy",
        //       "slug" => "pages-help-center",
        //       "submenu" => [
        //         [
        //           "url" => "/pages/help-center-landing",
        //           "name" => "Landing",
        //           "slug" => "pages-help-center-landing"
        //         ],
        //         [
        //           "url" => "/pages/help-center-categories",
        //           "name" => "Categories",
        //           "slug" => "pages-help-center-categories"
        //         ],
        //         [
        //           "url" => "/pages/help-center-article",
        //           "name" => "Article",
        //           "slug" => "pages-help-center-article"
        //         ]
        //       ]
        //     ],
        //     [
        //       "url" => "/pages/pricing",
        //       "name" => "Pricing",
        //       "icon" => "menu-icon tf-icons ti ti-diamond",
        //       "slug" => "pages-pricing"
        //     ],
        //     [
        //       "name" => "Misc",
        //       "icon" => "menu-icon tf-icons ti ti-3d-cube-sphere",
        //       "slug" => "pages-misc",
        //       "submenu" => [
        //         [
        //           "url" => "/pages/misc-error",
        //           "name" => "Error",
        //           "slug" => "pages-misc-error",
        //           "target" => "_blank"
        //         ],
        //         [
        //           "url" => "/pages/misc-under-maintenance",
        //           "name" => "Under Maintenance",
        //           "slug" => "pages-misc-under-maintenance",
        //           "target" => "_blank"
        //         ],
        //         [
        //           "url" => "/pages/misc-comingsoon",
        //           "name" => "Coming Soon",
        //           "slug" => "pages-misc-comingsoon",
        //           "target" => "_blank"
        //         ],
        //         [
        //           "url" => "/pages/misc-not-authorized",
        //           "name" => "Not Authorized",
        //           "slug" => "pages-misc-not-authorized",
        //           "target" => "_blank"
        //         ]
        //       ]
        //     ],
        //     [
        //       "name" => "Authentications",
        //       "icon" => "menu-icon tf-icons ti ti-lock",
        //       "slug" => "auth",
        //       "submenu" => [
        //         [
        //           "name" => "Login",
        //           "slug" => "auth-login",
        //           "submenu" => [
        //             [
        //               "url" => "/auth/login-basic",
        //               "name" => "Basic",
        //               "slug" => "auth-login-basic",
        //               "target" => "_blank"
        //             ],
        //             [
        //               "url" => "/auth/login-cover",
        //               "name" => "Cover",
        //               "slug" => "auth-login-cover",
        //               "target" => "_blank"
        //             ]
        //           ]
        //         ],
        //         [
        //           "name" => "Register",
        //           "slug" => "auth-register",
        //           "submenu" => [
        //             [
        //               "url" => "/auth/register-basic",
        //               "name" => "Basic",
        //               "slug" => "auth-register-basic",
        //               "target" => "_blank"
        //             ],
        //             [
        //               "url" => "/auth/register-cover",
        //               "name" => "Cover",
        //               "slug" => "auth-register-cover",
        //               "target" => "_blank"
        //             ],
        //             [
        //               "url" => "/auth/register-multisteps",
        //               "name" => "Multi-steps",
        //               "slug" => "auth-register-multisteps",
        //               "target" => "_blank"
        //             ]
        //           ]
        //         ],
        //         [
        //           "name" => "Verify Email",
        //           "slug" => "auth-verify-email",
        //           "submenu" => [
        //             [
        //               "url" => "/auth/verify-email-basic",
        //               "name" => "Basic",
        //               "slug" => "auth-verify-email-basic",
        //               "target" => "_blank"
        //             ],
        //             [
        //               "url" => "/auth/verify-email-cover",
        //               "name" => "Cover",
        //               "slug" => "auth-verify-email-cover",
        //               "target" => "_blank"
        //             ]
        //           ]
        //         ],
        //         [
        //           "name" => "Reset Password",
        //           "slug" => "auth-reset-password",
        //           "submenu" => [
        //             [
        //               "url" => "/auth/reset-password-basic",
        //               "name" => "Basic",
        //               "slug" => "auth-reset-password-basic",
        //               "target" => "_blank"
        //             ],
        //             [
        //               "url" => "/auth/reset-password-cover",
        //               "name" => "Cover",
        //               "slug" => "auth-reset-password-cover",
        //               "target" => "_blank"
        //             ]
        //           ]
        //         ],
        //         [
        //           "name" => "Forgot Password",
        //           "slug" => "auth-forgot-password",
        //           "submenu" => [
        //             [
        //               "url" => "/auth/forgot-password-basic",
        //               "name" => "Basic",
        //               "slug" => "auth-forgot-password-basic",
        //               "target" => "_blank"
        //             ],
        //             [
        //               "url" => "/auth/forgot-password-cover",
        //               "name" => "Cover",
        //               "slug" => "auth-forgot-password-cover",
        //               "target" => "_blank"
        //             ]
        //           ]
        //         ],
        //         [
        //           "name" => "Two Steps",
        //           "slug" => "auth-two-steps",
        //           "submenu" => [
        //             [
        //               "url" => "/auth/two-steps-basic",
        //               "name" => "Basic",
        //               "slug" => "auth-two-steps-basic",
        //               "target" => "_blank"
        //             ],
        //             [
        //               "url" => "/auth/two-steps-cover",
        //               "name" => "Cover",
        //               "slug" => "auth-two-steps-cover",
        //               "target" => "_blank"
        //             ]
        //           ]
        //         ]
        //       ]
        //     ],
        //     [
        //       "name" => "Wizard Examples",
        //       "icon" => "menu-icon tf-icons ti ti-forms",
        //       "slug" => "wizard-ex",
        //       "submenu" => [
        //         [
        //           "url" => "wizard/ex-checkout",
        //           "name" => "Checkout",
        //           "slug" => "wizard-ex-checkout"
        //         ],
        //         [
        //           "url" => "wizard/ex-property-listing",
        //           "name" => "Property Listing",
        //           "slug" => "wizard-ex-property-listing"
        //         ],
        //         [
        //           "url" => "wizard/ex-create-deal",
        //           "name" => "Create Deal",
        //           "slug" => "wizard-ex-create-deal"
        //         ]
        //       ]
        //     ],
        //     [
        //       "url" => "/modal-examples",
        //       "name" => "Modal Examples",
        //       "icon" => "menu-icon tf-icons ti ti-square",
        //       "slug" => "modal-examples"
        //     ]
        //   ]
        // ],
        // [
        //   "name" => "Components",
        //   "icon" => "menu-icon tf-icons ti ti-toggle-left",
        //   "slug" => [
        //     "cards",
        //     "ui",
        //     "extended",
        //     "icons"
        //   ],
        //   "submenu" => [
        //     [
        //       "name" => "Cards",
        //       "icon" => "menu-icon tf-icons ti ti-id",
        //       "slug" => "cards",
        //       "submenu" => [
        //         [
        //           "url" => "/cards/basic",
        //           "name" => "Basic",
        //           "slug" => "cards-basic"
        //         ],
        //         [
        //           "url" => "/cards/advance",
        //           "name" => "Advance",
        //           "slug" => "cards-advance"
        //         ],
        //         [
        //           "url" => "/cards/statistics",
        //           "name" => "Statistics",
        //           "slug" => "cards-statistics"
        //         ],
        //         [
        //           "url" => "/cards/analytics",
        //           "name" => "Analytics",
        //           "slug" => "cards-analytics"
        //         ],
        //         [
        //           "url" => "/cards/actions",
        //           "name" => "Actions",
        //           "slug" => "cards-actions"
        //         ]
        //       ]
        //     ],
        //     [
        //       "name" => "User interface",
        //       "icon" => "menu-icon tf-icons ti ti-color-swatch",
        //       "slug" => "ui",
        //       "submenu" => [
        //         [
        //           "url" => "ui/accordion",
        //           "name" => "Accordion",
        //           "slug" => "ui-accordion"
        //         ],
        //         [
        //           "url" => "ui/alerts",
        //           "name" => "Alerts",
        //           "slug" => "ui-alerts"
        //         ],
        //         [
        //           "url" => "ui/badges",
        //           "name" => "Badges",
        //           "slug" => "ui-badges"
        //         ],
        //         [
        //           "url" => "ui/buttons",
        //           "name" => "Buttons",
        //           "slug" => "ui-buttons"
        //         ],
        //         [
        //           "url" => "ui/carousel",
        //           "name" => "Carousel",
        //           "slug" => "ui-carousel"
        //         ],
        //         [
        //           "url" => "ui/collapse",
        //           "name" => "Collapse",
        //           "slug" => "ui-collapse"
        //         ],
        //         [
        //           "url" => "ui/dropdowns",
        //           "name" => "Dropdowns",
        //           "slug" => "ui-dropdowns"
        //         ],
        //         [
        //           "url" => "ui/footer",
        //           "name" => "Footer",
        //           "slug" => "ui-footer"
        //         ],
        //         [
        //           "url" => "ui/list-groups",
        //           "name" => "List groups",
        //           "slug" => "ui-list-groups"
        //         ],
        //         [
        //           "url" => "ui/modals",
        //           "name" => "Modals",
        //           "slug" => "ui-modals"
        //         ],
        //         [
        //           "url" => "ui/navbar",
        //           "name" => "Navbar",
        //           "slug" => "ui-navbar"
        //         ],
        //         [
        //           "url" => "ui/offcanvas",
        //           "name" => "Offcanvas",
        //           "slug" => "ui-offcanvas"
        //         ],
        //         [
        //           "url" => "ui/pagination-breadcrumbs",
        //           "name" => "Pagination & Breadcrumbs",
        //           "slug" => "ui-pagination-breadcrumbs"
        //         ],
        //         [
        //           "url" => "ui/progress",
        //           "name" => "Progress",
        //           "slug" => "ui-progress"
        //         ],
        //         [
        //           "url" => "ui/spinners",
        //           "name" => "Spinners",
        //           "slug" => "ui-spinners"
        //         ],
        //         [
        //           "url" => "ui/tabs-pills",
        //           "name" => "Tabs & Pills",
        //           "slug" => "ui-tabs-pills"
        //         ],
        //         [
        //           "url" => "ui/toasts",
        //           "name" => "Toasts",
        //           "slug" => "ui-toasts"
        //         ],
        //         [
        //           "url" => "ui/tooltips-popovers",
        //           "name" => "Tooltips & popovers",
        //           "slug" => "ui-tooltips-popovers"
        //         ],
        //         [
        //           "url" => "ui/typography",
        //           "name" => "Typography",
        //           "slug" => "ui-typography"
        //         ]
        //       ]
        //     ],
        //     [
        //       "name" => "Extended UI",
        //       "icon" => "menu-icon tf-icons ti ti-components",
        //       "slug" => "extended",
        //       "submenu" => [
        //         [
        //           "url" => "extended/ui-avatar",
        //           "name" => "Avatar",
        //           "slug" => "extended-ui-avatar"
        //         ],
        //         [
        //           "url" => "extended/ui-blockui",
        //           "name" => "BlockUI",
        //           "slug" => "extended-ui-blockui"
        //         ],
        //         [
        //           "url" => "extended/ui-drag-and-drop",
        //           "name" => "Drag & Drop",
        //           "slug" => "extended-ui-drag-and-drop"
        //         ],
        //         [
        //           "url" => "extended/ui-media-player",
        //           "name" => "Media Player",
        //           "slug" => "extended-ui-media-player"
        //         ],
        //         [
        //           "url" => "extended/ui-perfect-scrollbar",
        //           "name" => "Perfect scrollbar",
        //           "slug" => "extended-ui-perfect-scrollbar"
        //         ],
        //         [
        //           "url" => "extended/ui-star-ratings",
        //           "name" => "Star Ratings",
        //           "slug" => "extended-ui-star-ratings"
        //         ],
        //         [
        //           "url" => "extended/ui-sweetalert2",
        //           "name" => "SweetAlert2",
        //           "slug" => "extended-ui-sweetalert2"
        //         ],
        //         [
        //           "url" => "extended/ui-text-divider",
        //           "name" => "Text Divider",
        //           "slug" => "extended-ui-text-divider"
        //         ],
        //         [
        //           "name" => "Timeline",
        //           "slug" => "extended-ui-timeline",
        //           "submenu" => [
        //             [
        //               "url" => "extended/ui-timeline-basic",
        //               "name" => "Basic",
        //               "slug" => "extended-ui-timeline-basic"
        //             ],
        //             [
        //               "url" => "extended/ui-timeline-fullscreen",
        //               "name" => "Fullscreen",
        //               "slug" => "extended-ui-timeline-fullscreen"
        //             ]
        //           ]
        //         ],
        //         [
        //           "url" => "extended/ui-tour",
        //           "name" => "Tour",
        //           "slug" => "extended-ui-tour"
        //         ],
        //         [
        //           "url" => "extended/ui-treeview",
        //           "name" => "Treeview",
        //           "slug" => "extended-ui-treeview"
        //         ],
        //         [
        //           "url" => "extended/ui-misc",
        //           "name" => "Miscellaneous",
        //           "slug" => "extended-ui-misc"
        //         ]
        //       ]
        //     ],
        //     [
        //       "name" => "Icons",
        //       "icon" => "menu-icon tf-icons ti ti-brand-tabler",
        //       "slug" => "icons",
        //       "submenu" => [
        //         [
        //           "url" => "icons/tabler",
        //           "name" => "Tabler",
        //           "slug" => "icons-tabler"
        //         ],
        //         [
        //           "url" => "icons/font-awesome",
        //           "name" => "Fontawesome",
        //           "slug" => "icons-font-awesome"
        //         ]
        //       ]
        //     ]
        //   ]
        // ],
        // [
        //   "name" => "Forms",
        //   "icon" => "menu-icon tf-icons ti ti-forms",
        //   "slug" => [
        //     "forms",
        //     "form-layouts",
        //     "form-wizard",
        //     "form"
        //   ],
        //   "submenu" => [
        //     [
        //       "name" => "Form Elements",
        //       "icon" => "menu-icon tf-icons ti ti-toggle-left",
        //       "slug" => "forms",
        //       "submenu" => [
        //         [
        //           "url" => "forms/basic-inputs",
        //           "name" => "Basic Inputs",
        //           "slug" => "forms-basic-inputs"
        //         ],
        //         [
        //           "url" => "forms/input-groups",
        //           "name" => "Input groups",
        //           "slug" => "forms-input-groups"
        //         ],
        //         [
        //           "url" => "forms/custom-options",
        //           "name" => "Custom Options",
        //           "slug" => "forms-custom-options"
        //         ],
        //         [
        //           "url" => "forms/editors",
        //           "name" => "Editors",
        //           "slug" => "forms-editors"
        //         ],
        //         [
        //           "url" => "forms/file-upload",
        //           "name" => "File Upload",
        //           "slug" => "forms-file-upload"
        //         ],
        //         [
        //           "url" => "forms/pickers",
        //           "name" => "Pickers",
        //           "slug" => "forms-pickers"
        //         ],
        //         [
        //           "url" => "forms/selects",
        //           "name" => "Select & Tags",
        //           "slug" => "forms-selects"
        //         ],
        //         [
        //           "url" => "forms/sliders",
        //           "name" => "Sliders",
        //           "slug" => "forms-sliders"
        //         ],
        //         [
        //           "url" => "forms/switches",
        //           "name" => "Switches",
        //           "slug" => "forms-switches"
        //         ],
        //         [
        //           "url" => "forms/extras",
        //           "name" => "Extras",
        //           "slug" => "forms-extras"
        //         ]
        //       ]
        //     ],
        //     [
        //       "name" => "Form Layouts",
        //       "icon" => "menu-icon tf-icons ti ti-layout-navbar",
        //       "slug" => "form-layouts",
        //       "submenu" => [
        //         [
        //           "url" => "form/layouts-vertical",
        //           "name" => "Vertical Form",
        //           "slug" => "form-layouts-vertical"
        //         ],
        //         [
        //           "url" => "form/layouts-horizontal",
        //           "name" => "Horizontal Form",
        //           "slug" => "form-layouts-horizontal"
        //         ],
        //         [
        //           "url" => "form/layouts-sticky",
        //           "name" => "Sticky Actions",
        //           "slug" => "form-layouts-sticky"
        //         ]
        //       ]
        //     ],
        //     [
        //       "name" => "Form Wizard",
        //       "icon" => "menu-icon tf-icons ti ti-text-wrap-disabled",
        //       "slug" => "form-wizard",
        //       "submenu" => [
        //         [
        //           "url" => "form/wizard-numbered",
        //           "name" => "Numbered",
        //           "slug" => "form-wizard-numbered"
        //         ],
        //         [
        //           "url" => "form/wizard-icons",
        //           "name" => "Icons",
        //           "slug" => "form-wizard-icons"
        //         ]
        //       ]
        //     ],
        //     [
        //       "url" => "form/validation",
        //       "name" => "Form Validation",
        //       "icon" => "menu-icon tf-icons ti ti-checkbox",
        //       "slug" => "form-validation"
        //     ]
        //   ]
        // ],
        // [
        //   "name" => "Tables",
        //   "icon" => "menu-icon tf-icons ti ti-layout-grid",
        //   "slug" => [
        //     "tables",
        //     "tables-datatables"
        //   ],
        //   "submenu" => [
        //     [
        //       "url" => "tables/basic",
        //       "name" => "Tables",
        //       "icon" => "menu-icon tf-icons ti ti-table",
        //       "slug" => "tables-basic"
        //     ],
        //     [
        //       "name" => "Datatables",
        //       "icon" => "menu-icon tf-icons ti ti-layout-grid",
        //       "slug" => "tables-datatables",
        //       "submenu" => [
        //         [
        //           "url" => "tables/datatables-basic",
        //           "name" => "Basic",
        //           "slug" => "tables-datatables-basic"
        //         ],
        //         [
        //           "url" => "tables/datatables-advanced",
        //           "name" => "Advanced",
        //           "slug" => "tables-datatables-advanced"
        //         ],
        //         [
        //           "url" => "tables/datatables-extensions",
        //           "name" => "Extensions",
        //           "slug" => "tables-datatables-extensions"
        //         ]
        //       ]
        //     ]
        //   ]
        // ],
        // [
        //   "name" => "Charts & Maps",
        //   "icon" => "menu-icon tf-icons ti ti-chart-bar",
        //   "slug" => [
        //     "charts",
        //     "maps"
        //   ],
        //   "submenu" => [
        //     [
        //       "name" => "Charts",
        //       "icon" => "menu-icon tf-icons ti ti-chart-pie",
        //       "slug" => "charts",
        //       "submenu" => [
        //         [
        //           "url" => "charts/apex",
        //           "name" => "Apex Charts",
        //           "slug" => "charts-apex"
        //         ],
        //         [
        //           "url" => "charts/chartjs",
        //           "name" => "ChartJS",
        //           "slug" => "charts-chartjs"
        //         ]
        //       ]
        //     ],
        //     [
        //       "url" => "maps/leaflet",
        //       "icon" => "menu-icon tf-icons ti ti-map",
        //       "name" => "Leaflet Maps",
        //       "slug" => "maps-leaflet"
        //     ]
        //   ]
        // ],
        // [
        //   "name" => "Misc",
        //   "icon" => "menu-icon tf-icons ti ti-box-multiple",
        //   "slug" => "misc",
        //   "submenu" => [
        //     [
        //       "url" => "https://pixinvent.ticksy.com/",
        //       "icon" => "menu-icon tf-icons ti ti-lifebuoy",
        //       "name" => "Support",
        //       "slug" => "support",
        //       "target" => "_blank"
        //     ],
        //     [
        //       "url" => "https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/laravel-introduction.html",
        //       "icon" => "menu-icon tf-icons ti ti-file-description",
        //       "name" => "Documentation",
        //       "slug" => "documentation",
        //       "target" => "_blank"
        //     ]
        //   ]
        // ]
    ]
];
