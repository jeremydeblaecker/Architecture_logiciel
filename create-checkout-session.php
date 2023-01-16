<?php

require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51Jn1I2Jrr3OWOLFIyKi61kv9AdSBjgTshKAiuqpqWrD7afnlov4SewDCENZELDikCObUJVkSG9xWcYhlkXsUqegA00kRx1aNgv');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/Archi%20Logiciel/Stripe';

$checkout_session = \Stripe\Checkout\Session::create([
    'line_items' => [[
        'price_data' => [
            'currency' => 'eur',
            'product_data' => [
                'name' => $_POST["articleName"],
                /*'images' => [
                    $_POST["articleImage"]
                ],*/
            ],
            'unit_amount' => intval($_POST["article"]."00"),
        ],
        'quantity' => 1,
    ]],
    'payment_method_types' => [
        'card',
    ],
    'mode' => 'payment',
    'success_url' => $YOUR_DOMAIN . '/success.php',
    'cancel_url' => $YOUR_DOMAIN . '/cancel.php',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);