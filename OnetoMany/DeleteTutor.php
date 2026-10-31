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
	<title>Deletion of Tutor</title>
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
	<h1>Are you sure you want to delete this Tutor?</h1>
	<?php $getTutorById = getTutor($pdo, $_GET['tutor_id']); ?>
	<form action="core/handleForms.php?tutor_id=<?php echo $_GET['tutor_id']; ?>" method="POST">

		<div class="studentContainer" style="border-style: solid; 
		font-family: 'Arial';">
			<p>First Name: <?php echo $getTutorById['first_name']; ?></p>
			<p>Last Name: <?php echo $getTutorById['last_name']; ?></p>
			<p>Email: <?php echo $getTutorById['email']; ?></p>
			<p>Phone Number: <?php echo $getTutorById['phone_number']; ?></p>
			<p>Specialty: <?php echo $getTutorById['specialty']; ?></p>
			<br>
			<form action="core/handleForms.php?tutor_id=<?php echo $_GET['tutor_id']; ?>" method="POST">
			<input type="submit" name="deleteTutorBtn" value="Delete">
			</form>
		</div>
	</form>
</body>
</html>
