$(document).ready(function() {
  var count = 1;
  if($("#stop-loading").length){
    $("#remove_row").remove();
  }

  $('.more-claimed').on('click', function(){

    $.post('includes/php/scripts/display-claimed-tasks.php',{'count': count} ,function(data){
      $("#display-tasks").append(data);
      if($("#stop-loading").length){
        $("#remove_row").remove();
      }
      count++;
    });

  });

});
