       <?php
          session_start();
          require 'connection.php';
          $user=$_SESSION['user'];
          $query = "SELECT first_name, last_name , `user_name` FROM user WHERE `user_name` IN (SELECT sender FROM friend_request WHERE receiver = '$user')";

          $result = mysqli_query($conn, $query);
          if(mysqli_num_rows($result)==0)
            { 
              echo "<p style='margin-left:10px''>You have no friend requests :c</p>";
            }
          while($row = mysqli_fetch_assoc($result))
          { ?>

        <div class="d-flex flex-row border rounded" style="margin-top: 20px" >
          <div class="p-0 w-25">
            <img src="pics/Profiledefault.png" class="img-thumbnail border-0" />  
          </div>

          <div class="pl-3 pt-2 pr-2 pb-2 w-75 border-left">
            <?php
              echo "<h4 class='card-title'>"."<a href='others_profile.php?username=".$row['user_name']."'>".$row['first_name']." ".$row['last_name']."</a>"."</h4>"; 
            ?>
            <a href="addfriend.php?username= <?php echo$row['user_name'];?>" class="btn btn-dark" ><i class="far fa-user"></i>Add</a>
            <a href="deletefriendrequest.php?username= <?php echo$row['user_name'];?>" class="btn btn-dark"><i class="far fa-user"></i>Delete</a>
          </div>
        </div>

        <?php
          }
        ?>