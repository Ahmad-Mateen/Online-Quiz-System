<?php
include "./connection.php";
if(isset($_POST['submit']))
{
    $name=$_POST['username'];
    $email=$_POST['useremail'];
    $password=$_POST['userpassword'];
    $usertype=$_POST['usertype'];
    
   
       $query="SHOW TABLES LIKE 'users'";
       $rs=mysqli_query($conn,$query);
      if(mysqli_num_rows($rs)==0)
     {
         $q="create table users(name varchar(25) not null,email varchar(25) not null,password varchar(25) not null,usertype varchar(25) not null,PRIMARY KEY(email))";
         $rs=mysqli_query($conn,$q) or die("Table creation failed");
         $q3="insert into users(name,email,password,usertype) values('$name','$email','$password','$usertype')";
         $rs3=mysqli_query($conn,$q3);
         echo "<script>alert('New User has been added')</script>";

         header("location: ../views/login.html");
            
     }
     else
     {
        $q3="insert into users(name,email,password,usertype) values('$name','$email','$password','$usertype')";
        if(mysqli_query($conn,$q3))
        {
            echo "<script>alert('New User has been added')</script>";
            header("location: ../views/login.html");
        }
        else
        {
           echo 'error'.mysql_error($conn);
        
        }
     }
 }
?>

 
