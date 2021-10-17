<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/login.css">
        <title>login page</title>
    </head>
    <body>
        <?php 
            include_once 'menu.php'; 
        ?>       
        <br>
        <br>
        <div id="logreg-forms">
            <div id="signinAllPart">
                <div id = "logCPart">
                    <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
                    <div class="social-login">
                        <button class="btn facebook-btn social-btn" type="button" onclick = "location.href('https://www.facebook.com/w3schoolscom/')"><span><i class="fab fa-facebook-f"></i> Sign in with Facebook</span> </button>
                        <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google+</span> </button>
                    </div>
                    <p style="text-align:center"> OR  </p>
                    <div id = "inputValArea">
                        <div id = "inputVal">
                            <input name = "email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                            <input name = "password" type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
                            <button onclick = "checkMember()" class="btn btn-success btn-block" id = "signinButton">
                            <i class="fas fa-user-plus" ></i>
                                <i class="fas fa-sign-in-alt"></i> Sign in</button>
                        </div>
                        <a href="forgetpassword.php" id="forgot_pswd">Forgot password?</a>
                        <hr>
                        <!-- <p>Don't have an account!</p>  -->
                        <button class="btn btn-primary btn-block" type="button" id="btn-signup" onclick="location.href='signup.php'">
                        <i class="fas fa-user-plus"></i> Sign up New Account</button>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="scripts/login.js"></script>
</html>