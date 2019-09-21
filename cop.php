<?php
include 'include.php';
include 'include_profile.php';
session_start();
include 'include.php';
$username = $_SESSION['username'];
$query="SELECT * FROM users WHERE username = '$username'";
$results56 = mysqli_query($conn,$query);
while ($row56 = mysqli_fetch_assoc($results56)) {
$veri = $row56['verified'];
if($veri != '1') {
    ?>
<script type="text/javascript">
window.location.href = 'verify_page.php';
</script>
<?php
}
}
?>
<?php
$current_time = date('Y-m-d H:i:s');
$sql19 = "UPDATE users SET last_activity='$current_time' WHERE username='$username'";
if ( $conn->query($sql19) ){
			    
		}

$query_song="SELECT * FROM users WHERE username = '$username'";
$results_song = mysqli_query($conn,$query_song);
while ($row_songs = mysqli_fetch_assoc($results_song)) {
	$tutorial = $row_songs['tutorial'];
	$music_widget = $row_songs['song_widget'];
	$profile_exist = $row_songs['profile_hash'];
	
}
$query="SELECT * FROM answers WHERE answered_by IN (SELECT following FROM followers WHERE user1 = '$username') ORDER BY answer_id ASC";
$results = mysqli_query($conn,$query);

?>


<!DOCTYPE html>
<html lang="en">
<head>

	<title>Newsfeed</title>

	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Main Font -->
	<script src="js/webfontloader.min.js"></script>
	<script>
		WebFont.load({
			google: {
				families: ['Roboto:300,400,500,700:latin']
			}
		});
	</script>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-grid.css">

	<!-- Theme Styles CSS -->
	<link rel="stylesheet" type="text/css" href="css/theme-styles.css">
	<link rel="stylesheet" type="text/css" href="css/blocks.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">

	<!--Bootstrap Tour CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/css/bootstrap-tour-standalone.min.css" rel="stylesheet"/>
	<!-- END -->

	<!-- Styles for plugins -->
	<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" type="text/css" href="css/simplecalendar.css">
	<link rel="stylesheet" type="text/css" href="css/daterangepicker.css">
	<!-- Lightbox popup script-->
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
	<!-- Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>

<!-- Fixed Sidebar Left -->
<?php include 'side_panel.php';?>
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
<?php include'header.php'; ?>


<!-- ... end Header -->


<!-- Responsive Header -->
<?php include 'mobile_header.php';?>
<!-- ... end Responsive Header -->

<div class="header-spacer"></div>


					<?php 
						$div_id = 0;
					?>
<div class="container">
	<div class="row" id="step1">

		<!-- Main Content -->

		<main class="col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-xs-12">

			<div class="ui-block" id="step2">
				<div class="news-feed-form">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active inline-items" data-toggle="tab" href="#home-1" role="tab" aria-expanded="true">

								<svg class="olymp-status-icon"><use xlink:href="icons1/icons.svg#olymp-status-icon"></use></svg>

								<span>Ask</span>
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link inline-items" data-toggle="tab" href="#blog" role="tab" aria-expanded="false">
								<svg class="olymp-blog-icon"><use xlink:href="icons1/icons.svg#olymp-blog-icon"></use></svg>

								<span>Blog Post</span>
							</a>
						</li>
					</ul>
					<form action="newsfeed.php" method="post" > 

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
						<form>
								<div class="author-thumb">
									<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profile_hash1;?>" alt="author">
								</div>
								<div class="form-group with-icon label-floating is-empty">
									<label class="control-label">Ask something</label>
									<textarea class="form-control" placeholder="" name="question"></textarea>
								</div>
								<div class="add-options-message">
									<!--<a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
										<svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xlink:href="icons1/icons.svg#olymp-camera-icon"></use></svg>
									</a>
									<a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
										<svg class="olymp-computer-icon"><use xlink:href="icons1/icons.svg#olymp-computer-icon"></use></svg>
									</a>

									<a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
										<svg class="olymp-small-pin-icon"><use xlink:href="icons1/icons.svg#olymp-small-pin-icon"></use></svg>
									</a>
									-->
									<button class="btn btn-primary btn-md-2" type="submit" name="submit">Ask question</button>
							

								</div>

							</form>
						</div>

					
						<div class="tab-pane" id="blog" role="tabpanel" aria-expanded="true">
						<form action="newsfeed.php" method="post" > 
						<div class="author-thumb">
									<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profile_hash1;?>" alt="author">
								</div>
								<div class="form-group with-icon label-floating is-empty">
									<label class="control-label">Post on blog</label>
									<textarea class="form-control" placeholder="" name="blog_post" ></textarea>
								</div>
								<div class="add-options-message">
									<!--<a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
										<svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xlink:href="icons1/icons.svg#olymp-camera-icon"></use></svg>
									</a>
									<a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
										<svg class="olymp-computer-icon"><use xlink:href="icons1/icons.svg#olymp-computer-icon"></use></svg>
									</a>

									<a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
										<svg class="olymp-small-pin-icon"><use xlink:href="icons1/icons.svg#olymp-small-pin-icon"></use></svg>
									</a>
									-->
									<button class="btn btn-primary btn-md-2" name="post">Post</button>

								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
			<div id="newsfeed-items-grid">

