<?php
	$host="localhost";
	$dbuser="root";
	$dbpassword="";//nd210694
	$dbname="hr";
	$conn=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
	if(mysqli_connect_errno())
	{
		die("Connection Failed!".mysqli_connect_error());
	}
?>