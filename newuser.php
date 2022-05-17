<?php
require 'connection.php';
if (isset($_POST['register'])) {
$userName = $_POST['user_name'];
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$email = $_POST['email'];
$userPassword = $_POST['password'];
$phoneNo = $_POST['phone_no'];
$gender = $_POST['gender'];
$address = $_POST['address'];
}
$query = "INSERT INTO `user` (`user_name`, `first_name`, `last_name`, `email`, `password`, `phone_no`, `gender`,`address`)
VALUES ('$userName', '$firstName', '$lastName', '$email', '$userPassword', '$phoneNo', '$gender', '$address')";

echo "<br>";

$result = mysqli_query($conn ,$query);
if($result)
{
    header("location: loginpage.php");
}
?>