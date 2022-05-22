<?php
?><?php
include './connection.php';
if(isset($_POST['submit']))
{
$question=$_POST['question'];
$option1=$_POST['option1'];
$option2=$_POST['option2'];
$option3=$_POST['option3'];
$option4=$_POST['option4'];
$answer=$_POST['answer'];
$description=$_POST['description'];

$query="show tables like 'quiz_questions'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)==0)
{
    $q="create table quiz_questions(subject_id varchar(25) not null,question varchar(50) not null,option_A varchar(50) not null,option_b varchar(50) not null,option_c varchar(50) not null,option_d varchar(50) not null,answer varchar(50) not null,description varchar(50) not null,PRIMARY KEY(subject_id))";
    $rs=mysqli_query($conn,$q) or die("Table creation failed");
    $q1="insert into quiz_questions(subject_id,question,option_A,option_b,option_c,option_d) values('$subject_Id','')";
    $rs1=mysqli_query($conn,$q1);
    echo "<script>alert('Subject  has been added')</script>";
    header("location: ../views/quizQuestions.html");
}
else
{
    $q1="insert into quiz_questions(subject_id,subject_name) values('$subject_Id','$subject_name')";
    $rs1=mysqli_query($conn,$q1);
    echo "<script>alert('Subject  has been added')</script>";
    header("location: ../views/quizQuestions.html");
}
}

?>