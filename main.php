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
    <script src="assets/func.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

    <title>Sample-Project</title>

  </head>
  <body>

    <div class="container">
      <div class="frame">
          <div class="nav">
              <ul class="links">
                  <li class="signin-active"><a class="btn">Sign In</a></li>
                  <li class="signup-inactive"><a class="btn">Sign Up</a></li>
              </ul>
          </div>
          <div ng-app ng-init="checked = false">

              <!-- SignIn -->
              <form class="form-signin" action="function.php" method="post" name="form">
                <label for="dlno">Email Address</label>
                  <input class="form-styling" type="text" name="email" placeholder="Enter your email address" required/>
                <label for="password">Password</label>
                  <input class="form-styling" type="password" name="password" placeholder="Enter your password" required/>
                <button class="btn-animate" type="submit" name="login_submit">Login to your account</button>
              </form>


              <!-- SignUp -->
              <form class="form-signup" action="function.php" method="post" name="form">
                <label for="fullname">Full name</label>
                  <input class="form-styling" type="text" name="name" placeholder="Enter your full name" required/>
                <label for="email">Email</label>
                  <input class="form-styling" type="email" name="email" placeholder="Enter your email address" required/>
                <label for="dlno">Phone Number</label>
                  <input class="form-styling" type="phone" name="phone" placeholder="Enter your phone number" required/>
                <label for="password">Create password</label>
                  <input class="form-styling" type="password" name="password" placeholder="Enter a password" required/>
                <button class="btn-animate" type="submit" name="register_submit">REGISTER</button>
              </form>

          </div>
          <div class="forgot"> <a href="#">Forgot your password?</a> </div>

      </div>
            <a id="refresh" value="Refresh" onClick="history.go()"> <svg class="refreshicon" version="1.1" id="Capa_1" x="0px" y="0px" width="25px" height="25px" viewBox="0 0 322.447 322.447" style="enable-background:new 0 0 322.447 322.447;" xml:space="preserve">
            <path d="M321.832,230.327c-2.133-6.565-9.184-10.154-15.75-8.025l-16.254,5.281C299.785,206.991,305,184.347,305,161.224 c0-84.089-68.41-152.5-152.5-152.5C68.411,8.724,0,77.135,0,161.224s68.411,152.5,152.5,152.5c6.903,0,12.5-5.597,12.5-12.5 c0-6.902-5.597-12.5-12.5-12.5c-70.304,0-127.5-57.195-127.5-127.5c0-70.304,57.196-127.5,127.5-127.5 c70.305,0,127.5,57.196,127.5,127.5c0,19.372-4.371,38.337-12.723,55.568l-5.553-17.096c-2.133-6.564-9.186-10.156-15.75-8.025 c-6.566,2.134-10.16,9.186-8.027,15.751l14.74,45.368c1.715,5.283,6.615,8.642,11.885,8.642c1.279,0,2.582-0.198,3.865-0.614 l45.369-14.738C320.371,243.946,323.965,236.895,321.832,230.327z" /> </svg> </a>
    </div>

  </body>
</html>
