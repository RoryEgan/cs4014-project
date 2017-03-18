<div>
  <br>
  <p>If you wish to contact the task owner you can contact them at: <?php echo $ownerEmail; ?></p>
  <br>
  <p>This task must be completed by <?php echo $completeDate;?> or you will be penalised 30 reputation points</p>
  <br>
  <p>As a result of claiming this task you will be awarded 10 reputation points.</p>
  <br>
  <p>You can cancel this task claim at any point before the deadline but you will be penalised 15 points for doing so.</p>
  <br>
  <form action="task-details.php?taskID=<?php echo "$taskID"?>" method="post">
    <div class="form-group">
      <input name='claim-task' type="submit" class="btn-default btn" value="Confirm" role="button"></input>
    </div>
  </form>
</div>
