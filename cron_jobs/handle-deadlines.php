<?php


//To set up a cronjon that will run this script do the following:
//
// -Go to the command line
// -enter crontab -e
// -choose an editor
// -the file will open to show 20 lines of comments.
// -Under the comments add: 0 0 * * * php /var/www/html/CS4014_project/cron_jobs/handle-deadlines.php
// -Save and close the editor, the script should now be executing every 24 hours at 00:00
//This script will be executed at 00:00 every day in order to and tasks that have passed their completion or claim deadlines.


include_once("/var/www/html/CS4014_project/includes/php/utils/QueryHelper.class.php");
include_once('/var/www/html/CS4014_project/includes/php/utils/TaskRetriever.class.php');
include_once('/var/www/html/CS4014_project/includes/php/utils/Validator.class.php');
$retriever = new TaskRetriever();
$qh = new QueryHelper();
$allTasks = $retriever -> getAllTasks();
handleClaimedTasks($allTasks);
handleUnclaimedTasks($allTasks);


function handleClaimedTasks($allTasks){
  global $qh;
  $val = new Validator();
  for($i = 0; $i < sizeof($allTasks); $i++){
    $status = $allTasks[$i] -> getStatus();
    if($status == 'Claimed'){
      $currentTime = date('Y-m-d');
      $output = $currentTime . "   " . $allTasks[$i] -> getCompleteDeadline();
      if($val -> dateGreaterThan($currentTime, $allTasks[$i] -> getCompleteDeadline())){
        $qh -> changeReputation($allTasks[$i]->getClaimantID(), -30);
        $qh -> setCancelled($allTasks[$i] -> getTaskID());
      }
    }
  }
}

function handleUnclaimedTasks($allTasks){
  global $qh;
  $val = new Validator();
  for($i = 0; $i < sizeof($allTasks); $i++){
    $status = $allTasks[$i] -> getStatus();
    if($status == 'Pending Claim'){
      $currentTime = date('Y-m-d');
      if($val -> dateGreaterThan($currentTime, $allTasks[$i] -> getClaimDeadline())){
        $qh -> setUnclaimed($allTasks[$i] -> getTaskID());
      }
    }
  }
} ?>
