<?php
session_start();
$subject_id=$_SESSION['sub_id'];
include './connection.php';
if(isset($_POST['submit']))
{
 $question=$_POST['question'];
 $option_a=$_POST['option1'];
 $option_b=$_POST['option2'];
 $option_c=$_POST['option3'];
 $option_d=$_POST['option4'];
 $answer=$_POST['answer'];
 $description=$_POST['description'];
     $stmt = $conn->prepare("INSERT INTO quiz_questions (subject_id,question,option_a,option_b,option_c,option_d,answer,description) VALUES (?, ? ,?, ?, ?, ?, ?, ?)");
     $stmt->bind_param("ssssssss",$subject_id,$question,$option_a,$option_b,$option_c,$option_d,$answer,$description);
     if($stmt->execute()==TRUE)
     {
        echo "<script>alert('Question has been added')</script>";
        header("location: ../views/quizQuestions.html"); 
       
     }
     
     else
     {
           echo "Error".$stmt->error;
     }
    
 
 }
 


?>