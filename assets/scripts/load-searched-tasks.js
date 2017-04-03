$(document).ready(function() {



  $.urlParam = function(name){
	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
	return results[1] || 0;
}


  var count = 1;
  if($("#stop-loading-search").length){
    $("#remove_row_search").remove();
  }


  $('#btn_more_search').on('click', function(){
    var searchQuery = decodeURIComponent($.urlParam('search-query'));
    $.get('includes/php/scripts/display-search-tasks.php',{'count': count, 'search-query': searchQuery} ,function(data){
      $("#display-tasks-search").append(data);
      if($("#stop-loading-search").length){
        $("#remove_row_search").remove();
      }
      count++;
    });

  });

});
