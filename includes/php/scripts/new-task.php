
<?php
include('includes/php/utils/Validator.class.php');
include('includes/php/utils/QueryHelper.class.php');
include('includes/php/utils/Task.class.php');

$val = new Validator();
$qh = new QueryHelper();
$db = new Database();


if(isset($_POST['taskSubmitButton']) ){
  $taskTitle = $db->quote(trim($_POST['taskTitle']));
  $taskType = $db->quote($_POST['taskType']);
  $taskDescription = $db->quote(trim($_POST['taskDescription']));
  $numPages = $db->quote(trim($_POST['numPages']));
  $numWords = $db->quote($_POST['numWords']);
  $docFormat = $db->quote($_POST['documentFormat']);
  $docType = $db->quote($_POST['documentType']);
  $taskSubject = $db->quote($_POST['taskSubject']);
  $document = $_FILES['taskDocument'];
  $tag1 = $db->quote($_POST['tag1']);
  $tag2 = $db->quote($_POST['tag2']);
  $tag3 = $db->quote($_POST['tag3']);
  $tag4 = $db->quote($_POST['tag4']);
  $claimDeadline = $db->quote($_POST['claim-date']);
  $completeDeadline = $db->quote($_POST['completion-date']);
  $tags = array($tag1, $tag2, $tag3, $tag4);

  $connection = $db->connect();

  if($val->isValidTask($taskTitle, $taskDescription, $numPages, $numWords, $docFormat, $docType, $taskSubject, $tags,
                        $document, $claimDeadline, $completeDeadline)){
    if($connection){
      $currentTask = new Task($taskTitle, $taskType, $taskDescription, $numPages, $numWords, $docFormat, $docType, $taskSubject, $document,
                                  $tag1, $tag2, $tag3, $tag4, $claimDeadline, $completeDeadline);

      $result = $qh -> insertTask($currentTask);


      if($result){
        header("Location: index.php");
        echo "<script>alert('Task Created!');</script>";
      }
      else{
        echo "<script>alert('Failed to insert task');</script>";
      }
    }
  }
  else{
    echo "<script>alert('Error: atleast one entry was invalid');</script>";
  }
}

?>
