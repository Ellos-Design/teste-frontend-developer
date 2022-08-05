<?php
require_once('Crud.php');

class Formulario extends Crud
{

  protected string $tabela = 'contato';
  function __construct(
    public string $nome,
    public string $email,
    public string $telefone,
    public string $mensagem,
    public array $erro = []
  ) {
  }

  public function validar_formulario()
  {
    //Validacao de nome
    if (!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ'\s]+$/", $this->nome)) {
      $this->erro["erro_nome"] = "Somente permitido letras e espaços em branco!";
    }

    //Verificar se e-mail é valido
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      $this->erro["erro_email"] = "Formato de e-mail inválido!";
    }
    //Validando telefone
    $regex = '/^(?:(?:\+|00)?(55)\s?)?(?:\(?([1-9][0-9])\)?\s?)?(?:((?:9\d|[2-9])\d{3})\-?(\d{4}))$/';

    if (preg_match($regex, $this->telefone) == false) {
      $this->erro["erro_telefone"] = "O número de telefone está incorreto!";
    } 
    if(strlen($this->telefone) > 12 && strlen($this->telefone) < 12){
      $this->erro["erro_telefone"] = "Por favor, insira somente 11 digitos ";
    }
  }

  public function insert()
  {
    $sql = "INSERT INTO $this->tabela values (null,?,?,?,?)";
    $sql = DB::prepare($sql);
    return $sql->execute(array($this->nome, $this->email, $this->telefone, $this->mensagem));
  }
}