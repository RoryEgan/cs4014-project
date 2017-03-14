<?php

  class TaskRetriever{
    function getAllTasks(){
      $qh = new queryHelper();
      $allTasks = $qh -> getJoinedTaskView();


    }


  }

 ?>
