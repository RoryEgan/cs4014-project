<?php include('includes/php/utils/Database.class.php'); ?>
<form class="form" onsubmit="return checkHoneypot()" action="login.php" method="post">
  <div class="form-group">
    <div>
      <input  class="form-control my-2" type="text" name="signUpFirstName" value="" placeholder="Task Title" required/>
    </div>
    <select class="form-control my-2" name="signUpSubject">
      <option selected hidden>Task Type</option>
      <?php
      include('includes/php/utils/DropdownOptionGenerator.class.php');
      $gen = new DropdownOptionGenerator();
      $query = "SELECT * FROM TaskType;";
      $gen -> generateOptions($query, 'TaskTypeVal');
      ?>
    </select>
    <div>
      <textarea name="signUpLastName" class="form-control my-2 input-large" type="text" value="" placeholder="Description"  required></textarea>
    </div>
    <div class="form-inline">
      <input name="signUpEmail" class="form-control my-2" type="text" placeholder="Number of pages" required/>
    </div>
    <div class="form-inline">
      <input name="signUpPassword" type="password" class="form-control my-2" placeholder="Number of words" />
    </div>
    <select class="form-control my-2" name="signUpSubject">
      <option selected hidden>File Format</option>
      <?php
      $query = "SELECT * FROM Format;";
      $gen -> generateOptions($query, 'FormatVal');
      ?>
    </select>
    <div class="my-2">
      <input type="file" class="my-2 btn-default btn-file" required/>
    </div>
    <label for="claim-date">Claim deadline:</label>
    <div class=" my-2">
      <input id="claim-date" type="date" />
    </div>
    <label for="completion-date">Completion deadline:</label>
    <div class=" my-2">
      <input id="completion-date" type="date" />
    </div>
    <input type="submit" class="btn btn-default" value="Submit" name="signUpButton" role="button"/>
    <div class="input-field">
      <input id="gotcha" type="text" name="contact" value="" />
    </div>
  </div>
</form>
