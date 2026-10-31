<?php
require_once 'dbConfig.php';
function insertTutor($pdo, $firstName, $lastName, $email, $phone_number, $specialty) {
    $sql = "INSERT INTO tutors (first_Name, last_Name, email, phone_number, specialty) 
    VALUES (?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    $executequery = $stmt->execute([$firstName, $lastName, $email, $phone_number, $specialty]);

    if($executequery) {
        return true;
    }
}

function seeTutorsbyID($pdo, $tutor_id) {
    $sql = "SELECT * FROM tutors WHERE tutor_id = ?";
    $stmt = $pdo->prepare($sql);
    $executequery = $stmt->execute([$tutor_id]);
    if($executequery) {
        return $stmt->fetch();
    }
}

function seeAllTutors($pdo) {
    $sql = "SELECT * FROM tutors";
    $stmt = $pdo->prepare($sql);
    $executequery = $stmt->execute();   
    if($executequery) {
        return $stmt->fetchAll();
    }
}

function getTutor($pdo, $tutor_id) {
    $sql = "SELECT * FROM tutors WHERE tutor_id = ?";
    $stmt = $pdo->prepare($sql);
    if($stmt->execute([$tutor_id])) {
        return $stmt->fetch();
    }
}
function getStudent($pdo, $student_id) {
    $sql = "SELECT * FROM students WHERE student_id = ?";
    $stmt = $pdo->prepare($sql);
    if($stmt->execute([$student_id])) {
        return $stmt->fetch();
    }
}
function updateTutor($pdo, $tutor_id, $firstName, $lastName, $email, $phone_number, $specialty) {
    $sql = "UPDATE tutors    
				SET first_name = ?, 
					last_name = ?, 
					email = ?, 
					phone_number = ?, 
                    specialty = ?
			WHERE tutor_id = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$firstName, $lastName, $email, $phone_number, $specialty, $tutor_id]);

	if ($executeQuery) {
		return true;
	}
	
}

function deleteTutor($pdo, $tutor_id) {
    $deleteTutorfromStud = "DELETE FROM students WHERE tutor_id = ?";
    $deletestmt = $pdo->prepare($deleteTutorfromStud);
    $executequery = $deletestmt->execute([$tutor_id]);

    if($executequery) {
        $deleteTutor = "DELETE FROM tutors WHERE tutor_id = ?";
        $stmt = $pdo->prepare($deleteTutor);
        $executequery = $stmt->execute([$tutor_id]);
        if($executequery) {
            return true;
        }
    }
}

function getStudentsbyTutor($pdo, $tutor_id) {
    $sql = "SELECT student_id, students.date_added, students.first_name, students.last_name, students.email, students.phone_number, CONCAT(tutors.first_name, ' ', tutors.last_name) AS tutor_name 
            FROM students JOIN tutors ON students.tutor_id = tutors.tutor_id WHERE students.tutor_id = ? GROUP BY students.last_name";
    $stmt = $pdo->prepare($sql);
    if($stmt->execute([$tutor_id])) {
        return $stmt->fetchAll();
    }
}

function insertStudent($pdo, $firstName, $lastName, $email, $phone_number, $tutor_id) {
    $sql = "INSERT INTO students (first_Name, last_Name, email, phone_number, tutor_id) 
    VALUES (?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    $executequery = $stmt->execute([$firstName, $lastName, $email, $phone_number, $tutor_id]);

    if($executequery) {
        return true;
    }
}

function updateStudent($pdo, $student_id, $firstName, $lastName, $email, $phone_number) {
    $sql = "UPDATE students    
                SET first_name = ?, 
                    last_name = ?, 
                    email = ?, 
                    phone_number = ? 
                WHERE student_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$student_id, $firstName, $lastName, $email, $phone_number]);  
    if($executeQuery) {
        return true;
    }
}

function deleteStudent($pdo, $student_id) {
    $deleteStudent = "DELETE FROM students WHERE student_id = ?";
    $stmt = $pdo->prepare($deleteStudent);
    $executequery = $stmt->execute([$student_id]);
    if($executequery) {
        return true;
    }
}

function insertNewUser($pdo, $username, $pass_word) {
    $checkUserSql = "SELECT * FROM passwords WHERE username = ?";
    $checkUserSql = $pdo->prepare($checkUserSql);
    $checkUserSql->execute([$username]);
    if ($checkUserSql->rowCount() == 0) {
        $sql = "INSERT INTO passwords (username, pass_word) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $executequery = $stmt->execute([$username, $pass_word]);
        if ($executequery) {
            $_SESSION['message'] = "User registered successfully!";
            return true;
        }
        else {
            $_SESSION["message"] = "Error registering user.";
        }

    } else {
        $_SESSION["message"] = "Username already exists.";
    }

}

function loginUser($pdo, $username, $pass_word) {
    $sql = "SELECT * FROM passwords WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && $pass_word == $user['pass_word']) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['message'] = "Login successful!";
        return true;
    }

    $_SESSION['message'] = "Invalid username or password.";
    return false;
}

function getAllUsers($pdo) {
    $sql = "SELECT * FROM passwords";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute()) {
        return $stmt->fetchAll();
    }
}

function getUserbyID($pdo, $user_id) {
    $sql = "SELECT * FROM passwords WHERE user_id = ?";
    $stmt = $pdo->prepare($sql);
    $executequery = $stmt->execute([$user_id]);
    if ($executequery) {
        return $stmt->fetch();
    }
}
?>
