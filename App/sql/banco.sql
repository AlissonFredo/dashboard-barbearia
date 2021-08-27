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

insert into status (id, nome) values (1, 'ATIVADO');
insert into status (id, nome) values (2,'DESATIVADO');
insert into status (id, nome) values (3, 'CANCELADO');
insert into status (id, nome) values (4, 'EFETIVADO');
insert into status (id, nome) values (5, 'ESTORNADO');
insert into status (id, nome) values (6, 'PENDENTE');
insert into status (id, nome) values (7, 'ENTRADA');
insert into status (id, nome) values (8, 'SAIDA');

insert into categoria (id, nome, id_status) values (1, 'CABELO', 1);
insert into categoria (id, nome, id_status) values (2, 'BARBA', 1);
insert into categoria (id, nome, id_status) values (3, 'BEBIDA', 1);
insert into categoria (id, nome, id_status) values (4, 'SALGADO', 1);

insert into fornecedor (id, nome, id_status) values (1, 'SALGADO DA ILHA', 1);
insert into fornecedor (id, nome, id_status) values (2, 'SALGADO DO BAIRRO', 1);
insert into fornecedor (id, nome, id_status) values (3, 'BEBIDA DA ILHA', 1);
insert into fornecedor (id, nome, id_status) values (4, 'BEBIDA DO BAIRRO', 1);
insert into fornecedor (id, nome, id_status) values (5, 'CABELOS DA ILHA', 1);
insert into fornecedor (id, nome, id_status) values (6, 'CABELOS DO BAIRRO', 1);
insert into fornecedor (id, nome, id_status) values (7, 'BARBA DA ILHA', 1);
insert into fornecedor (id, nome, id_status) values (8, 'BARBA DO BAIRRO', 1);

insert into produto 
    (
        id, nome, qtd, valor_compra, valor_venda, data_validade, 
        comissao, id_fornecedor, id_categoria, id_status
    ) values (1, 'COXINHA DA ILHA', 5, 1, 3, '2021-06-27', 1, 1, 4, 1);
insert into produto 
    (
        id, nome, qtd, valor_compra, valor_venda, data_validade, 
        comissao, id_fornecedor, id_categoria, id_status
    ) values (2, 'COXINHA DO BAIRRO', 10, 1, 3, '2021-06-27', 1, 2, 4, 1);

insert into produto 
    (
        id, nome, qtd, valor_compra, valor_venda, data_validade, 
        comissao, id_fornecedor, id_categoria, id_status
    ) values (3, 'CERVEJA DO BAIRRO', 5, 2, 5, '2021-06-27', 2, 4, 3, 1);
insert into produto 
    (
        id, nome, qtd, valor_compra, valor_venda, data_validade, 
        comissao, id_fornecedor, id_categoria, id_status
    ) values (4, 'CERVEJA DA ILHA', 10, 2, 5, '2021-06-27', 2, 3, 3, 1);

insert into produto 
    (
        id, nome, qtd, valor_compra, valor_venda, data_validade, 
        comissao, id_fornecedor, id_categoria, id_status
    ) values (5, 'SHAMPOO DO BAIRRO', 5, 2, 5, '2021-06-27', 2, 6, 1, 1);
insert into produto 
    (
        id, nome, qtd, valor_compra, valor_venda, data_validade, 
        comissao, id_fornecedor, id_categoria, id_status
    ) values (6, 'SHAMPOO DA ILHA', 10, 2, 5, '2021-06-27', 2, 5, 1, 1);

insert into produto 
    (
        id, nome, qtd, valor_compra, valor_venda, data_validade, 
        comissao, id_fornecedor, id_categoria, id_status
    ) values (7, 'CREME BARBEAR DA ILHA', 10, 2, 5, '2021-06-27', 2, 7, 2, 1);
insert into produto 
    (
        id, nome, qtd, valor_compra, valor_venda, data_validade, 
        comissao, id_fornecedor, id_categoria, id_status
    ) values (8, 'CREME BARBEAR DO BAIRRO', 10, 2, 5, '2021-06-27', 2, 8, 2, 1);


insert into servico (id, nome, valor, comissao, id_status) values (1, 'corte de cabelo', 30, 10, 1);
insert into servico (id, nome, valor, comissao, id_status) values (2, 'corte de barba', 30, 10, 1);
insert into servico (id, nome, valor, comissao, id_status) values (3, 'sombrancelha', 30, 10, 1);
insert into servico (id, nome, valor, comissao, id_status) values (4, 'luzes no cabelo', 30, 10, 1);
insert into servico (id, nome, valor, comissao, id_status) values (5, 'corte de cabelo com desenho', 30, 10, 1);