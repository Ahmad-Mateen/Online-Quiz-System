<?php
session_start();
//error_reporting(0); 
include "./connection.php";
$val=$_SESSION['quiz_question'];
$sub=$_SESSION['subjectName'];
$num=5;
if($val<$num)
{
    
    // echo $sub;
     
     $sql="DELETE * FROM quiz_subjects WHERE subject_name=?";
     $stmt = $conn->prepare($sql);
     $stmt->bind_param("s",$sub);
        if($stmt->execute()==TRUE)
        {
            $stm = $conn->prepare("DELETE * FROM quiz_questions WHERE subject_name=?");
            $stm->bind_param("s",$sub);
            $stm->execute();
            header("location: ../views/teacher_dashboard.html");
        }
          
}
else
{
    header("location: ../views/teacher_dashboard.html");
}

?>