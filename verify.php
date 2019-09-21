<?php 

require 'include.php';
session_start();


if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = $_GET['email']; 
    $hash = $_GET['hash']; 
	$sql = "UPDATE users SET verified = '1' WHERE email = '$email' AND hash = '$hash'";
	if ( $conn->query($sql) ){

        
        header("location: newsfeed.php");
    }
}
else {
    header("location: index.php");
}     
?>