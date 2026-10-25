<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Deletion of Student</title>
	<style>
		body {
			font-family: "Arial";
		}
		input {
			font-size: 1.5em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
	<h1>Are you sure you want to delete this student?</h1>
	<?php $getStudentByID = getStudent($pdo, $_GET['student_id']); ?>
	<form action="core/handleForms.php?student_id=<?php echo $_GET['student_id']; ?>" method="POST">

		<div class="studentContainer" style="border-style: solid; 
		font-family: 'Arial';">
			<p>First Name: <?php echo $getStudentByID['first_name']; ?></p>
			<p>Last Name: <?php echo $getStudentByID['last_name']; ?></p>
			<p>Email: <?php echo $getStudentByID['email']; ?></p>
			<p>Phone Number: <?php echo $getStudentByID['phone_number']; ?></p>
			<br>
			<input type="submit" name="deleteStudentBtn" value="Delete">
		</div>
	</form>
</body>
</html>