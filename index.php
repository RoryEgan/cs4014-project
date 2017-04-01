<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<?php include_once('includes/php/scripts/new-task.php');

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
}


?>
<div class="page-content my-5">
  <div class="container">
    <div class="my-5">
      <p>Welcome to the peer review centre website, an interactive web
        platform to facilitate the proofreading of student theses,
        dissertations, assignments and research papers alike among students
        and staff. The main idea behind the website is to allow students
        to publish their academic documents and get them proofread/reviewed
        by peers. Members will create profiles and based on their actions
        will gain a reputation score.
      </p>
    </div>
    <div class="row">
      <div class="col-md-3">
        <h2>Current Tasks</h2>
      </div>
      <div class="col-md-3 offset-md-6">
        <?php
        $target = "filter-modal";
        $modalTitle = 'Filter Tasks';
        $includeURL = 'includes/partial/filter-modal.php';
        include('includes/php/scripts/dynamic-modal.php');
        ?>
        <?php
        $target = "task-modal";
        $modalTitle = 'New Task';
        $includeURL = 'includes/partial/new-task-modal.php';
        include('includes/php/scripts/dynamic-modal.php');
        ?>
      </div>
    </div>

    <div id="display-tasks" class="my-5">
      <?php include_once('includes/php/scripts/display-tasks-main.php'); ?>
    </div>
    <div id="remove_row">
      <td><button type="button" name="btn_more"  id="btn_more" class="btn-success btn form-control" role="button">more</button></td>
    </div>
  </div>
</div>

<?php include('includes/footer.php');?>
