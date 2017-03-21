<div>
  <br>
  <p>When you click confirm the task owner will be notified and your performance will be rated.</p>
  <form action="task-details.php?taskID=<?php echo "$taskID"?>" method="post">
    <div class="form-group">
      <input name='complete-task' type="submit" class="btn-default btn" value="Confirm" role="button"></input>
    </div>
  </form>
</div>
