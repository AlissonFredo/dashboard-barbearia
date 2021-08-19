create database barbearia;
use barbearia;

create table endereco (
	id int auto_increment primary key,
    cep varchar(9),
    rua varchar(100),
    bairro varchar(100),
    cidade varchar(100),
    estado varchar(2),
    numero int
);

create table cliente (
	id int auto_increment primary key,
    nome_completo varchar (150),
    telefone varchar(15),
    id_endereco int,
    constraint fk_id_endereco foreign key (id_endereco)
    references endereco(id)
);

create table colaborador (
	id int auto_increment primary key,
    nome_completo varchar(150),
    telefone varchar(15),
    cpf varchar(14),
    email varchar(100),
    senha varchar(32)
);

create table ordem_servico (
	id int auto_increment primary key,
    id_cliente int,
    id_colaborador int,
    data_servico date,
    constraint fk_id_cliente foreign key (id_cliente) references cliente(id),
    constraint fk_id_colaborador foreign key (id_colaborador) references colaborador(id)
);

create table status (
	id int auto_increment primary key,
    nome varchar(20)
);

create table tipo_movimentacao (
	id int auto_increment primary key,
    nome varchar(20)
);

create table tipo_item (
	id int auto_increment primary key,
    nome varchar(20)
);

create table movimentacao (
	id int auto_increment primary key,
    id_ordem_servico int,
    id_status int,
    id_tipo_movimentacao int,
    id_tipo_item int,
    id_item int,
    valor_compra float,
    valor_venda float,
    comissao float,
    id_fornecedor int,
    id_categoria int,
    constraint fk_id_ordem_servico foreign key (id_ordem_servico) references ordem_servico(id)
);

create table categoria (
	id int auto_increment primary key,
    nome varchar(50),
    id_status int
);

create table fornecedor(
	id int auto_increment primary key,
    nome varchar(50),
    id_status int
);

create table produto (
	id int auto_increment primary key,
    nome varchar(100),
    qtd int,
    valor_compra float,
    valor_venda float,
    data_validade date,
    comissao float,
    id_fornecedor int,
    id_categoria int,
    id_status int,
    constraint fk_id_fornecedor foreign key (id_fornecedor) references fornecedor(id),
    constraint fk_id_categoria foreign key (id_categoria) references categoria(id)
);

create table servico (
	id int auto_increment primary key,
    nome varchar(100),
    valor float,
    comissao float,
    id_status int
);