<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
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
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',grade='$grade',out_sub='$out_sub',email='$email' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$grade = $res['grade'];
	$out_sub = $res['out_sub'];
	$email = $res['email'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
	
	<div class="container mt-3">
		
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a href="index.php" class="nav-link active">Home</a>
			</li>
		</ul>

		<div class="mt-3 row">
			<div class="col-4">
				<form action="edit.php" method="post" name="form1">
					<div class="mb-3">
						<label for="name">Name</label>
						<input type="text" name="name" id="name" class="form-control" value="<?php echo $name;?>">
					</div>
					<div class="mb-3">
						<label for="age">Age</label>
						<input type="text" name="age" id="age" class="form-control" value="<?php echo $age;?>">
					</div>
					<div class="mb-3">
						<label for="grade">Grade</label>
						<select name="grade" id="grade" class="form-select">
						<?php 
								$array = ["KG", "G-1", "G-2", "G-3", "G-4"];

								foreach ($array as $arr) {
									if($arr == $grade) {
										echo "<option selected>";
										echo $grade;
										echo "</option>";
									} else {
										echo "<option>";
										echo $arr;
										echo "</option>";
									}
								}

							?>
						</select>
					</div>
					<div class="mb-3">
						<label for="outSub">Outstanding Subject</label>
						<input type="text" name="outSub" id="outSub" class="form-control" value="<?php echo $out_sub;?>">
					</div>
					<div class="mb-3">
						<label for="mail">Email</label>
						<input type="text" name="email" id="mail" class="form-control" value="<?php echo $email;?>">
					</div>
					<div>
						<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
						<input type="submit" name="update" value="Update" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>

	</div>

	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
