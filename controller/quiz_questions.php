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
   

 $query="show tables like 'quiz_questions'";
 $result=mysqli_query($conn,$query);
 if(mysqli_num_rows($result)==0)
 {
     $q="create table quiz_questions(subject_id varchar(25) not null,question varchar(50) not null,option_a varchar(50) not null,option_b varchar(50) not null,option_c varchar(50) not null,option_d varchar(50) not null,answer varchar(50) not null,description varchar(50) not null)";
     $rs=mysqli_query($conn,$q) or die("Table creation failed");
     $q1 ="insert into quiz_questions(subject_id,question,option_a,option_b,option_c,option_d,answer,description) values('$subject_id','$question','$option_a','$option_b','$option_c','$option_d','$answer','$description')";
     $rs1=mysqli_query($conn,$q1);
     echo "<script>alert('Subject  has been added')</script>";
    

 }
 else
 {
    $q1 ="insert into quiz_questions(subject_id,question,option_a,option_b,option_c,option_d,answer,description) values('$subject_id','$question','$option_a','$option_b','$option_c','$option_d','$answer','$description')";
    $rs1=mysqli_query($conn,$q1);
    echo "<script>alert('Question  has been added')</script>";
    
 }
 }
 


?>