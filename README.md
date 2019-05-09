<div style="padding:10px;">
<h1>PHP TerraGreen API</h1>
<h2>General API Features</h2>
<ul>
	<li>Implementation of all General, Market Data and Accounting Related Data.</li>
	<li>Simple handling of authentication</li>
	<li>Manage Wallet, Transaction Details, Rates, And Block Details.</li>
	<li>Exception Handling.</li>
	<li>API Response in different formats like JSON & XML.</li>
	<li>Unique API Key & Secret Key provided to each user.</li>
</ul>
<h2>API key</h2>
		
<p>To use Terragreen API, the user will need to obtain an API key and secret key, which are passed to TerraGreen API with every request. API keys can be generated in the TerraGreen BlockChain Portal, under the section 'API KEYS'. Direct link to API key creation panel:<a class="btn-link" href="http://blockchain.terragreen.io/Api/ApiCreate" target="_blank">Click Here</a></p>
<p>
Steps to obtain an API Key and Secret key:
</p>
<ol>
<li>Create an account at BlockChain portal. <a class="btn-link" href="http://blockchain.terragreen.io/Account/Register">click here</a></li>
<li>Verify your account</li>
<li>SignIn at BlockChain portal <a class="btn-link" href="http://blockchain.terragreen.io/Account/Login">click here</a></li>
<li>Go to API Key section <a class="btn-link" href="http://blockchain.terragreen.io/Docs/Index">click here</a></li>
<li>Create API Key <a class="btn-link" href="http://blockchain.terragreen.io/Api/ApiCreate">click here</a></li>
</ol>
<h2>Installation</h2>
Install the library using Composer. Please read the <a href="https://getcomposer.org/doc/01-basic-usage.md" rel="nofollow">Composer Documentation</a> if you are unfamiliar with Composer or dependency managers in general.
<div style="background-color: #eee;padding: 10px;"><pre>
composer require terragreen/terragreen-official-api-docs-master
</pre>
</div>
<h3>Getting started</h3>
<p>Set Below parameters in config.php file, which you obtain from BlockChain portal.</p>
<div style="background-color: #eee;padding: 10px;">
<pre>
$API_KEY = "[API_KEY]";
$SECRECT_KEY="[SECRECT_KEY]";
$USERNAME="[WALLET_NAME]";
$PASSWORD="[PASSWORD]";
$SEND_ADDRESS="[SEND_ADDRESS]";
</pre>
</div>
<p>Add Namespace & Below Config Files for all operations</p>
<div style="background-color: #eee;padding: 10px;">
<pre>
use TerraGreen\TGNAPI; //Main Class Library 

require_once 'vendor/autoload.php'; // Autoload files using Composer autoload
require_once 'vendor/config.php'; // Autoload data using config file
</pre>					
</div>
<h1>Block</h1>
<h3 class="parent" style="text-decoration: underline;">Get Blocks Details</h3>
<div class="child">
<p>Get block details.</p>
<div style="background-color: #eee;padding: 10px;">
<pre>
$api = new TGNAPI($API_KEY, $SECRECT_KEY,$USERNAME,$PASSWORD);

$BlockId = 375808;
$response =  $api->GetBlockDetails($BlockId);
echo json_encode($response);
</pre>
</div>
</div>
<h3 class="parent" style="text-decoration: underline;">Get Blocks</h3>
<div class="child">
<p>Get Blocklist.</p>
<div style="background-color: #eee;padding: 10px;">
<pre>
$api = new TGNAPI($API_KEY, $SECRECT_KEY,$USERNAME,$PASSWORD);

$start = 1;
$end = 5;
$response =  $api->GetBlockDetails($start,$end);
echo json_encode($response);
</pre>
</div>
</div>
<h3 class="parent" style="text-decoration: underline;">Get Latest Block</h3>
<div class="child">
<p>Gets latest block list.</p>
<div style="background-color: #eee;padding: 10px;">
<pre>
$api = new TGNAPI($API_KEY, $SECRECT_KEY,$USERNAME,$PASSWORD);

