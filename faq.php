<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<div class="page-content my-5">
  <div class="container">
    <h2>Faqs</h2>

    <div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">

      <div class="card">
        <div class="card-header" role="tab" id="heading">
          <h5 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="true" aria-controls="collapse">
              Question 1
              <i class="togglestate fa fa-chevron-down"></i>
            </a>
          </h5>
        </div>
        <div id="collapse" class="collapse" role="tabpanel" aria-labelledby="heading">
          <div class="card-block">
            Answer 1
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<?php include('includes/footer.php');?>
