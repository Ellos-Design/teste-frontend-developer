<?php 

    # Constantes de acesso ao Banco de Dados
    define('USER', 'root');
    define('PASSWORD', '');
    define('HOST','localhost');
    define('DB', 'bdEllosDesign');
        
    # Tenta se conectar com o Banco de Dados
    # Status 200 = Conexão bem sucedida
    # Status 404 = Erro na conexão
    try{
        $connPDO = array('status' => 200, 'pdo' => new PDO("mysql:host=".HOST.";dbname=".DB."; charset=UTF8", USER, PASSWORD));
    } catch(PDOException $ex){
        $connPDO = array('status' => 404, 'pdo' => 'Error');
    }
