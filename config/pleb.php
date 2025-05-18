<?php

/**
 * Putting this here to help remind you where this came from.
 *
 * I'll get back to improving this and adding more as time permits
 * if you need some help feel free to drop me a line.
 *
 * * Twenty-Years Experience
 * * PHP, JavaScript, Laravel, MySQL, Java, Python and so many more!
 *
 *
 * @author  Simple-Pleb <plebeian.tribune@protonmail.com>
 * @website https://www.simple-pleb.com
 * @source https://github.com/hpsweb/laravel-email-templates
 *
 * @license Free to do as you please
 *
 * @since 1.0
 *
 */

return [

    'mail' => [
        'top_logo'          => env('APP_LOGO_URL', 'https://www.simple-pleb.com/logo.png'),
        'welcome_url'       => env('APP_URL', 'https://www.simple-pleb.com'),
        'street_address'    => '',
        'phone_number'      => env('PHONE_CONTACT', '+1 234 567 890'),
        'info_email'        => env('MAIL_CONTACT_EMAIL', ''),
        'play_url'          => '',
        'ios_url'           => '',

        // To remove from the email footer - make the value blank
        'facebook_url'      => env('LINK_FACEBOOK', ''),
        'twitter_url'       => env('LINK_X', ''),
        'instagram_url'     => env('LINK_INSTAGRAM', ''),
        'pinterest_url'     => env('LINK_PINTEREST', ''),
    ],

    //custom values
    'custom' => [
        'buttons' => [
            'verify_email' => [
                'bgcolor' => env('APP_SECONDARY_COLOR', '#000000'),
            ]
        ],
        'header_content' => [
            'bgcolor' => env('APP_PRIMARY_COLOR', '#000000'),
        ]
    ]
];
