<?php
session_start();
include 'include.php';
$chat_userr = $_POST['to_user'];
$username = $_SESSION['username'];
$message = $_POST['reply'];
$sql17 = "INSERT INTO chat ( sender, receiver, message) " 
. "VALUES ('$username' , '$chat_userr', '$message')";
if ( $conn->query($sql17) ){
}