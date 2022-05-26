<?php
include "./connection.php";
if(isset($_POST['submit']))
{
    $user_name=$_POST['username'];
    $user_email=$_POST['useremail'];
    $user_password=$_POST['userpassword'];
    $user_type=$_POST['usertype'];
    $stmt = $conn->prepare("INSERT INTO  users (name,email,pwd,usertype) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss",$user_name,$user_email,$user_password,$user_type);
      if($stmt->execute()==TRUE)
       {
          echo "<script>alert('New User has been added')</script>";
          header("location: ../views/login.html");
   }          
    else
         {
                echo "Error".$stmt->error;
          }
         
                
     }

?>

 
