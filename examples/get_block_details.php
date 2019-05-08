<?php 
use TerraGreen\TGNAPI;
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once __DIR__ . '/../vendor/config.php'; // Autoload data using config file

$api = new TGNAPI($API_KEY, $SECRECT_KEY,$USERNAME,$PASSWORD);

$BlockId = 375808;
$response =  $api->GetBlockDetails($BlockId);
echo json_encode($response);