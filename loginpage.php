<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/stylelogin.css">
</head>

<body>
    <main>
        <div class="row">
            <div class="col-logo">
                <img src="pics/freindsbook.PNG" alt="Logo">
                <h2>freindsbook helps you connect and share with the people in your life.</h2>
            </div>
            <div class="col-form">
                <div class="form-container">
                <form action="check-login.php" method="POST">

                    <input type="text" placeholder="Email address or username"  id="userName" name="user_name" >
                    <input type="password" placeholder="Password" id="userPassword" name="user_password">
                    <button class="btn-login">Login</button>
                    <a href="#">Forgotten password?</a>
                    <a href="signuppage.php" class="form_link">Sign Up</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer-contents">
            <ol>
                <li>English (UK)</li>
                
                <li><a href="#">Português (Brasil)</a></li>
                <li><a href="#">Français (France)</a></li>
                <li><button>+</button></li>
            </ol>
            <small>developed by moath</small>
        </div>
    </footer>
</body>

</html>