<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once __DIR__ . '/../vendor/config.php';  // Autoload data using config file

use TerraGreen\Send;

$data_array =  array(
                     "ApiKey"           => $API_KEY,
                     "SecretKey"        => $SECRECT_KEY,
                     "Username"         => $USERNAME,
                     "Password"         => $PASSWORD      
                     );

$make_call =  Send::callAPI('POST', 'http://api.terragreen.io/api/Wallet/Initialize', json_encode($data_array));


$response      = json_decode($make_call, true);
$access_token  = $response['access_token'];
$token_type    = $response['token_type'];

$data_array =  array(
                     "ApiKey"        	 => $API_KEY,
                     "SecretKey"     	 => $SECRECT_KEY,
                     "SendAddress"      => $SEND_ADDRESS,
                     "Amount"           => 2.1  
                  );

$make_call =  Send::BalanceAPI('POST', 'http://api.terragreen.io/api/Transaction/Send', json_encode($data_array), $access_token);

$response = json_decode($make_call, true);

echo json_encode($response);