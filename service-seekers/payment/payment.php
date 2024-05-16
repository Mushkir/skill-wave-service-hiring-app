<?php
require_once 'stripe-php-13.10.0/init.php';
require_once '../../env.php';

if (isset($_GET['serivceId'])) {

    $serviceId = $_GET['serivceId'];
    $serviceCharge = $_GET['serviceCharge'];

    $stripe = new \Stripe\StripeClient($STRIPE_API_KEY);

    $lineItems = [
        [
            'price_data' => [
                'currency' => 'lkr',
                'product_data' => [
                    'name' => "Your payment for Service ID No: " . $serviceId . "",
                ],
                'unit_amount' => $serviceCharge * 100,
            ],
            'quantity' => 1
        ]
    ];

    $checkoutSession = $stripe->checkout->sessions->create([
        'line_items' => $lineItems,
        'mode' => 'payment',
        'success_url' => "http://localhost/skill-wave-service-hiring-app/service-seekers/hiring-log.php",
        'cancel_url' => "http://localhost/skill-wave-service-hiring-app/index.php"
    ]);


    // !<---------------------------------- Database Code -------------------------------------->
    $status = "paid"
    // !<---------------------------------- End of Database Code -------------------------------------->




    header('Content-Type: application/json');
    header("HTTP/1.1 303 See Other");
    header("Location: " . $checkoutSession->url);
    exit;
}

// ! Demo Card numbers for testing purpose (https://docs.stripe.com/testing#cards):
// ! 1. 4000056655665556 (Visa (Debit))
// ! 2. 4242424242424242 (Visa)
// ! 3. 5555555555554444 (Mastercard)
// ! 4. 5200828282828210 (Mastercard (Debit))
// ! 5. 5105105105105100 (Mastercard (Prepaid))
