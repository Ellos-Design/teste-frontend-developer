<?php
  function autoload($nomeClass){
    $arquivo =__DIR__.'/class/'.$nomeClass.'.php.';
    if(is_file($arquivo)){
      require_once($arquivo);
    }
  }
spl_autoload_register('autoload');

?>