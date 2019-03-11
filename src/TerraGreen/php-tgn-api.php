<?php

namespace Terragreen;

/**
 * Main Binance class
 *
 * Eg. Usage:
 * require 'vendor/autoload.php';
 * $api = new Binance\\API();
 */
class API 
{   
   protected $api_key; 
   protected $api_secret; 
   protected $api_username;
   protected $api_password;   
   
   public function __construct( string $api_key = '', string $api_secret = '', string $api_username = '', string $api_password = '') 
   {
      $this->api_key      = $api_key;
      $this->api_secret   = $api_secret;
      $this->api_username = $api_username;
      $this->api_password = $api_password;      
   }

   function callAPI($method, $url, $data)
{
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
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      // 'APIKEY: 111111111111111111111',
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
   
}
