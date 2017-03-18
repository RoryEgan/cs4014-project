<?php
include_once('/var/www/html/CS4014_project/config.php');
include_once(SITE_PATH . '/includes/php/utils/QueryHelper.class.php');

class DropdownOptionGenerator{
    function generateOptions($query, $displayColumn){
      $qh = new QueryHelper();

      $queryResult = $qh -> select($query);

      for ($i=0; $i < sizeof($queryResult); $i++) {
         ?><option><?php echo $queryResult[$i][$displayColumn]; ?>
           <?php  }
    }
}

?>
