<?php
namespace TerraGreen;

class TGNAPI 
{   
   protected $api_key; 
   protected $api_secret; 
   protected $api_username;
   protected $api_password;   
   protected $base_url;   
   
   public function __construct( string $api_key = '', string $api_secret = '', string $api_username = '', string $api_password = ''){
      $this->api_key      = $api_key;
      $this->api_secret   = $api_secret;
      $this->api_username = $api_username;
      $this->api_password = $api_password;      
      $this->base_url = 'http://api.terragreen.io/api/';      
   }
   //Call API without Header info
   private  function callAPI($method, $url, $data){
       $curl = curl_init();

       switch ($method)
       {
          case "POST":
             curl_setopt($curl, CURLOPT_POST, 1);
             if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
             break;
          case "PUT":
             curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
             if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);                
            break;
          default:
             if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
       }

       // OPTIONS:
       curl_setopt($curl, CURLOPT_URL, $this->base_url.$url);
       curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
       ));

       curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

       // EXECUTE:
       $result = curl_exec($curl);
       if(!$result){die("Connection Failure");}
       curl_close($curl);
       return $result;
   }
   //Balance API With Authorization Header
   private function BalanceAPI($method, $url, $data, $header){
      $curl = curl_init();

      switch ($method)
      {
         case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
            {
               curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }  
            break;

         case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
            {
               curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
            break;

         default:
            if ($data)
            {
               $url = sprintf("%s?%s", $url, http_build_query($data));
            } 
      }

      // OPTIONS:
      curl_setopt($curl, CURLOPT_URL, $this->base_url.$url);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: bearer '.$header,
         'Content-Type: application/json', ));
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

      // EXECUTE:
      $result = curl_exec($curl);
      if(!$result)
      {
         die("Connection Failure");
      }
      curl_close($curl);
      return $result;
   } 

   //Create New Wallet
    public function CreateWallet(){
      
        $data_array =  array(
         "ApiKey"           => $this->api_key,
         "SecretKey"        => $this->api_secret,
         "Username"         => $this->api_username,
         "Password"         => $this->api_password      
        );
    
      $get_data = TGNAPI::callAPI('POST', 'Wallet/Create', json_encode($data_array));
      $response = json_decode($get_data, true);
      return json_encode($response);
    }

    //Initialization
    public function GetInitialize(){
        $data_array =  array(
         "ApiKey"           => $this->api_key,
         "SecretKey"        => $this->api_secret,
         "Username"         => $this->api_username,
         "Password"         => $this->api_password      
        );
    
      $get_data = TGNAPI::callAPI('POST', 'Wallet/Initialize', json_encode($data_array));
      $response = json_decode($get_data, true);
      return json_encode($response);
    }

    //Get Wallet Balance
    public function GetBalance(){
        $make_call =  TGNAPI::GetInitialize();

        $response = json_decode($make_call, true);
        $access_token = $response['access_token'];

        $data_array =  array(
         "ApiKey"        => $this->api_key,
         "SecretKey"     => $this->api_secret,
         "Username"      => $this->api_username  
        );
    
      $get_data = TGNAPI::BalanceAPI('POST', 'Wallet/Balance', json_encode($data_array), $access_token);
      $response = json_decode($get_data, true);
      return json_encode($response);
    }
    //Get Block Details
    public function GetBlockDetails($BlockId){
        $make_call =  TGNAPI::GetInitialize();

        $response = json_decode($make_call, true);
        $access_token = $response['access_token'];

        $data_array =  array(
         "ApiKey"        => $this->api_key,
         "SecretKey"     => $this->api_secret,
         "BlockId"      => $BlockId, 
        );
    
      $get_data = TGNAPI::BalanceAPI('POST', 'Block/GetBlockDetails', json_encode($data_array), $access_token);
      $response = json_decode($get_data, true);
      return json_encode($response);
    }
    //Get N No. Of Block Details
    public function GetBlocks($start,$end){
        $make_call =  TGNAPI::GetInitialize();

        $response = json_decode($make_call, true);
        $access_token = $response['access_token'];

        $data_array =  array(
         "ApiKey"        => $this->api_key,
         "SecretKey"     => $this->api_secret,
         "StartIndex"      => $start,
         "EndIndex"      => $end,
        );
    
      $get_data = TGNAPI::BalanceAPI('POST', 'Block/GetBlocks', json_encode($data_array), $access_token);
      $response = json_decode($get_data, true);
      return json_encode($response);
    }
    //Get Latest Block Details
    public function GetLatestBlock(){
        $make_call =  TGNAPI::GetInitialize();

        $response = json_decode($make_call, true);
        $access_token = $response['access_token'];

        $data_array =  array(
         "ApiKey"        => $this->api_key,
         "SecretKey"     => $this->api_secret,
        );
    
      $get_data = TGNAPI::BalanceAPI('POST', 'Block/GetLatestBlocks', json_encode($data_array), $access_token);
      $response = json_decode($get_data, true);
      return json_encode($response);
    }
    //Get New Address
    public function GetNewAddress(){
        $make_call =  TGNAPI::GetInitialize();

        $response = json_decode($make_call, true);
        $access_token = $response['access_token'];

        $data_array =  array(
         "ApiKey"        => $this->api_key,
         "SecretKey"     => $this->api_secret,
        );
    
      $get_data = TGNAPI::BalanceAPI('POST', 'Transaction/GetNewAddress', json_encode($data_array), $access_token);
      $response = json_decode($get_data, true);
      return json_encode($response);
    }
    //Get New Address
    public function GetTransactionList(){
        $make_call =  TGNAPI::GetInitialize();

        $response = json_decode($make_call, true);
        $access_token = $response['access_token'];

        $data_array =  array(
         "ApiKey"        => $this->api_key,
         "SecretKey"     => $this->api_secret,
        );
    
      $get_data = TGNAPI::BalanceAPI('POST', 'Transaction/GetTransactionList', json_encode($data_array), $access_token);
      $response = json_decode($get_data, true);
      return json_encode($response);
    }
    //Send Balance
    public function SendBalance($send_address,$amount){
        $make_call =  TGNAPI::GetInitialize();

        $response = json_decode($make_call, true);
        $access_token = $response['access_token'];

        $data_array =  array(
         "ApiKey"        => $this->api_key,
         "SecretKey"     => $this->api_secret,
         "SendAddress"      => $send_address,
         "Amount"           => $amount 
        );
    
      $get_data = TGNAPI::BalanceAPI('POST', 'Transaction/Send', json_encode($data_array), $access_token);
      $response = json_decode($get_data, true);
      return json_encode($response);
    }
    //Verify Payment Status
    public function VerifyPaymentStatus($send_address){
        $make_call =  TGNAPI::GetInitialize();

        $response = json_decode($make_call, true);
        $access_token = $response['access_token'];

        $data_array =  array(
         "ApiKey"        => $this->api_key,
         "SecretKey"     => $this->api_secret,
         "ReceiveAddress"      => $send_address,
        );
    
      $get_data = TGNAPI::BalanceAPI('POST', 'Transaction/VerifyPaymentStatus?=', json_encode($data_array), $access_token);
      $response = json_decode($get_data, true);
      return json_encode($response);
    }
    //Get Current Rate
    public function CurrentRate(){
      $get_data = TGNAPI::callAPI('GET', 'Rate/GetRate', false);
      $response = json_decode($get_data, true);
      return json_encode($response);
    }
    //Get All Rate
    public function GetAllRate(){
      $get_data = TGNAPI::callAPI('GET', 'Rate/GetAllRates', false);
      $response = json_decode($get_data, true);
      return json_encode($response);
    }
   
}
