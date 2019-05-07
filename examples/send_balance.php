<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once __DIR__ . '/../vendor/config.php';  // Autoload data using config file
require_once __DIR__ . '/../src/TerraGreen/TGNAPI.php'; // Class Api File

$api = new TGNAPI($API_KEY, $SECRECT_KEY,$USERNAME,$PASSWORD);
$amount = 2.1;
$response =  $api->SendBalance($SEND_ADDRESS,$amount);
echo json_encode($response);