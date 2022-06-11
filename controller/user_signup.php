<?php
include "./connection.php";
error_reporting(0);
if(isset($_POST['submit']))
{
    $user_name=$_POST['username'];
    $user_email=$_POST['useremail'];
    $user_password=$_POST['userpassword'];
    $user_type=$_POST['usertype'];
     
    if(!preg_match("/^[a-zA-Z-'\s]*$/",$user_name))
    {
      echo "Validation Error ". " ! "."Your Name must be contains only characters";
    }
    else if(!preg_match('/^[1-9][0-9\.]{0,15}$/',$user_password))
    {
     echo "Validation Error ". " ! "."Your Passord must be contains only numbers";
    }
    else if(!filter_var($user_email,FILTER_VALIDATE_EMAIL))
    {
     echo "Validation Error ". " ! "."Invalid email format";
    }
    else if($user_type=="Select User")
    {
     echo "Validation Error ". " ! "."Select User type";
    }
    
    else
    {
     $stmt = $conn->prepare("INSERT INTO  users (name,email,pwd,usertype) VALUES (?, ?, ?, ?)");
     $stmt->bind_param("ssss",$user_name,$user_email,$user_password,$user_type);
       if($stmt->execute()==TRUE)
        {
           echo "<script>alert('New User has been added')</script>";
           header("location: ../views/user_login.html");
    }          
     else
          {
                 echo "Error".$stmt->error;
           }
     
    }
         
                
     }

?>


 
