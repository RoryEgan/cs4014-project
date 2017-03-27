
$(document).ready(function() {
  var count = 1;
  if($("#stop-loading-claimed").length){
    $("#remove_row").remove();
    count = 1;
    alert("removed form claimed");
  }

  $(document).on('click', '.more-claimed', function(){
    $.post('includes/php/scripts/display-claimed-tasks.php',{'count': count} ,function(data){
      $("#display-tasks").append(data);
      count++;
      if($("#stop-loading-claimed").length){
        $("#remove_row").remove();
        count = 1;
      }
    });

  });

});
