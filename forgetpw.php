<?php
  include("config.php");
   session_start();
$db = mysqli_connect("localhost","root","","login");
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form        
      $myusername = mysqli_real_escape_string($db,$_POST['username']);

        $sql = "SELECT password FROM db WHERE username = '$myusername'";
      $result = mysqli_query($db,$sql);
       $row=mysqli_fetch_assoc($result);
      $count = mysqli_num_rows($result);
     if(mysqli_num_rows($result)==1)
    {
                  echo "<div class='imgcontainer' >";
                    echo $row['password'];
                                 echo "</div>";


      }
    else 
    {
                            echo "<div class='imgcontainer' >";
                            echo "No such username found ! ";
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
    background-color: transparent;
    padding: 14px 14px ;
    margin: 8px 0;
    cursor: pointer;
    width: 8%;
    border: solid black;
    font-weight: 3px;
}

button:hover {
    opacity: 0.8;
    background-color: lawngreen;
}



.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    font-family: fantasy;
    color:black blueviolet;
}

img.avatar {
    width: 20%;
}
    body{
        margin: 0;
        padding: 0;
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
    @media screen and (max-height: 1080px) {
        body{
            background-repeat: repeat;
        }

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
       <button type="submit">Retrieve Password</button>

      <br><br>
  </div> 
    </form>
    
    
</body>


</html>