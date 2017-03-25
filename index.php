<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<?php include_once('includes/php/scripts/new-task.php');?>
<div class="page-content my-5">
  <div class="container">
    <div class="offset-md-5">
      <h2>Browse Tasks</h2>
    </div>


    <div class="card task-card mb-3">
      <div class="card-block">
        <h2>Filter Content:</h2>
        <div class="card-text">
          <div class="row">
            <form class="form-inline form" method="post" action="index.php">
              <div class="form-group">
                  <select class="form-control my-2" name="signUpSubject">
                    <option selected hidden>Subject / Discipline</option>
                    <?php
                    include('includes/php/utils/DropdownOptionGenerator.class.php');
                    $gen = new DropdownOptionGenerator();
                    $query = "SELECT * FROM Subject;";
                    $gen -> generateOptions($query, 'SubjectName');
                    ?>
                  </select>

                  <select class="form-control my-2" name="signUpSubject">
                    <option selected hidden>Task Type</option>
                    <?php
                    $gen = new DropdownOptionGenerator();
                    $query = "SELECT * FROM TaskType;";
                    $gen -> generateOptions($query, 'TaskTypeVal');
                    ?>
                  </select>

                  <select class="form-control my-2" name="signUpSubject">
                    <option selected hidden>Document Type</option>
                    <?php
                    $gen = new DropdownOptionGenerator();
                    $query = "SELECT * FROM DocumentType;";
                    $gen -> generateOptions($query, 'DocumentTypeVal');
                    ?>
                  </select>

                  <select class="form-control my-2" name="signUpSubject">
                    <option selected hidden>Tag</option>
                    <?php
                    $gen = new DropdownOptionGenerator();
                    $query = "SELECT * FROM Tag;";
                    $gen -> generateOptions($query, 'Value');
                    ?>
                  </select>

                  <input type="submit" class="btn btn-default" value="Apply" name="signUpButton" role="button"/>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

    <section>
      <?php
        $target = "task-modal";
        $modalTitle = 'New Task';
        $includeURL = 'includes/partial/new-task-modal.php';
        include('includes/php/scripts/dynamic-modal.php');
      ?>
    </section>
    <div id="display-tasks">
    <?php include_once('includes/php/scripts/display-tasks-main.php'); ?>
  </div>
    <div id="remove_row">
        <td><button type="button" name="btn_more"  id="btn_more" class="btn-success btn form-control" role="button">more</button></td>
   </div>
  </div>
</div>

<?php include('includes/footer.php');?>
