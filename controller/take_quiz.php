<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Take Quiz</title>
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
    <link href="../css/take_quiz.css" rel="stylesheet">
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
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    <li class="nav-item">
						<a class="nav-link" href="../views/login.html">Logout</a>
					</li>

                </ul>
            </div>
        </div>
    </nav>
   

   
</body>
</html>

<!-- Backend Code Here -->
<?php
session_start();
// error_reporting(0);
class take_quiz
{
    public function quiz()
    {
        if(isset($_POST['start']))
        {
            fetch_question();
        }

    }
    public function fetch_question()
    {
        $subject_name=$_SESSION['subject_name'];
    
        include './connection.php';
        
        echo '<h4 class ="user_Name">' ."Subject name :". $subject_name .'</h4>';
        echo '<h4 class ="total_Questions">' ."Questions :". "05" . '</h4>';
    
        echo '<h4 class ="heading_1">' ."Quiz" .'</h4>';
        echo '<h4 class ="heading_2">' ."Please check the correct answer". '</h4>';
        
        
    
        $query="SELECT * FROM quiz_questions  WHERE subject_name =? ORDER BY rand()"; 
        $stmt = $conn->prepare($query); 
        $stmt->bind_param("s", $subject_name);
        $stmt->execute();
        $result = $stmt->get_result();
       $total=mysqli_num_rows($result);
       
       
        if($total==0)
        {
           echo "<script>alert('No question found')</script>";
        }
        else
        {
                       $rows=$result->fetch_assoc();
                       echo '<form method="post">'; 
                   echo '<h4 class ="heading_3">' .$rows['question'] . '</h4>';
                   echo '<div class="outer">';  
                   
           echo '<div class="inner">';
           echo '<div class="form-check">';
           echo    '<input class="form-check-input"  type="radio" value='.$rows['option_a'].' name="flexRadioDefault" id="flexRadioDefault1" required>';
           echo    '<label class="form-check-label"   for="flexRadioDefault1">'.$rows['option_a'].'</label>';
           echo '</div>';
           echo '<div class="form-check">';
           echo    '<input class="form-check-input" type="radio" value='.$rows['option_b'].' name="flexRadioDefault" id="flexRadioDefault1" required>';
           echo    '<label class="form-check-label"   for="flexRadioDefault1">'.$rows['option_b'].'</label>';
           echo '</div>';
           echo '<div class="form-check">';
           echo    '<input class="form-check-input" type="radio" value='.$rows['option_c'].' name="flexRadioDefault" id="flexRadioDefault1" required>';
           echo    '<label class="form-check-label"  for="flexRadioDefault1">'.$rows['option_c'].'</label>';
           echo '</div>';
           echo '<div class="form-check">';
           echo    '<input class="form-check-input" type="radio" name="flexRadioDefault" value='.$rows['option_d'].' id="flexRadioDefault1" required>';
           echo    '<label class="form-check-label"  for="flexRadioDefault1">'.$rows['option_d'].'</label>';
           echo '</div>';
           
           echo    '<button class="next" name="next_question" type="submit"> Next </button>';
           echo '</div>';   
           echo '</div>';
           echo '</form>';
    
        }
    }

}
$obj=new take_quiz();
$obj->quiz();
?>