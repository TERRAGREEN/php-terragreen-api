<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once __DIR__ . '/../vendor/config.php'; // Autoload data using config file

use TerraGreen\Balance;

$data_array =  array(
                     "ApiKey"           => $API_KEY,
                     "SecretKey"        => $SECRECT_KEY,
                     "Username"         => $USERNAME,
                     "Password"         => $PASSWORD      
                     );

$make_call =  Balance::callAPI('POST', 'http://api.terragreen.io/api/Wallet/Initialize', json_encode($data_array));                     


$response      = json_decode($make_call, true);
$access_token  = $response['access_token'];
$token_type    = $response['token_type'];

$data_array =  array(
                     "ApiKey"        => $API_KEY,
                     "SecretKey"     => $SECRECT_KEY,
                     "Username"      => $USERNAME  
                  );

$make_call =  Balance::BalanceAPI('POST', 'http://api.terragreen.io/api/Wallet/Balance', json_encode($data_array), $access_token);

$response = json_decode($make_call, true);

echo json_encode($response);