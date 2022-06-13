<!DOCTYPE html>
<html>
<head>
	<title>Add Data</title>
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
				<form action="add.php" method="post" name="form1">
					<div class="mb-3">
						<label for="name">Name</label>
						<input type="text" name="name" id="name" class="form-control">
					</div>
					<div class="mb-3">
						<label for="age">Age</label>
						<input type="text" name="age" id="age" class="form-control">
					</div>
					<div class="mb-3">
						<label for="grade">Grade</label>
						<select name="grade" id="grade" class="form-select">
							<?php 
								$array = ["KG", "G-1", "G-2", "G-3", "G-4"];

								foreach ($array as $arr) {
									if($arr == "KG")
										echo "<option selected>";
									else
										echo "<option>";
									echo $arr;
									echo "</option>";
								}

							?>
						</select>
					</div>
					<div class="mb-3">
						<label for="outSub">Outstanding Subject</label>
						<input type="text" name="outSub" id="outSub" class="form-control">
					</div>
					<div class="mb-3">
						<label for="mail">Email</label>
						<input type="text" name="email" id="mail" class="form-control">
					</div>
					<div>
						<input type="submit" name="Submit" value="Add" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>

	</div>

	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>