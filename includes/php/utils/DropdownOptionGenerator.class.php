<?php

class DropdownOptionGenerator{
    function generateOptions($query, $displayColumn){
      $db = new Database();

      $queryResult = $db -> select($query);

      for ($i=0; $i < sizeof($queryResult); $i++) {
         ?><option><?php echo $queryResult[$i][$displayColumn]; ?>
           <?php  }
    }
}

?>
