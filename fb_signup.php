<?php
	require_once "fb_signup/config.php";
	if (isset($_SESSION['access_token'])) {
        header('Location: fb_signup/index.php');
        exit();
	}

	$redirectURL = "https://novicetopro.in/fb_signup/fb-callback.php";
	$permissions = ['email'];
    $loginURL = $helper->getLoginUrl($redirectURL, $permissions);

?>
<html>
<body>
<?php echo ("<script>location.href='$loginURL'</script>");
?>
</body>
<html>
