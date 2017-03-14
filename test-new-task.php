<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<?php include('includes/php/utils/QueryHelper.class.php'); ?>
<?php include('includes/php/scripts/new-task.php');?>


<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 ">
        <div class="my-5">
          <h2 class="my-3">Add a Task!</h2>
          <form class="form" enctype="multipart/form-data" onsubmit="return checkHoneypot()" action="test-new-task.php" method="post">
            <div class="form-group">
              <div>
                <input  class="form-control my-2" maxlength="74" type="text" name="taskTitle" value="" placeholder="Task Title" required/>
              </div>
              <select class="form-control my-2" name="taskType">
                <option selected hidden>Task Type</option>
                <?php
                include('includes/php/utils/DropdownOptionGenerator.class.php');
                $gen = new DropdownOptionGenerator();
                $query = "SELECT * FROM TaskType;";
                $gen -> generateOptions($query, 'TaskTypeVal');
                ?>
              </select>
              <div>
                <textarea name="taskDescription" class="form-control my-2 input-large" maxlength="200" type="text" value="" placeholder="Description"  required></textarea>
              </div>
              <div class="form-inline">
                <input name="numPages" class="form-control my-2" type="number" placeholder="Number of pages" required/>
              </div>
              <div class="form-inline">
                <input name="numWords" type="number" class="form-control my-2" placeholder="Number of words" />
              </div>
              <select class="form-control my-2" name="documentFormat">
                <option selected hidden>File Format</option>
                <?php
                $query = "SELECT * FROM Format;";
                $gen -> generateOptions($query, 'FormatVal');
                ?>
              </select>
              <select class="form-control my-2" name="documentType">
                <option selected hidden>Document Type</option>
                <?php
                $query = "SELECT * FROM DocumentType;";
                $gen -> generateOptions($query, 'DocumentTypeVal');
                ?>
              </select>

              <select class="form-control my-2" name="taskSubject">
                <option selected hidden>Subject / Discipline</option>
                <?php
                $query = "SELECT * FROM Subject;";
                $gen -> generateOptions($query, 'SubjectName');
                ?>
              </select>

              <div class="form-inline">
                <select name="tag1" class="form-control my-2 form-inline">
                  <option selected hidden>Tag</option>
                  <?php
                  $query = "SELECT * FROM Tag;";
                  $gen -> generateOptions($query, 'Value');
                  ?>
                </select>

                <select name="tag2" class="form-control my-2 form-inline">
                  <option selected hidden>Tag</option>
                  <?php
                  $query = "SELECT * FROM Tag;";
                  $gen -> generateOptions($query, 'Value');
                  ?>
                </select>

                <select name="tag3" class="form-control my-2 form-inline">
                  <option selected hidden>Tag</option>
                  <?php
                  $query = "SELECT * FROM Tag;";
                  $gen -> generateOptions($query, 'Value');
                  ?>
                </select>

                <select name="tag4" class="form-control my-2 form-inline">
                  <option selected hidden>Tag</option>
                  <?php
                  $query = "SELECT * FROM Tag;";
                  $gen -> generateOptions($query, 'Value');
                  ?>
                </select>
              </div>



              <div class="my-2">
                <input name="taskDocument" type="file" class="my-2 btn-default btn-file" required/>
              </div>
              <div class=" my-2">
                <label for="claim-date">Claim deadline:</label>
                <input name="claim-date" id="claim-date" type="date" />
              </div>

              <div class=" my-2">
                <label for="completion-date">Completion deadline:</label>
                <input name="completion-date" id="completion-date" type="date" />
              </div>
              <div class="my-2 form-inline">
                <input type="submit" class="btn btn-default" value="Submit" name="taskSubmitButton" role="button"/>
              </div>
              <div class="input-field">
                <input id="gotcha" type="text" name="contact" value="" />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>



<?php include('includes/footer.php');?>
