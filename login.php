<?php
require 'conf.php';
session_start();
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $sql ="SELECT * FROM users WHERE username = '$usernameemail' OR email = '$usernameemail'";
  $result = $conn->query($sql);
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION['name'] =  $usernameemail;  
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Log in</title>
</head>
<body>
        <div class="video-container">
        <iframe src="https://www.youtube.com/embed/X5Dd78jiSi8?controls=0&start=4&autoplay=1&mute=1&playsinline=1&loop=1&playlist=X5Dd78jiSi8">
        </iframe>
       
        <div class="login-container">
        <h1>Log in</h1>
        <form class="" action="" method="post" autocomplete="off">
      <label for="usernameemail">Username or Email : </label>
      <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br>
      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <a href="registration.php" class="ca">Create an account</a>
           
        </form>
        </div>
        </div>
   
    
</body>
</html>



<!-- reference: https://www.youtube.com/watch?v=QxZxHUf7c_0 -->
<!-- reference: https://www.youtube.com/watch?v=kffivnAYUAY&list=PLoNhTf3GwFOcG3QtGi0Zhdm2d1K9qpJCw&index=11 -->