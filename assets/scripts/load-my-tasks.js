$(document).ready(function() {
  var count = 1;
  if($("#stop-loading-my").length){
    $("#remove_row").remove();
    count = 1;
  }

  $(document).on("click", ".more-mine", function(){
    $.post('includes/php/scripts/display-my-tasks.php',{'count': count} ,function(data){
      $("#display-tasks").append(data);
      count++;
      if($("#stop-loading-my").length){
        $("#remove_row").remove();
        count = 1;
      }
    });

  });

});
