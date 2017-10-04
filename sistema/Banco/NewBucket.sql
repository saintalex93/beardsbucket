
-- CREATE USER 'bucket'@'localhost' IDENTIFIED BY '123';
-- GRANT ALL PRIVILEGES ON * . * TO 'bucket'@'localhost';

-- SELECT * FROM mysql.user;

-- select * from INFORMATION_SCHEMA.PROCESSLIST

DROP DATABASE IF EXISTS BUCKET;
CREATE DATABASE BUCKET;
USE BUCKET;


CREATE TABLE EMPRESA (
EMP_COD INT PRIMARY KEY AUTO_INCREMENT,
EMP_NOME_EMPRESA VARCHAR( 200),
EMP_CNPJ VARCHAR(30)
);



CREATE TABLE CONTA (
CNT_COD INT PRIMARY KEY AUTO_INCREMENT,
CNT_NOME VARCHAR(50),
CNT_BANCO VARCHAR(30),
CNT_AGNC VARCHAR(30),
CNT_NMCONTA VARCHAR(30),
CNT_TIPO CHAR(2),
CNT_SALDOINICIAL DOUBLE(10,2),
COD_EMPR INT,
FOREIGN KEY(COD_EMPR) REFERENCES EMPRESA (EMP_COD)
);

CREATE TABLE CLIENTE (
CLI_COD INT PRIMARY KEY AUTO_INCREMENT,
CLI_NOME VARCHAR(100),
CLI_TIPO TINYINT,
CLI_CPF_CNPJ VARCHAR(20),
CLI_TELEFONE VARCHAR(20),
CLI_EMAIL VARCHAR(200),
CLI_BANCO VARCHAR(15),
CLI_AGENCIA VARCHAR(15),
CLI_CONTA VARCHAR(15),
CLI_TIPOCONTA VARCHAR(50)
);



CREATE TABLE USUARIO (
USR_COD INT PRIMARY KEY AUTO_INCREMENT,
USR_SENHA VARCHAR(50),
USR_LOGIN VARCHAR(50) UNIQUE,
USR_NOME VARCHAR( 200),
USR_EMAIL VARCHAR( 200),
USR_PERMISSAO INT,
USR_STATUS TINYINT
);

CREATE TABLE USR_EMPR (
COD_USR_EMPR INT PRIMARY KEY AUTO_INCREMENT,
COD_USR INT,
COD_EMPR INT,
FOREIGN KEY(COD_USR) REFERENCES USUARIO (USR_COD),
FOREIGN KEY(COD_EMPR) REFERENCES EMPRESA (EMP_COD)
);

CREATE TABLE LANCAMENTO (
LCT_COD INT PRIMARY KEY AUTO_INCREMENT,
LCT_DESCRICAO VARCHAR( 200),
LCT_DTCADASTR DATETIME,
LCT_DTPAG DATETIME,
LCT_VLRPAGO DOUBLE(10,2),
LCT_VLRTITULO DOUBLE(10,2),
LCT_JUROSDIA FLOAT,
LCT_NPARC TINYINT,
LCT_STATUSLANC VARCHAR(30),
LCT_TIPO VARCHAR(30),
LCT_FRMPAG VARCHAR(15),
CAT_COD INT,
CLI_COD INT,
CNT_COD INT,
USR_COD INT,
FOREIGN KEY(CLI_COD) REFERENCES CLIENTE (CLI_COD),
FOREIGN KEY(CNT_COD) REFERENCES CONTA (CNT_COD),
FOREIGN KEY(USR_COD) REFERENCES USUARIO (USR_COD)
);



CREATE TABLE CATEGORIA (
CAT_COD INT PRIMARY KEY AUTO_INCREMENT,
CAT_NOME VARCHAR(50),
COD_USR INT,
FOREIGN KEY(COD_USR) REFERENCES USUARIO (USR_COD)
);



ALTER TABLE LANCAMENTO ADD FOREIGN KEY(CAT_COD) REFERENCES CATEGORIA (CAT_COD);


/*---------------------------INSERTS--------------------------------------*/

INSERT INTO USUARIO VALUES
(0, '123', 'bucket', 'Sistema', 'contato@beardsweb.com.br', 1,1),
(0, '123', 'alex', 'Alex Santos', 'alexsantosinformatica@gmail.com', 2,1),
(0, '123', 'rogerio', 'Rogério Santos', 'contato@hotelclubeazuldomar.com.br', 0,1);


insert into CATEGORIA VALUES
(0,"Salário",1),(0,"Transporte",1),(0,"Alimentação",1),(0,"Taxas e Impostos",1),(0,"Serviços",1),
(0,"Convênios",1),(0,"Hospedagem",1),(0,"Compras em Geral",1),(0,"Combustível",1),(0,"Viagens",1),(0,"Saúde",1),(0,"Estudos",1),
(0,"Investimentos",1),(0,"Salário",2),(0,"Transporte",2),(0,"Alimentação",2),(0,"Taxas e Impostos",2),(0,"Contratos",2),
(0,"Convênios",2),(0,"Hospedagem",2),(0,"Estornos",2),(0,"Vendas em Geral",2),(0,"Viagens",2),(0,"Estudos",2),(0,"Investimentos",2);
-- 

