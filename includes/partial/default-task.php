<div class="card task-card mb-3">
  <div class="card-block">
    <h4 class="card-title">
      <?php echo "$title"; ?>
    </h4>
    <div class="card-text">
      <div class="row">
        <div class="col-md-6">
          <ul>
            <li>Paper Type: <?php echo "$docType"; ?></li>
            <li>Number of Pages: <?php echo "$numPages"; ?></li>
            <li>Number of words: <?php echo "$numWords"; ?></li>
          </ul>
        </div>
        <div class="col-md-2.7 offset-md-3">
          <?php echo "Claim Deadline: $claimDate"; ?>
          <br><br><?php echo "Completion Deadline: $completeDate"; ?>
        </div>
      </div>
      <p>Description: <?php echo "$description"; ?></p>
    </div>
  </div>
</div>
