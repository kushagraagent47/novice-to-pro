<?php
	require_once "config.php";
	if(!session_id()) {
		session_start();
	}
	if (isset($_SESSION['access_token'])) {
		header('Location: index.php');
		exit();
	}

	$redirectURL = "https://novicetopro.in/fb_signup/fb-callback.php";
	$permissions = ['email'];
	$loginURL = $helper->getLoginUrl($redirectURL, $permissions);
?>
<!doctype html>
<html lang="en">
<body>
	<input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Log In With Facebook">
</body>
</html>
