<?php
#$conn = mysqli_connect("mydbinstance.cvjenxnjjyrk.us-west-2.rds.amazonaws.com:3306","admin", "admin123");
$conn = mysqli_connect("127.0.0.1:3306","admin", "rabbit");


if (mysqli_connect_errno()) {
	echo("Connect failed: %s\n"+ mysqli_connect_error());
	exit(1);
}

/*if ( ! mysqli_select_db($conn, "mydbinstance") ) {
	echo("Error: %s\n"+ mysqli_error($conn));
	exit(1);
}*/

if ( ! mysqli_select_db($conn, "cs370") ) {
	echo("Error: %s\n"+ mysqli_error($conn));
	exit(1);
}

?>