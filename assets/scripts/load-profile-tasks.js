$(document).ready(function() {
  var countMy = 1;
  var countClaimed = 1;
  var claimed = false;


  if($("#claimed-tasks-flag").length){
    claimed = true;
  }

  $('#remove_row_profile').on('click', '#btn_more_profile', function(){
    $.post('includes/php/scripts/display-profile-tasks.php',{'count': countMy, 'claimed': claimed} ,function(data){
      $("#display-tasks").append(data);
      if($("#stop-loading").length){
        $("#remove_row_profile").remove();
      }
      countMy++;
    });

  });

});
