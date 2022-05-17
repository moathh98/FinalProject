<?php
session_start();

if ( isset($_SESSION['user']) && !empty($_GET) )
{
	require 'connection.php';

	$post_id = $stripped = str_replace(' ', '',$_GET['id']);
	$username = $_SESSION['user'];

	$query = "DELETE FROM `like` WHERE `post_id`= '$post_id' and `user_name`='$username'";
	mysqli_query($conn, $query);

}

?>
