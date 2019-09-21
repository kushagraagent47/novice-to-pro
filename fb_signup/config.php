<?php
	session_start();

	require_once "Facebook/autoload.php";

	$FB = new \Facebook\Facebook([
		'app_id' => '300794067519961',
		'app_secret' => '746546e376faacadd0aad7d1774df801',
		'default_graph_version' => 'v3.2'
	]);

	$helper = $FB->getRedirectLoginHelper();
?>
