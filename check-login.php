<?php
session_start();
require 'connection.php';
if (isset($_POST['user_name']) && isset($_POST['user_password'])){
    $userName = $_POST['user_name'];
    $userPassword = $_POST['user_password'];
    $query = "SELECT `id` FROM `user` WHERE `user_name` = '$userName' AND `password` = '$userPassword'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        echo "<br>"."Welcome  " . $userName;
        $_SESSION['user'] = $userName;
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION['user']=$_POST['user_name'];
        }
            header("location:homefriendsbook.php");
    } else {
        header("location:login.php?error=1");
    }
}


?>