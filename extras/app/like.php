<?php
include 'include.php';

    $username = $_GET['username'];
	$answer_id = $_GET['answer_id'];
    $like_result1 = $conn->query("SELECT * FROM likes WHERE username='$username' AND ans_id = '$answer_id'");
    if ( $like_result1->num_rows == 0 ){

	$sql17 = "INSERT INTO likes ( username , ans_id) " 
	. "VALUES ('$username' , '$answer_id')";
	if ( $conn->query($sql17) ){
      echo "Liked";	
    }
    else {
        echo "something went wrong";
    }
}
    else {
        echo "Liked";
    }
    ?>