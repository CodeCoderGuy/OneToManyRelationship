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
    $query = insertTutor($pdo, $firstName, $lastName, $email, $phone_number, $specialty);
    
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

		$query = updateTutor($pdo, $tutor_id, $firstName, $lastName, $email, $phone_number, $specialty);

		if ($query) {
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
    $query = insertStudent($pdo, $_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["phone_number"], $_GET["tutor_id"]);
    if ($query) {
        header("Location: ../viewStudents.php?tutor_id=" . $_GET['tutor_id']);
    } else {
        echo "Error inserting student.";
    }
}

if (isset($_POST["editStudentBtn"])) {
        $query = updateStudent($pdo, $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['phone_number'], $_POST['student_id']);

        if ($query) {
            $student = getStudent($pdo, $_POST['student_id']);
            header("Location: ../viewStudents.php?tutor_id=" . (int)$_POST['tutor_id']);
        } else {
            echo "Error updating student.";
        }
} 



if (isset($_POST["deleteStudentBtn"])) {
    $query = deleteStudent($pdo, $_GET["student_id"]);
    if ($query) {
        header("Location: ../viewStudents.php?tutor_id=" . $_POST['tutor_id']);
    }
    else {
        echo "Error deleting student.";
    }
}