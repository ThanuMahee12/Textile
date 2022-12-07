<?php


// Create connection
$conn = new mysqli('localhost', 'root', '', 'unitel_co');
// Check connection
if(!$conn)
	{
		die("Connection failed ".mysqli_connect_error());
	}
?>