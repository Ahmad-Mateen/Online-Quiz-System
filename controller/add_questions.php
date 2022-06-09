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
       // echo "<script>alert('Question has been added')</script>";
        header("location: ./add_questions.php"); 
     }

     else
     {
           echo "Error".$stmt->error;
     }
    
 
 }
 


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Make Quiz</title>
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
    <link href="../css/add_questions.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Quizer</a> <button aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"
                data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../views/teacher_dashboard">Home</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="../views/makeQuiz.html">Make Quiz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    <li class="nav-item">
						<a class="nav-link" href="../views/login.html">Logout</a>
					</li>

                </ul>
            </div>
        </div>
    </nav>
    <h1>Make Quiz</h1>
    <h4>You can add five questions</h4>
    <div class="txt-question">
        <form  method="post">
        <div>
            <input type="text" placeholder="Question" name="question" required>
            <input type="text" placeholder="Option a" name="option1" required>
            <input type="text" placeholder="Option b" name="option2" required>
            <input type="text" placeholder="Option c" name="option3" required>
            <input type="text" placeholder="Option d" name="option4" required>
            <input type="text" placeholder="Answer" name="answer" required>
            <input type="text" placeholder="Description" name="description" required>
    </div>
    <button class="next" type="submit"  name="submit"> Next Question </button>
    </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
    </script>
</body>

</html>