create 	database if not exists projetopws;

use projetopws;

create table if not exists empresa(
id int not null auto_increment primary key,
desigsocial varchar(25) not null,
email varchar(50) not null,
telefone int(9) not null,
nif int(9) not null,
morada varchar(75) not null,
codpostal varchar(9) not null,
localidade varchar(25) not null,
capsocial int not null
);

create table if not exists users(
id int not null auto_increment primary key,
username varchar(50) not null,
password varchar(50) not null,
email varchar(50) not null,
telefone int(9) not null,
nif int(9) not null,
morada varchar(75) not null,
codpostal varchar(9) not null,
localidade varchar(25) not null,
role enum('funcionario', 'cliente', 'administrador') not null
);

create table if not exists iva(
id int not null auto_increment primary key,
percentagem int not null,
descricao varchar(50) not null,
emvigor enum('sim', 'nao')
);

create table if not exists servicos(
id int not null auto_increment primary key,
referencia varchar(10) not null unique,
descricao varchar(100) not null,
preco decimal not null,
idIva int not null,
 FOREIGN KEY (idIva) REFERENCES iva(id)
);

create table if not exists folhasobra(
id int not null auto_increment primary key,
data timestamp not null,
valorTotal decimal not null,
ivaTotal decimal not null,
estado enum('Em Lançamento', 'Emitida', 'Paga') not null,
idCliente int not null,
idFuncionario int not null,
 FOREIGN KEY (idCliente) REFERENCES users(id),
 FOREIGN KEY (idFuncionario) REFERENCES users(id)
);

create table if not exists linhasobra(
id int not null auto_increment primary key,
quantidade int not null,
valor decimal not null,
valorIva decimal not null,
idFolha int not null,
idServico int not null,
 FOREIGN KEY (idFolha) REFERENCES folhasobra(id),
 FOREIGN KEY (idServico) REFERENCES servicos(id)
);