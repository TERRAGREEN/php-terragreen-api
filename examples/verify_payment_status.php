<?php 
// Added By Sneha on 30-04-2019

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once __DIR__ . '/../vendor/config.php';  // Autoload data using config file
require_once __DIR__ . '/../src/TerraGreen/TGNAPI.php'; // Class Api File

$api = new TGNAPI($API_KEY, $SECRECT_KEY,$USERNAME,$PASSWORD);
$response =  $api->VerifyPaymentStatus($SEND_ADDRESS);
echo json_encode($response);