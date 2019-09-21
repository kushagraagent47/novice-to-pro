<?php
session_start();
include 'include.php';
$chat_user = $_GET['profile_username'];

//Last active status
$username = $_SESSION['username'];
$sql193 = "UPDATE chat SET seen='1' WHERE sender = '$chat_user'";
if ($conn->query($sql193)) { }

//end
$query_friends112 = "SELECT * FROM users WHERE username = '$chat_user'";
$results_friends112 = mysqli_query($conn, $query_friends112);
while ($row_friends112 = mysqli_fetch_assoc($results_friends112)) {
	$user_usersname = $row_friends112['name'];
	$user_src12 = $row_friends112['profile_hash'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<script>
		function chat_ajax() {
			var req = new XMLHttpRequest();
			req.onreadystatechange = function() {
				if (req.readyState == 4 && req.status == 200) {
					document.getElementById('chat_data').innerHTML = req.responseText;
				}
			}
			req.open('GET', 'chat.php?user=<?php echo $chat_user ?>', true);
			req.send();
		}
		setInterval(function() {
			chat_ajax()
		}, 1000)
	</script>

	<title>Your Account - Chat Messages </title>

	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">


	<!-- jQuery first, then Other JS. -->
	<!-- jQuery first, then Other JS. -->

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-grid.css">

	<!-- Theme Styles CSS -->
	<link rel="stylesheet" type="text/css" href="css/theme-styles.css">
	<link rel="stylesheet" type="text/css" href="css/blocks.css">
	<!-- jQuery first, then Other JS. -->
	<script src="js/jquery-3.2.0.min.js"></script>


	<!-- Js effects for material design. + Tooltips -->
	<script src="js/material.min.js"></script>

	<!-- Helper scripts (Tabs, Equal height, Scrollbar, etc) -->
	<script src="js/theme-plugins.js"></script>

	<!-- Init functions -->
	<script src="js/main.js"></script>

	<!-- Load more news AJAX script -->
	<script src="js/ajax-pagination.js"></script>

	<!-- Select / Sorting script -->
	<script src="js/selectize.min.js"></script>

	<!-- Datepicker input field script-->
	<script src="js/moment.min.js"></script>
	<script src="js/daterangepicker.min.js"></script>

	<!-- Widget with events script-->
	<script src="js/simplecalendar.js"></script>

	<!-- Lightbox plugin script-->
	<script src="js/jquery.magnific-popup.min.js"></script>


	<script src="js/mediaelement-and-player.min.js"></script>
	<script src="js/mediaelement-playlist-plugin.min.js"></script>

	<!-- Responsive Header -->
	<!-- Main Font -->
	<script src="js/webfontloader.min.js"></script>
	<script>
		WebFont.load({
			google: {
				families: ['Roboto:300,400,500,700:latin']
			}
		});
	</script>

	<link rel="stylesheet" type="text/css" href="css/fonts.css">

	<!-- Styles for plugins -->
	<link rel="stylesheet" type="text/css" href="css/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">


</head>

<body>

	<!-- Profile Settings Responsive -->

	<!-- ... end Profile Settings Responsive -->


	<!-- Fixed Sidebar Left -->

	<!-- ... end Fixed Sidebar Left -->

	<!-- ... end Fixed Sidebar Right -->
	<?php include 'mobile_header.php'; ?>

	<!-- Header -->

	<!-- Fixed Sidebar Left -->
	<?php include 'side_panel.php'; ?>
	<!-- ... end Fixed Sidebar Left -->


	<!-- Fixed Sidebar Right -->


	<!-- ... end Fixed Sidebar Right -->

	<!-- Fixed Sidebar Right

<div class="fixed-sidebar right fixed-sidebar-responsive">

	<div class="fixed-sidebar-right sidebar--small" id="sidebar-right-responsive">

		<a href="#" class="olympus-chat inline-items js-chat-open">
			<svg class="olymp-chat---messages-icon"><use xlink:href="icons1/icons.svg#olymp-chat---messages-icon"></use></svg>
		</a>

	</div>

</div>

... end Fixed Sidebar Right -->


	<!-- Header -->
	<?php include 'header.php'; ?>


	<!-- ... end Header -->


	<!-- Responsive Header -->

	<!-- ... end Responsive Header -->





	<!-- ... end Header -->


	<!-- Responsive Header -->

	<!-- ... end Responsive Header -->



	<div class="header-spacer header-spacer-small"></div>



	<!-- ... end Main Header Your Account -->

	<!-- Your Account Personal Information -->

	<div class="container">
		<div class="row">
			<div class="col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-xs-12">
				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">Chat / Messages</h6>
						<a href="#" class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use>
							</svg></a>
					</div>

					<div class="row">
						<div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-xs-12 padding-r-0">
							<ul class="notification-list chat-message">
								<?php
								//BACK-END GOES HERE//
								$username = $_SESSION['username'];
								$query_friends4 = "SELECT * FROM followers WHERE user1 = '$username'";
								$results_friends4 = mysqli_query($conn, $query_friends4);

								while ($row_friends4 = mysqli_fetch_assoc($results_friends4)) {

									$user_name = $row_friends4['following'];

									$query_friends5 = "SELECT * FROM chat WHERE sender = '$username' AND receiver = '$user_name' OR receiver = '$username' AND sender = '$user_name' ORDER BY id DESC LIMIT 1";
									$results_friends5 = mysqli_query($conn, $query_friends5);
									while ($row_friends5 = mysqli_fetch_assoc($results_friends5)) {
										$message_to = $row_friends5['message'];
									}	
									$query_friends11 = "SELECT * FROM users WHERE username = '$user_name'";
									$results_friends11 = mysqli_query($conn, $query_friends11);
									while ($row_friends11 = mysqli_fetch_assoc($results_friends11)) {
										$user_img_src = $row_friends11['profile_hash'];
										$user_last_activity = $row_friends11['last_activity'];
									}
									?> <li>
										<div class="author-thumb">
											<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $user_img_src; ?>" alt="author">
										</div>
										<div class="notification-event">
											<a class="h6 notification-friend" <?php echo ' href="chatting.php?profile_username=' . $row_friends4['following'] . '"' ?>><?php echo $row_friends4['following']; ?></a>
											<span class="chat-message-item"><?php echo $message_to; ?></span>
											<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18"><?php echo $row_friends5['message']; ?></time></span>
										</div>
										<span class="notification-icon">
											<svg class="olymp-chat---messages-icon">
												<use xlink:href="icons1/icons.svg#olymp-chat---messages-icon"></use>
											</svg>
										</span>

										<div class="more">
											<svg class="olymp-three-dots-icon">
												<use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use>
											</svg>
										</div>
									</li>
								<?php


							} ?>

							</ul>
						</div>

						<div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-xs-12 padding-l-0">
							<div class="chat-field">
								<div class="ui-block-title">
									<h6 class="title"><?php echo $user_usersname; ?></h6>
									<a href="#" class="more"><svg class="olymp-three-dots-icon">
											<use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use>
										</svg></a>
								</div>
								<div id="chat_data" class="mCustomScrollbar" data-mcs-theme="dark">



								</div>
								</li>

								</ul>
							</div>

							<form id="send_message" method="post" <?php echo ' action="send_message.php?user=' . $chat_user . '">' ?> <div class="form-group label-floating is-empty">
								<label class="control-label" name="reply">Write your reply here...</label>
								<textarea class="form-control" name="reply" placeholder=""></textarea>
								<input type="hidden" name="to_user" value="<?php echo $_GET['profile_username'];?>">
		
						</div>

						<button id="send_reply" type="submit" name="reply_user" class="btn btn-primary btn-sm">Send message</button>
					</div>

					</form>

				</div>
			</div>
		</div>

	</div>

	</div>
	</div>
	</div>
	
	<script>
		$("#send_reply").click(function() {
			$.post($("#send_message").attr("action"), $("#send_message :input").serializeArray(), function(info) {
				$("#result_reply").html(info);
			});
		});

		$("#send_message").submit(function() {
			return false;
		});
	</script>

	<!-- ... end Your Account Personal Information -->
	<script>
		function eraseText() {
			document.getElementById("submit").value = "";
		}
	</script>

	<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->


	<!-- jQuery first, then Other JS. -->
	<!-- jQuery first, then Other JS. -->
	<script src="js/jquery-3.2.0.min.js"></script>


	<!-- Js effects for material design. + Tooltips -->
	<script src="js/material.min.js"></script>

	<!-- Helper scripts (Tabs, Equal height, Scrollbar, etc) -->
	<script src="js/theme-plugins.js"></script>

	<!-- Init functions -->
	<script src="js/main.js"></script>

	<!-- Load more news AJAX script -->
	<script src="js/ajax-pagination.js"></script>

	<!-- Select / Sorting script -->
	<script src="js/selectize.min.js"></script>

	<!-- Datepicker input field script-->
	<script src="js/moment.min.js"></script>
	<script src="js/daterangepicker.min.js"></script>

	<!-- Widget with events script-->
	<script src="js/simplecalendar.js"></script>

	<!-- Lightbox plugin script-->
	<script src="js/jquery.magnific-popup.min.js"></script>


	<script src="js/mediaelement-and-player.min.js"></script>
	<script src="js/mediaelement-playlist-plugin.min.js"></script>

</body>

</html>