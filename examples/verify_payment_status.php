<?php 
use TerraGreen\TGNAPI;
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once __DIR__ . '/../vendor/config.php'; // Autoload data using config file

$api = new TGNAPI($API_KEY, $SECRECT_KEY,$EMAIL_ADDRESS,$USERNAME,$PASSWORD);

$response =  $api->VerifyPaymentStatus($SEND_ADDRESS);
echo json_encode($response);
