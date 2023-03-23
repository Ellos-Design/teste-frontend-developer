<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Café Company - O melhor café de São Paulo.</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" href="../assets/favicon/favicon.ico">
</head>

<body>
    <main>
        <?php
        require_once 'database.php';

        if (isset($_POST['submit'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $mensagem = $_POST['mensagem'];

            $sql = "INSERT INTO cliente values('$nome','$email','$telefone','$mensagem')";

            $result = $mysqli->query($sql);
            /*
        if(!$result or $mysqli->affected_rows != 1){
            echo "tudo errado";
        }else{
            echo "tudo certo com sucesso!";
        } 
        */
        }
        ?>
        <!--HERO-Section-Inicio-->
        <section class="background-coffe container" style="height:100vh; text-align:center;">
            <header>
                <nav>
                    <a href="#">
                        <h1><img src="../assets/img/logo-offwhite.png" alt="Logo Café Company."></h1>
                    </a>
                    <address>
                        <a href="#" class="btn">(11) 91625-5489</a>
                    </address>
                </nav>
            </header>
            <article style="margin: 5rem 0;">
                <h1 class="display-1">Agradeçemos a preferência!</h1>
                <p>Logo seu o melhor café de São Paulo estará em sua casa, que bom ter você saboreando conosco!</p>
            </article>
            <section style="margin: 5rem 0;">
                <a href="javascript:history.go(-1)" class="btn">Voltar ao inicio.</a>
            </section>
        </section>
</body>

</html>