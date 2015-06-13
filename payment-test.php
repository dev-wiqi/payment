<?php

require_once ('Veritrans.php');

Veritrans_Config::$serverKey = 'VT-server-vUp77KtAuLYjjB_obHT2oDQI';
Veritrans_Config::$isProduction = false;
Veritrans_Config::$isSanitized = false;

$items1 = array(
    'id' => 'PQ-100',
    'price' => 325000,
    'quantity' => 2,
    'name' => "Range Power Bank"
);
$items2 = array(
    'id' => 'PQ-088',
    'price' => 525000,
    'quantity' => 1,
    'name' => "Samsung VT-0988"
);

$items = array($items1,$items2);

$billing = array(
    'first_name' => "Andri Djarot",
    'last_name' => "Wuhaji",
    'address' => "Mangga Samping",
    'city' => "Jakarta",
    'phone' => "08564445858",
    'country_code' => 'IDN'
);

$params = array(
    'payment_type' => 'vtweb',
    'vtweb' => array(
        "credit_card_3d_secure" => TRUE,
        "enabled_payments" => array("credit_card"),
    ),
    'transaction_details' => array(
        'order_id' => 'wq-10215',
        'gross_amount' => 1175000,
    ),
    'customer_details' => $billing,
  );

try{
    header('Location: '. Veritrans_VtWeb::getRedirectionUrl($params));
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
