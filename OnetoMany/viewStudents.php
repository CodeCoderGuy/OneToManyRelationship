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
	<title>Viewing Students</title>
    <style>
        th {
            border: 1px solid black;
            padding: auto;
        }
    </style>
</head>
<body>
	<a href="index.php">Return to home</a>
    <?php $getStudentsByTutorID = getTutor($pdo, $_GET['tutor_id']); ?>
	<h1>Tutor Name: <?php echo $getStudentsByTutorID['first_name']; ?> <?php echo $getStudentsByTutorID['last_name']; ?></h1>
	<h1>Add New Student</h1>
	<form action="core/handleForms.php?tutor_id=<?php echo $_GET['tutor_id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName">
		</p>
		<p>
			<label for="email">Email</label> 
			<input type="email" name="email">
		</p>
		<p>
			<label for="phone_number">Phone Number</label> 
			<input type="text" name="phone_number">
		</p>
		<p>
			<input type="submit" name="insertStudentBtn" value="Add Student">
		</p>
	</form>
    <h3>List of Students</h3>
	<table style="width 50%; margin-top 50px; border: 3px black solid;">
	  <tr>
	    <th>Student ID</th>
	    <th>First Name</th>
	    <th>Last Name</th>
	    <th>Email</th>
	    <th>Phone Number</th>
	    <th>Date Added</th>
		<th>Last Updated by</th>
		<th>Added by</th>
		<th>Updated by</th>
	  </tr>
	  <?php $getStudentsByTutor = getStudentsByTutor($pdo, $_GET['tutor_id']); ?>
	  <?php foreach ($getStudentsByTutor as $row) { ?>
	  <tr>
	  	<td><?php echo $row['student_id']; ?></td>	  	
	  	<td><?php echo $row['first_name']; ?></td>	  	
	  	<td><?php echo $row['last_name']; ?></td>	  	
	  	<td><?php echo $row['email']; ?></td>	  	
	  	<td><?php echo $row['phone_number']; ?></td>	  	 	 	
	  	<td><?php echo $row['date_added']; ?></td>
		<td><?php echo $row['last_updated']; ?></td>
		<td><?php echo $row['added_by']; ?></td>
		<td><?php echo $row['updated_by']; ?></td>
	  	<td>
	  		<a href="editStudent.php?student_id=<?php echo $row['student_id']; ?>&tutor_id=<?php echo $_GET['tutor_id']; ?>">Edit</a>
	  		<a href="deleteStudent.php?student_id=<?php echo $row['student_id']; ?>&tutor_id=<?php echo $_GET['tutor_id']; ?>">Delete</a>
	  	</td>	  	
		<?php if (isset($_SESSION['message'])) { ?>
    		<h3 style="color: green;"><?php echo $_SESSION['message']; ?></h3>
    	<?php unset($_SESSION['message']); ?>
			<?php } ?>
	  </tr>
      <?php } ?>
	</table>

	
</body>
</html>
