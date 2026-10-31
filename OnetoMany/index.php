<?php require_once 'core/dbConfig.php'; ?> 
<?php require_once 'core/models.php'; ?>
<?php require_once 'core/handleForms.php'; ?>
<?php 
if (!isset($_SESSION['username'])) {
    header("Location: homepage.php");
    exit;
}
?>
<!doctype HTML>
<html lang="en">
<head>
    <meta charset="UTF_8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Tutor</title> <!--title of the tab -->
    <style>
        body {
            font-family: "Arial";
        }
        input {
            font-size: 1.5em;
            height: auto;
            width: 250px;
        }
        th {
            border: 1px solid black;
            padding: auto;
        }
    </style>
</head>
<body>
    <h3>
        Tutor Application Form <br>
        <a href="homepage.php">Back to Homepage</a>
    </h3>
    <form action="core/handleForms.php" method="POST">
        <p><label for="firstName">First Name: </label><input type="text" name="firstName"></p>
        <p><label for="lastName">Last Name: </label><input type="text" name="lastName"></p>
        <p><label for="email">Email: </label><input type="email" name="email"></p>
        <p><label for="phone_number">Phone Number: </label><input type="text" name="phone_number"></p>
        <p><label for="specialty">Specialty: </label><input type="text" name="specialty"></p>
        <br>
        <input type="submit" value="Submit Application" name="insertNewTutor">
    </form>
    <br>
    <h3>List of Tutors</h3>
    <table style="width 50%; margin-top 50px; border: 3px black solid;">
        <tr>
            <th>Tutor ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Specialty</th>
            <th>Date Added</th>
		    <th>Last Updated by</th>
		    <th>Added by</th>
		    <th>Updated by</th>
        </tr>
        <?php $seeAllTutors = seeAllTutors($pdo); ?>
        <?php foreach($seeAllTutors as $tutor) { ?>
            <tr>
                <td><?php echo $tutor['tutor_id']; ?></td>
                <td><?php echo $tutor['first_name']; ?></td>
                <td><?php echo $tutor['last_name']; ?></td>
                <td><?php echo $tutor['email']; ?></td>
                <td><?php echo $tutor['phone_number']; ?></td>
                <td><?php echo $tutor['specialty']; ?></td>
                <td><?php echo $tutor['date_added']; ?></td>
                <td><?php echo $tutor['last_updated']; ?></td>
                <td><?php echo $tutor['added_by']; ?></td>
                <td><?php echo $tutor['updated_by']; ?></td>
                <td>
                    <a href="viewStudents.php?tutor_id=<?php echo $tutor['tutor_id']; ?>">View Students</a>
                    <a href="EditTutor.php?tutor_id=<?php echo $tutor['tutor_id']; ?>">Edit</a>
                    <a href="DeleteTutor.php?tutor_id=<?php echo $tutor['tutor_id']; ?>">Delete</a>
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