<?php
			if ($profile_exist == "author-page1"){
?>
			<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
			<a href="user_profile.php" class="btn btn-secondary btn-md-2">Update profile picture</a>
		</div>
			<?php } ?>
			
<?php			
while ($row = mysqli_fetch_assoc($results)) {

	$div_id = $div_id + 1;
	$image_exist = $row['image_src'];
	if($image_exist == ""){
?>

				
				<div class="ui-block">
					<article class="hentry post has-post-thumbnail">
					<?php
					$pro_user11 = $row['answered_by'];
					$query_pro11="SELECT * FROM users WHERE username = '$pro_user11'";
					$results_pro11 = mysqli_query($conn,$query_pro11);
						
						while ($row_pro11 = mysqli_fetch_assoc($results_pro11)) {
						$profil11 = $row_pro11['profile_hash'];
						}
						?>
						<div class="post__author author vcard inline-items">
							<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profil11;?>" alt="author">

							<div class="author-date">
								<a class="h6 post__author-name fn" <?php echo ' href="people_profile.php?profile_username=' . $row['answered_by'] . '">'?><?php echo htmlspecialchars($row['answered_by']); ?></a>
								<div class="post__date">
									<time class="published" datetime="2004-07-24T18:18">
										<?php echo $row['date_answered'];?>
									</time>
								</div>
							</div>

							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Edit Post</a>
									</li>
									<li>
										<a href="#">Delete Post</a>
									</li>
									<li>
										<a href="#">Turn Off Notifications</a>
									</li>
									<li>
										<a href="#">Select as Featured</a>
									</li>
								</ul>
							</div>

						</div>
						<?php
$question_id = $row['ques_id'];
$query_ques="SELECT * FROM questions WHERE ques_id = '$question_id'";
$results_ques = mysqli_query($conn,$query_ques);
?>						
<?php			
while ($row_ques = mysqli_fetch_assoc($results_ques)) {


?>
						<p><b><h3><?php echo htmlspecialchars($row_ques['question']); ?></h3>
						</b><br>
						<?php
						$question_name = htmlspecialchars_decode($row['answer']);
						?>
						<?php echo substr($question_name,0,1144);  ?><a  <?php echo ' href="view_answer.php?answer_id=' . $row['answer_id'] . '&ques_id=' .$row['ques_id'].'"> ... Read more</a>'?>
<?php } ?>
						<div class="post-additional-info inline-items">

											

						
					
							<ul class="friends-harmonic">
							<?php
							$total_likes = 0;
							$answerr_id = $row['answer_id'];
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
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="icons1/icons.svg#olymp-heart-icon"></use></svg>
								<span><?php echo $total_likes; ?></span>
							</a>

									
							<div class="names-people-likes">
							<a href="#"></a> <a href="#">
								</a>
							</div>
							
							<div class="comments-shared">
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-speech-balloon-icon"><use xlink:href="icons1/icons.svg#olymp-speech-balloon-icon"></use></svg>
									<span>17</span>
								</a>

								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-share-icon"><use xlink:href="icons1/icons.svg#olymp-share-icon"></use></svg>
									<span>24</span>
								</a>
							</div>
						</div>
						
						<?php
						$answer_id = $row['answer_id'];
						$like_result = $conn->query("SELECT * FROM likes WHERE username='$username' AND ans_id = '$answer_id'");
						?>

						<div class="control-block-button post-control-button">
							<form id="like<?php echo $div_id ?>"  method="post" <?php echo ' action="like.php?username=' . $username . '&answer_id=' .$row['answer_id'].'"> '?> 

								<a id="submit<?php echo $div_id?>" class="btn btn-control">
									<input type="hidden" name="username" value="<?php echo $username; ?>">
									<input type="hidden" name="answer_idd" value="<?php echo $row['answer_id']; ?>">
									<svg  class="olymp-like-post-icon" ><use  xlink:href="icons1/icons.svg#olymp-like-post-icon"></use></svg>

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
						</div>
						
					</article>

					<?php
$answer_id = $row['answer_id'];
$query_comment="SELECT * FROM comment WHERE answer_id = '$answer_id' LIMIT 3";
$results_comment = mysqli_query($conn,$query_comment);

?>						
<?php			
while ($row_comment = mysqli_fetch_assoc($results_comment)) {

	$comment_user = $row_comment['username'];

?>						
	<?php			
	
	$query_comment_user="SELECT * FROM users WHERE username = '$comment_user'";
	$results_comment_user = mysqli_query($conn,$query_comment_user);
	while ($row_comment_user = mysqli_fetch_assoc($results_comment_user)) {
	$profile_image_src = $row_comment_user['profile_hash'];
	}
	

?>					
<?php } ?>

<form method="post" action="loadData.php">
<input style="color:#1D42CD" type="button" id="display<?php echo $div_id;?>" value="View more comments" > 
<input type="hidden" name="answer_id" value="<?php echo $answer_id; ?>"/>
</form>
<script>

$(document).ready(function() {

$("#display<?php echo $div_id;?>").click(function() {                

	$.ajax({    //create an ajax request to display.php
		type: "GET",
		url: "loadData.php?answer_id=<?php echo $answer_id;?>",             
		dataType: "html",   //expect html to be returned                
		success: function(response){                    
				$("#responsecontainer<?php echo $div_id;?>").html(response); 
				//alert(response);
		}

});
});
});
</script>
<ul id="responsecontainer<?php echo $div_id;?>" class="comments-list">
</ul>
<ul id="result_comment<?php echo $div_id?>" class="comments-list">

</ul>

					<form id="comment_form<?php echo $div_id; ?>" class="comment-form inline-items" method="post"<?php echo ' action="post_comment.php?answer_id=' . $answer_id . '">'?>

						<div class="post__author author vcard inline-items">
							<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profile_hash1;?>" alt="author">

							<div class="form-group with-icon-right ">
								<textarea id="myInput" class="form-control" placeholder="Write your comment..." name="comment" ></textarea>
								<div class="add-options-message">
									<a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
									</a>
								</div>
							</div>
						</div>
						<button id="submit_comment<?php echo $div_id;?>" class="btn btn-md-2 btn-primary" type="submit" name="post_comment">Post Comment</button>
					
					<button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel</button>

					</form>

				</div>
				
				<span "></span>
							
							<script>
$("#submit_comment<?php echo $div_id?>").click( function() {
    $.post( $("#comment_form<?php echo $div_id?>").attr("action"), $("#comment_form<?php echo $div_id?> :input").serializeArray(), function(info){ $("#result_comment<?php echo $div_id?>").html(info);});
});

$("#comment_form<?php echo $div_id?>").submit( function() {
    return false;
});
</script>
				<?php } 
				else {
					?>
					<div class="ui-block">
					<article class="hentry post has-post-thumbnail">
					<?php
					$pro_user11 = $row['answered_by'];
					$query_pro11="SELECT * FROM users WHERE username = '$pro_user11'";
					$results_pro11 = mysqli_query($conn,$query_pro11);
						
						while ($row_pro11 = mysqli_fetch_assoc($results_pro11)) {
						$profil11 = $row_pro11['profile_hash'];
						}
						?>
						<div class="post__author author vcard inline-items">
							<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profil11;?>" alt="author">

							<div class="author-date">
								<a class="h6 post__author-name fn" <?php echo ' href="people_profile.php?profile_username=' . $row['answered_by'] . '">'?><?php echo htmlspecialchars($row['answered_by']); ?></a>
								<div class="post__date">
									<time class="published" datetime="2004-07-24T18:18">
									<?php echo $row['date_answered'];?>
									</time>
								</div>
							</div>

							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Edit Post</a>
									</li>
									<li>
										<a href="#">Delete Post</a>
									</li>
									<li>
										<a href="#">Turn Off Notifications</a>
									</li>
									<li>
										<a href="#">Select as Featured</a>
									</li>
								</ul>
							</div>

						</div>
						<?php
$question_id = $row['ques_id'];
$query_ques="SELECT * FROM questions WHERE ques_id = '$question_id'";
$results_ques = mysqli_query($conn,$query_ques);
?>						
<?php			
while ($row_ques = mysqli_fetch_assoc($results_ques)) {


?>
						<p><b><h3><?php echo htmlspecialchars($row_ques['question']); ?></h3>
						</b><br>
						<?php
						$question_name = htmlspecialchars_decode($row['answer']);
						?>
						<?php echo substr($question_name,0,1144);  ?><a  <?php echo ' href="view_answer.php?answer_id=' . $row['answer_id'] . '&ques_id=' .$row['ques_id'].'"> ... Read more</a>'?>
<?php } ?>

						<div class="post-thumb">
							<img src="https://res.cloudinary.com/novicetopro/answer_uploads/<?php echo $row['image_src'];?>" alt="photo">
						</div>

						<div class="post-additional-info inline-items">

						
							<ul class="friends-harmonic">
							<?php
							$total_likes = 0;
							$answerr_id = $row['answer_id'];
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
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="icons1/icons.svg#olymp-heart-icon"></use></svg>
								<span><?php echo $total_likes; ?></span>
							</a>

									
							<div class="names-people-likes">
							<a href="#"></a> <a href="#">
								</a>
							</div>
							
							<div class="comments-shared">
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-speech-balloon-icon"><use xlink:href="icons1/icons.svg#olymp-speech-balloon-icon"></use></svg>
									<span>17</span>
								</a>

								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-share-icon"><use xlink:href="icons1/icons.svg#olymp-share-icon"></use></svg>
									<span>24</span>
								</a>
							</div>
						</div>
												<?php
						$answer_id = $row['answer_id'];
						$like_result = $conn->query("SELECT * FROM likes WHERE username='$username' AND ans_id = '$answer_id'");
						?>

						<div class="control-block-button post-control-button">
						<form id="like<?php echo $div_id ?>"  method="post" <?php echo ' action="like.php?username=' . $username . '&answer_id=' .$row['answer_id'].'"> '?> 

<a id="submit<?php echo $div_id?>" class="btn btn-control">
	<input type="hidden" name="username" value="<?php echo $username; ?>">
	<input type="hidden" name="answer_idd" value="<?php echo $row['answer_id']; ?>">
	<svg  class="olymp-like-post-icon" ><use  xlink:href="icons1/icons.svg#olymp-like-post-icon"></use></svg>

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
										</div>

					</article>

					<?php
$answer_id = $row['answer_id'];
$query_comment="SELECT * FROM comment WHERE answer_id = '$answer_id' LIMIT 3";
$results_comment = mysqli_query($conn,$query_comment);

?>						
<?php			
while ($row_comment = mysqli_fetch_assoc($results_comment)) {

	$comment_user = $row_comment['username'];

?>						
	<?php			
	
	$query_comment_user="SELECT * FROM users WHERE username = '$comment_user'";
	$results_comment_user = mysqli_query($conn,$query_comment_user);
	while ($row_comment_user = mysqli_fetch_assoc($results_comment_user)) {
	$profile_image_src = $row_comment_user['profile_hash'];
	}
	

?>					
					<ul class="comments-list">
						<li>
							<div class="post__author author vcard inline-items">
								<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profile_image_src;?>" alt="author">

								<div class="author-date">
									<a class="h6 post__author-name fn"  <?php echo ' href="people_profile.php?profile_username=' . $row_comment['username'] . '">'?><?php echo $row_comment['username'];?></a>
									<div class="post__date">
										<time class="published" datetime="2004-07-24T18:18">
										<?php echo $row_comment['time'];?>
										</time>
									</div>
								</div>

								<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg></a>

							</div>

							<p><?php echo $row_comment['comment'];?></p>

							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="icons1/icons.svg#olymp-heart-icon"></use></svg>
								<span>8</span>
							</a>
							<a href="#" class="reply">Reply</a>
						</li>
					</ul>
<?php } ?>
					<a href="#" class="more-comments">View more comments <span>+</span></a>

					<form id="comment_form<?php echo $div_id; ?>" class="comment-form inline-items" method="post"<?php echo ' action="post_comment.php?answer_id=' . $answer_id . '">'?>

						<div class="post__author author vcard inline-items">
							<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profile_hash1;?>" alt="author">

							<div class="form-group with-icon-right ">
								<textarea id="myInput" class="form-control" placeholder="Write your comment..." name="comment" ></textarea>
								<div class="add-options-message">
									<a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
									</a>
								</div>
							</div>
						</div>
						<button id="submit_comment<?php echo $div_id;?>" class="btn btn-md-2 btn-primary" type="submit" name="post_comment">Post Comment</button>
					
					<button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel</button>

					</form>

				</div>
				
				<span id="result_comment<?php echo $div_id?>"></span>
							
							<script>
$("#submit_comment<?php echo $div_id?>").click( function() {
    $.post( $("#comment_form<?php echo $div_id?>").attr("action"), $("#comment_form<?php echo $div_id?> :input").serializeArray(), function(info){ $("#result_comment<?php echo $div_id?>").html(info);});
});

$("#comment_form<?php echo $div_id?>").submit( function() {
    return false;
});
</script>
				<?php
				} }
