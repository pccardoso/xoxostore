<?php
require_once('vendor/autoload.php');

$client = new \GuzzleHttp\Client();

$response = $client->request('POST', 'https://sandbox.api.pagseguro.com/checkouts', [
  'body' => '{"customer":{"phone":{"country":"+55","area":"85","number":"991006536"},"name":"Roselir","email":"roselir@gmail.com","tax_id":"94075557391"},"customer_modifiable":false,"items":[{"reference_id":"147785","name":"fdgfgfdgdfgdfg","description":"dfgdfgd","quantity":2,"unit_amount":255789}],"soft_descriptor":"XOXO Store"}',
  'headers' => [
    'Authorization' => 'Bearer c02303da-876f-407a-ba98-2cd6b097ed7b8b5260be4dfea54b5e20c10578fd6617999b-498c-4a5b-8595-96fb6fa9e134',
    'Content-type' => 'application/json',
    'accept' => 'application/json',
  ],
]);

echo $response->getBody();

?>