<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/handleForms.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Viewing User</title>
</head>
<body>
	<a href="index.php"><h1>Return</h1></a>
    <?php $getUserbyID = getUserbyID($pdo, $_GET['user_id']); ?>
	<h1>Username: <?php echo $getUserbyID['username']; ?></h1>
	<h1>Date Joined: <?php echo $getUserbyID['date_added']; ?> </h1>
	<h1> <a href="core/handleForms.php?deleteUser=1&user_id=<?php echo $getUserbyID['user_id']; ?>">Delete User</a> </h1>
</body>
</html>