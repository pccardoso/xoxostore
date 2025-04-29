<?php

    require_once('../../vendor/autoload.php');

    $client = new \GuzzleHttp\Client();

    $response = $client->request('GET', 'https://sandbox.api.pagseguro.com/checkouts/CHEC_7D92869B-88EA-4BFB-B9B2-43FD231D353C', [
    'headers' => [
        'Authorization' => 'Bearer c02303da-876f-407a-ba98-2cd6b097ed7b8b5260be4dfea54b5e20c10578fd6617999b-498c-4a5b-8595-96fb6fa9e134',
        'accept' => 'application/json',
    ],
    ]);
    echo "<pre>";
    echo $response->getBody();
    echo "</pre>";

?>
