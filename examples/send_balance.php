<?php 
use TerraGreen\TGNAPI;
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once __DIR__ . '/../vendor/config.php'; // Autoload data using config file

$api = new TGNAPI($API_KEY, $SECRECT_KEY,$EMAIL_ADDRESS,$USERNAME,$PASSWORD);

$amount = 2.1;
$response =  $api->SendBalance($SEND_ADDRESS,$amount);
echo json_encode($response);