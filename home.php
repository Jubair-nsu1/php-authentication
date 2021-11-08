
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/style.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

  </head>

  <?php
  $conn =mysqli_connect("localhost", "root","","najj");
  session_start();
  if (!(isset($_SESSION['email']))) {
      session_destroy();
      header("location:main.php");
  } else {
      $name     = $_SESSION['name'];
      $email = $_SESSION['email'];
  }
  ?>

  <body>
  </br></br>
    <center>
      <h1 style='color:yellow'>Welcome to Homepage</h1></br>
      <h3>Name: <?php echo "$name"; ?></h3>
      <h3>Email: <?php echo "$email"; ?></h3></br></br>
      <a style='color:red' href="logout.php">Logout</a>
    </center>

  </body>

</html>
