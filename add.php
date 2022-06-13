<html>
<head>
	<title>Add Data</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$grade = mysqli_real_escape_string($mysqli, $_POST['grade']);
	$out_sub = mysqli_real_escape_string($mysqli, $_POST['outSub']);
		
	// checking empty fields
	if(empty($name) || empty($age) || empty($email) || empty($out_sub)) {
				
		if(empty($name)) {
			echo "<div class=\"container mt-3\"><div class=\"alert alert-warning mb-3\">Name can't be empty.</div>";
		}
		
		if(empty($age)) {
			echo "<div class=\"alert alert-warning mb-3\">Age can't be empty.</div>";
		}
		
		if(empty($email)) {
			echo "<div class=\"alert alert-warning mb-3\">Email can't be empty.</div>";
		}

		if(empty($out_sub)) {
			echo "<div class=\"alert alert-warning mb-3\">Outstanding Subject can't be empty.</div>";
		}
		
		//link to the previous page
		echo "<a href='javascript:self.history.back();' class=\"btn btn-primary\">Go Back</a> </div>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO users(name,age,grade,out_sub,email) VALUES('$name','$age','$grade','$out_sub','$email')");
		
		//display success message
		echo "<div class=\"container mt-3 mb-2\"> <div class=\"alert alert-success\">Data added successfully.<div>";
		echo "<a href='index.php' class=\"btn btn-info\">View Result</a> </div>";
	}
}
?>

<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
