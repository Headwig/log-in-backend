<?php
                           session_start();
?>

<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome ! </h1> 
        <?php

                        echo "Logged in user  is ".$_SESSION["username"];
                        echo"<br>";
 $con = mysqli_connect("localhost","root","","login");
if(!$con)
{
    echo"Failed to connect to MySQL: ",mysqli_connect_error();
    die();
}
else
{
    $myusername=$_SESSION["username"];
    $sql="SELECT id , fname , username , email FROM db WHERE username = '$myusername'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {            
            echo "Id : " .$row['id'] . " <br> Name : ".$row['fname'] . " <br> Username : ".$row['username']." <br> Email : ".$row['email']."</br>";            
        }
        
        
    }
    else
    {
        echo "0 results " ;
    }
   
}
 mysqli_close($con)
?>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>