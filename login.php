<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-style.css">
    <title>Login By Fozia</title>
</head>
<body>
  <div class="center">
    <h1>Login</h1>
    <form action="#" method="POST" autocomplete="off">
    <div class="form">
        <input type="text" name="username" class="textfiled" placeholder="Usernamr"> 
        <input type="password" name="password" class="textfiled" placeholder="Password"> 
        <div class="forgetpass"><a href="" class="link" onclick="message()">Forget Password ?</a></div>
        <input type="submit" name="login" value="login" class="btn" >
        <div class="Signup">New Member ? <a href="" class="link">SignUp Here</a></div>
        </div>
</div>
</form>
<script> 
function message() 
{
 alert("Please Remember Your Password");
}

</script>
</body>
</html>

<?php
include("connect.php");

if(isset($_POST['login']))            #kea os button pe click hua ha set pura ha ya nh...
{
  $username = $_POST['username'];
  $pwd = $_POST['password'];

  $sql = "SELECT * FROM Form WHERE email = '$username' AND password ='$pwd' ";
  $data = mysqli_query($conn, $sql); ##querry executed
  $total= mysqli_num_rows($data); #check all roes and colums are presenr similar
  //echo $total;
  if($total == 1)
  {
    //echo "Login ok";

    $_SESSION['user_name']=$username;
    header('location:display.php');


    #or by meta tag redirect on google copy syntax(in case of error we use meta tag)
    
    // <meta http-equiv="refresh" content="0; url=http://localhost/php_crud/display.php">
    // <?php
  }
else
{
     echo "Login Failed";
}
  
}




?>
