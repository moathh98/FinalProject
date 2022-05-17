<?php

    require 'connection.php';
    $user_one = $_SESSION['user'];
    $query = "SELECT * FROM `user`WHERE NOT `id` = '$user_one'";
    $result = mysqli_query($conn ,$query);
    echo "<br>";
    echo "<table border='1'>";
    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        echo "<td>" . $row[3] . "</td>";
        echo "<td>" . $row[8] . "</td>";
        echo "<td><a href='userpage.php?id=$id'>Click</a></td>";
        echo "<td><a href='request.php?id=$id'>Add</a></td>";
        echo "</tr>";
        echo "<br>";
    }
    echo "</table>";
    echo "<br>".$id;

    if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query = "SELECT * FROM user WHERE id= $id";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    echo "<br>";
    echo  "<br>".$row['first_name'];
    echo  "<br>".$row['last_name'];
    echo  "<br>".$row['email'];
} /*else {
    header("location:index.php");
}*/
?>