<?php
session_start();
$username= $_SESSION['username'];
include 'include.php';
	$query = "SELECT * FROM answers WHERE answered_by IN (SELECT following FROM followers WHERE user1 = '$username') ORDER BY answer_id ASC LIMIT 2";
	$results = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($results)) {
                            set_time_limit(30);

            
                            $div_id = $div_id + 1;
                            $image_exist = $row['image_src'];
                            if ($image_exist == "") {
                                ?>

<div id="blah">
								<div class="ui-block">
									<article class="hentry post has-post-thumbnail">
										<?php
                                        $pro_user11 = $row['answered_by'];
                                $query_pro11 = "SELECT * FROM users WHERE username = '$pro_user11'";
                                $results_pro11 = mysqli_query($conn, $query_pro11);

                                while ($row_pro11 = mysqli_fetch_assoc($results_pro11)) {
                                    set_time_limit(30);


                                    $profil11 = $row_pro11['profile_hash'];
                                } ?>
										<div class="post__author author vcard inline-items">
											<img src="https://res.cloudinary.com/novicetopro/profile_pictures/36X36/<?php echo $profil11; ?>" alt="author">

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
                                $results_ques = mysqli_query($conn, $query_ques); ?>
								<?php
                                while ($row_ques = mysqli_fetch_assoc($results_ques)) {
                                    set_time_limit(30);
                                    $count33 = $count33 + 1; ?>
									<p><b>
											<h3><?php echo htmlspecialchars($row_ques['question']); ?></h3>
										</b><br>
										<?php
                                        $question_name = htmlspecialchars_decode($row['answer']); ?>
										
										<?php echo substr($question_name, 0, 114); ?><a href="#demo<?php echo $count33; ?>" data-toggle="collapse"><br><br><br>Read Whole Answer</a>
<a class="collapse" id="demo<?php echo $count33; ?>"><?php echo substr($question_name, 0, 9000); ?><br><i>------Answered by <b><?php echo $row['answered_by']; ?></i></b></a><?php
                                } ?> 
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
                                        set_time_limit(30); ?>
													<li>
														<a href="#">
															<img src="https://res.cloudinary.com/novicetopro/profile_pictures/28X28/<?php echo $row_liked['profile_hash']; ?>" alt="friend">
														</a>
													</li>
												<?php
                                    }
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
                                $like_result = $conn->query("SELECT * FROM likes WHERE username='$username' AND ans_id = '$answer_id'"); ?>

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
                                $results_comment = mysqli_query($conn, $query_comment); ?>
							<?php
                            while ($row_comment = mysqli_fetch_assoc($results_comment)) {
                                set_time_limit(30);

                                $comment_user = $row_comment['username']; ?>
								<?php

                                $query_comment_user = "SELECT * FROM users WHERE username = '$comment_user'";
                                $results_comment_user = mysqli_query($conn, $query_comment_user);
                                while ($row_comment_user = mysqli_fetch_assoc($results_comment_user)) {
                                    set_time_limit(30);

                                    $profile_image_src = $row_comment_user['profile_hash'];
                                } ?>
							<?php
                            } ?>

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
                    <?php
                            }
                        }?>
                        </div>