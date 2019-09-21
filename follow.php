<?php
include 'include.php';

    $username = $_GET['username'];
    $people_username = $_GET['people_username'];
   	$sql129 = "UPDATE users SET tutorial='1' WHERE username='$username'";
    if ( $conn->query($sql129) ){
            
    }

    $follow_result1 = $conn->query("SELECT * FROM followers WHERE user1='$username' AND following = '$people_username'");
    if ( $follow_result1->num_rows == 0 ){

	$sql172 = "INSERT INTO followers ( user1 , following) " 
	. "VALUES ('$username' , '$people_username')";
	if ( $conn->query($sql172) ){
      echo "Followed";	
    }
    else {
        echo "something went wrong";
    }
}
    else {
        echo "Followed";
    }
    ?>