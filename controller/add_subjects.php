<?php
session_start();
include './connection.php';
if(isset($_POST['submit']))
{
$subject_Id=$_POST['subject_id'];
$subject_name=$_POST['subject_name'];

   $stmt = $conn->prepare("INSERT INTO quiz_subjects (subject_id,subject_name) VALUES (?, ?)");
   $stmt->bind_param("ss", $subject_Id, $subject_name);
    $_SESSION['sub_id'] = $subject_Id;
    if($stmt->execute()==TRUE)
    {
      echo "<script>alert('Subject has been added')</script>";
    header("location: ../views/quizQuestions.html");
    }
    
    else
    {
          echo "Error".$stmt->error;
    }
} 
?>