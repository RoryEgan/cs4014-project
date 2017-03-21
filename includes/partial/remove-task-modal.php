<div>
  <br>
  <p>By clicking confirm you will be deleting the task from our records.</p>
  <form action="task-details.php?taskID=<?php echo "$taskID"?>" method="post">
    <div class="form-group">
      <input name='remove-task' type="submit" class="btn-default btn" value="Confirm" role="button"></input>
    </div>
  </form>
</div>