?>
			</div>
<a id="" href="find_friends.php" class="btn btn-sm bg-blue" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">Follow More People,to see new posts</a>




		</main>

		<!-- ... end Main Content -->


		<!-- Left Sidebar -->

		<aside class="col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="widget w-wethear">
				<a class="weatherwidget-io" href="https://forecast7.com/en/20d5978d96/india/" data-label_1="INDIA" data-label_2="WEATHER" data-theme="sky" >INDIA WEATHER</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
				</div>
			</div>


			<div class="ui-block">
				<div class="calendar-container">
					<div class="calendar">
						<header>
							<h6 class="month">March 2017</h6>
							<a class="calendar-btn-prev fontawesome-angle-left" href="#"></a>
							<a class="calendar-btn-next fontawesome-angle-right" href="#"></a>
						</header>
						<table>
							<thead>
							<tr><td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td><td>Sat</td><td>San</td></tr>
							</thead>
							<tbody>
							<tr>
								<td date-month="12" date-day="1">1</td>
								<td date-month="12" date-day="2" class="event-uncomplited event-complited">
									2
								</td>
								<td date-month="12" date-day="3">3</td>
								<td date-month="12" date-day="4">4</td>
								<td date-month="12" date-day="5">5</td>
								<td date-month="12" date-day="6">6</td>
								<td date-month="12" date-day="7">7</td>
							</tr>
							<tr>
								<td date-month="12" date-day="8">8</td>
								<td date-month="12" date-day="9">9</td>
								<td date-month="12" date-day="10" class="event-complited">10</td>
								<td date-month="12" date-day="11">11</td>
								<td date-month="12" date-day="12">12</td>
								<td date-month="12" date-day="13">13</td>
								<td date-month="12" date-day="14">14</td>
							</tr>
							<tr>
								<td date-month="12" date-day="15" class="event-complited-2">15</td>
								<td date-month="12" date-day="16">16</td>
								<td date-month="12" date-day="17">17</td>
								<td date-month="12" date-day="18">18</td>
								<td date-month="12" date-day="19">19</td>
								<td date-month="12" date-day="20">20</td>
								<td date-month="12" date-day="21">21</td>
							</tr>
							<tr>
								<td date-month="12" date-day="22">22</td>
								<td date-month="12" date-day="23">23</td>
								<td date-month="12" date-day="24">24</td>
								<td date-month="12" date-day="25">25</td>
								<td date-month="12" date-day="26">26</td>
								<td date-month="12" date-day="27">27</td>
								<td date-month="12" date-day="28" class="event-uncomplited">28</td>
							</tr>
							<tr>
								<td date-month="12" date-day="29">29</td>
								<td date-month="12" date-day="30">30</td>
								<td date-month="12" date-day="31">31</td>
							</tr>
							</tbody>
						</table>
						
					</div>
				</div>
			</div>
			<?php
