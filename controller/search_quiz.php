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
    <h1>Quiz</h1>
    <h4>Search Quiz according to your interest</h4>
    <form method="post" action="../controller/search_quiz.php">
        <div class="search-box" style="border: 1px solid black;">
           
                <input type="search" class="focus-visible-only" name="subject_name" placeholder="Search" required>
                <span class="fa fa-search form-control-feedback"></span>
        </div>
            <div class="btn-login">
                <input type="submit" name="submit"  value="Search">
    </div>
</form>
<?php
 		
?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
</script>
</body>
</html>
