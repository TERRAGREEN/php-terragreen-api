<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once __DIR__ . '/../vendor/config.php'; // Autoload data using config file

use TerraGreen\CreateWallet;

$data_array =  array(
                     "ApiKey"           => $API_KEY,
                     "SecretKey"        => $SECRECT_KEY,
                     "Username"         => $USERNAME,
                     "Password"         => $PASSWORD      
                     );

$make_call =  CreateWallet::callAPI('POST', 'http://api.terragreen.io/api/Wallet/Create', json_encode($data_array));

$response 	= 	json_decode($make_call, true);
$Status   	=  	$response['Status'];
$Message  	= 	$response['Message'];

echo json_encode($response);