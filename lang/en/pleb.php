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
        'Welcome Title'     => 'Welcome',
        'Welcome'           => 'Hey, Welcome!',
        'Welcome Paragraph' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.',
        'action_button'     => 'GET STARTED',
        'What\'s Next'      => 'What\'s Next',
        'Headline One'      => 'Headline One',
        'Paragraph One'     => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'Headline Two'      => 'Headline Two',
        'Paragraph Two'     => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'Headline Three'    => 'Headline Three',
        'Paragraph Three'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'icon_one'          => '/assets/img/emails/Email-1_Icon-1.png',
        'icon_two'          => '/assets/img/emails/Email-1_Icon-2.png',
        'icon_three'        => '/assets/img/emails/Email-1_Icon-3.png',
        'WEB VERSION'       => 'WEB VERSION',
        'SEND TO A FRIEND'  => 'SEND TO A FRIEND',
        // Verify Email Template
        'Verify Title'      => 'Verify Your Email',
        'Verify Your Email Account' => 'To complete your registration and verify your account, please click the button below:',
        'Omit Email' => 'If you didn’t request this registration, feel free to ignore this message.',
        'Step Confirm' => 'This step helps us confirm it’s really you signing up.',
        'Verify Paragraph'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.',
        'Verify Action Button'  => 'Click to continue with registration',
        // Forgot Password Template
        'Forgot Password Title' => 'Forgot Password',
        'Forgot your password'  => 'Forgot your password',
        'Forgot Paragraph'      => 'Click on the button below to reset your password, you have 1 hour to pick your password. After that, you\'ll have to ask for a new one.',
        'pw_reset_button'       => 'RESET PASSWORD',
        // Thank you Payment Template
        'Payment Thank You Title'   => 'Thanks for your payment',
        'Thanks for your payment'   => 'Thanks for your payment',
        'Thank you paragraph'       => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod dolore lorem tempor incididunt ut labore et dolore.',
        'Attached your receipt'     => 'We\'ve Attached your receipt to this email',
        'Invoice ID'                => 'Invoice ID',
        'Total'                     => 'Total',
        'Download Now'              => 'DOWNLOAD NOW',
        'If you have any questions' => 'If you have any questions or feedback, just',
        'reply to this email'       => 'reply to this email',
        'Hello, @name' => 'Hello, @name',
        'Remember email' => 'Remember that '. env('APP_NAME') .' does not request sensitive information via SMS, email, forms, social media, or confidential data such as passwords, security codes, or phone numbers.
                            <br>
                            If this was not you, please contact us immediately at: <a style="font-weight: bold;" href="mailto:@mail">@mail</a> <br>
                            If you are receiving this email, it is because you subscribed and/or registered with <span style="font-weight: bold;">'. env('APP_NAME') .'</span>
                            <br>
                            You <a target="__blank" style="font-weight: bold;" href="@url_not_mails">can stop receiving promotional emails</a>
                            <br>',
        'Email not reply' => 'This email has been sent automatically and does not require a response.',
        'Email notice' => 'The information sent from this email complies with all legal regulations established in the Law on Electronic Commerce, Electronic Signatures, Data Messages, and its General Regulations, in force in Ecuador. <br> <br>
        <br> <strong>Disclaimer: </strong>The information contained in this email is confidential and may only be used by the individual or company to whom it is addressed. This information may not be distributed or copied in whole or in part by any means without '. env('APP_NAME') .'\'s authorization. The organization assumes no responsibility for any information, opinions, or criteria contained in this email that are not related to '. env('APP_NAME') .'\'s activities.',
        'Message Confirmation' => 'This is a confirmation email from VibrantSpaces. Below, you will find a detailed summary of the requested services.',
        'Thanks your contact' => 'Thank you for contacting us'
    ],

];
