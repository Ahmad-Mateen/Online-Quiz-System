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
        $q="create table users(name varchar(25),email varchar(25),password varchar(25),usertype varchar(25))";
        $rs=mysqli_query($conn,$q);
        $q3="insert into users(name,email,password,usertype) values('$name','$email','$password','$usertype')";
        $rs3=mysqli_query($conn,$q3);
        echo "Table not found";
            
    }
    else
    {
       $q3="insert into users(name,email,password,usertype) values('$name','$email','$password','$usertype')";
       if(mysqli_query($conn,$q3))
       {
           echo "<script>alert('New User has been added')</script>";
   
       }
       else
       {
           echo 'error'.mysql_error($conn);
       }
    }
}
?>

 
