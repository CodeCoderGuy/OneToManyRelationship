<?php require_once 'core/dbConfig.php'; 
 require_once 'core/models.php'; 
 require_once 'core/handleForms.php'; 

?>
<!doctype HTML>
<html lang="en">
<head>
    <meta charset="UTF_8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title> 
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
    <?php if (isset($_SESSION['message'])){ ?>
    <h3 style="color:red;"><?php echo $_SESSION['message']; ?></h3>
    <?php } unset($_SESSION['message']);  ?>

    <?php if (isset($_SESSION['username'])) { ?>
        <h3>Welcome, <?php echo $_SESSION['username']; ?>!</h3>
        <a href="index.php">Add Tutor and Student</a><br>
        <a href="core/handleForms.php?logout=1">Logout</a>
    <?php } else { echo "No user logged in. Please <a href='login.php'>Login</a>"; }?>


    <h3>User List</h3>
    <ul>
        <?php $getAllUsers = getAllUsers($pdo); ?>
        <?php foreach($getAllUsers as $user) { ?>
            <li><a href="viewUsers.php?user_id=<?php echo $user['user_id']; ?>"><?php echo $user['username']; ?></a></li>
        <?php } ?>
</body>
</html>