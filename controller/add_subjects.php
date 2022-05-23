<?php
session_start();
include './connection.php';
if(isset($_POST['submit']))
{
$subject_Id=$_POST['subject_id'];
$subject_name=$_POST['subject_name'];

$query="show tables like 'subjects'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)==0)
{
    $q="create table subjects(subject_id varchar(25) not null,subject_name varchar(25) not null,PRIMARY KEY(subject_id))";
    $rs=mysqli_query($conn,$q) or die("Table creation failed");
    $q1="insert into subjects(subject_id,subject_name) values('$subject_Id','$subject_name')";
    $rs1=mysqli_query($conn,$q1);
    echo "<script>alert('Subject  has been added')</script>";
    $_SESSION['sub_id'] = $subject_Id;
    header("location: ../views/quizQuestions.html");
}
else
{
    $q1="insert into subjects(subject_id,subject_name) values('$subject_Id','$subject_name')";
    $rs1=mysqli_query($conn,$q1);
    echo "<script>alert('Subject  has been added')</script>";
    $_SESSION['sub_id'] = $subject_Id;
    header("location: ../views/quizQuestions.html");
}
}
 
?>