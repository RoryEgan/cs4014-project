<div>
  <div class="card-block">
    <h2>Task Details:</h2>
    <p>This task must be completed by <?php echo $completeDate;?> or you will be penalised 30 reputation points.</p>
    <p>As a result of claiming this task you will be awarded 10 reputation points.</p>
    <p>You can cancel this task claim at any point before the deadline but you will be penalised 15 points for doing so.</p>
  </div>
  <div class="card-block">
    <h2>Send Email:</h2>
    <p>If you click send we will send an email to the owner of the task notifying them that you have claimed the task.<p>
    <form action="task-details.php?taskID=<?php echo "$taskID"?>" method="post">
      <div>
        <label>
          Add a message to the email:
        </label>
        <textarea name="email-text" class="form-control my-2 input-large" maxlength="300" type="text" value="" placeholder="email"></textarea>
      </div>
      <div class="form-group">
        <input name='claim-task' type="submit" class="btn-outline btn" value="Send" role="button"></input>
      </div>
    </form>
  </div>
</div>
