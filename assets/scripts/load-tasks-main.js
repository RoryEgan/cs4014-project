$(document).ready(function() {
  var count = 1;
  if($("#stop-loading").length){
    $("#remove_row").remove();
  }

  $('#btn_more').on('click', function(){

    $.post('includes/php/scripts/display-tasks-main.php',{'count': count} ,function(data){
      alert('post sent from main');
      $("#display-tasks").append(data);
      if($("#stop-loading-main").length){
        $("#remove_row").remove();
      }
      count++;
    });

  });

});
