<?php
include 'include.php';
include 'include_profile.php';
session_start();
//        echo date('l, F d, Y', strtotime($row2['entry_date']));
//        echo date('H:i', strtotime($row2['entry_time']));

if ($_SESSION['logged_in'] != 1) {
	header("location:index.php");
} else {
	include 'include.php';
	$username = $_SESSION['username'];
	$query = "SELECT * FROM users WHERE username = '$username'";
	$results56 = mysqli_query($conn, $query);
	while ($row56 = mysqli_fetch_assoc($results56)) {
		set_time_limit(30);

		$veri = $row56['verified'];
		if ($veri != '1') {
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
	if ($conn->query($sql19)) { }

	$query_song = "SELECT * FROM users WHERE username = '$username'";
	$results_song = mysqli_query($conn, $query_song);
	while ($row_songs = mysqli_fetch_assoc($results_song)) {
		set_time_limit(30);

		$tutorial = $row_songs['tutorial'];
		$music_widget = $row_songs['song_widget'];
		$profile_exist = $row_songs['profile_hash'];
	}
	$query = "SELECT * FROM answers WHERE answered_by IN (SELECT following FROM followers WHERE user1 = '$username') ORDER BY answer_id ASC LIMIT 2";
	$results = mysqli_query($conn, $query);

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
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/css/bootstrap-tour-standalone.min.css" rel="stylesheet" />
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
		<!-- ... end Fixed Sidebar Left -->
<?php include 'side_panel.php';?>

<?php include 'header.php'; ?>

		<?php include 'mobile_header.php';?>


		<!-- Responsive Header -->
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

										<svg class="olymp-status-icon">
											<use xlink:href="icons1/icons.svg#olymp-status-icon"></use>
										</svg>

										<span>Ask</span>
									</a>
								</li>

								<li class="nav-item">
									<a class="nav-link inline-items" data-toggle="tab" href="#blog" role="tab" aria-expanded="false">
										<svg class="olymp-blog-icon">
											<use xlink:href="icons1/icons.svg#olymp-blog-icon"></use>
										</svg>

										<span>Blog Post</span>
									</a>
								</li>
							</ul>
							<form action="newsfeed.php" method="post">

								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
										<form>
											<div class="author-thumb">
												<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profile_hash1; ?>" alt="author">
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
										<form action="newsfeed.php" method="post">
											<div class="author-thumb">
												<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profile_hash1; ?>" alt="author">
											</div>
											<div class="form-group with-icon label-floating is-empty">
												<label class="control-label">Post on blog</label>
												<textarea class="form-control" placeholder="" name="blog_post"></textarea>
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
						if ($profile_exist == "author-page1") {
							?>
							<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
								<a href="user_profile.php" class="btn btn-secondary btn-md-2">Update profile picture</a>
							</div>
						<?php } ?>

						<?php
						while ($row = mysqli_fetch_assoc($results)) {
							set_time_limit(30);

			
							$div_id = $div_id + 1;
							$image_exist = $row['image_src'];
							if ($image_exist == "") {
								?>


								<div class="ui-block" id="post-list">
									<article class="hentry post has-post-thumbnail">
										<?php
										$pro_user11 = $row['answered_by'];
										$query_pro11 = "SELECT * FROM users WHERE username = '$pro_user11'";
										$results_pro11 = mysqli_query($conn, $query_pro11);

										while ($row_pro11 = mysqli_fetch_assoc($results_pro11)) {
											set_time_limit(30);


											$profil11 = $row_pro11['profile_hash'];
										}
										?>
										<div class="post__author author vcard inline-items">
											<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profil11; ?>" alt="author">
                                            <input type="hidden" name="total_count" id="total_count"
            value="<?php echo $row['answer_id']; ?>" />
											<div class="author-date">
												<a class="h6 post__author-name fn" <?php echo ' href="people_profile.php?profile_username=' . $row['answered_by'] . '">' ?><?php echo htmlspecialchars($row['answered_by']); ?></a> <div class="post__date">
													<time class="published">
														<?php echo date('l, F d Y,H:i', strtotime($row['time_answered'])); ?>
													</time>
											</div>
										</div>

										<!-- <div class="more"><svg class="olymp-three-dots-icon">
												<use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use>
											</svg>
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
										</div> -->

								</div>
								<?php
								$count33 = 0;
								$question_id = $row['ques_id'];
								$query_ques = "SELECT * FROM questions WHERE ques_id = '$question_id'";
								$results_ques = mysqli_query($conn, $query_ques);
								?>
								<?php
								while ($row_ques = mysqli_fetch_assoc($results_ques)) {

									set_time_limit(30);
$count33 = $count33 + 1;

									?>
									<p><b>
											<h3><?php echo htmlspecialchars($row_ques['question']); ?></h3>
										</b><br>
										<?php
										$question_name = htmlspecialchars_decode($row['answer']);
										?>
										
										<?php echo substr($question_name, 0, 114);  ?><a href="#demo<?php echo $count33;?>" data-toggle="collapse"><br><br><br>Read Whole Answer</a>
<a class="collapse" id="demo<?php echo $count33;?>"><?php echo substr($question_name, 0, 9000);?><br><i>------Answered by <b><?php echo $row['answered_by'];?></i></b></a><?php } ?> 
<div class="post-additional-info inline-items">





										<ul class="friends-harmonic">
											<?php
											$total_likes = 0;
											$answerr_id = $row['answer_id'];
											$query_likes = "SELECT * FROM likes WHERE ans_id = '$answerr_id' ";
											$results_likes1 = mysqli_query($conn, $query_likes);
											while ($row_likes1 = mysqli_fetch_assoc($results_likes1)) {
												
												set_time_limit(30);

												$liked_username = $row_likes1['username'];
												$total_likes = $total_likes + 1;
												$query_liked = "SELECT * FROM users WHERE username = '$liked_username' ";
												$results_liked = mysqli_query($conn, $query_liked);
												while ($row_liked = mysqli_fetch_assoc($results_liked)) {
													
													set_time_limit(30);

?>
													<li>
														<a href="#">
															<img src="https://res.cloudinary.com/novicetopro/profile_pictures/28X28/<?php echo $row_liked['profile_hash']; ?>" alt="friend">
														</a>
													</li>
												<?php }
										} ?>
										</ul>
										<a href="#" class="post-add-icon inline-items">
											<svg class="olymp-heart-icon">
												<use xlink:href="icons1/icons.svg#olymp-heart-icon"></use>
											</svg>
											<span><?php echo $total_likes; ?></span>
										</a>


										<div class="names-people-likes">
											<a href="#"></a> <a href="#">
											</a>
										</div>

								
							</div>

							<?php
							$answer_id = $row['answer_id'];
							$like_result = $conn->query("SELECT * FROM likes WHERE username='$username' AND ans_id = '$answer_id'");
							?>

							<div class="control-block-button post-control-button">
								<form id="like<?php echo $div_id ?>" method="post" <?php echo ' action="like.php?username=' . $username . '&answer_id=' . $row['answer_id'] . '"> ' ?> <a id="submit<?php echo $div_id ?>" class="btn btn-control">
									<input type="hidden" name="username" value="<?php echo $username; ?>">
									<input type="hidden" name="answer_idd" value="<?php echo $row['answer_id']; ?>">
									<svg class="olymp-like-post-icon">
										<use xlink:href="icons1/icons.svg#olymp-like-post-icon"></use>
									</svg>

									</a>
								</form>

								<span id="result<?php echo $div_id ?>"></span>
								<script>
									$("#submit<?php echo $div_id ?>").click(function() {
										$.post($("#like<?php echo $div_id ?>").attr("action"), $("#like<?php echo $div_id ?> :input").serializeArray(), function(info) {
											$("#result<?php echo $div_id ?>").html(info);
										});
									});

									$("#like<?php echo $div_id ?>").submit(function() {
										return false;
									});
								</script>
							</div>

							</article>

							<?php
							$answer_id = $row['answer_id'];
							$query_comment = "SELECT * FROM comment WHERE answer_id = '$answer_id' LIMIT 3";
							$results_comment = mysqli_query($conn, $query_comment);

							?>
							<?php
							while ($row_comment = mysqli_fetch_assoc($results_comment)) {
								
								set_time_limit(30);

								$comment_user = $row_comment['username'];

								?>
								<?php

								$query_comment_user = "SELECT * FROM users WHERE username = '$comment_user'";
								$results_comment_user = mysqli_query($conn, $query_comment_user);
								while ($row_comment_user = mysqli_fetch_assoc($results_comment_user)) {
									
									set_time_limit(30);

									$profile_image_src = $row_comment_user['profile_hash'];
								}


								?>
							<?php } ?>

							<form method="post" action="loadData.php">
								<input style="color:#1D42CD" type="button" id="display<?php echo $div_id; ?>" value="View more comments">
								<input type="hidden" name="answer_id" value="<?php echo $answer_id; ?>" />
							</form>
							<script>
								$(document).ready(function() {

									$("#display<?php echo $div_id; ?>").click(function() {

										$.ajax({ //create an ajax request to display.php
											type: "GET",
											url: "loadData.php?answer_id=<?php echo $answer_id; ?>",
											dataType: "html", //expect html to be returned
											success: function(response) {
												$("#responsecontainer<?php echo $div_id; ?>").html(response);
												//alert(response);
											}

										});
									});
								});
							</script>
							<ul id="responsecontainer<?php echo $div_id; ?>" class="comments-list">
							</ul>
							<ul id="result_comment<?php echo $div_id ?>" class="comments-list">

							</ul>

							<form id="comment_form<?php echo $div_id; ?>" class="comment-form inline-items" method="post" <?php echo ' action="post_comment.php?answer_id=' . $answer_id . '">' ?> <div class="post__author author vcard inline-items">
								<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profile_hash1; ?>" alt="author">

								<div class="form-group with-icon-right ">
									<textarea id="myInput" class="form-control" placeholder="Write your comment..." name="comment"></textarea>
									<div class="add-options-message">
										<a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
										</a>
									</div>
								</div>
					</div>
					<button id="submit_comment<?php echo $div_id; ?>" class="btn btn-md-2 btn-primary" type="submit" name="post_comment">Post Comment</button>

					<button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel</button>

					</form>
					<span id="result_comment<?php echo $div_id ?>"></span>


					<script>
						$("#submit_comment<?php echo $div_id ?>").click(function() {
							$.post($("#comment_form<?php echo $div_id ?>").attr("action"), $("#comment_form<?php echo $div_id ?> :input").serializeArray(), function(info) {
								$("#result_comment<?php echo $div_id ?>").html(info);
							});
						});

						$("#comment_form<?php echo $div_id ?>").submit(function() {
							return false;
						});
					</script>
				</div>


			<?php } else {
			?>
				<div class="ui-block">
					<article class="hentry post has-post-thumbnail">
						<?php
						$pro_user11 = $row['answered_by'];
						$query_pro11 = "SELECT * FROM users WHERE username = '$pro_user11'";
						$results_pro11 = mysqli_query($conn, $query_pro11);

						while ($row_pro11 = mysqli_fetch_assoc($results_pro11)) {
							
							set_time_limit(30);

							$profil11 = $row_pro11['profile_hash'];
						}
						?>
						<div class="post__author author vcard inline-items">
							<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profil11; ?>" alt="author">

							<div class="author-date">
								<a class="h6 post__author-name fn" <?php echo ' href="people_profile.php?profile_username=' . $row['answered_by'] . '">' ?><?php echo htmlspecialchars($row['answered_by']); ?></a> <div class="post__date">
									<time class="published" datetime="2004-07-24T18:18">
										<?php echo $row['date_answered']; ?>
									</time>
							</div>
						</div>

						<div class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use>
							</svg>
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
				$query_ques = "SELECT * FROM questions WHERE ques_id = '$question_id'";
				$results_ques = mysqli_query($conn, $query_ques);
				?>
				<?php
				while ($row_ques = mysqli_fetch_assoc($results_ques)) {

					set_time_limit(30);


					?>
					<p><b>
							<h3><?php echo htmlspecialchars($row_ques['question']); ?></h3>
						</b><br>
						<?php
						$question_name = htmlspecialchars_decode($row['answer']);
						?>
						<?php echo substr($question_name, 0, 1144);  ?><a <?php echo ' href="view_answer.php?answer_id=' . $row['answer_id'] . '&ques_id=' . $row['ques_id'] . '"> ... Read more</a>' ?> <?php } ?> <div class="post-thumb">
						<img src="https://res.cloudinary.com/novicetopro/answer_uploads/<?php echo $row['image_src']; ?>" alt="photo">
						</div>

						<div class="post-additional-info inline-items">


							<ul class="friends-harmonic">
								<?php
								$total_likes = 0;
								$answerr_id = $row['answer_id'];
								$query_likes = "SELECT * FROM likes WHERE ans_id = '$answerr_id' ";
								$results_likes1 = mysqli_query($conn, $query_likes);
								while ($row_likes1 = mysqli_fetch_assoc($results_likes1)) {
									
									set_time_limit(30);

									$liked_username = $row_likes1['username'];
									$total_likes = $total_likes + 1;
									$query_liked = "SELECT * FROM users WHERE username = '$liked_username' ";
									$results_liked = mysqli_query($conn, $query_liked);
									while ($row_liked = mysqli_fetch_assoc($results_liked)) {
										set_time_limit(30);


?>

										<li>
											<a href="#">
												<img src="https://res.cloudinary.com/novicetopro/profile_pictures/28X28/<?php echo $row_liked['profile_hash']; ?>" alt="friend">
											</a>
										</li>
									<?php }
							} ?>
							</ul>
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon">
									<use xlink:href="icons1/icons.svg#olymp-heart-icon"></use>
								</svg>
								<span><?php echo $total_likes; ?></span>
							</a>


							<div class="names-people-likes">
								<a href="#"></a> <a href="#">
								</a>
							</div>

							
						</div>
						<?php
						$answer_id = $row['answer_id'];
						$like_result = $conn->query("SELECT * FROM likes WHERE username='$username' AND ans_id = '$answer_id'");
						?>

						<div class="control-block-button post-control-button">
							<form id="like<?php echo $div_id ?>" method="post" <?php echo ' action="like.php?username=' . $username . '&answer_id=' . $row['answer_id'] . '"> ' ?> <a id="submit<?php echo $div_id ?>" class="btn btn-control">
								<input type="hidden" name="username" value="<?php echo $username; ?>">
								<input type="hidden" name="answer_idd" value="<?php echo $row['answer_id']; ?>">
								<svg class="olymp-like-post-icon">
									<use xlink:href="icons1/icons.svg#olymp-like-post-icon"></use>
								</svg>

					</a>
					</form>
					<span id="result<?php echo $div_id ?>"></span>
					<script>
						$("#submit<?php echo $div_id ?>").click(function() {
							$.post($("#like<?php echo $div_id ?>").attr("action"), $("#like<?php echo $div_id ?> :input").serializeArray(), function(info) {
								$("#result<?php echo $div_id ?>").html(info);
							});
						});

						$("#like<?php echo $div_id ?>").submit(function() {
							return false;
						});
					</script>
					</div>

					</article>

					<?php
					$answer_id = $row['answer_id'];
					$query_comment = "SELECT * FROM comment WHERE answer_id = '$answer_id' LIMIT 3";
					$results_comment = mysqli_query($conn, $query_comment);

					?>
					<?php
					while ($row_comment = mysqli_fetch_assoc($results_comment)) {
						set_time_limit(30);


						$comment_user = $row_comment['username'];

						?>
						<?php

						$query_comment_user = "SELECT * FROM users WHERE username = '$comment_user'";
						$results_comment_user = mysqli_query($conn, $query_comment_user);
						while ($row_comment_user = mysqli_fetch_assoc($results_comment_user)) {
							set_time_limit(30);


							$profile_image_src = $row_comment_user['profile_hash'];
						}


						?>
						<ul class="comments-list">
							<li>
								<div class="post__author author vcard inline-items">
									<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profile_image_src; ?>" alt="author">

									<div class="author-date">
										<a class="h6 post__author-name fn" <?php echo ' href="people_profile.php?profile_username=' . $row_comment['username'] . '">' ?><?php echo $row_comment['username']; ?></a> <div class="post__date">
											<time class="published" datetime="2004-07-24T18:18">
												<?php echo $row_comment['time']; ?>
											</time>
									</div>
								</div>

								<a href="#" class="more"><svg class="olymp-three-dots-icon">
										<use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use>
									</svg></a>

								</div>

								<p><?php echo $row_comment['comment']; ?></p>

								<a class="post-add-icon inline-items">
									<svg class="olymp-heart-icon">
										<use xlink:href="icons1/icons.svg#olymp-heart-icon"></use>
									</svg>
									<span></span>
								</a>
								<a href="#" class="reply">Reply</a>
							</li>
						</ul>
					<?php } ?>
					<ul id="result_comment<?php echo $div_id ?>" class="comments-list">

					</ul>
					<a href="#" class="more-comments">View more comments <span>+</span></a>

					<form id="comment_form<?php echo $div_id; ?>" class="comment-form inline-items" method="post" <?php echo ' action="post_comment.php?answer_id=' . $answer_id . '">' ?>

						<div class="post__author author vcard inline-items">
							<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profile_hash1; ?>" alt="author">

							<div class="form-group with-icon-right ">
								<textarea id="myInput" class="form-control" placeholder="Write your comment..." name="comment"></textarea>
								<div class="add-options-message">
									<a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
									</a>
								</div>
								<button id="submit_comment<?php echo $div_id; ?>" class="btn btn-md-2 btn-primary" type="submit" name="post_comment">Post Comment</button>

								<button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel</button>

					</form>
					</div>

					</div>
					<script>
						$("#submit_comment<?php echo $div_id ?>").click(function() {
							$.post($("#comment_form<?php echo $div_id ?>").attr("action"), $("#comment_form<?php echo $div_id ?> :input").serializeArray(), function(info) {
								$("#result_comment<?php echo $div_id ?>").html(info);
							});
						});

						$("#comment_form<?php echo $div_id ?>").submit(function() {
							return false;
						});
					</script>
					</div>

				<?php
			}
			?>
			<?php }
		?>
			<a id="" href="find_friends.php" class="btn btn-sm bg-blue" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">Follow More People,to see new posts</a>




            <script type="text/javascript">
$(document).ready(function(){
        windowOnScroll();
});
function windowOnScroll() {
       $(window).on("scroll", function(e){
        if ($(window).scrollTop() == $(document).height() - $(window).height()){
            if($(".post-item").length < $("#total_count").val()) {
                var lastId = $(".post-item:last").attr("id");
                //getMoreData(lastId);
            }
        }
    });
}

function getMoreData(lastId) {
       $(window).off("scroll");
    $.ajax({
        url: 'load.php?lastId=' + lastId,
        type: "get",
        beforeSend: function ()
        {
            $('.ajax-loader').show();
        },
        success: function (data) {
        	   setTimeout(function() {
                $('.ajax-loader').hide();
            $("#post-list").append(data);
            windowOnScroll();
        	   }, 1000);
        }
   });
}
</script>
			</main>

			<!-- ... end Main Content -->


			<!-- Left Sidebar -->

			<aside class="col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-xs-12">
				<!-- <div class="ui-block">
					<div class="widget w-wethear"> -->
						<!-- <a class="weatherwidget-io" href="https://forecast7.com/en/20d5978d96/india/" data-label_1="INDIA" data-label_2="WEATHER" data-theme="sky">INDIA WEATHER</a>
						<script>
							! function(d, s, id) {
								var js, fjs = d.getElementsByTagName(s)[0];
								if (!d.getElementById(id)) {
									js = d.createElement(s);
									js.id = id;
									js.src = 'https://weatherwidget.io/js/widget.min.js';
									fjs.parentNode.insertBefore(js, fjs);
								}
							}(document, 'script', 'weatherwidget-io-js');
						</script> -->
					<!-- </div>
				</div> -->
				<?php
				    date_default_timezone_set("Asia/Kolkata");
					$date = date("d/m/Y");

	$username = $_SESSION['username'];
	$query24 = "SELECT * FROM followers WHERE user1 = '$username'";
	$results562 = mysqli_query($conn, $query24);
    while ($row562 = mysqli_fetch_assoc($results562)) {
        set_time_limit(30);
        $user_following = $row562['following'];
        $query241 = "SELECT * FROM users WHERE username = '$user_following'";
        $results5621 = mysqli_query($conn, $query241);
        while ($row5621 = mysqli_fetch_assoc($results5621)) {
            set_time_limit(30);
        }
    }
?>




<?php
$query_bd = "SELECT * FROM followers WHERE user1 = '$username'";
$results_bd = mysqli_query($conn, $query_bd);
while ($row_bd = mysqli_fetch_assoc($results_bd)) {
    set_time_limit(30);
    $following_bd = $row_bd['following'];
    $query_bd1 = "SELECT * FROM users WHERE username = '$following_bd'";
    $results_bd1 = mysqli_query($conn, $query_bd1);
    while ($row_bd1 = mysqli_fetch_assoc($results_bd1)) {
		set_time_limit(30);
		$name1 = $row_bd1['name']; 
        $var = $row_bd1['birthday'];
        $date = str_replace('/', '-', $var);
        $date1 = date('Y-m-d', strtotime($date));
        $time = strtotime($date1);
        if (date('m-d') == date('m-d', $time)) {

    // They're the same! ?>
			<div class="ui-block">
				<div class="widget w-birthday-alert">
					<div class="icons-block">
						<svg class="olymp-cupcake-icon"><use xlink:href="icons/icons.svg#olymp-cupcake-icon"></use></svg>
						<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg></a>
					</div>

					<div class="content">
						<div class="author-thumb">
							<img src="img/avatar48-sm.jpg" alt="author">
						</div>
						<span>Today is</span>
						<a href="chatting.php?user=<?php echo $following_bd; ?>" class="h4 title"><?php echo $name1; ?>'s Birthday</a>
						<p>Send a message!!!</p>
					</div>
				</div>
			</div>
<?php
        }
    }
}


								?>

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
									<tr>
										<td>Mon</td>
										<td>Tue</td>
										<td>Wed</td>
										<td>Thu</td>
										<td>Fri</td>
										<td>Sat</td>
										<td>San</td>
									</tr>
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
				$query2 = "SELECT * FROM users WHERE username NOT IN (SELECT following FROM followers WHERE user1 = '$username')AND cateogary = 'pro' ORDER BY RAND() LIMIT 6";
				
				$results2 = mysqli_query($conn, $query2);
				?>
				<div class="ui-block">
					<div class="ui-block-title">
						<h6 class="title">Professionals to follow</h6>
						<a href="#" class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use>
							</svg></a>
					</div>
					<?php
					while ($row2 = mysqli_fetch_assoc($results2)) {
						set_time_limit(30);


						$pro221 = $row2['username'];
						$query_pro221 = "SELECT * FROM users WHERE username = '$pro221'";
						$results_pro221 = mysqli_query($conn, $query_pro221);

						while ($row_pro221 = mysqli_fetch_assoc($results_pro221)) {
							set_time_limit(30);


							$profil221 = $row_pro221['profile_hash'];
						}

						?>
						<ul class="widget w-friend-pages-added notification-list friend-requests">
							<li class="inline-items">
								<div class="author-thumb">
									<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profil221; ?>" alt="author">
								</div>
								<div class="notification-event">
									<a class="h6 notification-friend" <?php echo ' href="people_profile.php?profile_username=' . $row2['username'] . '">' ?><?php echo htmlspecialchars($row2['username']); ?></a> </div> <span class="notification-icon" data-toggle="tooltip" data-placement="top" title="ADD TO YOUR FAVS">
										<a <?php echo ' href="people_about.php?profile_username=' . $row2['username'] . '"' ?>>
											<svg class="olymp-star-icon">
												<use xlink:href="icons1/icons.svg#olymp-star-icon"></use>
											</svg>
										</a>
										</span>

							</li>

						<?php	} ?>
					</ul>

				</div>
				 <!-- <div class="ui-block" id="step6">
				<div class="ui-block-title">
					<h6 class="title">Twitter Feed</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>

				<ul class="widget w-twitter">
					<li class="twitter-item">
						<div class="author-folder">
						<a class="twitter-timeline" href="https://twitter.com/<?php //echo $twitter_id;?>?ref_src=twsrc%5Etfw">Tweets by <?php //echo $twitter_id;?></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
							</div>
					</li>
				</ul>
			</div> -->
				<!-- ... end Left Sidebar -->
			</aside>
			<!-- Right Sidebar -->

			<aside class="col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-xs-12">

				<div class="ui-block" id="step3">
					<div class="ui-block-title">
						<h6 class="title">Answer questions</h6>
						<a href="#" class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use>
							</svg></a>
					</div>
					<?php
					$query2 = "SELECT * FROM questions WHERE asked_by IN (SELECT following FROM followers WHERE user1 = '$username')LIMIT 7";
					$results2 = mysqli_query($conn, $query2);
					while ($row2 = mysqli_fetch_assoc($results2)) {
						set_time_limit(30);


						$pro_user = $row2['asked_by'];
						$query_pro = "SELECT * FROM users WHERE username = '$pro_user'";
						$results_pro = mysqli_query($conn, $query_pro);

						while ($row_pro = mysqli_fetch_assoc($results_pro)) {
							set_time_limit(30);


							$profil = $row_pro['profile_hash'];
						}
						?>

						<ul class="widget w-friend-pages-added notification-list friend-requests">
							<li class="inline-items">
								<div class="author-thumb">
									<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profil; ?>" alt="author">
								</div>
								<div class="notification-event">
									<a class="h6 notification-friend" <?php echo ' href="answer.php?question=' . $row2['question'] .  '&asked_by=' . $row2['asked_by']  . '&ques_id=' . $row2['ques_id'] . '">' ?><?php echo substr($row2['question'], 0, 19); ?>...</a> <span class="chat-message-item"><?php echo substr($row2['asked_by'], 0, 20); ?></span>
								</div>
								<span class="notification-icon">
									<a href="chatting.php?user=<?php echo $pro_user;?>" class="accept-request">
										<span class="icon-add without-text">
										<svg class="olymp-chat---messages-icon"><use xlink:href="icons1/icons.svg#olymp-chat---messages-icon"></use></svg>
</span>
									</a>
								</span>

							</li>
						<?php
					} ?>

					</ul>

				</div>


				<div class="ui-block" id="step4">
					<div class="ui-block-title">
						<h6 class="title">Friend Suggestions</h6>
						<a href="#" class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use>
							</svg></a>
					</div>
					<?php

					$query112 = "SELECT * FROM users WHERE username NOT IN (SELECT following FROM followers WHERE user1 = '$username')ORDER BY RAND() LIMIT 6";
					$results112 = mysqli_query($conn, $query112);
					while ($row112 = mysqli_fetch_assoc($results112)) {
						
						set_time_limit(30);


						?>
						<ul class="widget w-friend-pages-added notification-list friend-requests">
							<li class="inline-items">
								<div class="author-thumb">
									<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $row112['profile_hash']; ?>" alt="author">
								</div>
								<div class="notification-event">
									<a class="h6 notification-friend" <?php echo ' href="people_profile.php?profile_username=' . $row112['username'] . '">' ?><?php echo substr($row112['username'], 0, 16); ?></a> </div> <span class="notification-icon">
										<a class="accept-request" <?php echo ' href="chatting.php?user=' . $row112['username'] . '">' ?> <span class="icon-add without-text">
										<svg class="olymp-chat---messages-icon"><use xlink:href="icons1/icons.svg#olymp-chat---messages-icon"></use></svg>
									</span>
										</a>
										</span>

							</li>

						<?php } ?>

					</ul>

				</div>


				<div class="ui-block" id="step5">

					<div class="ui-block-title">
						<h6 class="title">Activity Feed</h6>
						<a href="#" class="more"><svg class="olymp-three-dots-icon">
								<use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use>
							</svg></a>
					</div>

					<ul class="widget w-activity-feed notification-list">
						<?php
						$query126 = "SELECT * FROM answers WHERE answered_by IN (SELECT following FROM followers WHERE user1 = '$usernames') ORDER BY answer_id DESC LIMIT 7";
						$results126 = mysqli_query($conn, $query126);

						?>
						<?php
						while ($row126 = mysqli_fetch_assoc($results126)) {
							set_time_limit(30);


							?>
							<li>
								<?php
								$pro_user12 = $row126['answered_by'];
								$query_pro12 = "SELECT * FROM users WHERE username = '$pro_user12'";
								$results_pro12 = mysqli_query($conn, $query_pro12);

								while ($row_pro12 = mysqli_fetch_assoc($results_pro12)) {
									
									set_time_limit(30);

									$profil12 = $row_pro12['profile_hash'];
								}
								?>
								<div class="author-thumb">
									<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profil12; ?>" alt="author">
								</div>
								<div class="notification-event">
									<div><a class="h6 notification-friend" <?php echo ' href="people_profile.php?profile_username=' . $row126['answered_by'] . '">' ?><?php echo $row126['answered_by']; ?></a> added an answer <a class="notification-link" <?php echo ' href="view_answer2.php?question='  . '&ques_id=' . $row126['answer_id'] . '">' ?>check now</a> </div> <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18"><?php echo date('l, F d Y,H:i', strtotime($row126['time_answered'])); ?></time></span>
									</div>
							</li>

						<?php } ?>
					</ul>
				</div>

<!-- 
				<div class="ui-block">
					<div class="widget w-action">

						<img src="img/logo.png" alt="Olympus">
						<div class="content">
							<h4 class="title">NOVICETOPRO</h4>
							<span>THE BEST SOCIAL NETWORK THEME IS HERE!</span> -->
							<!-- <a href="index.php" class="btn btn-bg-secondary btn-md">Register Now!</a>
						</div>
					</div>
				</div> --> 
			</aside>

			<!-- ... end Right Sidebar -->

			</div>
			</div>


			<!-- Window-popup Update Header Photo -->

			<div class="modal fade" id="update-header-photo">
				<div class="modal-dialog ui-block window-popup update-header-photo">
					<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
						<svg class="olymp-close-icon">
							<use xlink:href="icons1/icons.svg#olymp-close-icon"></use>
						</svg>
					</a>

					<div class="ui-block-title">
						<h6 class="title">Update Header Photo</h6>
					</div>

					<a href="#" class="upload-photo-item">
						<svg class="olymp-computer-icon">
							<use xlink:href="icons1/icons.svg#olymp-computer-icon"></use>
						</svg>

						<h6>Upload Photo</h6>
						<span>Browse your computer.</span>
					</a>

					<a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

						<svg class="olymp-photos-icon">
							<use xlink:href="icons1/icons.svg#olymp-photos-icon"></use>
						</svg>

						<h6>Choose from My Photos</h6>
						<span>Choose from your uploaded photos</span>
					</a>
				</div>
			</div>


			<!-- ... end Window-popup Update Header Photo -->



			<!-- Window-popup-CHAT for responsive min-width: 768px -->

			<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->


			<?php
			if ($tutorial == 0) {
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
										<br>
									</div>
									<div class="ui-block">
										<div class="ui-block-title">
											<h6 class="title">Friend Suggestions</h6>
											<a href="#" class="more"><svg class="olymp-three-dots-icon">
													<use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use>
												</svg></a>
										</div>
										<?php

										$query1121 = "SELECT * FROM users WHERE username NOT IN (SELECT following FROM followers WHERE user1 = '$username')ORDER BY RAND() LIMIT 4";
										$results1121 = mysqli_query($conn, $query1121);
										$follow_id = 0;
										while ($row1121 = mysqli_fetch_assoc($results1121)) {
											    set_time_limit(30);


											$follow_id = $follow_id + 1;
											?>
											<ul class="widget w-friend-pages-added notification-list friend-requests">
												<li class="inline-items">
													<div class="author-thumb">
														<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $row1121['profile_hash']; ?>" alt="author">

													</div>
													<div class="notification-event">
														<a class="h6 notification-friend" <?php echo ' href="people_profile.php?profile_username=' . $row1121['username'] . '">' ?><?php echo htmlspecialchars($row1121['username']); ?></a> </div> <span class="notification-icon">
															<form id="follow<?php echo $follow_id ?>" method="post" <?php echo ' action="follow.php?username=' . $username . '&people_username=' . $row1121['username'] . '"> ' ?> <a class="accept-request" id="follow_btn<?php echo $follow_id; ?>" ?>
																<input type="hidden" name="username_user" value="<?php echo $username; ?>">
																<input type="hidden" name="profile_idd" value="<?php echo $row1121['username']; ?>">

																<span class="icon-add without-text">
																	<svg class="olymp-happy-face-icon">
																		<use xlink:href="icons1/icons.svg#olymp-happy-face-icon"></use>
																	</svg>
																</span>
														</a>
														</form>
														
														<span id="result<?php echo $follow_id ?>"></span>

														</span>

												</li>

												<script>
													$("#follow_btn<?php echo $follow_id ?>").click(function() {
														$.post($("#follow<?php echo $follow_id ?>").attr("action"), $("#follow<?php echo $follow_id ?> :input").serializeArray(), function(info) {
															$("#result<?php echo $follow_id ?>").html(info);
														});
													});

													$("#follow<?php echo $follow_id ?>").submit(function() {
														return false;
													});
												</script>
											<?php } ?>
											<br>
											<?php if($_SESSION['social'] =='1'){ ?>
											<form action="update_username.php" method="post">
								<div class="form-group label-floating">
									<label class="control-label">Your username,you wont be able to change this again</label>
									<input class="form-control" placeholder="" type="text" name="username" value="<?php echo $_SESSION['username']?>">
								</div>
								<?php echo $_SESSION['message'];?>	
								<?php if (!$_SESSION['message1']) { ?>
									<button type="submit" class="btn btn-purple btn-lg full-width" aria-label="Close" name="register">Let's get started</button>
								<?php } else { ?>
								<button type="submit" data-dismiss="modal" class="btn btn-purple btn-lg full-width" aria-label="Close" name="register">Let's get started</button>
									
								<?php } } else { ?>					<button type="submit" data-dismiss="modal" class="btn btn-purple btn-lg full-width" aria-label="Close" name="register">Let's get started</button>
			<?php } ?></form>
<!-- data-dismiss="modal"  -->
										</ul>

									</div>
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
		if (isset($_POST['submit'])) {
			$question_char = mysqli_real_escape_string($conn, $_POST['question']);
			$question = htmlspecialchars($question_char);
			$username = $_SESSION['username'];


			$sql = "INSERT INTO questions ( question , asked_by) "
				. "VALUES ('$question' , '$username' )";
			if ($conn->query($sql)) {
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
									<button type="button" class="btn btn-primary" onClick="document.location.href='newsfeed.php'">Back to home</button>
								</div>
							</div>
						</div>
					</div>
				<?php
			}
		}
		if (isset($_POST['post'])) {
			$blog_post = $_POST['blog_post'];
			$username = $_SESSION['username'];


			$sql = "INSERT INTO blog ( username , blog_post) "
				. "VALUES ('$username' , '$blog_post')";
			if ($conn->query($sql)) {
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
				$("#submit").click(function() {
					$.post($("#like").attr("action"), $("#like :input").serializeArray(), function(info) {
						$("#result").html(info);
					});
				});

				$("#like").submit(function() {
					return false;
				});
			</script>
		<?php }


	?>
		<!-- Bootstrap Tour -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/js/bootstrap-tour-standalone.min.js"></script>
	<!-- Latest compiled JavaScript -->
	
		<!--End -->
		<script>
			// Instance the tour
			var tour = new Tour({
				onEnd: function(tour) {
					$.get('tutorial.php');
				},
				steps: [{
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
						title: "Your twitter feed",
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

					}
				],
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
<?php

$_SESSION['social'] = 0;
flush();
    ob_flush();
    sleep(2);
    exit(0);
    ?>