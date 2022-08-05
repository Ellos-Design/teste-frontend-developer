<?php
require_once('class/config.php');
require_once('class/Formulario.php');
require_once('autoload.php');

// REQUERIMENTO DO PHPMAILER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'class/PHPMailer/src/Exception.php';
require 'class/PHPMailer/src/PHPMailer.php';
require 'class/PHPMailer/src/SMTP.php';

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['mensagem'])) {

  //RECEBER VALORES VINDO DO POST E LIMPAR
  $nome = limpaPost($_POST['nome']);
  $email = limpaPost($_POST['email']);
  $telefone = limpaPost($_POST['telefone']);
  $telefone = str_replace('(','',$telefone);
  $telefone = str_replace(')','',$telefone);
  $telefone = str_replace('-','',$telefone);
  $mensagem = limpaPost($_POST['mensagem']);


  //Verificar se os valores do post estão vazios
  if (empty($nome) || empty($email) || empty($telefone) || empty($mensagem)) {
    $erro_geral = "Todos os campos são obrigatórios";
  } else {
    //Instanciar a classe Formulario
    $cliente = new Formulario($nome, $email, $telefone, $mensagem);

    //Validar formulario
    $cliente->validar_formulario();

    //se não houver erros:
    if (empty($cliente->erro)) {
      //inserir
      $cliente->insert();
      $mail = new PHPMailer(true);
      
      //Tentar enviar email
      try {
        $mail->isSMTP();   //Send using SMTP        
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';                                 
        $mail->Host       = 'smtp.gmail.com';                     //definindo SMTP server de envio
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'nathan.maia99@gmail.com';                     //login do email 
        $mail->Password   = 'fnxbogfwrjvjdkid';                               //senha de app
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;
        //Recipients
        $mail->setFrom('nathan.maia99@gmail.com', 'Mensagem do Cliente'); //qm esta mandando email
        $mail->addAddress($email, $nome, 0);     //Enviando para o cliente
        //Content
        $mail->isHTML(true); //CORPO do email com HTML
        $mail->Subject = 'Atendimento ao cliente!'; //titulo do email
        $mail->Body    = 'Olá ' . $nome . '! <br><br>
        Obrigado por entrar em contato conosco!<br><br>
        Logo, um de nossos atendentes irá responder sua mensagem.<br><br>
        
        Atenciosamente,<br><br>
        
        Equipe Design.';

        $mail->send();
        $_POST['nome'] = '';
        $_POST['email'] = '';
        $_POST['telefone'] = '';

      } catch (Exception $e) {
        echo "Houve um problema ao enviar e-mail de confirmação: {$mail->ErrorInfo}";
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Estilo de Aplicacao -->
  <link rel="stylesheet" href="css/styles.css" />
  <title>Design</title>
</head>

<body>
  <!-- Preloader -->
  <div class="ring-bg">
    <div class="ring">
      <div class="ring-count" data-target="100"></div>
      <span class="ring-span"></span>
    </div>
  </div>


  <!-- background dos dados da empresa -->
  <div class="superinfo-bg">
    <div class="superinfo">
      <p>Seg / Sex - 08:00 ás 18:00</p>
      <a href="tel:5511999999999"> 55 11 99999-9999</a>
      <p>Rua Norberto Esteves, 115, São Paulo - SP</p>
    </div>
  </div>

  <!-- Menu -->
  <header class="menu-bg">
    <!-- area do logotipo -->
    <div class="menu">
      <div class="menu-logo">
        <a href="#">Design</a>
      </div>

      <!-- links de navegacao -->
      <nav class="menu-nav">
        <!-- botão mobile aparece em ate 560px, depois display none -->
        <button id="btn-mobile"> <span id="hamburguer"></span></button>

        <!-- area de todos os links do menu -->
        <ul id="menu-link">
          <li><a class="nav-link active" href="#home">Home</a></li>
          <li><a class="nav-link" href="#sobre">Sobre</a></li>
          <li><a class="nav-link" href="#servicos">Servicos</a></li>
          <li><a class="nav-link" href="#faq">FAQ</a></li>
        </ul>
      </nav>
    </div>

  </header>

  
  <!-- Primeira secao de contato do usuario -->
  <section id="home" class="headline-bg">

    <div class="headline">
      <div class="headline-body">
        <h1 class="headline-body-title">
          Aqui vai a sua headline. Foque na transformação que seu produto gera
        </h1>
        <p class="headline-body-text">
          Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Necessitatibus, nemo modi dicta quasi veritatis accusamus,
          blanditiis doloremque atque dolorem ratione magni totam?
          Exercitationem voluptates, vel ullam perspiciatis commodi corrupti
          ab?"
        </p>
      </div>

      <!-- Formulário -->
      <div class="headline-contForm">

        <!-- Formulario com metodo post -->
        <form method="POST" class="headline-form">

          <h2 class="headline-form-title">Chamada para ação</h2>
          <div class="headline-form-group">

            <!-- Verificando se apos o usuario enviar os dados houve algum erro
            caso tenha ocorrido, irá mostrar uma mensagem informando qual
            Apos o erro, sera mantido os valores no input, para que nao seja necessario escrever tudo novamente -->
            <input <?php if (isset($usuario->erro["erro_nome"]) or isset($erro_geral)) {
                      echo $erro_geral;
                    } ?> name="nome" type="text" placeholder=" " class="headline-form-group-input" required <?php if (isset($_POST['nome'])) {
                                                                                                              echo "value=" .
                                                                                                                $_POST['nome'] . "";
                                                                                                            } ?> >
            <label class="headline-form-group-label">NOME</label>
            <div class="erro"><?php if (isset($cliente->erro["erro_nome"])) {
                                echo $cliente->erro["erro_nome"];
                              } ?></div>

          </div>
          <div class="headline-form-group">
            <input <?php if (isset($usuario->erro["erro_email"]) or isset($erro_geral)) {
                    } ?>type="email" name="email" placeholder=" " class=" headline-form-group-input" required <?php if (isset($_POST['email'])) {
                                                                                                                echo "value=" .
                                                                                                                  $_POST['email'] . "";
                                                                                                              } ?> >
            <label class="headline-form-group-label">E-MAIL: </label>
            <div class="erro"><?php if (isset($cliente->erro["erro_email"])) {
                                echo $cliente->erro["erro_email"];
                              } ?></div>

          </div>
          <div class="headline-form-group">
            <input id="celular" maxlength="12" <?php if (isset($usuario->erro["erro_telefone"]) or isset($erro_geral)) {
                                  echo $erro_geral;
                                } ?>type="text" name="telefone" placeholder=" " class="headline-form-group-input" required <?php if (isset($_POST['telefone'])) {
                                                                                                                  echo "value=" .
                                                                                                                    $_POST['telefone'] . "";
                                                                                                                } ?> >
            <label class="headline-form-group-label">DDD + TELEFONE: </label>
            <div class="erro"><?php if (isset($cliente->erro["erro_telefone"])) {
                                echo $cliente->erro["erro_telefone"];
                              } ?></div>

          </div>
          <div class="headline-form-group">
            <textarea id="mensagem" maxlength="500" <?php if (isset($usuario->erro["erro_mensagem"]) or isset($erro_geral)) {
                        echo $erro_geral;
                      } ?>name="mensagem" placeholder="Como podemos te ajudar?"> </textarea>
            <div id=limitMsg></div>

            <div class="erro"><?php if (isset($cliente->erro["erro_mensagem"])) {
                                echo $cliente->erro["erro_mensagem"];
                              } ?></div>
          </div>

          <button class="btn" type="submit">Carregar</button>
        </form>
      </div>
    </div>
  </section>

  <!-- Informacoes sobre produtos/empresa-->
  <section id="sobre" class="sobre">
    <div class="sobre-container">
      <img class="sobre-container-img" src="https://picsum.photos/500/400" alt="" />
    </div>
    <div class="sobre-container">
      <h2 class="sobre-container-title">Quem Somos</h2>
      <p class="sobre-container-text">
        Conte aqui quem você é e como você ajuda as pessoas com seus produtos ou serviços. Ao lado, use uma foto sua ou
        da sua empresa. Conte aqui quem você é e como você ajuda as pessoas com seus produtos e serviços
      </p>
    </div>
  </section>

    <!-- Informacoes sobre serviços-->
  <section id="servicos" class="servicos-bg">

    <div class="servicos">
      <h2>Com este serviço você: </h2>
      <div class="servicos-vantagens">
        <img src="https://picsum.photos/200/300" alt="" />
        <div class="servicos-vantagens-body">
          <h3 class="servicos-vantagens-body-title">Benefício do serviço</h3>
          <p class="servicos-vantagens-body-text">
            Insira aqui a descrição do benefício que seu produto gera. Mais tempo? Mais dinheiro? Economia?
            Durabilidade? prazo de atendimento? Preço?
          </p>
        </div>

      </div>

      <div class="servicos-vantagens">
        <img src="https://picsum.photos/200/300" alt="" />
        <div class="servicos-vantagens-body">
          <h3 class="servicos-vantagens-body-title">Benefício do serviço</h3>
          <p class="servicos-vantagens-body-text">
            Insira aqui a descrição do benefício que seu produto gera. Mais tempo? Mais dinheiro? Economia?
            Durabilidade? prazo de atendimento? Preço?
          </p>
        </div>
      </div>
      <div class="servicos-vantagens">
        <img src="https://picsum.photos/200/300" alt="" />
        <div class="servicos-vantagens-body">
          <h3 class="servicos-vantagens-body-title">Benefício do serviço</h3>
          <p class="servicos-vantagens-body-text">
            Insira aqui a descrição do benefício que seu produto gera. Mais tempo? Mais dinheiro? Economia?
            Durabilidade? prazo de atendimento? Preço?
          </p>
        </div>
      </div>
      <div class="servicos-vantagens">
        <img src="https://picsum.photos/200/300" alt="" />
        <div class="servicos-vantagens-body">
          <h3 class="servicos-vantagens-body-title">Benefício do serviço</h3>
          <p class="servicos-vantagens-body-text">
            Insira aqui a descrição do benefício que seu produto gera. Mais tempo? Mais dinheiro? Economia?
            Durabilidade? prazo de atendimento? Preço?
          </p>
        </div>
      </div>
      <div class="servicos-vantagens">
        <img src="https://picsum.photos/200/300" alt="" />
        <div class="servicos-vantagens-body">
          <h3 class="servicos-vantagens-body-title">Benefício do serviço</h3>
          <p class="servicos-vantagens-body-text">
            Insira aqui a descrição do benefício que seu produto gera. Mais tempo? Mais dinheiro? Economia?
            Durabilidade? prazo de atendimento? Preço?
          </p>
        </div>
      </div>
      <div class="servicos-vantagens">
        <img src="https://picsum.photos/200/300" alt="" />
        <div class="servicos-vantagens-body">
          <h3 class="servicos-vantagens-body-title">Benefício do serviço</h3>
          <p class="servicos-vantagens-body-text">
            Insira aqui a descrição do benefício que seu produto gera. Mais tempo? Mais dinheiro? Economia?
            Durabilidade? prazo de atendimento? Preço?
          </p>
        </div>
      </div>
      <div class="servicos-chamada">
        <a href="#">Chamada para ação</a>
      </div>

    </div>
  </section>

  <!-- Secao com as duvidas mais frequentes do usuario -->
  <section id="faq" class="faq">
    <h2 class="faq-title">Perguntas Frequentes</h2>
    <div class=faq-acordion>
      <div class="faq-acordion-content ">
        <div class="faq-acordion-content-label">
          <p>Quando vou começar a ver resultado o resultado das minhas campanhas?</p>
        </div>
        <div class="faq-acordion-content-text">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum nobis quae veniam voluptatibus quidem
            accusamus saepe rerum et, ratione impedit id quia sed quibusdam quaerat repellendus magnam. Dicta, cumque
            velit?</p>
        </div>
      </div>
      <div class="faq-acordion-content">
        <div class="faq-acordion-content-label">
          Quando vou começar a ver resultado o resultado das minhas campanhas?
        </div>
        <div class="faq-acordion-content-text">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum nobis quae veniam voluptatibus quidem
            accusamus saepe rerum et, ratione impedit id quia sed quibusdam quaerat repellendus magnam. Dicta, cumque
            velit?</p>
        </div>
      </div>
      <div class="faq-acordion-content ">
        <div class="faq-acordion-content-label">
          Quando vou começar a ver resultado o resultado das minhas campanhas?
        </div>
        <div class="faq-acordion-content-text">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum nobis quae veniam voluptatibus quidem
            accusamus saepe rerum et, ratione impedit id quia sed quibusdam quaerat repellendus magnam. Dicta, cumque
            velit?</p>
        </div>
      </div>
      <div class="faq-acordion-content">
        <div class="faq-acordion-content-label">
          Quando vou começar a ver resultado o resultado das minhas campanhas?
        </div>
        <div class="faq-acordion-content-text">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum nobis quae veniam voluptatibus quidem
            accusamus saepe rerum et, ratione impedit id quia sed quibusdam quaerat repellendus magnam. Dicta, cumque
            velit?</p>
        </div>
      </div>
      <div class="faq-acordion-content">
        <div class="faq-acordion-content-label">
          Quando vou começar a ver resultado o resultado das minhas campanhas?
        </div>
        <div class="faq-acordion-content-text">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum nobis quae veniam voluptatibus quidem
            accusamus saepe rerum et, ratione impedit id quia sed quibusdam quaerat repellendus magnam. Dicta, cumque
            velit?</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Capturando a atencao do usuario com uma nova chamada -->

  <section id="cadastrar" class="chamada-bg">
    <div class="chamada">

      <div class="chamada-text">
        <h2>Faça uma chamada final</h1>
          <p>Essa é uma chamada para ação final. Chegou até aqui e ainda não cadastrou? aproveite... </p>
      </div>
      <div class="chamada-acao">
        <p class="chamada-acao-descricao">Descrição chamando para ultima ação. Converse com nossa equipe sem
          compromisso. Não perca a chance de ... </p>
        <a class="chamada-acao-btn" href="#">Chamada para ação</a>
        <p class="chamada-acao-contato">Nossos especilistas vão entrar em contato com você ainda hoje! </p>
      </div>
    </div>
  </section>

  <!-- footer com nome da empresa e direitos reservados -->
  <footer class="footer-bg">
    <div class="footer">
      <p class="footer-direitos">Design &copy Todos os direitos reservados - 2022</p>
      <div class="footer-termos">
        <p>CNPJ 99.999.999 -009-98 </p>
        <p>Termos de uso</p>
      </div>
    </div>
  </footer>


  <!-- carregamento dos scripts necessarios                             -->
  <script src="js/loader.js"></script>
  <script src="js/accordion.js"></script>
  <script src="js/scrollspy.js"></script>
  <script src="js/scrollSuave.js"></script>
  <script src="js/menu.js"></script>
  <script src="js/contCaracteres.js"></script>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/jquery.mask.js"></script>
  <script>
    $("#celular").mask("(00)00000-0000")
  </script>
</body>

</html>