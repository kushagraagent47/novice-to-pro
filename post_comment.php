<?php
include 'include.php';

session_start();
$username = $_SESSION['username'];
$comment = $_POST['comment'];
$current_time = date('Y-m-d H:i:s');
$answer_id = $_GET['answer_id'];
$sql1 = "INSERT INTO comment (answer_id,  username, comment, time) " 
    . "VALUES ('$answer_id','$username', '$comment', '$current_time')";
    if ( $conn->query($sql1) ){
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
						<?php echo $time ?>
					</time>
				</div>
			</div>

			<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="icons1/icons.svg#olymp-three-dots-icon"></use></svg></a>

		</div>

		<p><?php echo $comment; ?></p>

		<a href="#" class="post-add-icon inline-items">
			<svg class="olymp-heart-icon"><use xlink:href="icons1/icons.svg#olymp-heart-icon"></use></svg>
			<span></span>
		</a>
		<a href="#" class="reply">Reply</a>
		</li>
		</ul>
					
		</div>
				

<?php }    }?>		

