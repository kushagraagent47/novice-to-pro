<?php
include 'include.php';
session_start();
$profile_info_count = 0;
$question_count = 0;
$answer_count = 0;
$like_count = 0;
$like_count2 = 0;
$follower_count = 0;
$message = 0;
$professional = 0;
$check_pro = "";
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username'";
	$results56 = mysqli_query($conn, $query);
	while ($row56 = mysqli_fetch_assoc($results56)) {
		set_time_limit(30);
		$check_pro = $row56['cateogary'];
		if($row56['phone_no'] != ''){
	$profile_info_count = $profile_info_count + 10;

}
if($row56['hobbies'] != ''){
	$profile_info_count = $profile_info_count + 10;

}
if($row56['edu1_title'] != ''){
	$profile_info_count = $profile_info_count + 10;

}
if($row56['eduu2_time'] != ''){
	$profile_info_count = $profile_info_count + 10;

}
if($row56['twitter'] != ''){
	$profile_info_count = $profile_info_count + 10;

}
if($row56['gender'] != ''){
	$profile_info_count = $profile_info_count + 10;

}
if($row56['instagram'] != ''){
	$profile_info_count = $profile_info_count + 10;

}
if($row56['birthday'] != ''){
	$profile_info_count = $profile_info_count + 20;

}

	}
?><?php
$query1 = "SELECT * FROM questions WHERE asked_by = '$username' LIMIT 5";
	$results57 = mysqli_query($conn, $query1);
    while ($row57 = mysqli_fetch_assoc($results57)) {
	  
		set_time_limit(30);
	$question_count = $question_count + 1;
	}

?>
<?php
$query9 = "SELECT * FROM chat WHERE sender = '$username' LIMIT 20";
	$results62 = mysqli_query($conn, $query9);
    while ($row62 = mysqli_fetch_assoc($results62)) {
	  
		set_time_limit(30);
	$message = $message + 1;
	}

?>

<?php
$query2 = "SELECT * FROM answers WHERE answered_by = '$username' LIMIT 5";
	$results58 = mysqli_query($conn, $query2);
    while ($row58 = mysqli_fetch_assoc($results58)) {
	  
		set_time_limit(30);
	$answer_count = $answer_count + 1;
	}

?>
<?php
$query3 = "SELECT * FROM likes WHERE username = '$username' LIMIT 20";
	$results59 = mysqli_query($conn, $query3);
    while ($row59 = mysqli_fetch_assoc($results59)) {
	  
		set_time_limit(30);
	$like_count = $like_count + 1;
	}

?>
<?php
$query12 = "SELECT * FROM likes WHERE username = '$username' LIMIT 100";
	$results64 = mysqli_query($conn, $query12);
    while ($row64 = mysqli_fetch_assoc($results64)) {
	  
		set_time_limit(30);
	$like_count2 = $like_count2 + 1;
	}

?>

<?php
$query4 = "SELECT * FROM followers WHERE following = '$username' LIMIT 20";
	$results60 = mysqli_query($conn, $query4);
    while ($row60 = mysqli_fetch_assoc($results60)) {
	  
		set_time_limit(30);
	$follower_count = $follower_count + 1;
	}

?>



<!DOCTYPE html>
<html lang="en">
<head>

	<title>Community Badges</title>

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


</head>
<body>


<!-- Fixed Sidebar Left -->
<?php include 'side_panel.php';?>

<?php include 'header.php'; ?>

		<?php include 'mobile_header.php';?>


		<!-- Responsive Header -->
<!-- Main Header Badges -->

<div class="main-header">
	<div class="content-bg-wrap">
		<div class="content-bg bg-badges"></div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 m-auto col-md-8 col-sm-12 col-xs-12">
				<div class="main-header-content">
					<h1>Collect your Badges!</h1>
					<p>Welcome to your badge collection! Here you’ll find all the badges you can unlock to show on your
						profile. Learn how to achive the goal to adquire them and collect them all. Some have leveled
						tiers and other don’t. You can challenge your friends to see who gets more and let the fun begin!
					</p>
				</div>
			</div>
		</div>
	</div>

	<img class="img-bottom" src="img/badges-bottom.png" alt="friends">
</div>

<!-- ... end Main Header Badges -->


<!-- Main Content Badges -->

<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="img/badge1.png" alt="author">
						<div class="label-avatar bg-primary"></div>
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Getiing Started</a>
						<div class="birthday-date">Hey, I am getting started</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 100%"></span>
						</div>
					</div>

				</div>
			</div>


			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="img/badge8.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Nothing to Hide</a>
						<div class="birthday-date">You have completed all your profile fields.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: <?php echo $profile_info_count;?>%"></span>
						</div>
					</div>

				</div>
			</div>

