<div style="padding:10px;">
			<h1>Documentation for the TerraGreen API</h1>
			<h2>General API Information or Features</h2>
			<ul>
				<li>Implementation of all General, Market Data and Accounting Related Data.</li>
				<li>Simple handling of authentication</li>
				<li>Manage Wallet, Transaction Details, Rates And Block Details.</li>
				<li>Exception Handling.</li>
				<li>API Response in diffrent formats like JSON & XML.</li>
				<li>Unique API Key & Secret Key provided to each user.</li>
			</ul>
			<h2>Installation</h2>
			Install the library using Composer. Please read the <a href="https://getcomposer.org/doc/01-basic-usage.md" rel="nofollow">Composer Documentation</a> if you are unfamiliar with Composer or dependency managers in general.
			<div style="background-color: #eee;padding: 10px;"><pre>
	"require": {
        "php": ">=5.3.0"
    }
    </pre>
</div>
<h2>Bearer authorization token</h2>
<p>Bearer tokens allow for a more secure point of entry for developers to use the TerraGreen APIs. They are one of the core features of OAuth 2.0. Bearer tokens are a type of access token; authentication which uses bearer tokens is also known sometimes as application-only authentication or auth-only authentication.</p>
<br/>
<h3>Getting started</h3>
<p>Set Below parameters in config.php file, which you obtain from BlockChain portal.</p>
<div style="background-color: #eee;padding: 10px;">
<pre>
$API_KEY = "[API KEY]";
$SECRECT_KEY = "[SECRET KEY]";
$USERNAME = "wallet name";
$PASSWORD = "password";
$SEND_ADDRESS  = "send address";
</pre>
</div>
<p>Add Below Config Files for all operations</p>
<div style="background-color: #eee;padding: 10px;">
<pre>					
require_once 'vendor/autoload.php'; // Autoload files using Composer autoload
require_once 'vendor/config.php'; // Autoload data using config file
require_once 'src/TerraGreen/TGNAPI.php'; // Class Api File
</pre>					
</div>
<h1>Block</h1>
<h3 class="parent" style="text-decoration: underline;">Get Block</h3>
<div class="child">
<p>Get Single Block Details.</p>
<div style="background-color: #eee;padding: 10px;">
<pre>
$api = new TGNAPI($API_KEY, $SECRECT_KEY,$USERNAME,$PASSWORD);

$BlockId = 375808;
$response =  $api->GetBlockDetails($BlockId);
echo json_encode($response);
</pre>
</div>
</div>
<h3 class="parent" style="text-decoration: underline;">Get Block</h3>
<div class="child">
<p>Get Block Details with starting and ending offset.</p>
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
<p>Get Latest Block Details.</p>
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
<p>Get All TGCoin's current rates.</p>
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
<p>Send amount to other user's wallet.</p>
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
<p>Verify Payment Status.</p>
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
<p>Create New Wallet Account.</p>
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
