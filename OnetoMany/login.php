<?php require_once 'core/dbConfig.php'; 
 require_once 'core/models.php'; 
 require_once 'core/handleForms.php'; 
?>
<!doctype HTML>
<html lang="en">
<head>
    <meta charset="UTF_8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging In</title> 
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
    <form action="core/handleForms.php" method="POST">
        <p><label for="username">Username: </label><input type="text" name="username"></p>
        <p><label for="pass_word">Password: </label><input type="text" name="pass_word"></p>
        <br>
        <input type="submit" value="Login" name="loginUser">
    </form>
    <br>
    <h3>Don't have an account? Register now <a href="register.php">'HERE'</a></h3>
</body>
</html>