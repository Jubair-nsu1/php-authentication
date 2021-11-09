<?php

//index.php
//Include Configuration File
include('vendor/config.php');

$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();

  //Below you can find Get profile data and store into $_SESSION variable
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

 }
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if(!isset($_SESSION['access_token']))
{
 //Create a URL to obtain user authorization
 $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="assets/google-signin.png" /></a>';
}

?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/style.css"/>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="assets/func.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />

    <title>Sample-Project</title>

  </head>
  <body>

    <div class="container">
         <div class="panel panel-default">
         <?php
         if($login_button == '')
         {

            echo '
            </br></br>
              <center>
                <h1 style="color:yellow">Welcome to Homepage</h1></br>
                <h3>Name: '.$_SESSION['user_first_name'].'</h3>
                <h3>Email: '.$_SESSION['user_email_address'].'</h3></br></br>
                <a style="color:red" href="vendor/auth-logout.php">Logout</a>
              </center>

            ';

         }
         else
         {
          ?>

          <div class="frame">

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item text-center"> <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Sign In</a> </li>
                <li class="nav-item text-center"> <a class="nav-link btr" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Sign Up</a> </li>
            </ul>


            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                    <div class="form px-4 pt-3">
                      <form action="views/function.php" method="post" name="form">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" class="form-styling" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Enter Email" required/></br>
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-styling" placeholder="Enter Password" required/></br>
                        <button class="btn-animate"type="submit" name="login_submit">Login to your account</button>
                        <center><a style="font-size:12px; color:'white'" href="#">Forget your password?</a></center>
                      </form>
                      <br><br>
                      <?php echo '<div align="center">'.$login_button . '</div>'; ?>
                      <!-- <button class="btn-animate" type="button"><span><i class="fab fa-facebook-f"></i> Sign in with Facebook</span></button> -->
                    </div>


                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="form px-4">
                      <form name="form" action="views/function.php" method="post">
                        <label for="fullname">Full name</label>
                          <input class="form-styling" type="text" name="name" placeholder="Aron Smith" required/>
                        <label for="email">Email</label>
                          <input class="form-styling" type="email" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="xyz@gmail.com" required/>
                        <label for="phone">Phone Number</label>
                          <input class="form-styling" type="phone" name="phone" pattern="[0-9]{1}[0-9]{10}" placeholder="017XXXXXXXX" required/>
                        <label for="password">Create password</label>
                          <input class="form-styling" type="password" name="password" placeholder="Enter a password" required/>
                        <button class="btn-animate" type="submit" name="register_submit">REGISTER</button></br></br>
                      </form>
                    </div>
                </div>
            </div>
          </div>
          <br><br>

          <?php
          // echo '<div align="center">'.$login_button . '</div>';
         }
         ?>
         </div>
    </div>

  </body>

</html>
