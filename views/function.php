<?php

 // $conn =mysqli_connect("localhost", "root","","najj");

//Remote Database
$conn =mysqli_connect("remotemysql.com", "4yMzXaBzd2","FSD11NaNgZ","4yMzXaBzd2");

if (isset($_POST['register_submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "Insert Into members(full_name, email, phone, password) Values('$name','$email','$phone','$password')";
    $result =mysqli_query($conn,$query);

    if($result){
      echo "<script>alert('Registered Successfully')</script>";
      echo "<script>window.open('../index.php','_self')</script>";
    }
}



if (isset($_POST['login_submit'])) {
    session_start();
    if (isset($_SESSION["email"])) {
        session_destroy();
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "select * From members Where email='$email' And password='$password'";

    $result =mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);

    if($count==1){
      while ($row = mysqli_fetch_array($result)) {
            $name = $row['full_name'];
            $email = $row['email'];
      }
      $_SESSION["name"]  = $name;
      $_SESSION["email"] = $email;
      header("location:home.php");
    }
    else{
      echo "<script>alert('Error login')</script>";
      echo "<script>window.open('../index.php','_self')</script>";
    }
}





?>
