<?php
  function timeFormat($date){
    return date('F j, g:i, A ',strtotime($date));
  }

  function shortenText($text, $chars = 305){
    $text = substr($text, 0, $chars);
    $text =$text."...";
    return $text;
  }

  /*function reset(){
    SET @autoid :=0;
    update posts set id = @autoid := (@autoid+1);
    alter table posts auto_increment = 1;
  }*/
 ?>
