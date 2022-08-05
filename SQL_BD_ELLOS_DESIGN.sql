CREATE DATABASE bd_ellos_design;

USE bd_ellos_design;

CREATE TABLE tb_orcamento(
	id_orcamento int not null primary key auto_increment,
    nome_cliente varchar(30) not null,
    email_cliente varchar(30) not null,
    telefone_cliente varchar(16) not null,
    desc_orcamento varchar(500) not null
);