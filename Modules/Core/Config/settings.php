<?php

return [
    'site-name' => [
        'description' => 'core::settings.site-name',
        'view' => 'text',
        'translatable' => true,
    ],
    'site-name-mini' => [
        'description' => 'core::settings.site-name-mini',
        'view' => 'text',
        'translatable' => true,
    ],
    'site-description' => [
        'description' => 'core::settings.site-description',
        'view' => 'textarea',
        'translatable' => true,
    ],
    'template' => [
        'description' => 'core::settings.template',
        'view' => 'core::fields.select-theme',
    ],
    'address' => [
        'description' => 'core::settings.address',
        'view' => 'text',
        'translatable' => true,
    ],
    'email' => [
        'description' => 'core::settings.email',
        'view' => 'text',
        'translatable' => true,
    ],
    'phone' => [
        'description' => 'core::settings.phone',
        'view' => 'text',
        'translatable' => true,
    ],
    'analytics-script' => [
        'description' => 'core::settings.analytics-script',
        'view' => 'textarea',
        'translatable' => false,
    ],
    'locales' => [
        'description' => 'core::settings.locales',
        'view' => 'core::fields.select-locales',
        'translatable' => false,
    ],
    'logo' => [
        'description' => 'core::settings.logo',
        'view' => 'media-single',
        'translatable' => false,
    ],
    'logo_admin' => [
        'description' => 'core::settings.logo_admin',
        'view' => 'media-single',
        'translatable' => false,
    ],
    'favicon' => [
        'description' => 'core::settings.favicon',
        'view' => 'media-single',
        'translatable' => false,
    ],
    'banner' => [
        'description' => 'core::settings.banner',
        'view' => 'media-single',
        'tanslatable' => false,
    ],
    'logo_footer' => [
        'description' => 'core::settings.logo_footer',
        'view' => 'media-single',
        'translatable' => false,
    ]
];
