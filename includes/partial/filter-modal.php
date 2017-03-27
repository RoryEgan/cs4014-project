

<form class="form" method="post" action="index.php">
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
