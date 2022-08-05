<?php 

    include("../conexao.php");
    include("model/orcamento.php");

    # Verifica a conexão com o Banco de Dados
    if($connPDO['status'] == 200) {
        $pdo = $connPDO['pdo'];
    } else {
        header("location: ../index.php?status=error");
    }

    # Definido uma constante com o nome da Tabela utilizada
    define('TABLE_ORCAMENTO', 'tb_orcamento');

    # Resgatando dados do fórmulario
    $nomeCliente = $_POST['txName'];
    $emailCliente = $_POST['txEmail'];
    $telefoneCliente = $_POST['txTel'];
    $descricaoOrcamento = $_POST['txDesc'];

    # Verificando se nenhum dado é nulo
    if(
        isset($nomeCliente) == false ||
        isset($emailCliente) == false ||
        isset($telefoneCliente) == false ||
        isset($descricaoOrcamento) == false
        ) {

        die(header("location: ../index.php"));
    } 

    # Criação do objeto Orçamento que será utilizado para Inserção no Banco de Dados
    $orcamento = new Orcamento(null, $nomeCliente, $emailCliente, $telefoneCliente, $descricaoOrcamento);

    insertOrcamento($orcamento, $pdo);

    # Função responsável por inserir dados no Banco de Dados
    function insertOrcamento($newOrcamento, $pdo) {
        $sql = "INSERT INTO ".TABLE_ORCAMENTO." VALUES(null, :nm, :em, :tl, :ds)";
        
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':nm', $newOrcamento->getNome());
            $stmt->bindValue(':em', $newOrcamento->getEmail());
            $stmt->bindValue(':tl', $newOrcamento->getTel());
            $stmt->bindValue(':ds', $newOrcamento->getDesc());
            $stmt->execute();

            header("location: ../index.php?status=sucess");
        } catch (PDOException $ex) {
            header("location: ../index.php?status=error");
        } 
    }
?>