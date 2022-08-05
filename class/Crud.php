<?php
  require_once('DB.php');
  
  abstract class Crud extends DB{
    abstract public function insert();
    
  }


?>