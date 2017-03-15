<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<?php include('includes/php/utils/User.class.php');
      include('includes/php/utils/TaskRetriever.class.php');
      include('includes/php/utils/TaskPrinter.class.php');
       ?>
<div class="page-content my-5">
  <div class="container">

    <section>
      <button type="button" class="btn btn-outline-primary">
        <a href="#" data-toggle="modal" data-target="#task-modal" class="modal-trigger">
          New Task
        </a>
      </button>
      <div class="modal" id="task-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Create a new Task</h4>
            </div>
            <div class="modal-body">
              <?php include('includes/partial/new-task.php');?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
      $retriever = new TaskRetriever();
      $taskPrinter = new TaskPrinter();
      $allTasks = $retriever -> getAllTasks();

      for($i = 0; $i < sizeof($allTasks) && $i < 6; $i++){
        $taskPrinter -> printDefaultTask($allTasks[$i]);
      }
    ?>
  </div>
</div>
<?php include('includes/footer.php');?>