$query2="SELECT * FROM users WHERE username NOT IN (SELECT following FROM followers WHERE user1 = '$username')AND cateogary = 'pro' ORDER BY RAND() LIMIT 6";
$results2 = mysqli_query($conn,$query2);
?>
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Professionals to follow</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<?php
while ($row2 = mysqli_fetch_assoc($results2)) {
	$pro221 = $row2['username'];
	$query_pro221="SELECT * FROM users WHERE username = '$pro221'";
	$results_pro221 = mysqli_query($conn,$query_pro221);

while ($row_pro221 = mysqli_fetch_assoc($results_pro221)) {
$profil221 = $row_pro221['profile_hash'];
}

?>
				<ul class="widget w-friend-pages-added notification-list friend-requests">
					<li class="inline-items">
						<div class="author-thumb">
							<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profil221;?>" alt="author">
						</div>
						<div class="notification-event">
						<a class="h6 notification-friend"<?php echo ' href="people_about.php?profile_username=' . $row2['username'] . '">'?><?php echo htmlspecialchars($row2['username']); ?></a>
						</div>
						<span class="notification-icon" data-toggle="tooltip" data-placement="top" title="ADD TO YOUR FAVS">
						<a <?php echo ' href="people_about.php?profile_username=' . $row2['username'] .'"'?>>
								<svg class="olymp-star-icon"><use xlink:href="icons1/icons.svg#olymp-star-icon"></use></svg>
							</a>
						</span>

					</li>

			<?php	} ?>
				</ul>

			</div>
