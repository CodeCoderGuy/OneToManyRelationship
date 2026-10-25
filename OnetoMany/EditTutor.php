<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
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
	<?php $getTutorById = getTutor($pdo, $_GET['tutor_id']); ?>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getTutorById['first_name']; ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getTutorById['last_name']; ?>">
		</p>
		<p>
			<label for="email">Email</label>
			<input type="text" name="email" value="<?php echo $getTutorById['email']; ?>">
		</p>
		<p>
			<label for="phone_number">Phone Number</label>
			<input type="text" name="phone_number" value="<?php echo $getTutorById['phone_number']; ?>">
		</p>
		<p>
			<label for="specialty">Specialty</label>
			<input type="text" name="specialty" value="<?php echo $getTutorById['specialty']; ?>">
			<input type="hidden" name="tutor_id" value="<?php echo $getTutorById['tutor_id']; ?>">
			<br>
			<input type="submit" name="editTutorBtn" value="Update Tutor">
		</p>
	</form>
</body>
</html>