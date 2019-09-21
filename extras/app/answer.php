<?php
include 'include_profile.php';

include 'include.php';

session_start();

if ( $_SESSION['logged_in'] != 1 ) {
	echo "You must log in before viewing your profile page!";
	   
  }
else {
$ques_id = $_GET['ques_id'];
$username = $_SESSION['username'];
if (isset($_REQUEST['submit'])) {
	$answer = mysqli_real_escape_string($conn, $_POST['answer']);
	$ans = htmlspecialchars($answer);
	$ques_id = $_REQUEST['ques_id'];
	$user = $_SESSION['username'];
	$notification = "added an answer";
	$date_answered = date('Y-m-d');
	$time_answered = date('H:i:s');
	$sql1 = "INSERT INTO answers (ques_id,  answer, answered_by, date_answered , time_answered) " 
	. "VALUES ('$ques_id','$ans','$user', '$date_answered', '$time_answered')";
	
	
    if ($conn->query($sql1)){
		
		header("location:newsfeed.php");
		
	}
	else {
		echo"nai hua";
	}
}    
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>ANSWER</title>

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
	<link rel="stylesheet" type="text/css" href="css/swiper.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">

</head>
<body>


<!-- Fixed Sidebar Left -->
<?php include 'side_panel.php';?>

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

<div class="header-spacer header-spacer-small"></div>


<div class="container">
	<div class="row m-t-50">

		<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
				<article class="hentry blog-post single-post single-post-v3">
<?php
$asked_pro = $_GET['asked_by'];
$query_pro="SELECT * FROM users WHERE username = '$asked_pro'";
$results_pro = mysqli_query($conn,$query_pro);

while ($row_pro = mysqli_fetch_assoc($results_pro)) {
$profi = $row_pro['profile_hash'];
}
?>
		

					<ul class="filter-icons">
						
					</ul>
					<h3 class="title"><b><?php echo $_GET['question'];?></b><br></h3>

					<div class="author-date">
						<div class="author-thumb">
							<img alt="author" src="https://res.cloudinary.com/novicetopro/profile_pictures/28X28/<?php echo $profi;?>" class="avatar">
						</div>
						by
						<a class="h6 post__author-name fn" <?php echo ' href="people_profile.php?profile_username=' . $_GET['asked_by'] . '">'?><?php echo $_GET['asked_by'];?><br><br><br></a>
						<div class="post__date">
						</div>
					</div>


					<div class="post-content-wrap">

						

						<div class="post-content">
						<div class="tab-pane" id="profile-1" role="tabpanel" aria-expanded="true">
						<form method="post" action="answer.php">
								
							<textarea id="editor" name="answer" >Write your answer here!</textarea>
							<input type="hidden" name="ques_id" value="<?php echo $ques_id ?>"/>
							<script>
									ClassicEditor
									
									.create( document.querySelector( '#editor' ) )
									.then( editor => {
									console.log( editor );
									} )
									.catch( error => {
									console.error( error );
								} );
							</script>
							 <button type="submit" class="btn btn-primary" name="submit" >submit</button>

							</form>
							
						</div>
						<br><br>
						_____________________________________________________________________________________________________________________
						
						<h3 class="title"><b><font color="#887E7C">Checkout other answers---</font></b><br></h3>
						<?php
$query1="SELECT * FROM answers WHERE ques_id = '$ques_id' ORDER BY upvotes DESC";
$results1 = mysqli_query($conn,$query1);
while ($row1 = mysqli_fetch_assoc($results1)) {
	$answered_by1 = $row1['answered_by'];
	$query_pro="SELECT * FROM users WHERE username = '$answered_by1'";
$results_pro = mysqli_query($conn,$query_pro);

while ($row_pro = mysqli_fetch_assoc($results_pro)) {
$profil = $row_pro['profile_hash'];
}
?>
		<br><br><br><br><br>
		
						<div class="author-date">
						<div class="author-thumb">
							<img alt="author" src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profil;?>" class="avatar">
						</div>
						by
						<a class="h6 post__author-name fn" href="#"><?php echo $row1['answered_by'];?><br><br><br></a>
						<div class="post__date">
						</div>
					</div>


		<p><?php echo htmlspecialchars_decode($row1['answer']); ?></p>
		----answered by<a <?php echo ' href="people_about.php?profile_username=' . $answered_by1 . '">'?> <cite><?php echo htmlspecialchars($answered_by1);  ?></cite></a>
		_____________________________________________________________________________________________________________________
<?php }
?>
				</article>
			


				
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
			<aside>
				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">Related Questions</h6>
					</div>
				</div>

				<div class="ui-block">
					<article class="hentry blog-post blog-post-v3 featured-post-item">

<?php


$query="SELECT * FROM questions  ORDER BY RAND() LIMIT 4";
$results = mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($results)) {
	?>
						<div class="post-content">

							<div class="author-date">
								by
								<a class="h6 post__author-name fn" href="#"><?php echo $row['asked_by'];?></a>
								<div class="post__date">
									<time class="published" datetime="2017-03-24T18:18">
										- 5 MONTHS ago
									</time>
								</div>
							</div>

							<a class="h4 post-title" <?php echo ' href="answer.php?question=' . $row['question'] .  '&asked_by=' .$row['asked_by']  . '&ques_id=' .$row['ques_id'].'">'?><?php echo substr($row['question'],0,33); ?>...</a>

							<div class="post-additional-info inline-items">

								<ul class="friends-harmonic">
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
									<li>
										<a href="#">
											<img src="img/icon-chat2.png" alt="icon">
										</a>
									</li>
								</ul>
								<div class="names-people-likes">
									206
								</div>

								<div class="comments-shared">
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-speech-balloon-icon"><use xlink:href="icons/icons.svg#olymp-speech-balloon-icon"></use></svg>
										<span>97</span>
									</a>
								</div>

							</div>
						</div>
						<?php } ?>
					</article>
				</div>



				
			</aside>
		</div>

	</div>

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

<!-- Load more news AJAX script -->
<script src="js/ajax-pagination.js"></script>

<!-- Swiper / Sliders -->
<script src="js/swiper.jquery.min.js"></script>

<script src="js/isotope.pkgd.min.js"></script>

<script src="js/mediaelement-and-player.min.js"></script>
<script src="js/mediaelement-playlist-plugin.min.js"></script>

</body>
</html>
<?php
}
?>