<?php
if ($music_widget == "on"){
		?>	<div class="ui-block" id="step6">
				<div class="ui-block-title">
					<h6 class="title">Best songs</h6>
					<a href="#" class="more">
						<span class="c-green">
								<svg class="olymp-remove-playlist-icon"><use xlink:href="icons1/icons.svg#olymp-remove-playlist-icon"></use></svg>
							</span>
					</a>
					
				</div>

				<ol class="widget w-playlist">
					<iframe width="100%" height="600" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/users/19990062&color=%234e7366&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>

</div>

					<?php }
					?>
						<!-- ... end Left Sidebar -->
</aside>
		<!-- Right Sidebar -->

		<aside class="col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-xs-12">

			<div class="ui-block" id="step3" >
				<div class="ui-block-title">
					<h6 class="title">Answer questions</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<?php
					$query2="SELECT * FROM questions WHERE asked_by IN (SELECT following FROM followers WHERE user1 = '$username')LIMIT 7";
					$results2 = mysqli_query($conn,$query2);
					while ($row2 = mysqli_fetch_assoc($results2)) {
						$pro_user = $row2['asked_by'];
						$query_pro="SELECT * FROM users WHERE username = '$pro_user'";
						$results_pro = mysqli_query($conn,$query_pro);
						
						while ($row_pro = mysqli_fetch_assoc($results_pro)) {
						$profil = $row_pro['profile_hash'];
						}
						?>
						
				<ul class="widget w-friend-pages-added notification-list friend-requests">
					<li class="inline-items">
						<div class="author-thumb">
							<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profil;?>" alt="author">
						</div>
						<div class="notification-event">
						<a  class="h6 notification-friend" <?php echo ' href="answer.php?question=' . $row2['question'] .  '&asked_by=' .$row2['asked_by']  . '&ques_id=' .$row2['ques_id'].'">'?><?php echo substr($row2['question'],0,19); ?>...</a>
						<span class="chat-message-item"><?php echo substr($row2['asked_by'],0,20); ?></span>
						</div>
						<span class="notification-icon">
							<a href="#" class="accept-request">
								<span class="icon-add without-text">
									<svg class="olymp-happy-face-icon"><use xlink:href="icons1/icons.svg#olymp-happy-face-icon"></use></svg>
								</span>
							</a>
						</span>

					</li>
					<?php
					}?>

				</ul>

			</div>


			<div class="ui-block" id="step4">
				<div class="ui-block-title">
					<h6 class="title">Friend Suggestions</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<?php
				
