<?php
$con=mysqli_connect("localhost","root","","TODOLIST");
$query=mysqli_query($con,"create table TASKS(id int(15),task varchar(300))");
if($query)
{
    echo "table created";
}
 else 
{
    echo "table not created";   
}
mysqli_close($con);
?>