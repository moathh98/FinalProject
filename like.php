<?php
session_start();

if ( isset($_SESSION['user']) && !empty($_GET) )
{
	require 'connection.php';

	$post_id = $stripped = str_replace(' ', '',$_GET['id']);
	$username = $_SESSION['user'];

	$query = "INSERT INTO `like` (`post_id`,`user_name`) VALUES ($post_id,'$username')";

	mysqli_query($conn, $query);
}
?>
