<?php
include "./connection.php";
if(isset($_POST['submit']))
{
    $name=$_POST['username'];
    $email=$_POST['useremail'];
    $password=$_POST['userpassword'];
    $usertype=$_POST['usertype'];
         $q3="insert into users(name,email,pwd,usertype) values('$name','$email','$password','$usertype')";
         $rs3=mysqli_query($conn,$q3);
         echo "<script>alert('New User has been added')</script>";

         header("location: ../views/login.html");       
     }
     
     
?>

 
