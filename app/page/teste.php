<?php
session_start();
require_once("../../vendor/autoload.php");

$id_compra = "125487";

$telefone = array(
    "country" => "+55",
    "area" => "85",
    "number" => "991006536"
);

$comprador = array(
    "phone" => $telefone,
    "name" => "Patricia Costa Cardoso",
    "email" => "patricia@gmail.com",
    "tax_id" => "07916894335"
);

$carrinho = array();

foreach ($_SESSION['itens'] as $key => $value) {
    $carrinho[] = array(
        "reference_id" => $value['eIdPro'],
        "name" => $value['eNomPro'],
        "quantity" => $value['eQuaPro'],
        "unit_amount" => number_format($value['ePrePro'], 2, "", "")
    );
}

$body = array(
    "customer" => $comprador,
    "customer_modifiable" => false,
    "payment_methods" => array(array("type" => "PIX"), array("type" => "CREDIT_CARD")),
    "items" => $carrinho,
    "additional_amount" => 300,
    "redirect_url" => "https://mail.google.com/mail/u/0/#inbox"
);

$client = new \GuzzleHttp\Client();

$response = $client->request('POST', 'https://sandbox.api.pagseguro.com/checkouts', [
    'body' => json_encode($body),
    'headers' => [
      'Authorization' => 'Bearer c02303da-876f-407a-ba98-2cd6b097ed7b8b5260be4dfea54b5e20c10578fd6617999b-498c-4a5b-8595-96fb6fa9e134',
      'Content-type' => 'application/json',
      'accept' => 'application/json',
    ],
  ]);

$obj = json_decode($response->getBody());
$link = $obj->links[1];
header("location: ".$link->href);

//echo $response->getBody();

?>
