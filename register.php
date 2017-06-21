<?php
  include("config.php");
   session_start();
$db = mysqli_connect("localhost","root","","login");

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
       $email=mysqli_real_escape_string($db,$_POST['email']); 
       $fname=mysqli_real_escape_string($db,$_POST['fname']); 
       echo $myusername . "   <br> ".$mypassword."<br>".$email."<br>".$fname;
      
    $con = mysqli_connect("localhost","root","","login");
if(!$con)
{
    echo"Failed to connect to MySQL: ",mysqli_connect_error();
    die();
}
else
{
    $sql="INSERT INTO db (Fname, email, username , password) VALUES('$fname' , '$email' , '$myusername' , '$mypassword' )";
    if(mysqli_query($con,$sql))
    {
                    echo "<div class='imgcontainer' >";

        echo "Account has been created successfully ! ";
                     echo "</div>";
        
                 header("location: login.php");


    }
    else
    {
                            echo "<div class='imgcontainer' >";

        echo "Error inserting data : ".mysqli_error($con);
                     echo "</div>";

    }
   
}
 mysqli_close($con);

     
   }    
?>

<!DOCTYPE html>
<html>
<head>
</head>
    
<title>Log In here !</title>
<style>
form {
    border: 3px solid #f1f1f1;
        align-content: center;
    text-align: center;
    
}

input[type=text], input[type=password] {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    align-content: center;
    text-align: center;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 25%;
        align-content: center;
    text-align: center;
}

button:hover {
    opacity: 0.8;
}



.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;

}

img.avatar {
    width: 25%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}
    #baap{
    }
/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }

}
</style>

<body>
<form  method="post">
  <div class="imgcontainer">
    <img src="logo.png" alt="Avatar" class="avatar">
      <br>
    <h3 style="font-family:cursive;">Create an account . It's free and always will be . </h3>

  </div>
<br><br>
  <div class="container">
      <label><b>Fullname</b></label>
    <input type="text"  name="fname" required>
      <br><br><br>
    <label><b>Email Id </b></label>
    <input type="text"  name="email" required>
      <br><br><br>
    <label><b>Username</b></label>
    <input type="text"  name="username" required>
      <br><br><br>
    <label><b>Password</b></label>
    <input type="password"  name="password" required>
      <br><br><br>
    <button type="submit">Submit Details</button>
      <br><br>
  </div>    
    </form>
</body>


</html>