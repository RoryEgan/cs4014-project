$(document).ready(function() {
  var count = 1;
  if($("#stop-loading").length){
    $("#remove_row").remove();
  }

  $('#btn_more_profile').on('click', function(){

    $.post('includes/php/scripts/display-claimed-tasks.php',{'count': count} ,function(data){
      $("#display-tasks").append(data);
      if($("#stop-loading-claimed").length){
        $("#remove_row").remove();
      }
      count++;
    });

  });

});
