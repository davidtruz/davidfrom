<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Nama pengguna atau email anda sudah terpakai'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO user VALUES('','$name','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Register sukses'); </script>";
    }
    else{
      echo
      "<script> alert('Password tidak di temukan'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Form Register</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <center>
    <h2 style="font-size: 50px">Register</h2>
  </center>
  <form class="login" action="" method="post" autocomplete="off">
    <label for="name" >Nama : </label>
    <input type="text" name="name" id="name" required value="">
    <label for="username">Username : </label>
    <input type="text" name="username" id="username" required value="">
    <label for="email">Email : </label>
    <input type="email" name="email" id="email" required value="">
    <label for="password">Password : </label>
    <input type="password" name="password" id="password" required value="">
    <label for="confirmpassword">Confirm Password : </label>
    <input type="password" name="confirmpassword" id="confirmpassword" required value="">
    <button type="submit" name="submit">Register</button> <br>
    <center>
      <p>Silakan login jika sudah punya akun <a href="login.php" style="text-decoration: none;">Login</a></p>
    </center>

  </form>
</body>

</html>


<style>
  
  body {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  }

  h2 {
    text-transform: uppercase;
  }

  .login {
    width: 420px;
    height: 460px;
    background-color: rgba(176, 176, 176, 0.5);
    color: rgb(190, 30, 30);
    margin: 0 auto;
    box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
    -webkit-box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
  }

  .login {
    padding: 10px;
    margin: 0 auto;
  }

  .login label {
    display: block;
    padding: 10px;
    margin: 0 auto;
    padding-left:0 ;


  }

  .login input {
    display: block;
    height: 30px;
    width: 400px;
    color: red;
    font-size: 19px;
  }
  .login input:hover{
    border: 1px solid red;

  }

  button {
    padding: 10px;
    width: 407px;
    margin-top: 10px;
    color: rgb(255, 255, 255);
    background: red;
    letter-spacing: 0.2rem;
    border: none;
    cursor: pointer;
  }

  button:hover {
    letter-spacing: normal;

  }
</style>