$query112="SELECT * FROM users WHERE username NOT IN (SELECT following FROM followers WHERE user1 = '$username')ORDER BY RAND() LIMIT 6";
$results112 = mysqli_query($conn,$query112);
while ($row112 = mysqli_fetch_assoc($results112)) {

?>
				<ul class="widget w-friend-pages-added notification-list friend-requests">
					<li class="inline-items">
						<div class="author-thumb">
							<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $row112['profile_hash'];?>" alt="author">
						</div>
						<div class="notification-event">
						<a class="h6 notification-friend"<?php echo ' href="people_profile.php?profile_username=' . $row112['username'] . '">'?><?php echo htmlspecialchars($row112['username']); ?></a>
						</div>
						<span class="notification-icon">
							<a class="accept-request" <?php echo ' href="people_about.php?profile_username=' . $row112['username'] . '">'?>
								<span class="icon-add without-text">
									<svg class="olymp-happy-face-icon"><use xlink:href="icons1/icons.svg#olymp-happy-face-icon"></use></svg>
								</span>
							</a>
						</span>

					</li>

					<?php } ?>

				</ul>

			</div>
			

			<div class="ui-block"id="step5">

				<div class="ui-block-title">
					<h6 class="title">Activity Feed</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>

				<ul class="widget w-activity-feed notification-list">
				<?php
$query126="SELECT * FROM answers WHERE answered_by IN (SELECT following FROM followers WHERE user1 = '$usernames') ORDER BY answer_id DESC LIMIT 7";
$results126 = mysqli_query($conn,$query126);

