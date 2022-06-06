<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quiz Result</title>
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
    <link href="../css/quiz_result.css" rel="stylesheet">
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
                        <a class="nav-link" href="/views/searchQuiz.html">Take Quiz</a>
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
    <?php
            $score=$_SESSION['correct_answer'];
            echo $score;
            echo '<h1>'."Score".'</h1>';
            echo '<h4 class ="subject_Name">' ."Total Questions are 05".'</h4>';
            echo '<h4 class ="total_Questions">' ."Your $score questions are correct ".'</h4>';
            unset($_SESSION["correct_answer"]);
    ?>
    

        <div class="btn-description">
            <input type="submit" name= "submit" value="View Description">
        </div>
        <?php
        // Pending  
//         if(isset($_POST['submit']))
// {
// 	include './connection.php';
// 	$subject=$_POST['subject_name'];
// 	$sql = "SELECT * FROM quiz_questions WHERE subject_name=?"; 
//     $stmt = $conn->prepare($sql); 
//     $stmt->bind_param("s", $subject);
//     $stmt->execute();
//     $result = $stmt->get_result();
// 	$total=mysqli_num_rows($result);
// 	if($total==0)
//     {
//         echo "<script>alert('No quiz found according to your serach')</script>";
//     }
//     else
//     {
//         echo "<table>";
// 		echo  "<tr>";
// 		echo	"<th>subject Name</th>";
//         echo	"<th>Question</th>";
//         echo	"<th>Answer</th>";
//         echo	"<th>Description</th>";  
// 		echo "</tr>";
		 
// 				while($rows=$result->fetch_assoc())
// 				{
// 			?>
// 			<tr>
// 				<td><?php echo $rows['subject_id'];?></td>
// 				<td><?php echo $rows['subject_name'];?></td>

// 				<input type="hidden" name="sub_id"  value="<?php echo $rows ['subject_id']?>">
// 				<input type="hidden" name="sub_name"  value="<?php echo $rows ['question']?>">
//                 <input type="hidden" name="sub_id"  value="<?php echo $rows ['answer']?>">
// 				<input type="hidden" name="sub_name"  value="<?php echo $rows ['description']?>">
			
// 			</tr>
		
// 			<?php
// 				}
			
// 				echo "</table>";
//     }
	
// }     ?>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
        </script>
</body>

</html>