<?php 
include 'include.php';

session_start();
$username = $_SESSION['username'];
$query="SELECT * FROM users WHERE username = '$username'";
$results = mysqli_query($conn,$query);

while ($row = mysqli_fetch_assoc($results)) {

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>Favorit Page - About</title>

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

	<!-- Lightbox popup script-->
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">


</head>
<body>

<!-- Fixed Sidebar Left -->
<?php include 'side_panel.php'; ?>
<!-- ... end Fixed Sidebar Left -->


<!-- Fixed Sidebar Right -->

<!-- ... end Fixed Sidebar Right -->

<!-- Fixed Sidebar Right -->

<div class="fixed-sidebar right fixed-sidebar-responsive">

	<div class="fixed-sidebar-right sidebar--small" id="sidebar-right-responsive">

		<a href="#" class="olympus-chat inline-items js-chat-open">
			<svg class="olymp-chat---messages-icon"><use xlink:href="icons/icons.svg#olymp-chat---messages-icon"></use></svg>
		</a>

	</div>

</div>

<!-- ... end Fixed Sidebar Right -->


<!-- Header -->
<?php include'header.php'; ?>

<!-- ... end Header -->


<!-- Responsive Header -->
<?php include 'mobile_header.php';?>
<!-- ... end Responsive Header -->

<div class="header-spacer"></div>


<!-- Top Header -->

<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img src="img/top-header1.jpg" alt="nature">
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col-lg-5 col-md-5 ">
								<ul class="profile-menu">
									<li>
										<a href="user_timeline.php" >Timeline</a>
									</li>
									<li>
										<a href="user_profile.php">About</a>
									</li>
								</ul>
							</div>
							<div class="col-lg-5 ml-auto col-md-5">
								<ul class="profile-menu">
									<li>
										<a href="user_following.php"class="active">Following</a>
									</li>
									<li>
										<a href="user_followers.php">Followers</a>
									</li>
									<li>
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg>
											<ul class="more-dropdown more-with-triangle">
												<li>
													<a href="#">Report Profile</a>
												</li>
												<li>
													<a href="#">Block Profile</a>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</div>

						<div class="control-block-button">
							<a href="35-YourAccount-FriendsRequests.html" class="btn btn-control bg-blue">
								<svg class="olymp-happy-face-icon"><use xlink:href="icons/icons.svg#olymp-happy-face-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control bg-purple">
								<svg class="olymp-chat---messages-icon"><use xlink:href="icons/icons.svg#olymp-chat---messages-icon"></use></svg>
							</a>

							<div class="btn btn-control bg-primary more">
								<svg class="olymp-settings-icon"><use xlink:href="icons/icons.svg#olymp-settings-icon"></use></svg>

								<ul class="more-dropdown more-with-triangle triangle-bottom-right">
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Update Profile Photo</a>
									</li>
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Update Header Photo</a>
									</li>
									<li>
										<a href="29-YourAccount-AccountSettings.html">Account Settings</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="top-header-author">
						<a href="user_profile.php" class="author-thumb">
							<img src="https://res.cloudinary.com/novicetopro/profile_pictures/128X128/<?php echo $profile_hash1;?>" alt="author">
						</a>
						<div class="author-content">
							<a href="user_profile.php" class="h4 author-name"><?php echo $username ?></a>
							<div class="country"><?php echo htmlspecialchars($row['birthplace']); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $following = 0;?>
<?php
$profile_username = $_SESSION['username']; ?>
<?php
			$query11="SELECT * FROM followers WHERE user1 = '$profile_username' ORDER BY RAND() ";
					$results11 = mysqli_query($conn,$query11);
					while ($row11 = mysqli_fetch_assoc($results11)) {
					   $following = $following + 1;
						}
					?>

<div class="container">
	<div class="row">
		<div class="col-xl-9 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
					<div class="h6 title"><?php echo $following;?> Following </div>
					<form class="w-search">
						<div class="form-group with-button">
							<input class="form-control" type="text" placeholder="Search Friends...">
							<button>
								<svg class="olymp-magnifying-glass-icon"><use xlink:href="icons/icons.svg#olymp-magnifying-glass-icon"></use></svg>
							</button>
						</div>
					</form>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
			</div>
		
			<div class="row">
			<?php
			$query4="SELECT * FROM followers WHERE user1 = '$profile_username' ORDER BY RAND() ";
					$results4 = mysqli_query($conn,$query4);
					while ($row4 = mysqli_fetch_assoc($results4)) {
						$profile_username1 = $row4['following'];
                        $query5="SELECT * FROM users WHERE username = '$profile_username1'";
						$results5 = mysqli_query($conn,$query5);
                        while ($row5 = mysqli_fetch_assoc($results5)) {
							
                
					?>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<div class="ui-block">
						<div class="friend-item">
							<div class="friend-header-thumb">
								<img src="img/friend9.jpg" alt="friend">
							</div>

							<div class="friend-item-content">

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg>
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
								<?php
						$pro_na = $row5['username'];
						$query_na="SELECT * FROM users WHERE username = '$pro_na'";
						$results_na = mysqli_query($conn,$query_na);
						
						while ($row_na = mysqli_fetch_assoc($results_na)) {
						$profil_na = $row_na['profile_hash'];
						}
						?>
												<?php
$ques_username = $row5['username'];
$query_questions="SELECT * FROM questions WHERE asked_by = '$ques_username'";
$result_questions = mysqli_query($conn,$query_questions);
$asked_questions = 0;
while ($row_questions = mysqli_fetch_assoc($result_questions)) {
	$asked_questions = $asked_questions + 1;
}
?>

<?php
$query_answered="SELECT * FROM answers WHERE answered_by = '$ques_username'";
$result_answered = mysqli_query($conn,$query_answered);
$answered = 0;
while ($row_questions = mysqli_fetch_assoc($result_answered)) {
	$answered = $answered + 1;
}	
?>

<?php
$followers_count="SELECT * FROM followers WHERE following = '$ques_username'";
$result_count = mysqli_query($conn,$followers_count);
$count = 0;
while ($row_count = mysqli_fetch_assoc($result_count)) {
	$count = $count + 1;
}	
?>
								<div class="friend-avatar">
									<div class="author-thumb">
										<img src="https://res.cloudinary.com/novicetopro/profile_pictures/92X92/<?php echo $profil_na;?>" alt="author">
									</div>
									<div class="author-content">
										<a class="h5 author-name"<?php echo ' href="people_profile.php?profile_username=' . $row5['username'] . '">'?><?php echo $row5['name'];?></a>
										<div class="country"><?php echo $row5['birthplace']; ?></div>
									</div>
								</div>

								<div class="swiper-container">
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
													<svg class="olymp-happy-face-icon"><use xlink:href="icons/icons.svg#olymp-happy-face-icon"></use></svg>
												</a>

												<a href="#" class="btn btn-control bg-purple">
													<svg class="olymp-chat---messages-icon"><use xlink:href="icons/icons.svg#olymp-chat---messages-icon"></use></svg>
												</a>

											</div>
										</div>

										<div class="swiper-slide">
											<p class="friend-about" data-swiper-parallax="-500">
											<?php echo $row5['description']; ?>
											</p>

											
										</div>
									</div>

									<!-- If we need pagination -->
									<div class="swiper-pagination"></div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<?php } }?>
			</div>

			
		</div>


		<div class="col-xl-3 order-xl-1 col-lg-12 order-lg-2 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">About me</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">
					<ul class="widget w-personal-info item-block">
						<li>
							<span class="text"><?php echo $row['user_description']; ?></span>
						</li>
						<li>
							<span class="title">Birthplace:</span>
							<span class="text"><?php echo $row['birthplace']; ?></span>
						</li>
						<li>
							<span class="title">Occupation</span>
							<span class="text"><?php echo $row['occupation']; ?></span>
						</li>
						<li>
							<span class="title">Email</span>
							<a href="#" class="text"><?php echo $row['email']; ?></a>
						</li>
						<li>
							<span class="title">Website:</span>
							<a href="#" class="text"><?php echo $row['website']; ?></a>
						</li>
					</ul>

					<div class="widget w-socials">
						<h6 class="title">Other Social Networks:</h6>
						<a class="social-item bg-facebook"<?php echo ' href="https://www.facebook.com/' . $row['facebook'] . '"'?>>
							<i class="fa fa-facebook" aria-hidden="true"></i>
							Facebook
						</a>
						<a class="social-item bg-twitter"<?php echo ' href="https://www.twitter.com/' . $row['twitter'] . '"'?>>
							<i class="fa fa-twitter" aria-hidden="true"></i>
							Twitter
						</a>
						<a class="social-item bg-green"<?php echo ' href="https://www.github.com/' . $row['instagram'] . '"'?>>
							<i class="fa fa-instagram" aria-hidden="true"></i>
							Instagram
						</a>
					</div>
				</div>
			</div>

			<!--
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Additional Info</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">
					<ul class="widget w-personal-info item-block">
						<li>
							<span class="title">Additional Info:</span>
							<span class="text">We are open for gigs all over the country. If you are interested,
								please contact us via our website or send us an email to gigs@ggrock.com
							</span>
						</li>
						<li>
							<span class="title">Since:</span>
							<span class="text">Founded in 1996</span>
						</li>
						<li>
							<span class="title">Joined Olympus:</span>
							<span class="text">September 14th, 2012</span>
						</li>
						<li>
							<span class="title">Phone Number:</span>
							<span class="text">(044) 555 - 6943 - 5789</span>
						</li>
					</ul>
				</div>
			</div>-->
		</div>
	</div>
</div>


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

<!-- Lightbox popup script-->
<script src="js/jquery.magnific-popup.min.js"></script>

<!-- Swiper / Sliders -->
<script src="js/swiper.jquery.min.js"></script>

<script src="js/mediaelement-and-player.min.js"></script>
<script src="js/mediaelement-playlist-plugin.min.js"></script>


</body>
</html>
                        <?php } ?>