<?php  
function validatePassword($pass_word) {
	if (strlen($pass_word) > 8) {
		$hasLower = false;
		$hasUpper = false;
		$hasNumber = false;

	    for ($i = 0; $i < strlen($pass_word); $i++) {
	    	if (ctype_lower($pass_word[$i])) {
	    		$hasLower = true; 
	        } 
	        elseif (ctype_upper($pass_word[$i])) {
	            $hasUpper = true; 
	        } 
	        elseif (ctype_digit($pass_word[$i])) {
	            $hasNumber = true;
	        }
	        if ($hasLower && $hasUpper && $hasNumber) {
	            return true; 
	        }
	    }
	}

	else {
		return false; 
	}
}

function sanitizeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;

}

?>