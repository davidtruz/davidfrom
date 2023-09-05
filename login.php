<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
  header("Location: index.php");
}
if (isset($_POST["submit"])) {
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) > 0) {
    if ($password == $row['password']) {
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    } else {
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  } else {
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <center>
    <h2>Login</h2>
  </center>
  <form class="login" action="" method="post" autocomplete="off">
    <label for="usernameemail">Username atau Email : </label>
    <input type="text" name="usernameemail" id="usernameemail" required value=""> <br>
    <label for="password">Password : </label>
    <input type="password" name="password" id="password" required value="">
    <button type="submit" name="submit">Login</button>
    <br>
    <center>
      <p style="margin-top: 23px;">Silakan daftar jika belum punya akun <a href="register.php" style="text-decoration: none;">Register</a></p>
    </center>
  </form>

</body>

</html>

<style>
  body {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    display: block;
    margin-top: 150px;
  }

  h2 {
    text-transform: uppercase;
    font-size: 50px;
  }

  .login {
    width: 420px;
    height: 250px;
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
    padding: 5px;
    margin: 0 auto;
    padding-left: 0;

  }

  .login input {
    display: block;
    font-size: 19px;
    height: 30px;
    width: 400px;
    color: red;
  }

  .login input:hover {
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
  }

  button:hover {
    letter-spacing: normal;


  }
</style>