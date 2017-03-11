<?php


class Validator{

  function isValidSignUp($firstName, $lastName, $signUpEmail, $StudentID, $subject, $signUpPassword, $passwordConfirm){
    return ($this -> isValidName($firstName) && $this -> isValidName($lastName) && $this -> isValidEmail($signUpEmail) && $this -> isValidStudentID($StudentID)
          && $this -> isValidSubject($subject) && $this -> isValidPassword($signUpPassword) && ($signUpPassword == $passwordConfirm));
  }

  function isValidTask($taskTitle, $taskDescription, $numPages, $numWords, $docFormat, $docType, $claimDeadline, $completeDeadline){
    return true;
  }


  function isValidEmail($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false){
      return true;
    }
    else {
      return false;
    }
  }

  function isValidName($name){
    if (strlen($name) <= 35 && strlen($name) >= 1){
      return true;
    }
    else{
      return false;
    }
  }

  //Student IDs must be 8 characters in length and must be integers.
  function isValidStudentID($id){
    if(preg_match('/^\d+$/', $id) && strlen($id) == 8){
      return true;
    }
    else{
      return false;
    }
  }

  //passwords can be between 6 and 20 characters long and must have:
  //  -atleast one letter
  //  -atleast one number
  function isValidPassword($password){
    $hasLower = false;
    $hasDigit = false;
    $hasUpper = false;

    if(strlen($password) >= 8 && strlen($password) <= 20){
      $splitStringArray = str_split($password);

      for($i = 0; $i < count($splitStringArray); $i++){
        if(ctype_lower($splitStringArray[$i])){
          $hasLower = true;
        }
        else if(ctype_digit($splitStringArray[$i])){
          $hasDigit = true;
        }
        else if(ctype_upper($splitStringArray[$i])){
          $hasUpper = true;
        }
        if($hasLower && $hasDigit && $hasUpper){
          return true;
        }
      }
    }
    return false;
  }

  //functionality to be added
  function isValidSubject($subject){
    $qh = new QueryHelper();

    $columnName = "SubjectName";
    $selectSubject = "SELECT * FROM Subject;";
    if($qh -> verifryDropDownInput($subject, $selectSubject, $columnName)){
      return true;
    }
    else{
      return false;
    }
  }

  function isValidTaskTitle(){

  }
}


?>
