<?php
$servername="localhost";
$username="root";
$password="";
$conn=mysqli_connect($servername,$username,$password);
if(!$conn)
{
    
    // die("Error : " .mysql_error());
}
else
{
    $sql="create database online_quiz121";
    $rs=mysqli_query($conn,$sql);
    if(!$rs)
    {
      //  echo"Database  failed";
    }
    else
    {
        //echo"Database Done";
    }
}
?>