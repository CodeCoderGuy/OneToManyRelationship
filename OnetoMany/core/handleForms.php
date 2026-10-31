<?php
require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertNewTutor'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $phone_number = trim($_POST['phone_number']);
    $specialty = trim($_POST['specialty']);

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($phone_number) && !empty($specialty)) {
    $query = insertTutor($pdo, $firstName, $lastName, $email, $phone_number, $specialty, $_SESSION['username']);
    
        if ($query) {
            header("Location: ../index.php");
        } else {
            echo "Error inserting tutor.";
        }
    } else {
        echo "Please fill in all required fields.";
    }    

}
if (isset($_POST['deleteTutorBtn'])) {
    $query = deleteTutor($pdo, $_GET['tutor_id']);
    
    if ($query) {
        $_SESSION['message'] = "Student deleted successfully by " . $_SESSION['username'] . ".";
        header("Location: ../index.php");
    } else {
        echo "Error deleting tutor.";
    }
}

if (isset($_POST['editTutorBtn'])) {
    $tutor_id = $_POST['tutor_id'];
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$email = trim($_POST['email']);
	$phone_number = trim($_POST['phone_number']);
	$specialty = trim($_POST['specialty']);


	if (!empty($tutor_id) && !empty($firstName) && !empty($lastName) && !empty($email) && !empty($phone_number) && !empty($specialty)) {

		$query = updateTutor($pdo, $tutor_id, $firstName, $lastName, $email, $phone_number, $specialty, $_SESSION['username']);

		if ($query) {
            $_SESSION['message'] = "Tutor updated successfully by " . $_SESSION['username'] . ".";
			header("Location: ../index.php");
            
		}
		else {
			echo "Update failed";
		}

	}
	else {
		echo "Make sure that no fields are empty";
	}

}

if (isset($_POST["insertStudentBtn"])) {
   $query = insertStudent($pdo, $_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["phone_number"], $_GET["tutor_id"], $_SESSION['username']);
    if ($query) {
        header("Location: ../viewStudents.php?tutor_id=" . $_GET['tutor_id']);
    } else {
        echo "Error inserting student.";
    }
}

if (isset($_POST["editStudentBtn"])) {
        $query = updateStudent($pdo, $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['phone_number'], $_SESSION['username'], $_POST['student_id']);
        if ($query) {
            $student = getStudent($pdo, $_POST['student_id']);
            $_SESSION['message'] = "Student updated successfully by " . $_SESSION['username'] . ".";
            header("Location: ../viewStudents.php?tutor_id=" . (int)$_POST['tutor_id']);
        } else {
            echo "Error updating student.";
        }
} 



if (isset($_POST["deleteStudentBtn"])) {
    $student = getStudent($pdo, $_GET["student_id"]);
    $query = deleteStudent($pdo, $_GET["student_id"]);
    if ($query) {
        $_SESSION['message'] = "Student deleted successfully by " . $_SESSION['username'] . ".";
         header("Location: ../viewStudents.php?tutor_id=" . (int)$student['tutor_id']);
    }
    else {
        echo "Error deleting student.";
    }
}

if (isset($_POST["insertNewUser"])) {
    $username = trim($_POST["username"]);
    $pass_word = trim(sha1($_POST["pass_word"]));

    if (!empty($username) && !empty($pass_word)) {
        $query = insertNewUser($pdo, $username, $pass_word);

        if ($query) {
            header("Location: ../index.php");
        } else {
            $_SESSION['message'] = "Error inserting user.";
            header("Location: ../register.php");
        }
    } else {
        $_SESSION['message'] = "Please fill in all required fields.";
        header("Location: ../register.php");
    }
}

if (isset($_POST["loginUser"])) {
    $username = trim($_POST["username"]);
    $pass_word = trim(sha1($_POST["pass_word"]));

    if (!empty($username) && !empty($pass_word)) {
        $query = loginUser($pdo, $username, $pass_word);

        if ($query) {
            header("Location: ../homepage.php");
        } else {
            $_SESSION['message'] = "Invalid username or password.";
            header("Location: ../login.php");
        }
    } else {
        $_SESSION['message'] = "Please fill in all required fields.";
        header("Location: ../login.php");
    }
}

if (isset($_GET["logout"])) {
    unset($_SESSION["username"]);
    header("Location: ../homepage.php");
}

if (isset($_GET["deleteUser"])) {
    $sql = "DELETE FROM passwords WHERE user_id = ?";
    $stmt = $pdo->prepare($sql);
    $query = $stmt->execute([$_GET["deleteUser"]]);
    if ($query) {
        header("Location: ../homepage.php");
        exit;
    } else {

}
}
