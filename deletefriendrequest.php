<?php

session_start();

if ( isset($_SESSION['user']) && !empty($_GET) )
{
	require 'connection.php';

	$friend = $stripped = str_replace(' ', '',$_GET['username']);
	$my = $_SESSION['user'];

	$query = "DELETE FROM `friend_request` WHERE `receiver` = '$my' AND `sender`='$friend'";

	if(mysqli_query($conn, $query))
	{
		header('Location: ' . $_SERVER['HTTP_REFERER']);

		// header( "location:home.php" );
	}
	else
	{
		echo "Error: " .  "<br>" . mysqli_error($conn);
		header("refresh:.9;url= home.php");
	}
	
}


?>