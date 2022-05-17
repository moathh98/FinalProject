<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
  a{
    color: black;
  }
</style>
</head>
<body>
  <?php
  session_start();
  if ( !isset( $_SESSION['user'] ) )
  {
    header("Location:login.php");

  }

  ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand" href="homefriendsbook.php">FriendsBook</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="homefriendsbook.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profilepage.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Notifications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
      </ul>
    </div>
      
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div class="dropdown-menu dropdown-menu-right" style="width:400px " aria-labelledby="navbarDropdown" >
          <p style="margin-left: 10px">Friend request</p>
          <div id="freq">
        <?php
          require 'connection.php';
          $user=$_SESSION['user'];
          $query = "SELECT first_name, last_name,user_name FROM `user` WHERE user_name IN (SELECT sender FROM friend_request WHERE receiver='$user')";

          $result = mysqli_query($conn, $query);
          if(mysqli_num_rows($result)==0)
            { 
              echo "<p style='margin-left:10px''>You have no friend requests</p>";
            }
          while($row = mysqli_fetch_assoc($result))
          { ?>

        <div class="d-flex flex-row border rounded" style="margin-top: 20px" >
          <div class="p-0 w-25">
            <img src="photos/unknown.jfif" class="img-thumbnail border-0" />  
          </div>

          <div class="pl-3 pt-2 pr-2 pb-2 w-75 border-left">
            <?php
              echo "<h4 class='card-title'>"."<a href='other_profiles.php?username=".$row['user_name']."'>".$row['first_name']." ".$row['last_name']."</a>"."</h4>"; 
            ?>
            <a href="addfriend.php?username= <?php echo$row['user_name'];?>" class="btn btn-black" ><i class="far fa-user"></i>Add</a>
            <a href="deletefriendrequest.php?username= <?php echo$row['user_name'];?>" class="btn btn-white"><i class="far fa-user"></i>Delete</a>
          </div>
        </div>
        
        <?php
          }
        ?>
  </div>
