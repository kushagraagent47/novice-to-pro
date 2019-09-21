<?php
include 'include.php';
		$name = $_POST['name'];
 
		if(mysql_query("INSERT INTO user VALUES('$name')"))
		  echo "Successfully Inserted";
		else
		  echo "Insertion Failed";
?>