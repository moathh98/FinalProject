<?php
    $servername = "localhost";
    $username = "user1";
    $password = "user1";
    $databasename = "friendsbook";

    $conn = mysqli_connect($servername,$username,$password,$databasename);
        if (!$conn) {
            die("Connection failed : ".mysqli_connect_error());
        } else {
        //echo "successfully";
    }

?>