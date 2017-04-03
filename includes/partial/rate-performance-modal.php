<div>
  <br>
  <p>Please rate your satisfaction with the claimant's performance: </p>
  <form action="profile.php?userID=<?php echo "$userID"?>" method="post">
    <div class="form-group">
      <input type="hidden" name="claimantID" value="<?php echo $claimantID?>">
      <input type="hidden" name="taskID" value="<?php echo $taskID?>">
      <input type="radio" name="performance" value="happy"> Happy<br>
      <input type="radio" name="performance" value="not happy"> Not Happy<br>
      <input name='rate-task' type="submit" class="btn-default btn" value="Confirm" role="button"></input>
    </div>
  </form>
</div>
