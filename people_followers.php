<?php
include 'include.php';
include 'include_profile.php';

session_start();

if ( $_SESSION['logged_in'] != 1 ) {
	header("location:index.php");	   
  }
  if ( $_SESSION['verified'] != 1 ) {
	?><script type="text/javascript">
	window.location.href = 'verify_page.php';
	</script>

<?php
  }
else {
$profile_username = $_GET['profile_username'];
$username = $_SESSION['username'];

$query="SELECT * FROM users WHERE username = '$profile_username'";
$results = mysqli_query($conn,$query);

while ($row = mysqli_fetch_assoc($results)) {
	$user_name = $row['name'];
	$user_hobbies = $row['hobbies'];
	$user_fav_tv_shows = $row['fav_tv_shows'];
	$user_fav_movies = $row['fav_movies'];
	$user_fav_games = $row['fav_games'];
	$user_fav_music = $row['fav_music'];
	$user_fav_books = $row['fav_books'];
	$user_fav_writer = $row['fav_writer'];
	$user_description = $row['description'];
	$user_birthday = $row['birthday'];
	$user_birthplace = $row['birthplace'];
	$user_occupation = $row['occupation'];
	$user_gender = $row['gender'];
	$user_email = $row['email'];
	$user_website = $row['website'];
	$user_phone_no = $row['phone_no'];
	$user_facebook = $row['facebook'];
	$user_twitter = $row['twitter'];
	$user_instagram = $row['instagram'];
	$user_edu1_title = $row['edu1_title'];
	$user_edu1_time = $row['edu1_time'];
	$user_edu1_description = $row['edu1_description'];
	$user_edu2_title = $row['edu2_title'];
	$user_edu2_time = $row['edu2_time'];
	$user_edu2_description = $row['edu2_description'];
	$user_edu3_title = $row['edu3_title'];
	$user_edu3_time = $row['edu3_time'];
	$user_edu3_description = $row['edu3_description'];
	$user_emp1_title = $row['emp1_title'];
	$user_emp1_time = $row['emp1_time'];
	$user_emp1_description = $row['emp1_description'];
	$user_emp2_title = $row['emp2_title'];
	$user_emp2_time = $row['emp2_time'];
	$user_emp2_description = $row['emp2_description'];
	$user_emp3_title = $row['emp3_title'];
	$user_emp3_time = $row['emp3_time'];
	$user_emp3_description = $row['emp3_description'];

}

if(isset($_REQUEST['follow'])){
	$user_username = $_POST['profile_username'];
	$sql = "INSERT INTO followers ( user1 , following) " 
. "VALUES ('$username' , '$user_username' )";
if ($conn->query($sql)){
	header("location: newsfeed.php");
}
}
if(isset($_REQUEST['unfollow'])){
	$user_username = $_POST['profile_username'];
	$sql = "DELETE FROM followers WHERE user1 = '$username' AND following = '$user_username'";
if ($conn->query($sql)){
	header("location: newsfeed.php");
}
}
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
<?php include 'side_panel.php';?>
<!-- ... end Fixed Sidebar Left -->


<!-- Fixed Sidebar Right -->

<!-- ... end Fixed Sidebar Right -->

<!-- Fixed Sidebar Right -->

<!-- ... end Fixed Sidebar Right -->


<!-- Header -->
<?php include'header.php'; ?>
<!-- ... end Header -->


<!-- Responsive Header -->
<?php include 'mobile_header.php';?><!-- ... end Responsive Header -->

<div class="header-spacer"></div>

<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="top-header top-header-favorit">
					<div class="top-header-thumb">
						<img src="img/top-header2.jpg" alt="nature">
						<div class="top-header-author">
							<div class="author-thumb">
								<img src="img/author-main2.jpg" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h3 author-name"><?php echo $user_name; ?></a>
								<div class="country"><?php echo $user_birthplace; ?></div>
							</div>
						</div>
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col-xl-8 m-auto col-lg-8 col-md-12">
								<ul class="profile-menu">
                                <?php
$follow_result = $conn->query("SELECT * FROM followers WHERE user1='$username' AND following = '$profile_username'");

if ( $follow_result->num_rows == 0 ){
	?> 
 <form action="people_profile.php" method="post" > 
						<button class="btn btn-sm bg-blue" type="submit" name="follow">Follow</button>
						<input type="hidden" name="profile_username" value="<?php echo $profile_username; ?>"/>
						</form>	
<?php } else { ?>
<form action="people_profile.php" method="post" > 
<button class="btn btn-sm bg-blue" type="submit" name="unfollow">Unfollow</button>
<input type="hidden" name="profile_username" value="<?php echo $profile_username; ?>"/>
</form>	

<?php } ?>
								<li>
										<a <?php echo ' href="people_profile.php?profile_username=' . $profile_username . '">'?>Timeline</a>
									</li>
									<li>
										<a  <?php echo ' href="people_following.php?profile_username=' . $profile_username . '">'?>Following</a>
									</li>
									<li>
										<a class="active" <?php echo ' href="people_followers.php?profile_username=' . $profile_username . '">'?>Followers</a>
									</li>
									<li>
										<a <?php echo ' href="people_about.php?profile_username=' . $profile_username . '">'?>About</a>
									</li>
									<li>
										<a href="09-ProfilePage-Videos.html">Spotify playlist</a>
									</li>
								</ul>
							</div>
						</div>

						<div class="control-block-button">
							<a href="#" class="btn btn-control bg-primary">
								<svg class="olymp-star-icon"><use xlink:href="icons1/icons.svg#olymp-star-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control bg-purple">
								<svg class="olymp-chat---messages-icon"><use xlink:href="icons1/icons.svg#olymp-chat---messages-icon"></use></svg>
							</a>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-xl-9 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
                <?php
                $followers = 0;
            $query6="SELECT * FROM followers WHERE following = '$username' ORDER BY RAND() ";
					$results6 = mysqli_query($conn,$query6);
					while ($row6 = mysqli_fetch_assoc($results6)) {
                            $followers = $followers + 1;
                    }?>
					<div class="h6 title"><?php echo $followers;?> Followers </div>
					<form class="w-search">
						<div class="form-group with-button">
							<input class="form-control" type="text" placeholder="Search Friends...">
							<button>
								<svg class="olymp-magnifying-glass-icon"><use xlink:href="icons1/icons.svg#olymp-magnifying-glass-icon"></use></svg>
							</button>
						</div>
					</form>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
			</div>
		
			<div class="row">
            <?php
            $query6="SELECT * FROM followers WHERE following = '$username' ORDER BY RAND() ";
					$results6 = mysqli_query($conn,$query6);
					while ($row6 = mysqli_fetch_assoc($results6)) {
                        $profile_username1 = $row6['user1'];
                        $query7="SELECT * FROM users WHERE username = '$profile_username1'";
                        $results7 = mysqli_query($conn,$query7);
                        while ($row7 = mysqli_fetch_assoc($results7)) {

                
					?>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<div class="ui-block">
						<div class="friend-item">
							<div class="friend-header-thumb">
								<img src="img/friend9.jpg" alt="friend">
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
								<?php
						$pro_na = $row7['username'];
						$query_na="SELECT * FROM users WHERE username = '$pro_na'";
						$results_na = mysqli_query($conn,$query_na);
						
						while ($row_na = mysqli_fetch_assoc($results_na)) {
						$profil_na = $row_na['profile_hash'];
						}
						?>
												<?php
$ques_username = $row7['username'];
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
										<a class="h5 author-name"<?php echo ' href="people_profile.php?profile_username=' . $row7['username'] . '">'?><?php echo $row7['name'];?></a>
										<div class="country"><?php echo $row7['birthplace']; ?></div>
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
													<svg class="olymp-happy-face-icon"><use xlink:href="icons1/icons.svg#olymp-happy-face-icon"></use></svg>
												</a>

												<a href="#" class="btn btn-control bg-purple">
													<svg class="olymp-chat---messages-icon"><use xlink:href="icons1/icons.svg#olymp-chat---messages-icon"></use></svg>
												</a>

											</div>
										</div>

										<div class="swiper-slide">
											<p class="friend-about" data-swiper-parallax="-500">
											<?php echo $row7['description']; ?>
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
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">
					<ul class="widget w-personal-info item-block">
						<li>
							<span class="text"><?php echo htmlspecialchars($user_description); ?></span>
						</li>
						<li>
							<span class="title">Birthplace:</span>
							<span class="text"><?php echo htmlspecialchars($user_birthplace); ?></span>
						</li>
						<li>
							<span class="title">Occupation</span>
							<span class="text"><?php echo htmlspecialchars($user_occupation); ?></span>
						</li>
						<li>
							<span class="title">Email</span>
							<a href="#" class="text"><?php echo htmlspecialchars($user_email); ?></a>
						</li>
						<li>
							<span class="title">Website:</span>
							<a href="#" class="text"><?php echo htmlspecialchars($user_website); ?></a>
						</li>
					</ul>

					<div class="widget w-socials">
						<h6 class="title">Other Social Networks:</h6>
						<a class="social-item bg-facebook"<?php echo ' href="https://www.facebook.com/' . $user_facebook . '"'?>>
							<i class="fa fa-facebook" aria-hidden="true"></i>
							Facebook
						</a>
						<a class="social-item bg-twitter"<?php echo ' href="https://www.twitter.com/' . $user_twitter . '"'?>>
							<i class="fa fa-twitter" aria-hidden="true"></i>
							Twitter
						</a>
						<a class="social-item bg-green"<?php echo ' href="https://www.github.com/' . $user_instagram . '"'?>>
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
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg></a>
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


<!-- Window-popup-CHAT for responsive min-width: 768px -->

<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->


</body>
</html>
						<?php } ?>