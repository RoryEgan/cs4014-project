$(document).ready(function() {
  $("#dynamic-search").on("input", function(){
    var search = $("#dynamic-search").val();
    if(search.length > 0){
      $.post("includes/php/scripts/dynamic-search.php", {'dynamic-search': search}, function(data){
        $("#dynamic-results").html(data);
        $(".search-dropdown").css("display","block");
      });
    }
    else{
      $("#dynamic-results").empty();
      $(".search-dropdown").css("display","none");
    }
  });
});
