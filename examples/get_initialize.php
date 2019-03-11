<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once __DIR__ . '/../vendor/config.php'; // Autoload data using config file

use TerraGreen\Initialize;


$data_array =  array(
                     "ApiKey"           => $API_KEY,
                     "SecretKey"        => $SECRECT_KEY,
                     "Username"         => $USERNAME,
                     "Password"         => $PASSWORD      
                     );

$make_call =  Initialize::callAPI('POST', 'http://api.terragreen.io/api/Wallet/Initialize', json_encode($data_array));

$response      = json_decode($make_call, true);
$access_token  = $response['access_token'];
$token_type    = $response['token_type'];
$expires_in    = $response['expires_in'];
$userName      = $response['userName'];
$issued        = $response['.issued'];
$expires       = $response['.expires'];

echo json_encode($response);