INSERT INTO EMPRESA VALUES(0, "Fisa Prestadora de Serviços", "18.176.989/0001-09"),
(0, "Beards Web", "66.666.666/0001-66"), (0, "Albroz Empreendimentos", "07.833-690/0001-09"),
(0, "Pessoal", null);
-- 

-- 
INSERT INTO CONTA VALUES(0, "Fisa Itau", "Itaú", "5607", "00657-3", 1,60000.00,1),
(0, "Beards", "Itaú", "5602", "00127-3", 2, 90000.00,2),
(0, "Albroz BB", "Banco do Brasil", "5602", "00127-3", 1, 90000.00,3),
(0, "Pessoal", "Banco do Brasil", "5612", "00132-3", 1, 1000.00,4);

-- 
INSERT INTO CLIENTE VALUES (0, "SABESP", 1, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(0, "Alex Santos", 2, "399.333.222.22", "(11) 96695-3835", "alexsantosinformatica@gmail.com", "Itaú", "5607", "00657-3", 1);


INSERT INTO LANCAMENTO VALUES (0,'Informática',NOW(),NOW(),150.00,150.00,0.1,0,"Pago","Despesa","Dinheiro",5,1,1,2);


INSERT INTO USR_EMPR VALUES(0,1,2);
-- 
-- INSERT INTO USR_CNT VALUES(0,1,1),(0,2,2),(0,2,1),(0,2,1);
-- 

-- 
-- INSERT INTO LANCAMENTO_CONTA VALUES(0,1,1),(0,2,2),(0,2,1),(0,2,1);


/*
INSERT INTO CATEGORIA VALUES(0,'Mercado','Compras'),(0,'Investimento','Receita'),(0,'Roupas','Consumo'),(0,'Gas','Consumo'),(0,'Agua','Consumo'),(0,'Luz','Consumo');
INSERT INTO USUARIO VALUES(0,'123456','josicleia'),(0,'123456','antunes'),(0,'124556','silsil');
INSERT INTO CLIENTE VALUES (0,'11122233344','ANTUNES JOAQUIM PINTO',NULL,NULL,'1155667788','11988774455','antunes@antunesgigolo.com.br','PF','M','198',1),(0,'11122233345','JOAQUINA DARUELA GRANDE',NULL,NULL,'1155667788','11988774455','JOAQUINA@ADVOGADALEGAL.COM.BR','PF','F','1058',2),(0,'12356987000144','ELETROPAULO','ELETROPAULO','ELETROPAULO','1155667788','11988774455','sac@aeseletropaulo.com.br','PJ',NULL,'15887',3);
INSERT INTO UF VALUES (0,"SP", "São Paulo"), (0, "AC", "Acre"), (0, "AL", "Alagoas"), (0, "AP", "Amapá"), (0, "AM", "Amazonas"), (0, "BA", "Bahia"),
(0, "CE", "Ceará"), (0, "DF	", "Distrito Federal"), (0, "ES", "Espírito Santo"), (0, "GO", "Goiânia"), (0, "MA", "Maranhão"), (0, "MT", "Mato Grosso"), (0, "MS", "Mato Grosso do Sul"), (0, "MG", "Minas Gerais"), (0, "PA", "Pará"),
(0, "PB	", "Paraíba"), (0, "PR", "Paraná"), (0, "PE", "Pernambunco"), (0, "PI", "Piauí"), (0, "RJ", "Rio de Janeiro"), (0, "RN", "Rio Grande do Norte"), (0, "RS", "Rio Grande do Sul"), (0, "RO", "Rondônia"), (0, "RR", "Roraima"), 
(0, "SC", "Santa Catarina"), (0, "SE", "Sergipe"), (0, "TO", "Tocantins");
INSERT INTO ENDERECO VALUES(0,'rua joaquim barros','jardim joaquim','02555898','ao lado do supermercado Anal',1,1),(0,'Rua dos Camileiros','Jardim dos Anos','02578987','ao lado do supermercado Vagi',1,2),(0,'rua Landos Alves','jardim joaquim','87985465','Posto IBE',1,3);
INSERT INTO LANCAMENTO VALUES(0,'QUALQUER COISA',NOW(),NOW(),NOW(),100.5,100.5,5,5,'DEBITO EM CONTA','PAGO','RECEITA',1,1),(0,'Luz',NOW(),'2017-10-25','2017-10-25',80.59,80.59,0,0,'Boleto','Em Aberto','DESPESA',2,2);
INSERT INTO CONTA VALUES (0,'CONTA EMPRESARIAL','BANRISUL','0258-X','10115789-9','PJ',1),(0,'CONTA COMPARTILHADA','BRADESCO','8990','0005789-7','PF',1),(0,'CONTA PESSOAL','ITAU','0387','5699-5','PF',1)


*/
