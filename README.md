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
			<hr/>
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
<p>Set Below parameters in \src\TerraGreen\config.php file, which you obtain from BlockChain portal.</p>
<div style="background-color: #eee;padding: 10px;">
	<p>$API_KEY = "[API KEY]";</p>
	<p>$SECRECT_KEY = "[SECRET KEY]";</p>
	<p>$USERNAME = "wallet name";</p>
	<p>$PASSWORD = "password";</p>
	<p>$SEND_ADDRESS  = "send address";</p>
</div>
<br/><br/>
<p>Add Below Config Files in every pages</p>
<div style="background-color: #eee;padding: 10px;">
	<p>require_once 'vendor/autoload.php';</p>
	<p>require_once 'vendor/config.php';</p>
	<p>require_once 'src/TerraGreen/TGNAPI.php';</p>
</div>
