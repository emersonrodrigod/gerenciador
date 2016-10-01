create database gerenciador;

use gerenciador;

create table caixa(
    id int not null auto_increment,
    descricao varchar(255) not null,
    primary key(id)
);

create table categoria(
    id int not null auto_increment,
    descricao varchar(255) not null,
    primary key(id)
 );

create table usuario(
    id int not null auto_increment,
    nome varchar(255) not null,
    username varchar(255) not null,
    senha varchar(255) not null,
    primary key(id),
    unique(username)
);

create table lancamento(
    id int not null auto_increment,
    descricao varchar(255) not null,
    emissao timestamp not null default current_timestamp,
    vencimento date not null,
    tipo char(2) not null,
    situacao char(2) not null default 'A',
    valor numeric(15,2) not null,
    baixa timestamp default null,
    categoria_id int not null,
    caixa_id int not null,
    usuario_id int not null,
    primary key(id)
);