<?php

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'myuser');
if($con)
{
    
}

else
{
       echo "connection Failed";
 }

?>