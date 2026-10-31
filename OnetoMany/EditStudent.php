<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';
require_once 'core/handleForms.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editing Tutor</title>
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
	<?php $getStudentsByTutorID = getStudent($pdo, $_GET['student_id']); ?>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getStudentsByTutorID['first_name']; ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getStudentsByTutorID['last_name']; ?>">
		</p>
		<p>
			<label for="email">Email</label>
			<input type="text" name="email" value="<?php echo $getStudentsByTutorID['email']; ?>">
		</p>
		<p>
			<label for="phone_number">Phone Number</label>
			<input type="text" name="phone_number" value="<?php echo $getStudentsByTutorID['phone_number']; ?>">
		</p>
		<p>
			<input type="hidden" name="student_id" value="<?php echo $getStudentsByTutorID['student_id']; ?>">
			<input type="hidden" name="tutor_id" value="<?php echo $getStudentsByTutorID['tutor_id']; ?>">
			<br>
			<input type="submit" name="editStudentBtn" value="Update Student">
		</p>
	</form>
</body>
</html>
