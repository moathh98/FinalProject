<?php

session_start();

if ( isset($_SESSION['user']) && !empty($_GET) )
{
	require 'connection.php';

	$receiver = $stripped = str_replace(' ', '',$_GET['username']);
	$sender = $_SESSION['user'];

	$query = "INSERT INTO `friend_request` (`sender`,`receiver`) VALUES ('$sender','$receiver')";

	if(mysqli_query($conn, $query))
	{
		header( "location:homefriendsbook.php" );
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
		
	}
	
}


?>