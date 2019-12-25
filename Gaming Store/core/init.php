<?php
 
  ob_start();
  // Include configuration


  require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/config/config.php');
  require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/helpers/db_helper.php');
  require ($_SERVER['DOCUMENT_ROOT'].'/seproject'.'/helpers/validator.php');
