<?php
session_start();
include './connection.php';
if(isset($_POST['submit']))
{
   $subject_Id=$_POST['subject_id'];
   $subject_name=$_POST['subject_name'];
   if(!preg_match("/^[a-zA-Z-'\s]*$/",$subject_name))
   {
     echo "Your Name must be contains only characters";
   }
   else
   {
    $stmt = $conn->prepare("INSERT INTO quiz_subjects (subject_id,subject_name) VALUES (?, ?)");
    $stmt->bind_param("ss", $subject_Id, $subject_name);
     $_SESSION['sub_id'] = $subject_Id;
 
     if($stmt->execute()==TRUE)
     {
      echo "<script>alert('Subject has been added')</script>";
      header("location: ../controller/add_questions.php");
     }
     
     else
     {
       echo "Error".$stmt->error;
     }
   }
   
   
} 
?>