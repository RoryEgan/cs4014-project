<div>
  <br>
  <p>Do you wish to permanently ban this user? Click confirm to continue.</p>
  <form action="profile.php?userID=<?php echo $profileID;?>" method="post">
    <div>
      <label>Why are you banning this user?</label>
      <textarea name="reason" class="form-control my-2 input-large" maxlength="199" type="text" value="" placeholder="Reason"  required></textarea>
    </div>
    <div class="form-group">
      <input name='ban-user' type="submit" class="btn-default btn" value="Confirm" role="button"></input>
    </div>
  </form>
</div>