?>
 <?php			
                while ($row126 = mysqli_fetch_assoc($results126)) {
                ?>
					<li>
						<?php
						$pro_user12 = $row126['answered_by'];
						$query_pro12="SELECT * FROM users WHERE username = '$pro_user12'";
						$results_pro12 = mysqli_query($conn,$query_pro12);
						
						while ($row_pro12 = mysqli_fetch_assoc($results_pro12)) {
						$profil12 = $row_pro12['profile_hash'];
						}
						?>
						<div class="author-thumb">
							<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profil12;?>" alt="author">
						</div>
						<div class="notification-event">
                                <div><a class="h6 notification-friend"<?php echo ' href="people_profile.php?profile_username=' . $row126['answered_by'] . '">'?><?php echo $row126['answered_by'];?></a> added an answer <a class="notification-link"<?php echo ' href="view_answer2.php?question='  . '&ques_id=' .$row126['answer_id'].'">'?>check now</a></div>
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18"><?php echo $row126['time_answered'];?></time></span>
                            </div>
					</li>

				<?php } ?>
				</ul>
			</div>


			<div class="ui-block">
				<div class="widget w-action">

					<img src="img/logo.png" alt="Olympus">
					<div class="content">
						<h4 class="title">NOVICETOPRO</h4>
						<!--<span>THE BEST SOCIAL NETWORK THEME IS HERE!</span> -->
						<a href="index.php" class="btn btn-bg-secondary btn-md">Register Now!</a>
					</div>
				</div>
			</div>

		</aside>

		<!-- ... end Right Sidebar -->

	</div>
</div>


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


<!-- Window-popup Choose from my Photo -->
<div class="modal fade" id="choose-from-my-photo">
	<div class="modal-dialog ui-block window-popup choose-from-my-photo">
		<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
			<svg class="olymp-close-icon"><use xlink:href="icons1/icons.svg#olymp-close-icon"></use></svg>
		</a>

		<div class="ui-block-title">
			<h6 class="title">Choose from My Photos</h6>

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">
						<svg class="olymp-photos-icon"><use xlink:href="icons1/icons.svg#olymp-photos-icon"></use></svg>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">
						<svg class="olymp-albums-icon"><use xlink:href="icons1/icons.svg#olymp-albums-icon"></use></svg>
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

<!-- Window-popup-CHAT for responsive min-width: 768px -->

<div class="ui-block popup-chat popup-chat-responsive">
	<div class="ui-block-title">
		<span class="icon-status online"></span>
		<h6 class="title" >Chat</h6>
		<div class="more">
			<svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg>
			<svg class="olymp-little-delete js-chat-open"><use xlink:href="icons1/icons.svg#olymp-little-delete"></use></svg>
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
					<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profile_hash1;?>" alt="author" class="mCS_img_loaded">
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
					<svg class="olymp-computer-icon"><use xlink:href="icons1/icons.svg#olymp-computer-icon"></use></svg>
				</a>
				<div class="options-message smile-block">

					<svg class="olymp-happy-sticker-icon"><use xlink:href="icons1/icons.svg#olymp-happy-sticker-icon"></use></svg>

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


