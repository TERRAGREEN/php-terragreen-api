<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once __DIR__ . '/../vendor/config.php'; // Autoload data using config file

use TerraGreen\GetRate;

$get_data =  GetRate::callAPI('GET', 'http://api.terragreen.io/api/Rate/GetRate', false);
$response = json_decode($get_data, true);
echo  json_encode($response);