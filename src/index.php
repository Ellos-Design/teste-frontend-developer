<?php
    // $servername = "localhost";
    // $database = "contact";
    // $username = "root";
    // $password = "";
    
    $retorno = "";
    $retorno_class = "";

    $nome = "";
    $email = "";
    $telefone = "";
    $mensagem = "";

    //Server Heroku
    $cleardb_url = parse_url(getenv('CLEARDB_DATABASE_URL'));

    $cleardb_server = $cleardb_url['host'];
    $cleardb_username = $cleardb_url['user'];
    $cleardb_password = $cleardb_url['pass'];
    $cleardb_db = substr($cleardb_url['path'], 1);

    $active_group = 'default';
    $query_builder = TRUE;

    if (isset($_POST["nome"], $_POST["email"], $_POST["telefone"], $_POST["mensagem"])) {
        
        $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_STRING);
        $mensagem = filter_input(INPUT_POST, "mensagem", FILTER_SANITIZE_STRING);

        if (!$nome || !$email || !$telefone || !$mensagem){
            $retorno = "Dados Inválidos";
            $retorno_class = "erro";
        } else {
            $stm = $conn->prepare("INSERT INTO contacts (nome, email, telefone, mensagem) VALUES ('$nome', '$email', '$telefone', '$mensagem')");
            $stm->execute();

            $retorno = "Mensagem enviada com Sucesso!";
            $retorno_class = "sucesso";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Teste-Frontend-Developer</title>
</head>
<body>

    <!-- Cabeçalho -->

    <header class="navbar">
        <div class="container d-flex wrap">
            <div class="logo">
                <a href="#">Logo <span>.</span></a>
            </div>
            <nav class="d-flex wrap">
                <div class="d-flex numbers">
                    <i class="fa-brands fa-whatsapp"></i>
                    <p><strong>Comercial</strong> :</p>
                    <span>(00) 00000-0000</span>
                </div>

                <div class="d-flex numbers">
                    <i class="fa-solid fa-phone"></i>
                    <p><strong>Telefone</strong>:</p>
                    <span>(00) 00000-0000</span>
                </div>
            </nav>
        </div>
    </header>

    <main>

        <!-- Banner -->

        <section id="home" class="home d-flex">
            <div class="container d-flex wrap">
                <div class="intro">
                    <h1 data-aos="fade-down-right" data-aos-easing="linear" data-aos-duration="800">Gestão Contábil para a sua Empresa.</h1>
                    <p data-aos="fade-down-right" data-aos-easing="linear" data-aos-duration="1000">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                     In vel nihil commodi reprehenderit consequatur perspiciatis?</p>
                     <div class="social-media" data-aos="fade-up" data-aos-duration="1200" data-aos-anchor-placement="top-bottom">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                     </div>
                </div>
                                        
                <form method="POST" data-aos="zoom-in-left" data-aos-duration="1000">
                    <div class="form-field form-title">
                        <h3>Ficou interessado?</h3>
                        <p>Tire suas dúvidas através deste formulário.</p>
                    </div>

                    <div class="form-field d-flex">
                        <div class="icon-field">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <input type="text" name="nome" value="<?=$nome?>" required>
                        <label>Nome*</label>
                    </div>

                    <div class="form-field d-flex">
                        <div class="icon-field">
                            <i class="fa-solid fa-envelope-circle-check"></i>
                        </div>
                        <input type="text" name="email" value="<?=$email?>" required>
                        <label>E-mail*</label>
                    </div>

                    <div class="form-field d-flex">
                        <div class="icon-field">
                            <i class="fa-solid fa-phone-flip"></i>
                        </div>
                        <input type="number" name="telefone" value="<?=$telefone?>" required>
                        <label>Celular*</label>
                    </div>

                    <div class="form-field d-flex">
                        <div class="icon-field">
                            <i class="fa-solid fa-message"></i>
                        </div>
                        <textarea class="msg" rows="2" type="text" name="mensagem" value="<?=$mensagem?>" required></textarea>
                        <label to="msg">Digite a sua mensagem aqui...*</label>
                    </div>

                    <div class="form-field d-flex">
                        <button class="button" type="submit">
                            <i class="fa-solid fa-paper-plane"></i> 
                            <p>Enviar</p>
                        </button>
                    </div>

                    <div class="retorno d-flex <?=$retorno_class?>" >
                        <p><?=$retorno?></p>
                    </div>
                </form>
            </div>
        </section>

        <!-- Sobre -->

        <section id="sobre">

            <div class="d-flex container wrap">
                <div class="col-1" data-aos="zoom-in" data-aos-easing="ease-out-cubic" data-aos-duration="3000">
                    <figure >
                        <img src="./imgs/time-contabilidade.jpg" alt="Equipe da empresa">
                    </figure>
                        
                </div>

                <div class="col-2" data-aos="zoom-in">
                    <h2>Sobre o nosso time</h2>
                    <p>Nosso propósito é simples: queremos colocar em prática toda nossa expertise adquirida em anos de experiência 
                    e ajudar pessoas como nós, que estão buscando o sucesso da própria empresa. Nascemos com uma missão diferente dentro 
                    do mercado e apresentamos uma dinâmica de contramão através de 3 pilares fundamentais: redução da burocracia, melhoria 
                    do fluxo de trabalho e relacionamento com nossos clientes.</p>
                </div>
            </div>

        </section>

        <!-- Serviços -->

        <section id="servicos">

            <div class="container">
                <div class="title" data-aos="fade-down">
                    <h2>Nossos Serviços:</h2>
                </div>

                <div class="d-flex wrap">

                    <div class="col-service">
                        <div class="box d-flex">
                            <div class="image" data-aos="zoom-out-right" data-aos-offset="100" data-aos-easing="ease-in-sine">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>

                            <div class="description">
                                <h5>Legalização e Abertura de Empresas</h5>
                                <p>A Legalização de Empresas equivale a uma sequência de processos que devem ser cumpridos para regularizar 
                                a situação de um negócio. Esses processos de legalização podem variar, dependendo do local e da atividade que 
                                deseja abrir.</p>
                            </div>
                        </div>

                        <div class="box d-flex" data-aos="zoom-out-right" data-aos-offset="200" data-aos-easing="ease-in-sine">
                            <div class="image">
                                <i class="fa-solid fa-briefcase"></i>
                            </div>

                            <div class="description">
                                <h5>Contabilidade de Empresas</h5>
                                <p>A contabilidade para empresas é um fator primordial para controlar o patrimônio, coletar dados para serem transformados 
                                estrategicamente em procedimentos e ações que direcionam a tomada de decisão do negócio, além de ser extremamente importante 
                                o fator de análise do lucro e prejuízo da empresa. </p>
                            </div>
                        </div>

                        <div class="box d-flex" data-aos="zoom-out-right" data-aos-offset="200" data-aos-easing="ease-in-sine">
                            <div class="image">
                                <i class="fa-solid fa-magnifying-glass-dollar"></i>
                            </div>

                            <div class="description">
                                <h5>Consultoria e Assessoria Contábil</h5>
                                <p>
                                A Assessoria Contábil trata-se de uma relação consistente, focada no longo prazo. Sua finalidade é diagnosticar 
                                problemas estruturais da companhia, junto aos gestores, fornecedores, colaboradores e clientes do negócio. <br>

                                Na Consultoria são desenvolvidos trabalhos de orientações quanto às áreas contábeis da empresa, e irá abranger: planejamento tributário; 
                                controle e gestão financeira e orientação empresarial.
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="col-service">
                        <div class="box d-flex" data-aos="zoom-out-right" data-aos-offset="250" data-aos-easing="ease-in-sine">
                            <div class="image">
                                <i class="fa-solid fa-cash-register"></i>
                            </div>

                            <div class="description">
                                <h5>Fiscal e DP</h5>
                                <p>Reunimos os departamentos Contábil, Fiscal e o Departamento Pessoal para facilitar a vida dos nossos,
                                 clientes. Procuramos sempre levar o melhor serviço, no menor prazo possível para que todas as 
                                situações do dia-a-dia se resolvam com mais facilidade e simplicidade.
                                </p>
                            </div>
                        </div>

                        <div class="box d-flex" data-aos="zoom-out-right" data-aos-offset="180" data-aos-easing="ease-in-sine">
                            <div class="image">
                                <i class="fa-solid fa-circle-dollar-to-slot"></i>
                            </div>

                            <div class="description">
                                <h5>Imposto de Renda</h5>
                                <p>O imposto sobre a renda ou imposto sobre o rendimento é um tributo existente em vários países, 
                                em que cada contribuinte, seja ele pessoa física (PF) ou pessoa jurídica (PJ). Todo cidadão é obrigado 
                                a pagar uma certa porcentagem de sua renda para o governo. Nós fazemos declarações para pessoas físicas 
                                (IRPF), sempre buscando facilitar a vida dos nossos clientes.
                                </p>
                            </div>
                        </div>

                        <div class="box d-flex" data-aos="zoom-out-right" data-aos-offset="180" data-aos-easing="ease-in-sine">
                            <div class="image">
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>

                            <div class="description">
                                <h5>MEI</h5>
                                <p>Microempreendedor Individual (MEI) é a pessoa que trabalha por conta própria e que se legaliza como 
                                pequeno empresário. Pensando em ajudar as pessoas a se tornarem donos dos seus negócios, nós fazemos todo 
                                o processo para a abertura da sua empresa e além disso, orientamos você sobre impostos, tributos ou 
                                qualquer dúvida que possa surgir.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="d-flex" data-aos="zoom-in">
                    <a href="#home" class="button">Vamos realizar um serviço?</a>
                </div>
            </div>

        </section>

        <!-- Perguntas Frequentes -->

        <section id="perguntas">
            <div class="title">
                <h2>Perguntas Frequentes</h2>
            </div>

            <div class="container">
                <div class="accordion-container">
                    
                    <div class="accordion-group" data-aos="fade-down" data-aos-offset="200">
                        <div class="accordion-header d-flex">
                            <p>Por que <strong>Legalizar</strong> o meu Negócio?</p>
                            <i id="icon" class="fas fa-chevron-down icon-acc"></i>
                        </div>

                        <div class="accordion-body">
                            A legalização de uma empresa é <strong>fundamental</strong>, pois assim poderá aproveitar benefícios como captação 
                            de recursos juntos as instituições financeiras como empréstimo ou financiamento, além que regularizada 
                            poderá vender ou prestar serviços para órgãos públicos através de licitações. Para isto, você precisa 
                            de um profissional que realize os procedimentos conforme a legislação pertinente.
                        </div>

                    </div>

                    <div class="accordion-group" data-aos="fade-down" data-aos-offset="210">
                        <div class="accordion-header d-flex">
                            <p>O que preciso <strong>saber</strong>  antes de abrir a minha <strong>Empresa</strong>  ?</p>
                            <i id="icon" class="fas fa-chevron-down icon-acc"></i>
                        </div>

                        <div class="accordion-body">
                        1) <strong>Tenha um Plano de Negócio</strong> – O que é isso? Um documento que descreve como a empresa irá atuar e crescer 
                        de forma planejada. No Plano de Negócio deve ter: Definição do setor e ramo de atividade, Descrição dos produtos 
                        e serviços da empresa, Definição do público-alvo, Plano financeiro, Plano de marketing, Estudo do mercado e 
                        análise da concorrência, entre outros; <br><br>

                        2) <strong>Empresa Individual ou Sociedade</strong> – Essa é uma questão que deve ser analisada com muita cautela, afinal, sociedade 
                        é coisa séria. Se por um lado, a sociedade traz a vantagem de ter mais pessoas trabalhando, outros pontos de vista e 
                        maior aporte financeiro; por outro lado, as sociedades podem gerar conflitos e os resultados devem ser distribuídos. 
                        Por isso, caso decida pela sociedade, busque alguém em quem você confie e que tenha os mesmos objetivos estratégicos 
                        que os seus; <br><br>

                        3) <strong>Contrate um Contador!</strong> – Ter um contador é imprescindível para o sucesso da sua empresa, afinal, esse é o profissional 
                        que te auxiliará com toda a parte burocrática e tributária, desde a definição da natureza jurídica e regime tributário até 
                        a elaboração do contrato social, registros e inscrições nos órgãos competentes;
                        </div>

                    </div> 

                    <div class="accordion-group" data-aos="fade-down" data-aos-offset="220">
                        <div class="accordion-header d-flex">
                            <p>Por que a minha <strong>Empresa</strong> precisa de um <strong>Contador</strong> ?</p>
                            <i id="icon" class="fas fa-chevron-down icon-acc"></i>
                        </div>

                        <div class="accordion-body">
                            Administrar as finanças é determinante para que uma empresa permaneça no mercado e ainda atue sob as 
                            exigências da lei e da <strong>Receita Federal</strong> . Caso contrário, o risco de fechar ou ser punida é grande. <br>
                            Por isso, o departamento contábil é capaz de garantir à sua empresa a precisão e agilidade que os negócios 
                            impõem, com segurança e controle para o seu gerenciamento. Ele garante segurança de informações e traz subsídios 
                            para um bom planejamento empresarial capaz de reduzir os gastos, analisar todo o seu patrimônio e manter as contas em dia.
                        </div>

                    </div>
 
                    <div class="accordion-group" data-aos="fade-down" data-aos-offset="230">
                        <div class="accordion-header d-flex">
                            <p>É obrigatório o <strong>MEI</strong> ter Contador?</p>
                            <i id="icon" class="fas fa-chevron-up icon-acc"></i>
                        </div>

                        <div class="accordion-body">
                        O modelo <strong>MEI</strong> nada mais é do que um profissional autônomo. Dessa forma, este tem um CNPJ, ou seja, possui facilidades para a 
                        abertura de conta bancária, pedido de empréstimos e emissão de notas fiscais, além de suas obrigações e direitos de uma pessoa 
                        jurídica.
                        </div>
                            
                    </div>                  
                    
                </div>

            </div>

        </section>

        <!-- Última Chamada CTA -->

        <section id="cta-end">
            <div class="container d-flex wrap">
                <div class="cta-desc" data-aos="zoom-out-right">
                    <h2>SOLICITE UMA PROPOSTA</h2>
                    <p>Nosso time de consultores analisará as necessidades de sua empresa e uma proposta personalizada 
                    será apresentada.</p>
                </div>
                <div class="cta-2" data-aos="zoom-out">
                    <p>Organize a rotina da sua empresa para você ter mais tempo livre para gerenciar o seu negócio</p>

                    <a href="#home" class="button">Entrar em Contato</a>

                    <span>Nossos especialistas vão entrar em contato com você ainda hoje.</span>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->

    <footer id="footer">
        <p>Lorem Ipsum &copy; Todos os Direitos Reservados - 2022 </p>
        <p>CNPJ 00.000.000-0000-00 • TERMOS DE USO</p>
    </footer>

    <!-- Scroll to Top -->

    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>

    <!-- WhatsApp -->

    <div class="wpp">
        <i class="fa-brands fa-whatsapp"></i>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="./scripts/script.js"></script>
    
    
</body>
</html>