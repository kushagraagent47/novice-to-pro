<?php
include 'include.php';
include 'include_profile.php';

session_start();

$username = $_SESSION['username'];
?>




<!DOCTYPE html>
<html lang="en">
<head>

	<title>Profile Page - Friends</title>


	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-grid.css">

	<!-- Theme Styles CSS -->
	<link rel="stylesheet" type="text/css" href="css/theme-styles.css">
	<link rel="stylesheet" type="text/css" href="css/blocks.css">

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
	<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" type="text/css" href="css/swiper.min.css">

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

</head>
<body>

<!-- Fixed Sidebar Left -->
<?php include 'side_panel.php'; ?>
<!-- ... end Fixed Sidebar Left -->


<!-- Fixed Sidebar Right -->

<!-- ... end Fixed Sidebar Right -->

<!-- Fixed Sidebar Right -->

<!-- ... end Fixed Sidebar Right -->


<!-- Header -->
<?php include'header.php'; ?>

<!-- ... end Header -->


<!-- Responsive Header -->
<?php include 'mobile_header.php';?>
<!-- ... end Responsive Header -->


<!-- Top Header -->


<div class="main-header">
	<div class="content-bg-wrap">
		<div class="content-bg bg-music"></div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 m-auto col-md-8 col-sm-12 col-xs-12">
				<div class="main-header-content">
					<h1>Connect with people all around the globe!</h1>
					<p>
					</p>
				</div>
			</div>
		</div>
	</div>

 <img class="img-bottom" src="img/group-bottom.png" alt="friends">
</div>


<div class="container">


<!-- ... end Top Header -->

<!-- Friends -->

<div class="container">
	<div class="row">
	<?php
$query="SELECT * FROM users WHERE username NOT IN (SELECT following FROM followers WHERE user1 = '$username')ORDER BY RAND()";
$results = mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($results)) {
	$ques_username = $row['username'];
	$query_questions="SELECT * FROM questions WHERE asked_by = '$ques_username'";
	$result_questions = mysqli_query($conn,$query_questions);
	$asked_questions = 0;
	while ($row_questions = mysqli_fetch_assoc($result_questions)) {
		$asked_questions = $asked_questions + 1;
	}
	$query_answered="SELECT * FROM answers WHERE answered_by = '$ques_username'";
	$result_answered = mysqli_query($conn,$query_answered);
	$answered = 0;
	while ($row_questions = mysqli_fetch_assoc($result_questions)) {
		$answered = $answered + 1;
	}	
	$followers_count="SELECT * FROM followers WHERE following = '$ques_username'";
	$result_count = mysqli_query($conn,$followers_count);
	$count = 0;
	while ($row_count = mysqli_fetch_assoc($result_count)) {
		$count = $count + 1;
	}	
		
?>
		<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-6">

			<div class="ui-block">

				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="img/friend1.jpg" alt="friend">
					</div>

					<div class="friend-item-content">

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div>
						<div class="friend-avatar">
							<div class="author-thumb">
								<img src="https://res.cloudinary.com/novicetopro/profile_pictures/92X92/<?php echo $row['profile_hash'];?>" alt="author">
							</div>
							<div class="author-content">
								<a class="h5 author-name"<?php echo ' href="people_profile.php?profile_username=' . $row['username'] . '">'?><?php echo $row['name'];?></a>
								<div class="country"><?php echo $row['birthplace'];?></div>
							</div>
						</div>

						<div class="swiper-container" data-slide="fade">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<div class="h6"><?php echo $asked_questions; ?></div>
											<div class="title">Questions</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6"><?php echo $answered; ?></div>
											<div class="title">Answers</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6"><?php echo $count; ?></div>
											<div class="title">Followers</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="icons1/icons.svg#olymp-happy-face-icon"></use></svg>
										</a>

										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="icons1/icons.svg#olymp-chat---messages-icon"></use></svg>
										</a>

									</div>
								</div>

								<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
									<?php echo $row['description'];?>
									</p>
<!--
									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
										<div class="h6">December 2014</div>
									</div>-->
								</div>
							</div>

							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>


				</div>

			</div>
		</div>
		<?php } ?>

	</div>
</div>

<!-- ... end Friends -->



<!-- Window-popup Update Header Photo -->

<div class="modal fade" id="update-header-photo">
	<div class="modal-dialog ui-block window-popup update-header-photo">
		<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
			<svg class="olymp-close-icon"><use xlink:href="icons1/icons.svg#olymp-close-icon"></use></svg>
		</a>

		<div class="ui-block-title">
			<h6 class="title">Update Header Photo</h6>
		</div>

		<a href="#" class="upload-photo-item">
			<svg class="olymp-computer-icon"><use xlink:href="icons1/icons.svg#olymp-computer-icon"></use></svg>

			<h6>Upload Photo</h6>
			<span>Browse your computer.</span>
		</a>

		<a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

			<svg class="olymp-photos-icon"><use xlink:href="icons1/icons.svg#olymp-photos-icon"></use></svg>

			<h6>Choose from My Photos</h6>
			<span>Choose from your uploaded photos</span>
		</a>
	</div>
</div>


<!-- ... end Window-popup Update Header Photo -->



<!-- ... end Window-popup Choose from my Photo -->

<!-- Window-popup-CHAT for responsive min-width: 768px -->

<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->


<!-- jQuery first, then Other JS. -->
<script src="js/jquery-3.2.0.min.js"></script>
<!-- Js effects for material design. + Tooltips -->
<script src="js/material.min.js"></script>
<!-- Helper scripts (Tabs, Equal height, Scrollbar, etc) -->
<script src="js/theme-plugins.js"></script>
<!-- Init functions -->
<script src="js/main.js"></script>

<!-- Select / Sorting script -->
<script src="js/selectize.min.js"></script>

<!-- Swiper / Sliders -->
<script src="js/swiper.jquery.min.js"></script>

<script src="js/mediaelement-and-player.min.js"></script>
<script src="js/mediaelement-playlist-plugin.min.js"></script>
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