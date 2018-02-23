<?php

$QryConfig = "SELECT * FROM site_config WHERE config_id = 1";
$RsConfig = mysql_query($QryConfig) or die(mysql_error());
if (mysql_num_rows($RsConfig)>=1){
	$rowConfig=mysql_fetch_object($RsConfig);
	define("SITE_NAME", $rowConfig->config_sitename);
	define("SITE_TITLE", $rowConfig->config_sitetitle);
	define("SITE_EMAIL_CONTACT", $rowConfig->config_email_contact);
	define("SITE_EMAIL_RETAILER", $rowConfig->config_email_retailer);
	define("SITE_EMAIL_ORDER", $rowConfig->config_email_order);
	define("SITE_META_KEYWORDS", $rowConfig->config_metakey);
	define("SITE_META_KEYWORDS_fr", $rowConfig->config_metakey_fr);
	define("SITE_META_DESCRIPTION", $rowConfig->config_metades);
	define("SITE_META_DESCRIPTION_fr", $rowConfig->config_metades_fr);
	if(@$_SESSION['lang_id'] == 2) {
		define("SITE_PRICE_SYMBOL", $rowConfig->config_euro_symbol);
		define("SITE_CONVERSION_RATE", 1);
		define("SITE_PRICE_SYMBOL_FINALIZE_ORDER", "&euro;");
		define("SITE_PRICE_SYMBOL_PAYPAL", "EUR");
		define("SITE_PRICE_PAYPAL_BUTTON_ID", "6XACFJJ7BEAAL");
	}
	else {
		define("SITE_PRICE_SYMBOL", $rowConfig->config_dollor_symbol);
		define("SITE_CONVERSION_RATE", $rowConfig->config_conversion_rate);
		define("SITE_PRICE_SYMBOL_FINALIZE_ORDER", "$");
		define("SITE_PRICE_SYMBOL_PAYPAL", "USD");
		define("SITE_PRICE_PAYPAL_BUTTON_ID", "L93Y2J8U5SUAW");
	}
	$freeShippingAmount = $rowConfig->config_free_shipping;
	$ShippingCost = $rowConfig->config_shipping_cost;
}
else{
	define("SITE_NAME", "Barthelemy Rose Boutique");
	define("SITE_TITLE", "Barthelemy Rose Boutique");
	define("SITE_EMAIL_CONTACT", "barthelemyrose@hotmail.com");
	define("SITE_EMAIL_RETAILER", "barthelemyrose@hotmail.com");
	define("SITE_EMAIL_ORDER", "barthelemyrose@hotmail.com");
	define("SITE_META_KEYWORDS", "exotique et chic,hippie, tuniques, cabas, pochettes, st Barth, stbarth, st martin,stmaarten");
	define("SITE_META_KEYWORDS_fr", "exotique et chic,hippie, tuniques, cabas, pochettes, st Barth, stbarth, st martin,stmaarten");
	define("SITE_META_DESCRIPTION", "Voici les differents shops of vous retrouverez les collections : Christmas Market - Courchevel. Lili Rose Boutique - Cannes et Plage Morea St Tropez");
	define("SITE_META_DESCRIPTION_fr", "Voici les differents shops of vous retrouverez les collections : Christmas Market - Courchevel. Lili Rose Boutique - Cannes et Plage Morea St Tropez");
	$freeShippingAmount = '150';
	$ShippingCost = '10.00';
	define("SITE_PRICE_SYMBOL", "€");
	define("SITE_CONVERSION_RATE", 1);
	define("SITE_PRICE_SYMBOL_FINALIZE_ORDER", "&euro;");
	define("SITE_PRICE_SYMBOL_PAYPAL", "EUR");
	define("SITE_PRICE_PAYPAL_BUTTON_ID", "6XACFJJ7BEAAL");
}

if($rowConfig->status_id == 0){
	include("not_available.php");
	die();
}

// Local
$apiURL = "http://localhost:81/beacon/api/index.php?";
// Live
$apiURL = "http://api.beaconwatcher.com/index.php?";

$_SESSION['sessID'] = session_id();
?>