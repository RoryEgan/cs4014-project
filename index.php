<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
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
    <?php include_once('includes/php/scripts/display-tasks-main.php') ?>
  </div>
</div>
<?php include('includes/footer.php');?>
