<?php
  include("config.php");
   session_start();
$db = mysqli_connect("localhost","root","","login");

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
       #echo $myusername . "   <br> ".$mypassword;
      
    $sql = "SELECT id FROM db WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
       $row=mysqli_fetch_assoc($result);
       #echo $row['id'];
      $count = mysqli_num_rows($result);
       
     if(mysqli_num_rows($result)==1)
    {
         header("location: welcome.php");
      }else {
         $error;
         echo "<div class='imgcontainer' >";
            echo "Your Username or Password is invalid . Please try again ." ;
             
             echo "</div>";

     }
   }
?>

<!DOCTYPE html>
<html>
<head>
</head>
    
<title>Log In here !</title>
<style>
form {
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
    align-content: center;
    text-align:center;
    background-color: #4CAF50;
    color: white;
    padding: 14px 14px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 8%;
    font-weight: 3px;
}

button:hover {
    opacity: 0.8;
}

.butt {

    align-content: center;
    text-align: center;
    padding: 14px 14px;
    margin: 8px 0
}

.butt:hover {
    opacity: 0.8;
}



.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    font-family: fantasy;
    color:midnightblue;
}

img.avatar {
    width: 20%;
}
    body{
        margin: 0;
        padding: 0;
        background-size: 110% 120%;
        background-repeat: no-repeat;
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
@media screen and (max-width: 400px) {
    span.psw {
       display: block;
       float: none;
    }
    button{
        width:30%;
    }
    
    input[type=text], input[type=password] 
    {
        width:50%;
    }

}
    @media screen and (max-height: 539px) {
        body{
            background-size: 200% 200%;
        

}
</style>

<body>
<form action="" method="post">
  <div class="imgcontainer">
    <img src="logo.png" alt="Avatar" class="avatar">
      <br>
  </div>

<br><br>
  <div class="container">
    <label><b>Username</b></label>
    <input type="text"  name="username" required>
      <br><br><br>
    <label><b>Password</b></label>
    <input type="password"  name="password" required>
      <br><br><br>
    <button type="submit" >Login</button>
      <br><br>
            <a href="forgetpw.php" class="butt">Forgot Password</a>

      <br><br>
    <input type="checkbox" checked="checked"> Remember me
  </div>    
    </form>
</body>


</html>