<?php $question_count =  $question_count * 20;?>

			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="img/badge2.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Questionaire</a>
						<div class="birthday-date">Ask 5 Questions</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: <?php echo $question_count;?>%"></span>
						</div>
					</div>

				</div>
			</div>
<?php $answer_count = $answer_count * 20;?>
			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="img/badge3.png" alt="author">
						<div class="label-avatar bg-blue">4</div>
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Friendly User</a>
						<div class="birthday-date">Answer 5 Questions</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: <?php echo $answer_count;?>%"></span>
						</div>
					</div>

				</div>
			</div>
<?php $like_count = $like_count * 5;?>
			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="img/badge11.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Superliked Hero</a>
						<div class="birthday-date">You have collected more than 100 likes</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: <?php echo $like_count;?>%"></span>
						</div>
					</div>

				</div>
			</div>




			<!-- <div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="img/badge5.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Expert Filmaker</a>
						<div class="birthday-date">You have uploaded more than 80 videos to your profile.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 70%"></span>
						</div>
					</div>

				</div>
			</div> -->

			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="img/badge14.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Friendship Cultivator</a>
						<div class="birthday-date">More than 20 prople follow you</div>
					</div>
<?php $follower_count = $follower_count * 5;?>
					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: <?php echo $follower_count;?>%"></span>
						</div>
					</div>

				</div>
			</div>

<!-- 
			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="img/badge7.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Universe Explorer</a>
						<div class="birthday-date">You have visited more than 100 different user profiles.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 100%"></span>
						</div>
					</div>

				</div>
			</div> -->
<?php
$ninja = $question_count + $answer_count + $follower_count + $like_count;
if ($ninja == '100'){
	$ninja = 100;
} 
else {
	$ninja = 0;
}


?>
			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="img/badge6.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Novice To Ninja</a>
						<div class="birthday-date">From Novice To Ninja</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: <?php echo $ninja;?>%"></span>
						</div>
					</div>

				</div>
			</div>
<?php $message = $message * 5;?>
			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="img/badge9.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Messaging Master</a>
						<div class="birthday-date">You have messaged with at least 20 different people.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: <?php echo $message;?>%"></span>
						</div>
					</div>

				</div>
			</div>

			<!-- <div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="img/badge10.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Musical Sharer</a>
						<div class="birthday-date">You have linked your Spotify account to share your playlist.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 33%"></span>
						</div>
					</div>

				</div>
			</div> -->

			<!-- <div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="img/badge11.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Superliked Hero</a>
						<div class="birthday-date">You have collected more than 100 likes in one post.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 100%"></span>
						</div>
					</div>

				</div>
			</div> -->
<?php $like_count2 = $like_count2;?>
			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="img/badge12.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Strongly Caffeinated </a>
						<div class="birthday-date">You have liked more than 100 posts.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: <?php echo $like_count2;?>%"></span>
						</div>
					</div>

				</div>
			</div>

			<!-- <div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="img/badge13.png" alt="author">
						<div class="label-avatar bg-breez">2</div>
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Events Promoter</a>
						<div class="birthday-date">You have created more than 25 public or private events. Next Tier: 50.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 100%"></span>
						</div>
					</div>

				</div>
			</div> -->

			<!-- <div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="img/badge14.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Friendship Cultivator</a>
						<div class="birthday-date">You have tagged friends on 200 different posts.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: 80%"></span>
						</div>
					</div>

				</div>
			</div> -->
<?php $professional = $answer_count + $follower_count + $like_count + $like_count2 + $message + $question_count;
if ($professional == '600') {
	$sql19 = "UPDATE users SET cateogary='pro' WHERE username='$username'";
    if ($conn->query($sql19)) {
	}
	
}
?>
			<div class="ui-block">
				<div class="birthday-item inline-items badges">
					<div class="author-thumb">
						<img src="img/badge15.png" alt="author">
					</div>
					<div class="birthday-author-name">
						<a href="#" class="h6 author-name">Professional</a>
						<div class="birthday-date">Now you are professional,you can answer,like,upvote without any need of approval.</div>
					</div>

					<div class="skills-item">
						<div class="skills-item-meter">
							<span class="skills-item-meter-active" style="width: <?php if($check_pro == 'novice') {
                                echo 0;
                            } else{
                                echo 100;
                            }?>%"></span>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
</div>

<!-- ... end Main Content Badges -->


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

</body>

</html>
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
