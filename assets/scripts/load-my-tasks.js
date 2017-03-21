$(document).ready(function() {
  var count = 1;
  if($("#stop-loading").length){
    $("#remove_row").remove();
  }

  $('.more-mine').on('click', function(){

    $.post('includes/php/scripts/display-my-tasks.php',{'count': count} ,function(data){
      $("#display-tasks").append(data);
      if($("#stop-loading").length){
        $("#remove_row").remove();
      }
      count++;
    });

  });

});
