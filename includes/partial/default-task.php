<div class="card task-card mb-3">
  <div class="card-block">
    <h4 class="card-title">
      <?php echo "$title"; ?>
    </h4>
    <div class="card-text">
      <div class="row">
        <div class="col-md-6">
          <ul>
            <li><?php echo "$docType"; ?></li>
            <li><?php echo "$numPages"; ?>/li>
            <li><?php echo "$numWords"; ?></li>
          </ul>
        </div>
        <div class="col-md-3 offset-md-3">
          <?php echo "$claimDate"; ?>
          <br><?php echo "$completeDate"; ?>
        </div>
      </div>
      <p><?php echo "$description"; ?></p>
    </div>
  </div>
</div>
