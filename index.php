<?php include('includes/head.php');?>
<?php include('includes/header.php');?>
<div class="page-content my-5">
  <div class="container">

    <section>
      <button type="button" class="btn btn-outline-primary">
        <a href="#" data-toggle="modal" data-target="#task-modal" class="modal-trigger">
          New Task
        </a>
      </button>
      <div class="modal" id="task-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Create a new Task</h4>
            </div>
            <div class="modal-body">
              <?php include('includes/partial/new-task.php');?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div id="display-tasks">
    <?php include_once('includes/php/scripts/display-tasks-main.php') ?>
  </div>
    <div id="remove_row">
        <td><button type="button" name="btn_more"  id="btn_more" class="btn btn-success form-control">more</button></td>
   </div>
  </div>
</div>
<script src="bower_components/jquery/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
  var count = 1;

  $('#btn_more').on('click', function(){

    $.post('includes/php/scripts/display-tasks-main.php',{'count': count} ,function(data){
      $("#display-tasks").append(data);
      if($("#stop-loading").length){
        $("#remove_row").remove();
      }
      count++;
    });

  });

});


/* $(document).ready(function(){
      var click_count = "hello";
      $(document).on('click', '#btn_more', function(){
           $('#btn_more').html("Loading...");
           $.ajax({
                url:SITE_PATH . "/includes/php/scripts/display-tasks-main.php",
                method:"POST",
                data:{click_count:click_count},
                dataType:"text",
                success:function()
                {
                    console.log('in success function');
                     if(data != '')
                     {
                          $('#remove_row').remove();
                        //  $('#load_data_table').append(data);
                          //click_count++;
                     }
                     else
                     {
                          $('#btn_more').html("No Data");
                     }
                }
           });
      });
 });*/
 </script>

 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <div id="content">
 </div>

<?php include('includes/footer.php');?>