$response =  $api->GetLatestBlock();
echo json_encode($response);
</pre>
</div>
</div>
<h1>Rate</h1>
<h3 class="parent" style="text-decoration: underline;">Get Rate</h3>
<div class="child">
<p>Get TGCoin's current rates.</p>
<div style="background-color: #eee;padding: 10px;">
<pre>
$api = new TGNAPI($API_KEY, $SECRECT_KEY,$USERNAME,$PASSWORD);

$response =  $api->CurrentRate();
echo json_encode($response);
</pre>
</div>
</div>
<h3 class="parent" style="text-decoration: underline;">Get All Rate</h3>
<div class="child">
<p>Get TGCoin rates.</p>
<div style="background-color: #eee;padding: 10px;">
<pre>
$api = new TGNAPI($API_KEY, $SECRECT_KEY,$USERNAME,$PASSWORD);

$response =  $api->GetAllRate();
echo json_encode($response);
</pre>
</div>
</div>
<h1>Transaction</h1>
<h3 class="parent" style="text-decoration: underline;">Get New Address</h3>
<div class="child">
<p>Get new receive address.</p>
<div style="background-color: #eee;padding: 10px;">
<pre>
$api = new TGNAPI($API_KEY, $SECRECT_KEY,$USERNAME,$PASSWORD);

$response =  $api->GetNewAddress();
echo json_encode($response);
</pre>
</div>
</div>
<h3 class="parent" style="text-decoration: underline;">Send Balance</h3>
<div class="child">
<p>Send amount to other user's wallet.</p>
<div style="background-color: #eee;padding: 10px;">
<pre>
$api = new TGNAPI($API_KEY, $SECRECT_KEY,$USERNAME,$PASSWORD);

$amount = 2.1;
$response =  $api->SendBalance($SEND_ADDRESS,$amount);
echo json_encode($response);
</pre>
</div>
</div>
<h3 class="parent" style="text-decoration: underline;">Get Transaction List</h3>
<div class="child">
<p>Get transaction list of the user.</p>
<div style="background-color: #eee;padding: 10px;">
<pre>
$api = new TGNAPI($API_KEY, $SECRECT_KEY,$USERNAME,$PASSWORD);

$response =  $api->GetTransactionList();
echo json_encode($response);
</pre>
</div>
</div>
<h3 class="parent" style="text-decoration: underline;">Verify Payment</h3>
<div class="child">
<p>Verify transaction's payment status.</p>
<div style="background-color: #eee;padding: 10px;">
<pre>
$api = new TGNAPI($API_KEY, $SECRECT_KEY,$USERNAME,$PASSWORD);

$response =  $api->VerifyPaymentStatus($SEND_ADDRESS);
echo json_encode($response);
</pre>
</div>
</div>
<h1>Wallet</h1>
<h3 class="parent" style="text-decoration: underline;">Create Wallet</h3>
<div class="child">
<p>Create Wallet Account.</p>
<div style="background-color: #eee;padding: 10px;">
<pre>
$api = new TGNAPI($API_KEY, $SECRECT_KEY,$USERNAME,$PASSWORD);

$response =  $api->CreateWallet();
echo json_encode($response);
</pre>
</div>
</div>
<h3 class="parent" style="text-decoration: underline;">Get Initialize</h3>
<div class="child">
<p>Get access-token to access all authorized apis.</p>
<div style="background-color: #eee;padding: 10px;">
<pre>
$api = new TGNAPI($API_KEY, $SECRECT_KEY,$USERNAME,$PASSWORD);

$response =  $api->GetInitialize();
echo json_encode($response);
</pre>
</div>
</div>
<h3 class="parent" style="text-decoration: underline;">Get Balance</h3>
<div class="child">
<p>Get Wallet Balance.</p>
<div style="background-color: #eee;padding: 10px;">
<pre>
$api = new TGNAPI($API_KEY, $SECRECT_KEY,$USERNAME,$PASSWORD);

$response =  $api->GetBalance();
echo json_encode($response);
</pre>
</div>
</div>
