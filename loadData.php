<?php 
include 'include.php';
session_start();
$answer_id = $_GET['answer_id'];
$query_comment="SELECT * FROM comment WHERE answer_id = '$answer_id'";
$results_comment = mysqli_query($conn,$query_comment);
while ($row_comment = mysqli_fetch_assoc($results_comment)) {
	$comment_user = $row_comment['username'];
	$query_comment_user="SELECT * FROM users WHERE username = '$comment_user'";
	$results_comment_user = mysqli_query($conn,$query_comment_user);
	while ($row_comment_user = mysqli_fetch_assoc($results_comment_user)) {
		$profile_image_src = $row_comment_user['profile_hash'];
		$comment_user =  $row_comment['username'];
		$time = $row_comment['time'];
		$comment = $row_comment['comment'];
	}
?>
		<li>
		<div class="post__author author vcard inline-items">
			<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profile_image_src;?>" alt="author">

			<div class="author-date">
				<a class="h6 post__author-name fn" href="#"><?php echo $comment_user;?></a>
				<div class="post__date">
					<time class="published" datetime="2004-07-24T18:18">
						<?php echo date('l, F d Y ,H:i', strtotime($time));?>
					</time>
				</div>
			</div>


		</div>

		<p><?php echo $comment; ?></p>

		
		
		</li>
				

<?php }  ?>		