</nav>
<div class="container-fluid">

    <div class="row">

      <div class="col-xs-12  col-lg-8" id="posts">
        <br>
       <?php
                  require 'connection.php';
                  $user=$_SESSION['user'];
                  $query = "SELECT p.id, p.user_name, p.text, p.Images, p.post_date, u.first_name, u.last_name  from posts p INNER JOIN user u ON p.user_name=u.user_name WHERE p.user_name = '$user' or p.user_name IN(SELECT `user_name` FROM `user` WHERE `user_name` IN (SELECT `friend` FROM `friend` WHERE `user_name`='$user')) order by `post_date` DESC";

                  $result = mysqli_query($conn, $query);
                  if(mysqli_num_rows($result)==0)
                    { 
                      echo "<p style='margin-left:10px''>You have no posts :c</p>";
                    }
                  while($row = mysqli_fetch_assoc($result))
                  {
                    ?>

            <div class="card">
              <div class="card-body">
                  <div class="container py-3">
                    <div class="card">
                      <div class="row ">
                     

                    <?php
                      
                        echo "<div class='col-md-4'>";
                        if(!empty($row[`Images`]))
                      {
                        echo "<img src='".$row[`Images`]."' class='w-100'>";
                      }
                        echo "<p class='text-secondary text-center' style='margin-top: 10px; margin-bottom: 5px'>".$row['post_date']."</p>";
                        echo "</div>";
                      
                      
                    ?>

                      <div class="col-md-8 px-3">
                        <div class="card-block px-3">
                          <?php
                          echo "<h4 class='card-title'>"."<a href='other_profiles.php?username=".$row['user_name']."'>".$row['first_name']." ".$row['last_name']."</a>"."</h4>"; 
                          echo "<p class='card-text'>".$row['text']."</p>";
                          ?>
                        </div>
                      </div>
                    </div>
                   </div>
                </div>
                <div id="comments">
                <?php
                    $post_id=$row['id'];
                    $query1 = "SELECT c.user_name_comment, c.text ,u.first_name,u.last_name from comments c INNER JOIN user u on  c.user_name_comment = u.user_name WHERE post_id =$post_id";

                    $result1 = mysqli_query($conn, $query1);         
                     while($row1 = mysqli_fetch_assoc($result1))
                  {      
                  ?>
                  <div class="card card-inner comment">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                  <?php
                                       
                                    echo "<p><b>"."<a href='other_profiles.php?username=".$row1['user_name_comment']."'>".$row1['first_name']." ".$row1['last_name']."</a>"."</b></p>";
                                    echo"<p>".$row1['text']."</p>";
                                    
                                  ?>
                               
                                </div>
                            </div>
                        </div>
                  </div>

                  <?php
                    }
                  ?> 
                  </div>


                    <div class="input-group mb-3 mt-3">

                      <form action="comment_from.php" method="post" class="ajax form-inline ml-auto" >

                        <div class="form-group mx-sm-3 mb-2 ">

                          <input class="form-control" style="width: 500px" type="text" name="text" id="newcomment" placeholder="Write a comment"  aria-describedby="basic-addon2" required>

                          <input type="hidden" name="post_id" value="<?php echo($post_id)?>">

                        </div>
                         <input type="submit" value="Add comment" class="btn btn-primary mb-3 btn-outline-secondary comment_btn">

                      </form>
                    </div>

                  <div>  
                    <p id="newlikes">
                      <?php 

                        $query2 = "SELECT count(*) AS likes FROM `like` l where l.post_id = $post_id";
                        $result2 = mysqli_query($conn, $query2);         
                        $row2 = mysqli_fetch_assoc($result2);
                                              
                       
                        $query3 = "SELECT l.user_name as liked FROM `like` l WHERE l.user_name = '$user' AND l.post_id = $post_id";
                        $result3 = mysqli_query($conn, $query3);         
                        $row3 = mysqli_fetch_assoc($result3);

                        if (!isset($row3['liked']))
                        {
                          ?>
                            <a id='like' value="<?php echo $post_id;?>" class="float-left btn text-white btn-primary" onclick="like(this)"><?php echo $row2['likes'];?> likes</a>
                          <?php
                        }
                        else
                        {
                        ?>
                         <a id='like' value="<?php echo $post_id;?>" class="float-left btn text-white btn-danger" onclick="like(this)"><?php echo $row2['likes'];?> likes</a>

                        <?php
                          }
                        ?>
                    </p>
                  </div>   
                 
           </div>   
        </div>
        <hr>

        <?php
          }              
        ?>

      </div>


      <div class=" col-xs-6 col-lg-4">
        
        <br>
        <h1 class=""><small>People Maybye you Know</small></h1>
        <div id="newppl">
        <?php
          require 'connection.php';
          $user=$_SESSION['user'];
          $query = "SELECT `first_name`, `last_name`, `user_name` FROM `user` WHERE NOT `user_name` ='$user' AND NOT `user_name` IN (SELECT `friend` FROM `friend` WHERE `user_name` = '$user')";

          $result = mysqli_query($conn, $query);
          while($row = mysqli_fetch_assoc($result))
          { ?>

        <div class="d-flex flex-row border rounded" style="margin-top: 20px" >
          <div class="p-0 w-25">
            <img src="photos/unknown.jfif" class="img-thumbnail border-0" />  
          </div>

          <div class="pl-3 pt-2 pr-2 pb-2 w-75 border-left">
            <?php
              echo "<h4 class='text-info'>"."<a href='other_profiles.php?username=".$row['user_name']."'>".$row['first_name']." ".$row['last_name']."</a>"."</h4>";
            ?>
            <a href="addfriendrequest.php?username= <?php echo$row['user_name'];?>" class="btn btn-dark" ><i class="far fa-user"></i>Add</a>
            <a href="#" class="btn btn-dark" onclick="removeDiv(this)"><i class="far fa-user"></i>Hide</a>
          </div>
        </div>

        <?php
          }
        ?>
      </div>
      </div>
    </div>

  </div>
  
    
</body>
</html>
    
<script type="text/javascript">
        function removeDiv(e){
            e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
        }
</script>


<script>
setInterval(function() {
  $(document).ready(function(){
        $("#posts").load("load-comments.php");

  });
}, 8000);
</script>

<script>
setInterval(function() {
  $(document).ready(function(){
        $("#freq").load("load-freq.php");
  });
}, 30000);
</script>

<script>
setInterval(function() {
  $(document).ready(function(){
        $("#newppl").load("load-newppl.php");
  });
}, 30000);
</script>


<script>
  $('form.ajax').on('submit',function(){
    var that = $(this),
        url = that.attr('action'), 
        type = that.attr('method'),
        data = {};

    that.find('[name]').each(function(index, value){
      var that = $(this),
          name = that.attr('name'),
          value = that.val();

      data[name] = value;
    });
    $.ajax({
        url: url,
        type: type,
        data: data,
        success: function(response){
          console.log(response);
           $(document).ready(function(){
      $("#posts").load("load-comments.php");
    });
        }
    });
   
    return false;
  });
</script>


<script>
  //add/delete likes
function like(el) {
  if ($(el).hasClass('btn-primary'))
  {
    like.staticVar=$(el).attr('value');
    $.ajax(
    {
       url: "add_like.php?id="+like.staticVar,
       success: function(data){
        $("#posts").load("load-comments.php");
        console.log("success");
       }
    });
  }
  else
  {
    like.staticVar=$(el).attr('value');
    $.ajax(
    {
       url: "delete_like.php?id="+like.staticVar,
       success: function(data){
        $("#posts").load("load-comments.php");
        console.log("success");
       }
   });
  }
};
</script>

</body>
</html>


