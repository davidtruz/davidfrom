<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION ["id"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
    $row =mysqli_fetch_assoc($result);
}else{
    header('location :login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <center><h1>Welcome  <?php  echo ucwords ($row ["username"]); ?></h1></center>
    <center><p>silakan <a href="logout.php">Login</a> kembali</p></center>
    
    
</body>
</html>


<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    h1{
        font-size: 50px;
    }
body{
margin: 300px;
}
a{
    text-decoration: none;
    color: blue;
}



</style>