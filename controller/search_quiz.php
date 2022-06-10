<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/search_quiz.css">
    <title>Search Quiz</title>
	        
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
						<a class="nav-link" href="../views/student_dashboard.html">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Take Quiz</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="#">Contact Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../views/user_login.html">Logout</a>
					</li>

				</ul>
			</div>
		</div>
	</nav>
    <h1>Quiz</h1>
    <h4>Search Quiz according to your interest</h4>
    <form method="post" >
        <div class="search-box" style="border: 1px solid black;">
           
                <input type="search" class="focus-visible-only" name="subject_name" placeholder="Search" required>
                <span class="fa fa-search form-control-feedback"></span>
        </div>
            <div class="btn-login">
                <input type="submit" name="submit"  value="Search">
    </div>
</form>
<?php
 	if(isset($_POST['submit']))
	 {
	 	include './connection.php';
	 	$subject=$_POST['subject_name'];
		 if(!preg_match("/^[a-zA-Z-'\s]*$/",$subject))
		 {
		//    echo "Your Name must be contains only characters";
		echo "<script>alert('Search keyword must be contains only characters')</script>";
		 }
		 else
		 {
			$sql = "SELECT * FROM quiz_subjects WHERE subject_name=?"; 
			$stmt = $conn->prepare($sql); 
			$stmt->bind_param("s", $subject);
			$stmt->execute();
			$result = $stmt->get_result();
			$total=mysqli_num_rows($result);
			if($total==0)
			{
				echo "<script>alert('No quiz found according to your serach')</script>";
			}
			else
			{
			   
					   echo '<table>';
					   echo '<tr>';
					   echo  '<th>Subject ID</th>';
					   echo  '<th>Subject Name</th>';
					   echo  '<th>Operation</th>';
					   echo  '<tr>';
					   while($rows=$result->fetch_assoc())
						{
					?>
					<tr>
						<td><?php echo $rows['subject_id'];?></td>
						<td><?php echo $rows['subject_name'];?></td>
						<?php
						$sub_id=$rows['subject_id'];
						$sub_nam=$rows['subject_name'];
						$_SESSION['subject_Id']=$sub_id;
						$_SESSION['subject_name']=$sub_nam;
						?>
						<form method="post" action="./take_quiz.php">
						<td><?php echo '<button type="submit" name="start">Start Quiz</button>'?></td>
						</form>
					</tr>
				
					<?php
						}
					   echo  '<table>';
			   }		 
			}
	   
		 }
				 
	 	
			
 ?>	


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
</script>
</body>
</html>
