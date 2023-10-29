<?php
require '../vendor/autoload.php';
require '../keys/key.php';

use Stripe\Stripe;
use Stripe\Checkout\Session;

// Reemplaza con tus claves de API de Stripe
Stripe::setApiKey($key);
header('Content-Type: application/json');
// Configura las opciones de envío
$shippingOptions = [
    [
        'shipping_rate_data' => [
            'type' => 'fixed_amount',
            'fixed_amount' => [
                'amount' => 0,
                'currency' => 'usd',
            ],
            'display_name' => 'Free shipping',
            'delivery_estimate' => [
                'minimum' => [
                    'unit' => 'business_day',
                    'value' => 5,
                ],
                'maximum' => [
                    'unit' => 'business_day',
                    'value' => 7,
                ],
            ],
        ],
    ],
    [
        'shipping_rate_data' => [
            'type' => 'fixed_amount',
            'fixed_amount' => [
                'amount' => 1500,
                'currency' => 'usd',
            ],
            'display_name' => 'Next day air',
            'delivery_estimate' => [
                'minimum' => [
                    'unit' => 'business_day',
                    'value' => 1,
                ],
                'maximum' => [
                    'unit' => 'business_day',
                    'value' => 1,
                ],
            ],
        ],
    ],
];

// Crea la sesión de pago
$session = Session::create([
    'payment_method_types' => ['card'],
    'shipping_address_collection' => [
        'allowed_countries' => ['US', 'SV'],
    ],
    'line_items' => array_map(function ($item) {
        return [
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => $item['nombre'],
                    'images' => $item['imagen'],
                ],
                'unit_amount' => $item['precio'] * 100,
            ],
            'quantity' => 1,
        ];
    }, $_POST['items']),
    'mode' => 'payment',
    'success_url' => 'http://localhost/compra.html',
    'cancel_url' => 'http://localhost/principal.html',
]);

echo json_encode($session);

?>