<?php
include './connection.php';
if(isset($_POST['save']))
{
    $id=$_POST['sub_id'];
    $name=$_POST['sub_name'];
    // in progress
     echo '<h4 class ="user_Name">' ."Name :". "Usman Khalid" . '</h4>';
     echo '<h4 class ="subjec_Name">' ."Quiz :   ". $name . '</h4>';
     echo '<h4 class ="total_Questions">' ."Questions :". "05" . '</h4>';
     // Fetching questions from db
     $sql = "SELECT * FROM quiz_questions WHERE subject_id=?"; 
     $stmt = $conn->prepare($sql); 
     $stmt->bind_param("s", $id);
     $stmt->execute();
     $result = $stmt->get_result();
    $total=mysqli_num_rows($result);
     //var_dump($result);
     if($total==0)
     {
        echo "<script>alert('No question found')</script>";
     }
     else
     {
        echo "<script>alert('question found')</script>";
         
     }
 
     
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Take Quiz</title>
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
    <link href="../css/takeQuiz.css" rel="stylesheet">
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
                        <a class="nav-link" href="../index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Take Quiz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/makeQuiz.html">Make Quiz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <h1>Quiz</h1>
    <h4>Please Check the correct answer</h4>
    <h2>Q:1 Ram Stands for ?</h2>

    <div class="outer">
        <form action="#" method="post">
        <div class="inner">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">Random Access Memory</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">Ram Memory</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">Access Memory</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">Static Memory</label>
            </div>
        
                <button class="next"> Next </button>
        </div>
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