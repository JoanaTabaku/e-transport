<?php

return [
    'client_id' => env('PAYPAL_CLIENT_ID'),
    'secret' => env('PAYPAL_SECRET'),
    'settings' => [
        'mode' => env('PAYPAL_MODE', 'sandbox')
    ],
    'payment_action' => 'Sale',
    'currency' => 'USD',
    'notify_url' => env('PAYPAL_NOTIFY_URL', ''),
    'locale' => 'en_US',
    'validate_ssl' => true,
];
