<?php
 session_start();
  if ( !isset($_SESSION['user']) && empty($_POST) )
  {
    header("Location:postform.php");
  }
  else
{
  	require 'connection.php';
  	$username = $_SESSION['user'];
    
  	$text =htmlspecialchars($_POST['text']);

  	$file =$_FILES['file'];

  	$fileName =$_FILES['file']['name'];
  	$fileTmpName =$_FILES['file']['tmp_name'];
  	$fileSize =$_FILES['file']['size'];
  	$fileError =$_FILES['file']['error'];
  	$fileType =$_FILES['file']['type'];

  	$fileExt = explode('.', $fileName);
  	$fileActExt = strtolower(end($fileExt));

  	$allowed = array('jpg','jpeg','png');

  	if(in_array($fileActExt, $allowed))
  	{
	  	if ($fileError === 0) 
		{
			$fileNameNew=uniqid('',true).".".$fileActExt;
			$fileDes= 'upload/'.$fileNameNew;

			move_uploaded_file($fileTmpName, $fileDes);
	  	}
  	}
  	$date =date('Y-m-d');
	$query = "INSERT INTO `posts` (`user_name`, `text`, `Images`, `post_date`) values ('$username', '$text','$fileDes',CAST('". $date ."' AS DATE))";

	$result = mysqli_query($conn, $query);

	if ($result){
		echo "user saved successfully";
		header( "location:profile.php" );
	}
	else{
		echo "Error " . mysqli_error($conn);
	}
}

?>