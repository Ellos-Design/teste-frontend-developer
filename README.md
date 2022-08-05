# Teste para estágio Frontend e Full-Stack
<img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"> <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black"> <img src="https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white"> <img src="https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white">

---

## Sobre a Ellos Design

A **Ellos Design** é uma agência de marketing e criação de sites localizada em Guarulhos / SP. Somos uma empresa em constante evolução e sempre estamos abertos para pessoas que gostem de tecnologia e queiram trabalhar na área, mas que principalmente queiram aprender e crescer com a nossa empresa.

---

## Índice 📖
* __[Descrição](#description)__
* __[Tecnologias](#technologies)__
* __[O que será necessario para utilizar este Site?](#necessary)__
* __[O que será avaliado nesse teste?](#test)__
* __[Etapas para realização do teste?](#etapas)__

---

## Descrição 📌 <a name="description"></a>
Este é um teste prático para a avaliação dos candidatos participantes do processo seletivo para vagas de Frontend ou Full-Stack da Ellos Design.
<p>Como um programador iniciante este é meu primeiro desafio de um processo seletivo, desenvolvendo assim uma LandPage baseado em um modelo pré-definido sendo livre para fazer alterações no design, além da LandPage o teste se baseia em criar um BackEnd para cadastro de um Fórmulario em um Banco de Dados MySQL.


---

## Tecnologias 💻 <a name="technologies"></a>
* __[HTML5](https://developer.mozilla.org/pt-BR/docs/Web/HTML)__ - Documentação HTML
* __[CSS3](https://developer.mozilla.org/pt-BR/docs/Web/CSS)__ - Documentação CSS
* __[JavaScript](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript)__ - Documentação JavaScript
* __[JQuery](https://api.jquery.com/)__ - Documentação JQuery
* __[PHP](https://www.php.net/docs.php)__ - Documentação PHP
* __[MySQL](https://dev.mysql.com/doc/)__ - Documentação MySQL

---

## O que será necessario para utilizar este __[site](https://teste-ellos-design.herokuapp.com/)__? 📝 <a name="necessary">
☐ Para utilizar em LocalHost será necessário um software de servidor como XAMPP ou WampServer para execução do serviço do Apache e MySQL em seu dispositivo; <br>
☐ Se já tiver instalado um servidor deverá criar um banco de dados conforme o código SQL abaixo:<br>
```
    CREATE DATABASE bd_ellos_design;

    USE bd_ellos_design;

    CREATE TABLE tb_orcamento(
        id_orcamento int not null primary key auto_increment,
        nome_cliente varchar(30) not null,
        email_cliente varchar(30) not null,
        telefone_cliente varchar(16) not null,
        desc_orcamento varchar(500) not null
    );
```
☐ Após a criação do banco de dados basta acessar o htdocs de seu software e executar o seguinte código em seu git bash:<br>
```
    $ git clone https://github.com/CardosofGui/teste-frontend-developer.git
```
☐ Agora basta acessar seu navegador e seguir para o caminho "http://localhost/teste-frontend-developer/" que já poderá acessar o site!

## O que será avaliado nesse teste? <a name="test"> 

- Criatividade
- Organização do código
- Performance do código
- Boas práticas de desenvolvimento
- Documentação do código
- Adaptação mobile (layout responsivo)
- Documentação do projeto (Com instruções para executar)

## Etapas para realização do teste <a name="etapas"> 

- Faça um [fork](https://github.com/Ellos-Design/teste-frontend-developer/fork) desse projeto em sua conta do GitHub
- Realize o desafio proposto
- Faça um push para seu repositório com o desafio implementado
- Envie um email para (vagas@ellosdesign.com.br) com a URL do seu projeto avisando que você concluiu o teste

### Template da página a ser desenvolvida!

![Template da página a ser desenvolvida](https://github.com/Ellos-Design/teste-frontend-developer/blob/master/wireframe.png?raw=true)
