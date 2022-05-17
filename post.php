<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

  <title>Add post</title>
<style>
 input , textarea
{
  display: block;
  width: 300px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 25px;
  margin-top: 15px;
  margin-bottom: 15px;
  outline: none;
}

textarea
{
  height: 100px;
  width: 100%;
}
input
{
  width: 100%;
}
</style>
</head>
<body>
 <?php
  session_start();
  if ( !isset($_SESSION['user'] ) )
  {
    header("Location:profile.php");

  }
  ?>

 <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="margin-top: 3rem;">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h2 style=" padding-bottom: 7px; text-align: center;">Add post</h2>

            <form class="form-signin" action="addpost.php" method="post" enctype="multipart/form-data">

              <div class="form-group">
                <textarea name="text" placeholder="Text"></textarea>
              </div>
              <div class="form-group">
                <input type="file" name="file"></textarea>
              </div>
             
              <button  class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Add post</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>
</html>