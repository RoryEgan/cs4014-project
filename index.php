<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<?php include_once('includes/php/scripts/new-task.php');?>
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
