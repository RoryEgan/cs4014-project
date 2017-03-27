<?php
//This is a script that can be included anywhere and it will add a modal to the page.
//All that needs to be done is define a modalTitle and the URL of the modal we are going to include in order for this to work.
?>
<button type="button" class="btn btn-outline" role="button">
  <a href="#" data-toggle="modal" data-target="<?php echo '#' . $target; ?>" class="modal-trigger">
    <?php echo $modalTitle; ?>
  </a>
</button>
<div class="modal" id="<?php echo $target; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $modalTitle; ?> </h4>
      </div>
      <div class="modal-body">
        <?php include($includeURL);?>
      </div>
    </div>
  </div>
</div>
<?php


?>
