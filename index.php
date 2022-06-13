<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	<style>
		.bg {
			background-image : url(photo.jpg);
		}
	</style>

</head>

<body>
	<div class="container mt-3 bg">
		<a href="add_new.php" class="btn btn-success">Add New Data</a><br/><br/>

		<table class="table table-striped">

		<tr>
			<td>Name</td>
			<td>Age</td>
			<td>Grade</td>
			<td>Outstanding Sub</td>
			<td>Email</td>
			<td>Update</td>
		</tr>
		<?php 
		//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
		while($res = mysqli_fetch_array($result)) { 		
			echo "<tr>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['age']."</td>";
			echo "<td>".$res['grade']."</td>";
			echo "<td>".$res['out_sub']."</td>";
			echo "<td>".$res['email']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\" class=\"btn btn-primary mr-3\">Edit</a> <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class=\"btn btn-danger\">Delete</a></td>";		
		}
		?>
		</table>
	</div>
</body>
</html>
