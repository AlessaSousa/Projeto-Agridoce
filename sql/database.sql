create database agridoce;

use agridoce;

create table receita(
rec_cod int not null primary key auto_increment,
titulo varchar(80) not null,
autor int not null,
foto varchar(255),
descricao text not null,
foreign key (autor) references usuario(cod)
);

create table usuario(
cod int not null primary key auto_increment,
nome varchar(80) not null unique,
email varchar(100) not null unique,
senha varchar(255) not null
);