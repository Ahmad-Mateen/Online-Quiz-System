<?php
session_start();
include './connection.php';
if(isset($_POST['submit']))
{
$subject_Id=$_POST['subject_id'];
$subject_name=$_POST['subject_name'];

    $q1="insert into quiz_subjects(subject_id,subject_name) values('$subject_Id','$subject_name')";
    $rs1=mysqli_query($conn,$q1);
    echo "<script>alert('Subject  has been added')</script>";
    $_SESSION['sub_id'] = $subject_Id;
    header("location: ../views/quizQuestions.html");
} 
?>