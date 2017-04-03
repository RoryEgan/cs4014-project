<div>
  <p>Are you sure you would like to dismiss this flag? </p>
  <form action="flagged-tasks.php" method="post">
    <div class="form-group">
      <input type="hidden" name="taskID" value="<?php echo $taskID?>">
      <input name='dismiss-flag' type="submit" class="btn-default btn" value="Confirm" role="button"></input>
    </div>
  </form>
</div>
