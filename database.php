<?php
$con=mysqli_connect("localhost","root","");
$query=mysqli_query($con,"create database TODOLIST");
if($query)
    {
    echo"database created";
}
else{
     echo "database not created";
}
mysqli_close($con);
?>