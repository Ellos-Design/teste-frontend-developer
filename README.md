# Descrição do Projeto

## Funcionalidades
* Dados enviados do formulário salvo no banco de dados
* Disparo de e-mail após o usuário enviar os dados
* ScrollSpy no menu para o usuario identificar em qual parte está.


## Deploy da Aplicação no Heroku
<https://teste-php-fullstack.herokuapp.com/>

## Pré-requisitos
* Necessário instalar um servidor web e o banco de dados MySQL, por exemplo, o Xamp.
* Em necessidade de estilizar a página, instalar o pre-compilador sass:
  > npm install -g sass

## Como rodar aplicação
* Após instalar o Xamp, no Disco local(C:), na pasta htdocs, crie seu projeto.
  >C:\xampp\htdocs\meuprojeto
* No terminal, Clone o projeto:
```git clone https://github.com/Nathan-maya/teste-frontend-developer.git```
>C:\xampp\htdocs\meuprojeto> ```git clone https://github.com/Nathan-maya/teste-frontend-developer.git ```
* Há dois branch, master e melhoria(deploy no heroku). Para alternar digite:
  >git checkout master
  ou
  >git checkout melhoria
* Execute o Xamp(WampServer) e start o Apache e MySQL .
* Abrir o phpmyadmin no localhost e importar o arquivo: 
  >cliente.sql
* Abrir no navegador:
  >[localhost](http://localhost/)/meuprojeto
* Dentro do projeto, na pasta class, abra config.php
* Caso não esteja rodando em servidor local, altere a variável $modo='producao' e realize as alteracoes necessárias.
~~~PHP
<?php
  //Configuração do banco de dados

  $modo='producao';
  if($modo =='local'){
    define('SERVIDOR','localhost');
    define('USUARIO','root');
    define('SENHA','');
    define('BANCO','cliente');  
  }

  if($modo == 'producao'){
    define('SERVIDOR','cxmgkzhk95kfgbq4.cbetxkdyhwsb.us-east-1.rds.amazonaws.com');
    define('USUARIO','ot1q1lq6t7drvnot');
    define('SENHA','x122sooh9983z6dy');
    define('BANCO','iz0kffffflhvreu9');
  }
~~~
* Para configurar o php mailer, basta colocar um e-mail valido
~~~PHP
 $mail->
        $mail->Host       = 'smtp.gmail.com';                   //definindo SMTP server de envio
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'email@gmail.com';                     //login do email 
        $mail->Password   = 'password';                               //senha de app
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;
~~~

