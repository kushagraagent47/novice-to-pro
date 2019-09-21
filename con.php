<?php
 
// Connection details
$conn_string = "host=localhost port=5432 dbname=World_db user=scg password=MyPassword options='--client_encoding=UTF8'";
 
// Establish a connection with MySQL server
$dbconn = pg_connect($conn_string);
 
// Check connection status. Exit in case of errors
if(!$dbconn) {
echo "Error: Unable to open database\n";
} else {
echo "Opened database successfully\n";
}
 
// Close connection
pg_close($dbconn);
 