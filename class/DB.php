<?php
  require_once('config.php');
  
  class DB{
    private static $pdo;
    public static function instanciar(){
      if(!isset(self::$pdo)){
        try{
          self::$pdo = new PDO('mysql:host='.SERVIDOR.';dbname='.BANCO,USUARIO,SENHA);
          //Pegando qualquer erro do banco de dados
          self::$pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          
           //retorna um objeto anônimo com nomes de propriedade que correspondem aos nomes da coluna retornados no seu conjunto de resultados
           self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

        }catch(PDOException $erro){
          echo "Falha ao se conectar ao banco";
          $erro->getMessage();
        }
      }
      return self::$pdo;
    }

    public static function prepare($sql){
      return self::instanciar()->prepare($sql);
    }
  }

?>