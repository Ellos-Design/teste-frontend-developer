<?php 
    # Resgatando valor GET do status do formulario caso ele exista
    if(isset($_GET['status'])) {
        $status = $_GET['status'];
    } else {
        $status = "no-status";
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store" />
    <title>Ellos Design</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <!-- Arquivos CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    
    <!-- Header && Main -->
    <div class="main-background">
        <header>
            <div class="container">
                <img class="logotipo" src="assets/img/logotipo.png" scroll-anim="left"></img>

                <p class="button-contact" scroll-anim="right">(48) 9 9999-9999</p>
            </div>
        </header>

        <main id="headline">
            <div class="container">
                <div class="headline-wrapper" scroll-anim="left">
                    <h2 class="headline" >Aqui vai a sua headline. Foque na transformação que seu produto gera.</h2>

                    <p class="subtitle">Utilize esse subtitulo para complementar a sua headline com informações que facilitem o entendimento do produto ou serviço que você está oferecendo. O que você irá entregar.</p>
                </div>
                
                <div class="form" scroll-anim="right">
                    <h2 class="title">Chamada para ação</h2>
                    
                    <form action="config/cadastrar-orcamento.php" method="post">
                        <div>
                            <input type="text" name="txName" id="txName" placeholder="NOME:">
                        </div>
                        <div>
                            <input type="email" name="txEmail" id="txEmail" placeholder="E-MAIL:">
                        </div>
                        <div>
                            <input maxlength="15" type="tel" name="txTel" id="txTel" placeholder="DDD + TELEFONE:">
                        </div>
                        <div>
                            <textarea name="txDesc" maxlength="500" id="txDesc" cols="30" rows="10" placeholder="COMO PODEMOS TE AJUDAR?"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="button-chamada">Chamada para ação</button>
                        </div>
                    </form>

                    <!-- Verificação do Status do Formulario -->
                    <div class="status" <?php if($status == "sucess") { echo 'style="display: block;"'; } ?>>
                        <h2 class="title sucess">Agradecemos o Contato!</h2>
                        <p class="subtitle sucess">Nossos especialistas vão entrar em contato com você ainda hoje.</p>
                    </div>
                    
                    <div class="status" <?php if($status == "error") { echo 'style="display: block;"'; } ?>>
                        <h2 class="title error">Não foi possível entrar em contato!</h2>
                        <p class="subtitle error">Nós envie uma mensagem no número (48) 9 9999-9999 para que possamos lhe atender!</p>
                    </div>
                    <!-- Verificação do Status do Formulario -->
                </div>
            </div>
        </main>
    </div>
    <!-- Header && Main -->

    <!-- Sobre Nós -->
    <section id="about-us">
        <div class="container">
            <div alt="" class="image-about-us" scroll-anim="left"></div>

            <div class="about-us-text" scroll-anim="right">
                <h2 class="title">Quem somos</h2>

                <p class="subtitle">Conte aqui quem você é e como você ajuda as pessoas com seus produtos ou serviços. Ao lado, use uma foto sua ou da sua emrpesa. Conte aqui quem você é e como você ajuda as pessoas com seus produtos ou serviços...</p>
            </div>
        </div>
    </section>
    <!-- Sobre Nós -->

    <!-- Serviços -->
    <section id="info-service">
        <div class="container">

            <h2 class="title" scroll-anim="top">Com este serviço você:</h2>

            <div class="container-services">
                <div class="container-wrapper" scroll-anim="left">
                    <div class="item">
                        <i class="fa-solid fa-shop"></i>

                        <div>
                            <h3 class="title">Benefício do serviço</h3>
                            <p class="subtitle">Insira aqui a descrição do benefício que seu produto gera. Mais tempo? Mais dinheiro? Economia? Durabilidade? Prazo de atendimento? Preço?</p>
                        </div>
                    </div>

                    <div class="item">
                        <i class="fa-solid fa-shop"></i>

                        <div>
                            <h3 class="title">Benefício do serviço</h3>
                            <p class="subtitle">Insira aqui a descrição do benefício que seu produto gera. Mais tempo? Mais dinheiro? Economia? Durabilidade? Prazo de atendimento? Preço?</p>
                        </div>
                    </div>

                    <div class="item">
                        <i class="fa-solid fa-shop"></i>

                        <div>
                            <h3 class="title">Benefício do serviço</h3>
                            <p class="subtitle">Insira aqui a descrição do benefício que seu produto gera. Mais tempo? Mais dinheiro? Economia? Durabilidade? Prazo de atendimento? Preço?</p>
                        </div>
                    </div>
                </div>

                <div class="container-wrapper" scroll-anim="right">
                    <div class="item">
                        <i class="fa-solid fa-shop"></i>

                        <div>
                            <h3 class="title">Benefício do serviço</h3>
                            <p class="subtitle">Insira aqui a descrição do benefício que seu produto gera. Mais tempo? Mais dinheiro? Economia? Durabilidade? Prazo de atendimento? Preço?</p>
                        </div>
                    </div>

                    <div class="item">
                        <i class="fa-solid fa-shop"></i>

                        <div>
                            <h3 class="title">Benefício do serviço</h3>
                            <p class="subtitle">Insira aqui a descrição do benefício que seu produto gera. Mais tempo? Mais dinheiro? Economia? Durabilidade? Prazo de atendimento? Preço?</p>
                        </div>
                    </div>

                    <div class="item">
                        <i class="fa-solid fa-shop"></i>

                        <div>
                            <h3 class="title">Benefício do serviço</h3>
                            <p class="subtitle">Insira aqui a descrição do benefício que seu produto gera. Mais tempo? Mais dinheiro? Economia? Durabilidade? Prazo de atendimento? Preço?</p>
                        </div>
                    </div>
                </div>
            </div>

            <a href="#headline" class="button-chamada">Chamada para ação</a>
        </div>
    </section>
    <!-- Sobre Nós -->

    <!-- Perguntas Frequentes -->
    <section id="frequent-asks">
        <div class="container">
            <h2 class="title" scroll-anim="top">Perguntas Frequentes</h2>

            <div class="item-ask" scroll-anim="left">
                <p class="ask">Quando vou começar a ver o resultado das minhas campanhas?</p>

                <p class="answer"><b>R:</b> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>

            <div class="item-ask" scroll-anim="left">
                <p class="ask">Quando vou começar a ver o resultado das minhas campanhas?</p>

                <p class="answer"><b>R:</b> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>

            <div class="item-ask" scroll-anim="left">
                <p class="ask">Quando vou começar a ver o resultado das minhas campanhas?</p>

                <p class="answer"><b>R:</b> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>

            <div class="item-ask" scroll-anim="left">
                <p class="ask">Quando vou começar a ver o resultado das minhas campanhas?</p>

                <p class="answer"><b>R:</b> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>

            <div class="item-ask" scroll-anim="left">
                <p class="ask">Quando vou começar a ver o resultado das minhas campanhas?</p>

                <p class="answer"><b>R:</b> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
        </div>
    </section>
    <!-- Perguntas Frequentes -->

    <!-- Ultíma Chamada -->
    <section id="last-call">
        <div class="container">
            <div class="text-last-call" scroll-anim="left">
                <h2 class="call">Faça uma chamada final</h2>
                <p class="subtitle">Essa é uma chamada para ação final. Chegou até aqui e ainda não cadastrou? Aproveite...</p>
            </div>

            <div class="menu-last-call" scroll-anim="right">
                <p class="description-last-call">Descrição para uma última ação. Converse com nossa equipe sem compromisso. Não perca a chance de ...</p>
                
                <a href="#headline" class="button-chamada">Chamada para ação</a>

                <p class="subtitle">Nossos especialistas vão entrar em contato com você ainda hoje.</p>
            </div>
        </div>
    </section>
    <!-- Ultíma Chamada -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <p class="subtitle">Nome da empresa © Todos os Direitos Reservados - 2020</p>
            <p class="subtitle">CNP 99.999.999 - 0009-99•TERMOS DE USO</p>
        </div>
    </footer>
    <!-- Footer -->

    <!-- JavaScript -->
    <script src="https://kit.fontawesome.com/09947a415a.js" crossorigin="anonymous"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/animation.js"></script>
</body>
</html>