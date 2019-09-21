<?php 
include 'include.php';
if ($_SESSION['username'] != ""){
	header("Location: newsfeed.php"); 
}
?>
<html lang="en">

<head>
	<!-- Hello world -->



	<title>Novicetopro</title>
	<link rel="manifest" href="manifest.json">

<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="application-name" content="NTOPRO">
<meta name="apple-mobile-web-app-title" content="NTOPRO">
<meta name="theme-color" content="#FF5E3A">
<meta name="msapplication-navbutton-color" content="#FF5E3A">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="msapplication-starturl" content="https://novicetopro.in">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="icon" sizes="512x512" href="https://novicetopro.in/andr.png">
<link rel="apple-touch-icon" sizes="512x512" href="https://novicetopro.in/andr.png">	<!-- Required meta tags always come first -->

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta http-equiv="x-ua-compatible" content="ie=edge">




	<!-- Bootstrap CSS -->

	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-reboot.css">

	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap.css">

	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-grid.css">

	<!--Bootstrap Tour CSS -->

	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/css/bootstrap-tour-standalone.min.css" rel="stylesheet" />



	<!-- END -->

	<!-- Theme Styles CSS -->

	<link rel="stylesheet" type="text/css" href="css/theme-styles.css">
<style>

.btn{color:#fff;margin-bottom:15px;position:relative}.btn:hover{opacity:.8;color:#fff}.btn:focus{box-shadow:none}.btn:disabled{background-color:#9a9fbf;border-color:#9a9fbf}button:hover{cursor:pointer}.btn-icon-left i{font-size:12px;margin-right:10px}.btn-lg i{font-size:16px}@media (max-width:1080px){.btn-lg{padding:1rem}}.btn-md{padding:1rem 3.5rem;font-size:.75rem;border-radius:.3rem}@media (max-width:1080px){.btn-md{padding:.6rem .5rem}}.btn-md-2{padding:.8rem 2.1rem;font-size:.688rem;border-radius:.3rem}@media (max-width:1080px){.btn-md-2{padding:.6rem .5rem}}.btn-control{border-radius:100%;width:50px;height:50px;line-height:54px;padding:0;fill:#fff;font-size:20px}.btn-control:hover{opacity:1}.btn-control>i{font-size:20px}.btn-control.has-i{font-size:unset}.btn-control.has-i>i{font-size:15px}.btn-more{background-color:#ccd1e0;margin:40px auto;text-align:center;display:block;line-height:40px}.btn-more:hover{fill:#ff5e3a}.btn-border{border:solid 2px}.btn-primary:hover{background-color:#ff763a;border-color:#ff763a;opacity:1}.btn-purple{background-color:#7c5ac2}.icon-add{position:relative;display:inline-block;margin-right:12px;vertical-align:middle}.icon-add:after{content:'\f067';display:block;position:absolute;right:-4px;top:-4px;color:inherit;font-size:7px;font-family:FontAwesome}label.control-label{color:#888da8}.form-control,input{color:#515365;line-height:inherit;font-size:.875rem}.label-floating .form-control,.label-floating input,.label-floating select{padding:1.3rem 1.1rem .4rem;line-height:1.8}.label-floating.with-icon .form-control,.label-floating.with-icon input{padding-left:70px}select.form-control{padding-left:.875rem}.form-group.with-icon i{display:block;position:absolute;left:0;top:0;height:100%;width:50px;text-align:center;line-height:3.5rem;border-right:1px solid #e6ecf5;font-size:20px}.form-group.with-icon input{padding-left:70px}.form-group.with-button button{display:block;position:absolute;right:0;top:0;height:100%;width:35px;text-align:center;line-height:100%;color:#fff;fill:#fff;background-color:#d7d9e5;border:none}.form-group.with-button input{padding-right:50px;padding-left:15px}.label-floating.with-icon label.control-label,.label-placeholder.with-icon label.control-label{left:70px}@keyframes rippleOn{0%{opacity:0}50%{opacity:.2}100%{opacity:0}}@keyframes rippleOff{0%{opacity:0}50%{opacity:.2}100%{opacity:0}}.checkbox{margin-bottom:1rem}.checkbox label{cursor:pointer;padding-left:0;margin-bottom:0}.checkbox input[type=checkbox]{opacity:0;position:absolute;margin:0;z-index:-1;width:0;height:0;overflow:hidden;left:0;pointer-events:none}.checkbox .checkbox-material{vertical-align:middle;position:relative;top:1px;padding-right:5px;display:inline-block}.checkbox .checkbox-material:before{display:block;position:absolute;left:0;content:"";background-color:rgba(0,0,0,.84);height:20px;width:20px;border-radius:100%;z-index:1;opacity:0;margin:0;top:0;-webkit-transform:scale3d(2.3,2.3,1);-moz-transform:scale3d(2.3,2.3,1);-o-transform:scale3d(2.3,2.3,1);-ms-transform:scale3d(2.3,2.3,1);transform:scale3d(2.3,2.3,1)}.checkbox .checkbox-material .check{position:relative;display:inline-block;width:20px;height:20px;border:1px solid #e6ecf5;overflow:hidden;z-index:1}.checkbox .checkbox-material .check:before{position:absolute;content:"";transform:rotate(45deg);display:block;margin-top:-3px;margin-left:7px;width:0;height:0;background:red;box-shadow:0 0 0 0 inset;-webkit-animation:checkbox-off .3s forwards;-moz-animation:checkbox-off .3s forwards;-o-animation:checkbox-off .3s forwards;-ms-animation:checkbox-off .3s forwards;animation:checkbox-off .3s forwards}.checkbox input[type=checkbox]:focus+.checkbox-material .check:after{opacity:.2}.checkbox input[type=checkbox]:checked+.checkbox-material .check{background:#ff5e3a}.checkbox input[type=checkbox]:checked+.checkbox-material .check:before{color:#fff;box-shadow:0 0 0 10px,10px -10px 0 10px,32px 0 0 20px,0 32px 0 20px,-5px 5px 0 10px,20px -12px 0 11px;-webkit-animation:checkbox-on .3s forwards;-moz-animation:checkbox-on .3s forwards;-o-animation:checkbox-on .3s forwards;-ms-animation:checkbox-on .3s forwards;animation:checkbox-on .3s forwards}.checkbox input[type=checkbox][disabled]~.checkbox-material .check{opacity:.5}.checkbox input[type=checkbox][disabled]~.checkbox-material .check{border-color:#000;opacity:.26}.checkbox input[type=checkbox][disabled]+.checkbox-material .check:after{background-color:rgba(0,0,0,.87);transform:rotate(-45deg)}@keyframes checkbox-on{0%{box-shadow:0 0 0 10px,10px -10px 0 10px,32px 0 0 20px,0 32px 0 20px,-5px 5px 0 10px,15px 2px 0 11px}50%{box-shadow:0 0 0 10px,10px -10px 0 10px,32px 0 0 20px,0 32px 0 20px,-5px 5px 0 10px,20px 2px 0 11px}100%{box-shadow:0 0 0 10px,10px -10px 0 10px,32px 0 0 20px,0 32px 0 20px,-5px 5px 0 10px,20px -12px 0 11px}}@keyframes rippleOn{0%{opacity:0}50%{opacity:.2}100%{opacity:0}}@keyframes rippleOff{0%{opacity:0}50%{opacity:.2}100%{opacity:0}}.logo{background-color:#ff5e3a;display:flex;align-items:center;color:#fff;padding:15px}.logo img{float:left;transition:all .3s ease}.logo .logo-title{text-transform:uppercase;font-weight:700;margin:0;color:inherit;transition:all .3s ease}.logo:hover{color:#fff}.left-menu{padding:20px 0}.left-menu .left-menu-title{transition:all .3s ease;font-weight:700}.left-menu .left-menu-icon{fill:#9a9fbf;transition:all .3s ease;margin-right:25px}.left-menu svg{width:20px}.left-menu a{padding:16px 0 16px 25px;display:flex;align-items:center;color:#9a9fbf}.left-menu a:hover{color:#515365}.left-menu a:hover svg{fill:#ff5e3a}.more-icons{position:absolute;right:-100%;opacity:0;visibility:hidden;background-color:#fff;transition:all .3s ease;padding:10px 25px 10px 10px;width:160px;bottom:-17px}.more-icons li{display:inline-block;fill:#c2c5d9;padding:0}.more-icons li:hover{fill:#9a9fbf}.more-icons li+li{margin-left:20px}.more-icons svg{width:22px;height:20px}@keyframes skills-animated{0%{width:0}}@keyframes skills-animated-opacity{100%{opacity:1}}.more{cursor:pointer;position:relative;transition:all .3s ease;color:#888da8;fill:#c0c4d8}.landing-content{color:#fff;margin-bottom:30px}.landing-content>:first-child{font-weight:300}.landing-content>:last-child{margin-bottom:0}.landing-content>*{color:inherit;margin-bottom:45px}.main-header.main-landing{width:100%;max-width:100%}.main-header.main-landing .logo{text-align:center;display:block;background-color:transparent;font-size:7px;margin-bottom:60px}.main-header.main-landing .logo img{float:none;display:inline-block;margin:0 auto 10px}.main-header.main-landing .logo .logo-title{font-size:18px;font-weight:700}.main-header.main-landing h1{font-size:36px;font-weight:300;margin-bottom:40px}.main-header.main-landing p{margin-bottom:60px}.landing-item{text-align:center;margin-bottom:50px}.landing-item .title{font-weight:700}.landing-item:hover .btn{opacity:1}.landing-main-content{text-align:center;margin:80px 0}.landing-main-content svg{fill:#ff5e3a;margin-bottom:30px}.landing-main-content .btn{margin:40px 0}.landing-main-content .title{font-weight:300;margin-bottom:30px}.registration-login-form{border:1px solid #e6ecf5;border-radius:0 5px 5px 0;background-color:#fff;overflow:hidden;position:relative;padding-left:71px;margin-bottom:20px;min-height:655px}.registration-login-form .nav-tabs{float:left;display:block;height:100%;border:none;position:absolute;top:0;bottom:0;left:0}.registration-login-form .nav-item{margin-bottom:0;height:50%;display:table}.registration-login-form .nav-item:last-child .nav-link{border-bottom:0}.registration-login-form .nav-link{border-radius:0;border:none;border-bottom:1px solid #e6ecf5;border-right:1px solid #e6ecf5;padding:25px;color:#c0c4d8;fill:#c0c4d8;background-color:#fafbfd;height:100%;display:table-cell;vertical-align:middle}.registration-login-form .nav-link.active{fill:#ff5e3a;background-color:#fff;border-color:#e6ecf5}.registration-login-form .nav-link svg{width:21px;height:21px}.registration-login-form .tab-content{overflow:hidden}.registration-login-form .content{padding:35px 25px}.registration-login-form .title{padding:25px;border-bottom:1px solid #e6ecf5;margin-bottom:0}.registration-login-form p{margin-bottom:0;font-size:13px}.registration-login-form .remember{margin:35px 0 25px}.remember{margin-bottom:1rem}.remember .checkbox{display:inline-block;margin-bottom:0}.remember a{line-height:2}.remember .forgot{float:right;color:#888da8}.or{position:relative;width:100%;height:1px;margin:1rem 0 2rem 0;background-color:#e6ecf5}.or:after{content:'OR';display:block;position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);background-color:#fff;padding:0 25px;font-size:10px;z-index:5}@media (max-width:1023px){.registration-login-form{padding-top:71px;padding-left:0}.registration-login-form .nav-tabs{bottom:auto;height:auto;width:100%}.registration-login-form .nav-item{height:100%;display:block;width:50%;float:left;text-align:center}.registration-login-form .nav-link{display:block}.registration-login-form .nav-item:last-child .nav-link{border-bottom:1px solid #e6ecf5}}.main-header{padding:70px 0 190px 0;max-width:calc(100% - 140px);margin:0 auto 30px;position:relative;background-position:50% 50%}@keyframes sideupscroll{0%{transform:translate3D(0,0,0)}50%{transform:translate3D(-50%,0,0)}100%{transform:translate3D(-100%,0,0)}}.bg-account:before{background-image:url(../img/top-header3.png)}.bg-badges:before{background-image:url(../img/top-header4.png)}.bg-group:before{background-image:url(../img/bg-group.png)}.bg-music:before{background-image:url(../img/top-header7.png)}.bg-landing:before{background-image:url(../img/landing-bg.jpg)}.main-header-content{color:#fff;text-align:center}.main-header-content>*{color:inherit}.main-header-content>:first-child{font-weight:300;margin-bottom:20px}.main-header-content p{font-weight:400;margin-bottom:0}@media (max-width:768px){.main-header{max-width:100%}}.your-profile-menu{padding:12px 25px;border-bottom:1px solid #e6ecf5;margin-bottom:0}.your-profile-menu li a{font-size:11px;padding:12px 0;color:#888da8;display:block;font-weight:700}.your-profile-menu li a:hover{color:#515365}.icon-status{width:6px;height:6px;border-radius:100%;display:inline-block;margin-right:8px}body{overflow-x:hidden}body:before{content:'';display:block;width:100%;height:100%;position:fixed;top:0;left:0;background:rgba(43,45,59,.9);opacity:0;transition:opacity .3s ease;z-index:-999}.icon-close{position:absolute;top:-25px;right:-25px;color:#888da8;fill:#888da8}.icon-close:hover{color:#ff5e3a;fill:#ff5e3a}.icon-close svg{width:18px;height:18px}.add-option{display:block;margin:30px 0;color:#888da8}.add-option svg{fill:#888da8;margin-right:12px;width:14px;height:14px}.add-option span{line-height:1}@media (max-width:1080px){.icon-close{right:50%;margin-right:-9px}}@media (max-width:768px){.icon-close{right:50%;margin-right:-9px}}@media (max-width:480px){.remember a{float:none;display:block}.page-link{padding:10px}}.modal.show .modal-dialog{display:block!important}.all-users{line-height:34px;text-align:center;color:#fff;background-color:#ff5e3a;font-size:10px;font-weight:800}.all-users a{color:inherit;display:block}.post{position:relative;padding:25px;border-bottom:1px solid #e6ecf5}.post p{margin:25px 0}.post .btn{margin-bottom:25px}.post .h1,.post .h2,.post .h3,.post .h4,.post .h5,.post .h6,.post h1,.post h2,.post h3,.post h4,.post h5,.post h6{font-weight:300;display:inline-block}.post .h1+p,.post .h2+p,.post .h3+p,.post .h4+p,.post .h5+p,.post .h6+p,.post h1+p,.post h2+p,.post h3+p,.post h4+p,.post h5+p,.post h6+p{margin-top:10px}.post-add-icon{fill:#c2c5d9;color:#c2c5d9}.post-add-icon>*{vertical-align:middle}.post-add-icon img,.post-add-icon svg{margin-right:8px;width:20px;height:18px}.post-add-icon .olymp-share-icon{width:26px;height:21px}.post-add-icon:hover{fill:#ff5e3a;color:#ff5e3a}.post-add-icon:hover span{color:#ff5e3a}.post-add-icon:active,.post-add-icon:focus{fill:#c2c5d9;color:#c2c5d9}.post-control-button .btn-control{display:block;margin-bottom:6px;margin-right:0;background-color:#9a9fbf;width:34px;height:34px;line-height:36px}.post-control-button .btn-control.bg-facebook{background-color:#2f5b9d}.post-control-button .btn-control.bg-facebook:hover{background-color:#2f5b9d}.post-control-button .btn-control.bg-twitter{background-color:#38bff1}.post-control-button .btn-control.bg-twitter:hover{background-color:#38bff1}.post-control-button .btn-control svg{width:18px;height:18px}.post-control-button .btn-control .olymp-share-icon{width:24px}.post-control-button .btn-control:hover{background-color:#ff5e3a}.empty-post{height:600px;background-color:#dce1eb;opacity:.5}.empty-post-content{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);text-align:center}.empty-post-content .title{font-size:16px;font-weight:700;color:#515365}.empty-post-content span{font-size:11px}@media (max-width:768px){.post-control-button .btn-control{display:inline-block}}.blog-post .post-content{padding:20px 25px}.blog-post .post-title{font-weight:300;display:block;margin-bottom:14px}.blog-post .post-title:hover{color:#ff5e3a}.blog-post .post__date{display:inline-block}.main-header-post img{width:100%}.post-date-wrap svg{height:22px;fill:#9a9fbf;margin-right:12px}.post-date-wrap .post-date{text-align:left;font-size:12px}.post-date-wrap .post-date span{font-size:11px;display:block}.post-date-wrap .date{margin-bottom:0;font-size:12px}@media (max-width:768px){.blog-post .post-control-button .btn-control{display:block}}.m-t-50{margin-top:50px}.full-width{width:100%}.full-height{height:100%}.display-flex{display:flex;align-items:center}.bg-primary{background-color:#ff5e3a}.bg-purple{background-color:#7c5ac2}.bg-facebook{background-color:#2f5b9d}.bg-twitter{background-color:#38bff1}.c-white{color:#fff}.c-purple{color:#7c5ac2}.c-facebook{color:#2f5b9d}.c-twitter{color:#38bff1}.c-spotify{color:#1ed760}.col-3-width{width:33.33%}.col-4-width{width:25%}@media (max-width:1200px){.col-4-width{width:33%}}@media (max-width:840px){.col-3-width{width:50%}.col-4-width{width:50%}}@media (max-width:480px){.col-3-width{width:100%}.col-4-width{width:100%}}

</style>
<style>

/*!
 *  Font Awesome 4.5.0 by @davegandy - http://fontawesome.io - @fontawesome
 *  License - http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)
 */@font-face{font-family:FontAwesome;src:url(../fonts/fontawesome-webfont.eot?v=4.5.0);src:url(../fonts/fontawesome-webfont.eot?#iefix&v=4.5.0) format("embedded-opentype"),url(../fonts/fontawesome-webfont.woff2?v=4.5.0) format("woff2"),url(../fonts/fontawesome-webfont.woff?v=4.5.0) format("woff"),url(../fonts/fontawesome-webfont.ttf?v=4.5.0) format("truetype"),url(../fonts/fontawesome-webfont.svg?v=4.5.0#fontawesomeregular) format("svg");font-weight:400;font-style:normal}.fa{display:inline-block;font:normal normal normal 14px/1 FontAwesome;font-size:inherit;text-rendering:auto;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.fa-lg{font-size:1.33333333em;line-height:.75em;vertical-align:-15%}.fa-2x{font-size:2em}.fa-3x{font-size:3em}.fa-4x{font-size:4em}.fa-5x{font-size:5em}.fa-ul{padding-left:0;margin-left:2.14285714em;list-style-type:none}.fa-ul>li{position:relative}.fa-li{position:absolute;left:-2.14285714em;width:2.14285714em;top:.14285714em;text-align:center}.fa-li.fa-lg{left:-1.85714286em}.fa-border{padding:.2em .25em .15em;border:solid .08em #eee;border-radius:.1em}@-webkit-keyframes fa-spin{0%{-webkit-transform:rotate(0);transform:rotate(0)}100%{-webkit-transform:rotate(359deg);transform:rotate(359deg)}}@keyframes fa-spin{0%{-webkit-transform:rotate(0);transform:rotate(0)}100%{-webkit-transform:rotate(359deg);transform:rotate(359deg)}}.fa-music:before{content:"\f001"}.fa-user:before{content:"\f007"}.fa-check:before{content:"\f00c"}.fa-close:before,.fa-times:before{content:"\f00d"}.fa-home:before{content:"\f015"}.fa-tags:before{content:"\f02c"}.fa-text-height:before{content:"\f034"}.fa-text-width:before{content:"\f035"}.fa-share:before{content:"\f064"}.fa-twitter:before{content:"\f099"}.fa-facebook:before{content:"\f09a"}.fa-group:before,.fa-users:before{content:"\f0c0"}.fa-link:before{content:"\f0c1"}.fa-user-md:before{content:"\f0f0"}.fa-mobile:before{content:"\f10b"}.fa-html5:before{content:"\f13b"}.fa-css3:before{content:"\f13c"}.fa-toggle-up:before{content:"\f151"}.fa-file:before{content:"\f15b"}.fa-file-text:before{content:"\f15c"}.fa-apple:before{content:"\f179"}.fa-toggle-left:before{content:"\f191"}.fa-try:before{content:"\f195"}.fa-google:before{content:"\f1a0"}.fa-spotify:before{content:"\f1bc"}.fa-support:before{content:"\f1cd"}.fa-send:before{content:"\f1d8"}.fa-header:before{content:"\f1dc"}.fa-share-alt:before{content:"\f1e0"}.fa-at:before{content:"\f1fa"}.fa-user-times:before{content:"\f235"}.fa-registered:before{content:"\f25d"}.fa-edge:before{content:"\f282"}@font-face{font-family:Roboto;font-style:normal;font-weight:400;src:local("Roboto"),local("Roboto-Regular"),url(https://fonts.gstatic.com/s/roboto/v15/CWB0XYA8bzo0kSThX0UTuA.woff2) format("woff2");unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2212,U+2215}

</style>


	<!-- Styles for plugins -->

	<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">

	<link rel="stylesheet" type="text/css" href="css/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">





</head>



<body class="landing-page">

	<?php include 'include.php'; ?>

	<?php

	session_start();

	//Signup Backend



	if (isset($_POST['submit'])) {





		$email = $conn->escape_string($_POST['email']);

		$pass = md5($_POST['password']);

		$password = $conn->escape_string($pass);

		$result = $conn->query("SELECT * FROM users WHERE email='$email'");

		$result1 = $conn->query("SELECT * FROM users WHERE password='$password'");



		if ($result->num_rows == 0) {

			?>

			<div class="modal" id="myModal" tabindex="-1" role="dialog">

				<div class="modal-dialog" role="document">

					<div class="modal-content">

						<div class="modal-header">

							<h5 class="modal-title"><b>Username or password is incorrect<b></h5>

							<button type="button" class="close" data-dismiss="modal" aria-label="Close">

								<span aria-hidden="true">&times;</span>

						</div>

						<div class="modal-body">

							<p></p>

						</div>

						<div class="modal-footer">

							<button type="button" class="btn btn-primary" onClick="document.location.href='index.php'">Try again</button>

						</div>

					</div>

				</div>

			</div>

		<?php

	}

	if ($result1->num_rows == 0) {

		?>

			<div class="modal" id="myModal" tabindex="-1" role="dialog">

				<div class="modal-dialog" role="document">

					<div class="modal-content">

						<div class="modal-header">

							<h5 class="modal-title"><b>Username or password is incorrect<b></h5>

							<button type="button" class="close" data-dismiss="modal" aria-label="Close">

								<span aria-hidden="true">&times;</span>

						</div>

						<div class="modal-body">

							<p></p>

						</div>

						<div class="modal-footer">

							<button type="button" class="btn btn-primary" onClick="document.location.href='index.php'">Back to home</button>

						</div>

					</div>

				</div>

			</div>

		<?php

	} else {



		$users = $result->fetch_assoc();

		if (md5($_POST['password']) == $users['password']) {

			$_SESSION['user_id'] = $users['user_id'];

			$_SESSION['name'] = $users['name'];

			$_SESSION['username'] = $users['username'];

			$_SESSION['cateogary'] = $users['cateogary'];

			$_SESSION['email'] = $users['email'];

			$_SESSION['hash'] = $users['hash'];

			$_SESSION['verified'] = $users['verified'];

			$_SESSION['moderator'] = $users['moderator'];

			$_SESSION['logged_in'] = true;



			?>

				<script type="text/javascript">
					window.location.href = 'newsfeed.php';
				</script>

			<?php

		}
	}
}





if (isset($_POST['register'])) {





	$name = $_POST['first_name'] . " " . $_POST['last_name'];

	$email = $_POST['email'];

	$username = $_POST['username'];

	$status = "novice";

	$password = md5($_POST['password']);

	$hash =  md5(rand(0, 1000));

	$result = $conn->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

	$user_result = $conn->query("SELECT * FROM users WHERE username='$username'") or die($mysqli->error());





	if ($result->num_rows > 0) {

		?>

			<div class="modal" id="myModal" tabindex="-1" role="dialog">

				<div class="modal-dialog" role="document">

					<div class="modal-content">

						<div class="modal-header">

							<h5 class="modal-title"><b>user with this email already exists<b></h5>

							<button type="button" class="close" data-dismiss="modal" aria-label="Close">

								<span aria-hidden="true">&times;</span>

						</div>

						<div class="modal-body">

							<p></p>

						</div>

						<div class="modal-footer">

							<button type="button" class="btn btn-primary" onClick="document.location.href='index.php'">Try again</button>

						</div>

					</div>

				</div>

			</div>

		<?php

	} else if ($user_result->num_rows > 0) {



		?>

			<div class="modal" id="myModal" tabindex="-1" role="dialog">

				<div class="modal-dialog" role="document">

					<div class="modal-content">

						<div class="modal-header">

							<h5 class="modal-title"><b>Username in use<b></h5>

							<button type="button" class="close" data-dismiss="modal" aria-label="Close">

								<span aria-hidden="true">&times;</span>

						</div>

						<div class="modal-body">

							<p></p>

						</div>

						<div class="modal-footer">

							<button type="button" class="btn btn-primary" onClick="document.location.href='index.php'">Try again</button>

						</div>

					</div>

				</div>

			</div>

		<?php



	} else {

		$current_time = date('Y-m-d H:i:s');

		$sql = "INSERT INTO users (name, username, email, cateogary , password, hash, last_activity) "

			. "VALUES ('$name','$username','$email', '$status', '$password','$hash','$current_time')";



		if ($conn->query($sql)) {



			$_SESSION["name"] = $name;

			$_SESSION["username"] = $username;

			$_SESSION["email"] = $email;

			$_SESSION["status"] = $status;

$_SESSION["hash"] = $hash;

			$_SESSION['logged_in'] = true;

			$_SESSION['first_time'] = 0;

			$to      = $email; // Send email to our user

			$subject = 'Novice | Verification'; // Give the email a subject

			$message = '



												Thanks for signing up!

												Your account has been created,

												Please click this link to activate your account:

												http://www.novicetopro.com/verify.php?email=' . $email . '&hash=' . $hash . '



												'; // Our message above including the link



			$headers = 'From:noreply@novicetopro.in' . "\r\n"; // Set from headers

			mail($to, $subject, $message, $headers); // Send our email



			?>

				<script type="text/javascript">
					window.location.href = 'newsfeed.php';
				</script>

			<?php

		} else {

			echo "nai hua";
		}
	}
}

//Login backend

?>





	<div class="content-bg-wrap">

		<div class="content-bg"></div>

	</div>





	<!-- Landing Header -->



	<div class="container">

		<div class="row">

			<div class="col-xl-12 col-lg-12 col-md-12">

				<div id="site-header-landing" class="header-landing">

					<a href="index.php" class="logo">

						<img src="img/logo.png" alt="Olympus">

						<h5 class="logo-title">NOVICETOPRO</h5>

					</a>



					<ul class="profile-menu"">

														<li>

															<a href=" #">About Us</a>

						</li>

						<li>

							<a href="#">Careers</a>

						</li>

						<li>

							<a href="#">FAQS</a>

						</li>

						<li>

							<a href="#">Help & Support</a>

						</li>

						<li>

							<a href="#" class="js-expanded-menu">

								<svg class="olymp-menu-icon">
									<use xlink:href="icons1/icons.svg#olymp-menu-icon"></use>
								</svg>

								<svg class="olymp-close-icon">
									<use xlink:href="icons1/icons.svg#olymp-close-icon"></use>
								</svg>

							</a>

						</li>

					</ul>

				</div>

			</div>

		</div>

	</div>



	<!-- ... end Landing Header -->



	<!-- Login-Registration Form  -->



	<div class="container">

		<div class="row display-flex">

			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">

				<div class="landing-content">

					<h1>Welcome to NOVICETOPRO</h1>

					<p>Share your

						thoughts, write blog posts, show your favourite music via Spotify, earn badges and much more!

					</p>

					<a href="#" class="btn btn-md btn-border c-white">Register Now!</a>

				</div>

			</div>



			<div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-xs-12">

				<div class="registration-login-form">

					<!-- Nav tabs -->

					<ul class="nav nav-tabs" role="tablist">

						<li class="nav-item">

							<a class="nav-link active" data-toggle="tab" href="#home" role="tab">

								<svg class="olymp-login-icon">
									<use xlink:href="icons1/icons.svg#olymp-login-icon"></use>
								</svg>

							</a>

						</li>

						<li class="nav-item">

							<a class="nav-link" data-toggle="tab" href="#profile" role="tab">

								<svg class="olymp-register-icon">
									<use xlink:href="icons1/icons.svg#olymp-register-icon"></use>
								</svg>

							</a>

						</li>

					</ul>



					<!-- Tab panes -->

					<div id="step1" class="tab-content">



						<div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">

							<div class="title h6">Register to NoviceToPro</div>

							<form class="content" action="index.php" method="post">



								<div class="row">

									<div class="col-lg-6 col-md-6">

										<div class="form-group label-floating is-empty">

											<label class="control-label">First Name</label>

											<input class="form-control" placeholder="" name="first_name" type="text">

										</div>

									</div>

									<div class="col-lg-6 col-md-6">

										<div class="form-group label-floating is-empty">

											<label class="control-label">Last Name</label>

											<input class="form-control" placeholder="" name="last_name" type="text">

										</div>

									</div>

									<div class="col-xl-12 col-lg-12 col-md-12">



										<div class="form-group label-floating is-empty">

											<label class="control-label">Your Email</label>

											<input class="form-control" placeholder="" name="email" type="email">

										</div>

										<div class="form-group label-floating is-empty">

											<label class="control-label">Your username</label>

											<input class="form-control" placeholder="" name="username" type="text">

										</div>

										<div class="form-group label-floating is-empty">

											<label class="control-label">Your Password</label>

											<input class="form-control" placeholder="" name="password" type="password">

										</div>






										<div class="remember">

											<div class="checkbox">

												<label>

													<input name="optionsCheckboxes" type="checkbox" required>

													I accept the <a href="https://termsandconditionsgenerator.com/live.php?token=a6gKxurEBYGcO0XJWgVf06Z9wsslQ2Ry">Terms and Conditions</a> of the website

												</label>

											</div>

										</div>

										<button type="submit" class="btn btn-purple btn-lg full-width" name="register">Complete Registration!</button>

										<div class="or"></div>

							</form>

							<form action="fb_signup.php" method="post">



								<a href="fb_signup.php" class="btn btn-lg bg-facebook full-width btn-icon-left">
										<div class="g-signin2" data-onsuccess="onSignIn"></div>

									</i>Signup with Facebook</a>



								<a href="twitter_signup.php" class="btn btn-lg bg-twitter full-width btn-icon-left"></i>Signup with Twitter</a>



						</div>

					</div>

					</form>

				</div>



				<div class="tab-pane" id="profile" role="tabpanel" data-mh="log-tab">

					<div class="title h6">Login to your Account</div>

					<form class="content" action="index.php" method="post">

						<div class="row">

							<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">

								<div class="form-group label-floating is-empty">

									<label class="control-label">Your Email</label>

									<input class="form-control" placeholder="" name="email" type="email">

								</div>

								<div class="form-group label-floating is-empty">

									<label class="control-label">Your Password</label>

									<input class="form-control" placeholder="" name="password" type="password">

								</div>



								<div class="remember">



									<div class="checkbox">

										<label>

											<input name="optionsCheckboxes" type="checkbox">

											Remember Me

										</label>

									</div>

									<a href="#" class="forgot" data-toggle="modal" data-target="#myModal">Forgot Password?</a>

								</div>
								<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Forgot Password?</h4>
        </div>
		<form>
		<div class="form-group">
  <input type="text" class="form-control" placeholder="Enter Your Email" id="usr">
</div>
<button type="button" class="btn btn-primary">Send Reset Mail</button>
</form>

        <div class="modal-footer">
		<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
</div>
      </div>
      
    </div>
  </div>
  
</div>



								<button type="submit" class="btn btn-purple btn-lg full-width" name="submit">Login</button>





								<p>Don’t you have an account? <a href="index.php">Register Now!</a> it’s really simple and you can start enjoing all the benefits!</p>

							</div>

						</div>

					</form>

					<a href="fb_signup.php" class="btn btn-lg bg-facebook full-width btn-icon-left">
							<div class="g-signin2" data-onsuccess="onSignIn"></div>

						</i>Login with Facebook</a>

					<a href="twitter_signup.php" class="btn btn-lg bg-twitter full-width btn-icon-left">Login with Twitter</a>



				</div>

			</div>

		</div>

	</div>

	</div>

	</div>



	<!-- ... end Login-Registration Form  -->











	<!-- jQuery first, then Other JS. -->

	<script src="js/jquery-3.2.0.min.js"></script>

	<!-- Js effects for material design. + Tooltips -->

	<script src="js/material.min.js"></script>

	<!-- Helper scripts (Tabs, Equal height, Scrollbar, etc) -->

	<script src="js/theme-plugins.js"></script>

	<!-- Init functions -->

	<script src="js/main.js"></script>



	<!-- Select / Sorting script -->



<script>
	WebFont.load({

		google: {

			families: ['Roboto:300,400,500,700:latin']

		}

	});
</script>
<script>

// This is the "Offline page" service worker

// Add this below content to your HTML page, or add the js file to your page at the very top to register service worker

// Check compatibility for the browser we're running this in
// This is the service worker with the Advanced caching

// Add this below content to your HTML page, or add the js file to your page at the very top to register service worker

// Check compatibility for the browser we're running this in
if ("serviceWorker" in navigator) {
  if (navigator.serviceWorker.controller) {
    console.log("[PWA Builder] active service worker found, no need to register");
  } else {
    // Register the service worker
    navigator.serviceWorker
      .register("pwabuilder-sw.js", {
        scope: "./"
      })
      .then(function (reg) {
        console.log("[PWA Builder] Service worker has been registered for scope: " + reg.scope);
      });
  }
}

</script>

</body>

</html>