<?php
if($tutorial == 0){
   ?> <div class="modal" id="myModal" tabindex="-1" role="dialog">
        
<div class="main-header">
	<div class="content-bg-wrap">
		<div class="content-bg bg-music"></div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 m-auto col-md-8 col-sm-12 col-xs-12">
				<div class="main-header-content">
					<h1><b>Welcome to NOVICETOPRO<b></h1>
					<p>Here you’ll be able to connect professionals in your field
                        Let's fo grom zero to infinity
                    </p>
								<br></div>
								<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Friend Suggestions</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<?php
				
$query1121="SELECT * FROM users WHERE username NOT IN (SELECT following FROM followers WHERE user1 = '$username')ORDER BY RAND() LIMIT 4";
$results1121 = mysqli_query($conn,$query1121);
$follow_id = 0;
while ($row1121 = mysqli_fetch_assoc($results1121)) {
$follow_id = $follow_id + 1;
?>
				<ul class="widget w-friend-pages-added notification-list friend-requests">
					<li class="inline-items">
						<div class="author-thumb">
						<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $row1121['profile_hash'];?>" alt="author">

					</div>
						<div class="notification-event">
						<a class="h6 notification-friend"<?php echo ' href="people_profile.php?profile_username=' . $row1121['username'] . '">'?><?php echo htmlspecialchars($row1121['username']); ?></a>

						</div>
						<span class="notification-icon">
						<form id="follow<?php echo $follow_id ?>"  method="post" <?php echo ' action="follow.php?username=' . $username . '&people_username=' .$row1121['username'].'"> '?> 

						<a class="accept-request" id="follow_btn<?php echo $follow_id; ?>"?>
									<input type="hidden" name="username_user" value="<?php echo $username; ?>">
									<input type="hidden" name="profile_idd" value="<?php echo $row1121['username']; ?>">
								
								<span class="icon-add without-text">
									<svg class="olymp-happy-face-icon"><use xlink:href="icons1/icons.svg#olymp-happy-face-icon"></use></svg>
								</span>
							</a>
						</form>
						<span id="result<?php echo $follow_id?>"></span>
							
						</span>

					</li>
					<script>
$("#follow_btn<?php echo $follow_id?>").click( function() {
    $.post( $("#follow<?php echo $follow_id?>").attr("action"), $("#follow<?php echo $follow_id?> :input").serializeArray(), function(info){ $("#result<?php echo $follow_id?>").html(info);});
});

$("#follow<?php echo $follow_id?>").submit( function() {
    return false;
});
</script>
<?php } ?>

				</ul>

			</div>
                <button type="submit" class="btn btn-purple btn-lg full-width" data-dismiss="modal" aria-label="Close" name="register">Let's get started</button>

			</div>
		</div>
	</div>

	<img class="img-bottom" src="img/group-bottom.png" alt="friends">
</div>

          </div>
        </div>
      </div>
	 <?php
}
if(isset($_POST['submit'])){
$question_char = mysqli_real_escape_string($conn, $_POST['question']);
$question = htmlspecialchars($question_char);
$username = $_SESSION['username'];


$sql = "INSERT INTO questions ( question , asked_by) " 
. "VALUES ('$question' , '$username' )";
if ( $conn->query($sql) ){
	?>
	 <div class="modal" id="myModal1" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>Your question has been submitted<b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
             <p></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" onClick="document.location.href='newsfeed.php'" >Back to home</button>
            </div>
          </div>
        </div>
      </div>
	  <?php
}
}
if(isset($_POST['post'])){
	$blog_post = $_POST['blog_post'];
	$username = $_SESSION['username'];
	
	
	$sql = "INSERT INTO blog ( username , blog_post) " 
	. "VALUES ('$username' , '$blog_post')";
	if ( $conn->query($sql) ){
		?>
		 <div class="modal" id="myModal2" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title"><b>Your update has been published<b></h5>
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</div>
				<div class="modal-body">
				 <p></p>
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-primary" onClick="document.location.href='newsfeed.php'">Back to home</button>
				</div>
			  </div>
			</div>
		  </div>
		  <?php
	}
	}
	

?>


<script>
$("#submit").click( function() {
    $.post( $("#like").attr("action"), $("#like :input").serializeArray(), function(info){ $("#result").html(info);});
});

$("#like") .submit( function() {
    return false;
});
</script>
<!-- Bootstrap Tour -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/js/bootstrap-tour-standalone.min.js"></script>

<!--End -->
<script>

 // Instance the tour
 var tour = new Tour({
	onEnd: function(tour) {
				$.get('tutorial.php');
		},
  steps: [
  {
    element: "#step1",
	placement: "auto",
	title: "Newsfeed",
    content: "This is your newsfeed"
   },
  {
    element: "#step2",
    placement: "auto", 
	title: "Ask question",
    content: "Here you can ask something or write something"
   
   },
   {
	element: "#step3",
    placement: "auto", 
	title: "Answer",
    content: "Here you can see questions asked by people you follow (Yeah you can answer also)"
   
   },
   {
    element: "#step4",
    placement: "auto", 
	title: "Follow People",
    content: "People you may know"
   
   },
   {
    element: "#step5",
    placement: "auto", 
	title: "Activity Feed",
    content: "See activity of people you follow"
   
   },
   {
    element: "#step6",
    placement: "auto", 
	title: "Music player",
    content: "You can disable this anytime"
   
   },
   {
    element: "#step7",
    placement: "auto", 
	title: "Follow notifications",
    content: "Here you can see people who follow you"
   
   },
   {
    element: "#step8",
    placement: "auto", 
	title: "Questions",
    content: "Questions for you"
   
   },   
   {
    element: "#step9",
    placement: "auto", 
	title: "Notifications",
    content: "Check your notifications"
   
   },
   {
    element: "#step10",
    placement: "auto", 
	title: "Profile Settings",
    content: "Do more with your profile"
   
   }],
    animation: true,
    backdrop: true,  
    storage: false,
	smartPlacement: true, 
});
<!--End -->
$('#myModal1').modal();
$('#myModal2').modal();
$('#myModal').modal();
$('#myModal').on('hide.bs.modal', function(e) {
	// Initialize the tour
		tour.init();

		// Start the tour
		tour.start(true);
	
});


</script>


</body>
</html>
