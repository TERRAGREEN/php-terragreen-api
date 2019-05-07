<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once __DIR__ . '/../vendor/config.php'; // Autoload data using config file
require_once __DIR__ . '/../src/TerraGreen/TGNAPI.php'; // Api Class File

$api = new TGNAPI($API_KEY, $SECRECT_KEY,$USERNAME,$PASSWORD);

$response =  $api->CurrentRate();
echo json_encode($response);