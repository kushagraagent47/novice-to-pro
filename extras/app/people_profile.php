<?php
error_reporting(0);
session_start();
include 'include.php';
include 'include_profile.php';

$profile_username = $_GET['profile_username'];
$username = $_SESSION['username'];
$div_id = 0;
if(isset($_REQUEST['submit'])){
	$question_char = mysqli_real_escape_string($conn, $_POST['question']);
	$question = htmlspecialchars($question_char);
	$prof_name = $_REQUEST['prof_name'];

	$sql17 = "INSERT INTO questions ( question , asked_by , asked_for) " 
	. "VALUES ('$question' , '$username' , '$prof_name')";
	if ( $conn->query($sql17) ){
		header("location:newsfeed.php");
	}
}
$query="SELECT * FROM users WHERE username = '$profile_username'";
$results = mysqli_query($conn,$query);

while ($row = mysqli_fetch_assoc($results)) {
	$user_name = $row['name'];
	$profile_hash2 = $row['profile_hash'];
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

	<title>Favourite Page</title>

	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

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
	<link rel="stylesheet" type="text/css" href="css/mediaelement-playlist-plugin.min.css">
	<link rel="stylesheet" type="text/css" href="css/mediaelementplayer.css">

	<!-- Lightbox popup script-->
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">

		
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

<!-- Lightbox popup script-->
<script src="js/jquery.magnific-popup.min.js"></script>

<script src="js/mediaelement-and-player.min.js"></script>
<script src="js/mediaelement-playlist-plugin.min.js"></script>

<script src="js/mediaelement-and-player.min.js"></script>
<script src="js/mediaelement-playlist-plugin.min.js"></script>

</head>
<body>

<!-- Fixed Sidebar Left -->
<?php include 'side_panel.php';?>
<!-- ... end Fixed Sidebar Left -->

<!-- ... end Fixed Sidebar Right -->

<!-- Fixed Sidebar Right -->

<div class="fixed-sidebar right fixed-sidebar-responsive">

	<div class="fixed-sidebar-right sidebar--small" id="sidebar-right-responsive">

		<a href="#" class="olympus-chat inline-items js-chat-open">
			<svg class="olymp-chat---messages-icon"><use xlink:href="icons/icons.svg#olymp-chat---messages-icon"></use></svg>
		</a>

	</div>

</div>



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


<div class="container">
	<div class="row">
	
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			
			<div class="ui-block">
				<div class="top-header top-header-favorit">
					<div class="top-header-thumb">
						<img src="img/top-header2.jpg" alt="nature">
						
						<div class="top-header-author">
							<div class="author-thumb">
								<img src="https://res.cloudinary.com/novicetopro/profile_pictures/128X128/<?php echo $profile_hash2;?>" alt="author">
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
										<a class="active" <?php echo ' href="people_profile.php?profile_username=' . $profile_username . '">'?>Timeline</a>
									</li>
									<li>
										<a <?php echo ' href="people_following.php?profile_username=' . $profile_username . '">'?>Following</a>
									</li>
									<li>
										<a <?php echo ' href="people_followers.php?profile_username=' . $profile_username . '">'?>Followers</a>
									</li>
									<li>
										<a <?php echo ' href="people_about.php?profile_username=' . $profile_username . '">'?>About</a>
									</li>
									</ul>
								
							</div>
							
						</div>

						<div class="control-block-button">
							<a href="#" class="btn btn-control bg-primary">
								<svg class="olymp-star-icon"><use xlink:href="icons/icons.svg#olymp-star-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control bg-purple">
								<svg class="olymp-chat---messages-icon"><use xlink:href="icons/icons.svg#olymp-chat---messages-icon"></use></svg>
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
		<div class="col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-sm-12 col-xs-12">



			<div id="newsfeed-items-grid">
			<div class="ui-block">
			<div class="news-feed-form">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active inline-items" data-toggle="tab" href="#home-1" role="tab" aria-expanded="true">

								<svg class="olymp-status-icon"><use xlink:href="icons/icons.svg#olymp-status-icon"></use></svg>

								<span>Ask <?php echo $user_name?></span>
							</a>
						</li>

						
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
						<form action="people_profile.php" method="post" > 
								<div class="author-thumb">
									<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profile_hash2;?>" alt="author">
								</div>
								<div class="form-group with-icon label-floating is-empty">
									<label class="control-label">Ask something</label>
									<textarea class="form-control" placeholder="" name="question"></textarea>
									<input type="hidden" name="prof_name" value="<?php echo $profile_username ?>"/>

								</div>
								<div class="add-options-message">
									<!--<a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
										<svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xlink:href="icons/icons.svg#olymp-camera-icon"></use></svg>
									</a>
									<a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
										<svg class="olymp-computer-icon"><use xlink:href="icons/icons.svg#olymp-computer-icon"></use></svg>
									</a>

									<a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
										<svg class="olymp-small-pin-icon"><use xlink:href="icons/icons.svg#olymp-small-pin-icon"></use></svg>
									</a>
									-->
									<button class="btn btn-primary btn-md-2" type="submit" name="submit">Ask question</button>
							

								</div>

							</form>
						</div>

					
						
					</div>
				</div>
				</div>

<?php
		$query1="SELECT * FROM answers WHERE answered_by ='$profile_username'";
		$results1 = mysqli_query($conn,$query1);
while ($row1 = mysqli_fetch_assoc($results1)) {
	$div_id = $div_id + 1;

	?>
				<div class="ui-block">
					<article class="hentry post">

						<div class="post__author author vcard inline-items">
							<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profile_hash2;?>" alt="author">

							<div class="author-date">

								<a class="h6 post__author-name fn" href="#"><?php echo htmlspecialchars($row1['answered_by']); ?></a>

								<div class="post__date">
									<time class="published" datetime="2017-03-24T18:18">
										<?php echo $row1['time_answered'];?> <?php echo $row1['date_answered'];?>
									</time>
								</div>
							</div>

								<div class="more"><svg class="olymp-three-dots-icon"></svg>
								<ul class="more-dropdown">
									
								</ul>
							</div>

						</div>
						<?php 
$profile_quesid = $row1['ques_id'];
?>
<?php
$query2="SELECT * FROM questions WHERE ques_id ='$profile_quesid'";
$results2 = mysqli_query($conn,$query2);
while ($row2 = mysqli_fetch_assoc($results2)) {
?>
						<p><b><h3><?php echo htmlspecialchars($row2['question']); ?></h3>
						
						</b><br>
						<?php
						$question_name = htmlspecialchars_decode($row1['answer']);
						?>
						<?php echo substr($question_name,0,1144);  ?> <a  <?php echo ' href="view_answer.php?answer_id=' . $row1['answer_id'] . '&ques_id=' .$row1['ques_id'].'">... Read more</a>'?>
						</p>
						<?php } ?>
						<div class="post-additional-info inline-items">

						
							<ul class="friends-harmonic">
							<?php
							$total_likes = 0;
							$answerr_id = $row1['answer_id'];
							$query_likes="SELECT * FROM likes WHERE ans_id = '$answerr_id' ";
							$results_likes1 = mysqli_query($conn,$query_likes);
							while ($row_likes1 = mysqli_fetch_assoc($results_likes1)) {
								$liked_username = $row_likes1['username'];
								$total_likes = $total_likes + 1;
								$query_liked="SELECT * FROM users WHERE username = '$liked_username' ";
								$results_liked = mysqli_query($conn,$query_liked);
								while ($row_liked = mysqli_fetch_assoc($results_liked)) {
							?>
								<li>
									<a href="#">
										<img src="https://res.cloudinary.com/novicetopro/profile_pictures/28X28/<?php echo $row_liked['profile_hash'];?>" alt="friend">
									</a>
								</li>
								<?php } }?>

								
							</ul>

							<div class="names-people-likes">
								
								<br><?php echo $total_likes ?> people liked this
							</div>


						

						</div>
						<?php
						$answer_id = $row1['answer_id'];
						$like_result = $conn->query("SELECT * FROM likes WHERE username='$username' AND ans_id = '$answer_id'");
						?>
						
						<div class="control-block-button post-control-button">
							<form id="like<?php echo $div_id ?>"  method="post" <?php echo ' action="like.php?username=' . $username . '&answer_id=' .$row1['answer_id'].'"> '?> 

								<a id="submit<?php echo $div_id?>" class="btn btn-control">
									<input type="hidden" name="username" value="<?php echo $username; ?>">
									<input type="hidden" name="answer_idd" value="<?php echo $row1['answer_id']; ?>">
									<svg  class="olymp-like-post-icon" ><use  xlink:href="icons/icons.svg#olymp-like-post-icon"></use></svg>

								</a>
							</form>

							<span id="result<?php echo $div_id?>"></span>
							<script>
$("#submit<?php echo $div_id?>").click( function() {
    $.post( $("#like<?php echo $div_id?>").attr("action"), $("#like<?php echo $div_id?> :input").serializeArray(), function(info){ $("#result<?php echo $div_id?>").html(info);});
});

$("#like<?php echo $div_id?>").submit( function() {
    return false;
});
</script>

					</article>

				</div>
				<?php
}
?>
			</div>

		</div>

		<div class="col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">About me</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
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
					<h6 class="title">Location</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>

				<div class="widget w-contacts">
					 Google map 

					<div class="section">
						<div id="map"></div>
						<script>
							var map;

							function initMap() {

								var myLatLng = {lat: -25.363, lng: 131.044};

								map = new google.maps.Map(document.getElementById('map'), {
									center: myLatLng,
									zoom: 14,
									scrollwheel: false//set to true to enable mouse scrolling while inside the map area
								});

								var marker = new google.maps.Marker({
									position: myLatLng,
									map: map,
									icon: {
										url: "img/marker-google.png",
										scaledSize: new google.maps.Size(50, 50)
									}

								});
							}


						</script>
						<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBESxStZOWN9aMvTdR3Nov66v6TXxpRZMM&callback=initMap"
								async defer></script>
						</div>

				 End Google map 

					<ul>
						<li>
							<span class="title">Address:</span>
							<span class="text">Fake Street 320, San Francisco California, USA.
							</span>
						</li>
						<li>
							<span class="title">Working Hours:</span>
							<span class="text">Mon-Fri 9:00am to 6:00pm
								Weekends 10:00am to 8:00pm
							</span>
						</li>
					</ul>
				</div>

			</div>
			-->
			<div class="ui-block">
				<!--<div class="ui-block-title">
					<h6 class="title">Faved this Page</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">
					<ul class="widget w-faved-page">
						<li>
							<a href="#">
								<img src="img/faved-page1.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/faved-page2.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/faved-page3.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/faved-page4.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/faved-page5.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/faved-page6.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/faved-page7.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/faved-page8.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/faved-page9.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/faved-page7.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/faved-page10.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/faved-page11.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/faved-page7.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/faved-page12.jpg" alt="user">
							</a>
						</li>
						<li class="all-users">
							<a href="#">+5k</a>
						</li>
					</ul>

				</div>
-->
			</div>


			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Twitter Feed</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>

				<ul class="widget w-twitter">
					<li class="twitter-item">
						<div class="author-folder">
						<a class="twitter-timeline" href="https://twitter.com/<?php echo $user_twitter;?>?ref_src=twsrc%5Etfw">Tweets by <?php echo $user_twitter;?></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
							</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-xs-12">
			<div class="ui-block">
			
<!--
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Green Goo's Poll</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">
					<ul class="widget w-pool">
						<li>
							<p>If you had to choose, which actor do you prefer to be the next Darkman? </p>
						</li>

						<li>
							<div class="skills-item">
								<div class="skills-item-info">
									<span class="skills-item-title">

										<span class="radio">
											<label>
												<input type="radio" name="optionsRadios">
											Thomas Bale
											</label>
										</span>
									</span>
									<span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="62" data-from="0"></span><span class="units">62%</span></span>
								</div>
								<div class="skills-item-meter">
									<span class="skills-item-meter-active bg-primary" style="width: 62%"></span>
								</div>

								<div class="counter-friends">12 friends voted for this</div>

								<ul class="friends-harmonic">
									<li>
										<a href="#">
											<img src="img/friend-harmonic1.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/friend-harmonic2.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/friend-harmonic3.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/friend-harmonic4.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/friend-harmonic5.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/friend-harmonic6.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/friend-harmonic7.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/friend-harmonic8.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/friend-harmonic9.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#" class="all-users">+3</a>
									</li>
								</ul>

							</div>
						</li>

						<li>
							<div class="skills-item">
								<div class="skills-item-info">
									<span class="skills-item-title">

										<span class="radio">
											<label>
												<input type="radio" name="optionsRadios">
											Ben Robertson
											</label>
										</span>
									</span>
									<span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="27" data-from="0"></span><span class="units">27%</span></span>
								</div>
								<div class="skills-item-meter">
									<span class="skills-item-meter-active bg-primary" style="width: 27%"></span>
								</div>
								<div class="counter-friends">7 friends voted for this</div>

								<ul class="friends-harmonic">
									<li>
										<a href="#">
											<img src="img/friend-harmonic7.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/friend-harmonic8.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/friend-harmonic9.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/friend-harmonic10.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/friend-harmonic11.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/friend-harmonic12.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/friend-harmonic13.jpg" alt="friend">
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li>
							<div class="skills-item">
								<div class="skills-item-info">
									<span class="skills-item-title">
										<span class="radio">
											<label>
												<input type="radio" name="optionsRadios">
											Michael Streiton
											</label>
										</span>
									</span>
									<span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="11" data-from="0"></span><span class="units">11%</span></span>
								</div>
								<div class="skills-item-meter">
									<span class="skills-item-meter-active bg-primary" style="width: 11%"></span>
								</div>

								<div class="counter-friends">2 people voted for this</div>

								<ul class="friends-harmonic">
									<li>
										<a href="#">
											<img src="img/friend-harmonic14.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/friend-harmonic15.jpg" alt="friend">
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
					<a href="#" class="btn btn-md-2 btn-border-think custom-color c-grey full-width">Vote Now!</a>
				</div>
			</div>

	-->		
				
<div class="ui-block">

				<div class="ui-block-title">
					<h6 class="title">Asked questions</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				
				<ul class="widget w-friend-pages-added notification-list friend-requests">
				<?php
				
				$query9="SELECT * FROM questions WHERE asked_by = '$profile_username' ORDER BY RAND() LIMIT 6";
				$results9 = mysqli_query($conn,$query9);
				while ($row9 = mysqli_fetch_assoc($results9)) {
				
				?>
					<li class="inline-items">
						<div class="author-thumb">
							<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profile_hash2;?>" alt="author">
						</div>
						<div class="notification-event">
						<a  class="h6 notification-friend" <?php echo ' href="answer.php?question=' . $row9['question'] .  '&asked_by=' .$row9['asked_by']  . '&ques_id=' .$row9['ques_id'].'">'?><?php echo substr($row9['question'],0,19); ?>...</a>
						<span class="chat-message-item"><?php echo substr($row9['asked_by'],0,20); ?></span>
						</div>
						<span class="notification-icon">
							<a href="#" class="accept-request">
								<span class="icon-add without-text">
									<svg class="olymp-happy-face-icon"><use xlink:href="icons/icons.svg#olymp-happy-face-icon"></use></svg>
								</span>
							</a>
						</span>

					</li>
					<?php
					}?>

				</ul>

			</div>
			</div>

		</div>
	</div>
</div>


<!-- Window-popup Update Header Photo -->

<div class="modal fade" id="update-header-photo">
	<div class="modal-dialog ui-block window-popup update-header-photo">
		<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
			<svg class="olymp-close-icon"><use xlink:href="icons/icons.svg#olymp-close-icon"></use></svg>
		</a>

		<div class="ui-block-title">
			<h6 class="title">Update Header Photo</h6>
		</div>

		<a href="#" class="upload-photo-item">
			<svg class="olymp-computer-icon"><use xlink:href="icons/icons.svg#olymp-computer-icon"></use></svg>

			<h6>Upload Photo</h6>
			<span>Browse your computer.</span>
		</a>

		<a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

			<svg class="olymp-photos-icon"><use xlink:href="icons/icons.svg#olymp-photos-icon"></use></svg>

			<h6>Choose from My Photos</h6>
			<span>Choose from your uploaded photos</span>
		</a>
	</div>
</div>


<!-- ... end Window-popup Update Header Photo -->


<!-- Window-popup Choose from my Photo -->
<div class="modal fade" id="choose-from-my-photo">
	<div class="modal-dialog ui-block window-popup choose-from-my-photo">
		<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
			<svg class="olymp-close-icon"><use xlink:href="icons/icons.svg#olymp-close-icon"></use></svg>
		</a>

		<div class="ui-block-title">
			<h6 class="title">Choose from My Photos</h6>

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">
						<svg class="olymp-photos-icon"><use xlink:href="icons/icons.svg#olymp-photos-icon"></use></svg>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">
						<svg class="olymp-albums-icon"><use xlink:href="icons/icons.svg#olymp-albums-icon"></use></svg>
					</a>
				</li>
			</ul>
		</div>


		<div class="ui-block-content">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">

					<div class="choose-photo-item" data-mh="choose-item">
						<div class="radio">
							<label class="custom-radio">
								<img src="img/choose-photo1.jpg" alt="photo">
								<input type="radio" name="optionsRadios">
							</label>
						</div>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<div class="radio">
							<label class="custom-radio">
								<img src="img/choose-photo2.jpg" alt="photo">
								<input type="radio" name="optionsRadios">
							</label>
						</div>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<div class="radio">
							<label class="custom-radio">
								<img src="img/choose-photo3.jpg" alt="photo">
								<input type="radio" name="optionsRadios">
							</label>
						</div>
					</div>

					<div class="choose-photo-item" data-mh="choose-item">
						<div class="radio">
							<label class="custom-radio">
								<img src="img/choose-photo4.jpg" alt="photo">
								<input type="radio" name="optionsRadios">
							</label>
						</div>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<div class="radio">
							<label class="custom-radio">
								<img src="img/choose-photo5.jpg" alt="photo">
								<input type="radio" name="optionsRadios">
							</label>
						</div>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<div class="radio">
							<label class="custom-radio">
								<img src="img/choose-photo6.jpg" alt="photo">
								<input type="radio" name="optionsRadios">
							</label>
						</div>
					</div>

					<div class="choose-photo-item" data-mh="choose-item">
						<div class="radio">
							<label class="custom-radio">
								<img src="img/choose-photo7.jpg" alt="photo">
								<input type="radio" name="optionsRadios">
							</label>
						</div>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<div class="radio">
							<label class="custom-radio">
								<img src="img/choose-photo8.jpg" alt="photo">
								<input type="radio" name="optionsRadios">
							</label>
						</div>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<div class="radio">
							<label class="custom-radio">
								<img src="img/choose-photo9.jpg" alt="photo">
								<input type="radio" name="optionsRadios">
							</label>
						</div>
					</div>


					<a href="#" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
					<a href="#" class="btn btn-primary btn-lg btn--half-width">Confirm Photo</a>

				</div>
				<div class="tab-pane" id="profile" role="tabpanel" aria-expanded="false">

					<div class="choose-photo-item" data-mh="choose-item">
						<figure>
							<img src="img/choose-photo10.jpg" alt="photo">
							<figcaption>
								<a href="#">South America Vacations</a>
								<span>Last Added: 2 hours ago</span>
							</figcaption>
						</figure>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<figure>
							<img src="img/choose-photo11.jpg" alt="photo">
							<figcaption>
								<a href="#">Photoshoot Summer 2016</a>
								<span>Last Added: 5 weeks ago</span>
							</figcaption>
						</figure>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<figure>
							<img src="img/choose-photo12.jpg" alt="photo">
							<figcaption>
								<a href="#">Amazing Street Food</a>
								<span>Last Added: 6 mins ago</span>
							</figcaption>
						</figure>
					</div>

					<div class="choose-photo-item" data-mh="choose-item">
						<figure>
							<img src="img/choose-photo13.jpg" alt="photo">
							<figcaption>
								<a href="#">Graffity & Street Art</a>
								<span>Last Added: 16 hours ago</span>
							</figcaption>
						</figure>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<figure>
							<img src="img/choose-photo14.jpg" alt="photo">
							<figcaption>
								<a href="#">Amazing Landscapes</a>
								<span>Last Added: 13 mins ago</span>
							</figcaption>
						</figure>
					</div>
					<div class="choose-photo-item" data-mh="choose-item">
						<figure>
							<img src="img/choose-photo15.jpg" alt="photo">
							<figcaption>
								<a href="#">The Majestic Canyon</a>
								<span>Last Added: 57 mins ago</span>
							</figcaption>
						</figure>
					</div>


					<a href="#" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
					<a href="#" class="btn btn-primary btn-lg disabled btn--half-width">Confirm Photo</a>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- ... end Window-popup Choose from my Photo -->


<div class="window-popup playlist-popup">

	<a href="" class="icon-close js-close-popup">
		<svg class="olymp-close-icon"><use xlink:href="icons/icons.svg#olymp-close-icon"></use></svg>
	</a>

	<table class="playlist-popup-table">

		<thead>

		<tr>

			<th class="play">
				PLAY
			</th>

			<th class="cover">
				COVER
			</th>

			<th class="song-artist">
				SONG AND ARTIST
			</th>

			<th class="album">
				ALBUM
			</th>

			<th class="released">
				RELEASED
			</th>

			<th class="duration">
				DURATION
			</th>

			<th class="spotify">
				GET IT ON SPOTIFY
			</th>

			<th class="remove">
				REMOVE
			</th>
		</tr>

		</thead>

		<tbody>
		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="icons/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="img/playlist19.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">We Can Be Heroes</a>
					<a href="#" class="composition-author">Jason Bowie</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition">Ziggy Firedust</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fa fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="icons/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>

		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="icons/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="img/playlist6.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">The Past Starts Slow and Ends</a>
					<a href="#" class="composition-author">System of a Revenge</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition">Wonderize</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fa fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="icons/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>

		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="icons/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="img/playlist7.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">The Pretender</a>
					<a href="#" class="composition-author">Kung Fighters</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition">Warping Lights</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fa fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="icons/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>

		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="icons/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="img/playlist8.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">Seven Nation Army</a>
					<a href="#" class="composition-author">The Black Stripes</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition ">Icky Strung (LIVE at Cube Garden)</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fa fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="icons/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>

		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="icons/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="img/playlist9.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">Leap of Faith</a>
					<a href="#" class="composition-author">Eden Artifact</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition">The Assassins’s Soundtrack</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fa fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="icons/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>

		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="icons/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="img/playlist10.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">Killer Queen</a>
					<a href="#" class="composition-author">Archiduke</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition ">News of the Universe</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fa fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="icons/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>
		</tbody>
	</table>

	<audio id="mediaplayer" data-showplaylist="true">
		<source src="mp3/Twice.mp3" title="Track 1" data-poster="track1.png" type="audio/mpeg">
		<source src="mp3/Twice.mp3" title="Track 2" data-poster="track2.png" type="audio/mpeg">
		<source src="mp3/Twice.mp3" title="Track 3" data-poster="track3.png" type="audio/mpeg">
		<source src="mp3/Twice.mp3" title="Track 4" data-poster="track4.png" type="audio/mpeg">
	</audio>

</div>

<!-- Window-popup-CHAT for responsive min-width: 768px -->

<div class="ui-block popup-chat popup-chat-responsive">
	<div class="ui-block-title">
		<span class="icon-status online"></span>
		<h6 class="title" >Chat</h6>
		<div class="more">
			<svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg>
			<svg class="olymp-little-delete js-chat-open"><use xlink:href="icons/icons.svg#olymp-little-delete"></use></svg>
		</div>
	</div>
	<div class="mCustomScrollbar">
		<ul class="notification-list chat-message chat-message-field">
			<li>
				<div class="author-thumb">
					<img src="img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
				</div>
				<div class="notification-event">
					<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
					<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
				</div>
			</li>

			<li>
				<div class="author-thumb">
					<img src="img/author-page.jpg" alt="author" class="mCS_img_loaded">
				</div>
				<div class="notification-event">
					<span class="chat-message-item">Don’t worry Mathilda!</span>
					<span class="chat-message-item">I already bought everything</span>
					<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
				</div>
			</li>

			<li>
				<div class="author-thumb">
					<img src="img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
				</div>
				<div class="notification-event">
					<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
					<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
				</div>
			</li>
		</ul>
	</div>

	<form>

		<div class="form-group label-floating is-empty">
			<label class="control-label">Press enter to post...</label>
			<textarea class="form-control" placeholder=""></textarea>
			<div class="add-options-message">
				<a href="#" class="options-message">
					<svg class="olymp-computer-icon"><use xlink:href="icons/icons.svg#olymp-computer-icon"></use></svg>
				</a>
				<div class="options-message smile-block">

					<svg class="olymp-happy-sticker-icon"><use xlink:href="icons/icons.svg#olymp-happy-sticker-icon"></use></svg>

					<ul class="more-dropdown more-with-triangle triangle-bottom-right">
						<li>
							<a href="#">
								<img src="img/icon-chat1.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat2.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat3.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat4.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat5.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat6.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat7.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat8.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat9.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat10.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat11.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat12.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat13.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat14.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat15.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat16.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat17.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat18.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat19.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat20.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat21.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat22.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat23.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat24.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat25.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat26.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat27.png" alt="icon">
							</a>
						</li>
					</ul>
				</div>
			</div>
			 </div>

	</form>


</div>

<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->



</body>
</html>