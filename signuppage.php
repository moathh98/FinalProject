<?php require 'connection.php';?>
<html>
    <head>
        <link href="css/style-signup.css" type="text/css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Catamaran:700,800&display=swap" rel="stylesheet">
    </head>
    <body>

        <div class="main-header">
            <div class="header">
                <li class="sitename"><a href="login.htm">freindsbook</a></li>
                
            </div>
        </div>
        <form  action="newuser.php" method="POST">

        <div class="content">
            <div class="div-1">
                <p>freindsbook helps you connect and share with the<br>people in your life.</p>
                <img src="pics/freindsbook.PNG" class="fb-img">
            </div>

            <div class="div-2">
                <h1>Create an account</h1>
                <p>It's free and always will be.</p>
                <li><input type="text" placeholder="First Name" id="firstName" name="first_name"><input type="text" placeholder="lastname" id="lastName" name="last_name"></li>
                <li><input type="text" placeholder=" username " id="userName" name="user_name"></li>
                <li><input type="text" placeholder=" email " id="email" name="email"></li>
                <li><input type="text" placeholder=" adress " id="address" name="address"></li>
                <li><input type="text" placeholder="TelNo" id="phoneNo" name="phone_no"></li>
                <li><input type="password" placeholder="password" id="userPassword" name="password"></li>
                
                
                <p>Gender</p>
                <li><input type="radio"  id="gender" name="gender" value="female">Female <input type="radio" id="gender" name="gender" value="male">Male </li>
                <li><input type="submit" class="btn login_btn" value="Register" name="register"></li>
            </div>
        </div>
        </form>

        <?php   header("login.php");     ?>
    </body>
</html>