<?php

session_start();

if ( isset($_SESSION['user']) && !empty($_GET) )
{
	require 'connection.php';

	$friend = $stripped = str_replace(' ', '',$_GET['username']);
	$my = $_SESSION['user'];

	$query = "INSERT INTO `friend` (`user_name`,`friend`) VALUES ('$my','$friend'),('$friend','$my')";
	mysqli_query($conn, $query);
 	$query2 = "DELETE FROM `friend_request` WHERE `receiver` = '$my' AND `sender` ='$friend'";

	if(mysqli_query($conn, $query2))
	{
		
		 header( "location:homefriendsbook.php" );
	}
	else
	{
		echo "Error: " .  "<br>" . mysqli_error($conn);
		header("refresh:.9;url= homefriendsbook.php");
	}
	
}


?>