DROP DATABASE IF EXISTS BUCKET;
CREATE DATABASE BUCKET;
USE BUCKET;

CREATE TABLE USUARIO_GRUPO (
USR_GRUPO_COD INT PRIMARY KEY AUTO_INCREMENT,
GRP_COD INT,
USR_COD INT
);

CREATE TABLE GRUPO_USR (
GRP_COD INT PRIMARY KEY AUTO_INCREMENT,
GRP_DESC VARCHAR(30),
PERMS_COD INT
);

CREATE TABLE PERMISSAO (
PERMS_COD INT PRIMARY KEY AUTO_INCREMENT,
PERMS_DESC VARCHAR(50)
);

CREATE TABLE UF (
UF_COD INT PRIMARY KEY AUTO_INCREMENT,
UF_SIGLA CHAR(2),
UF_ESTADO VARCHAR(50)
);

CREATE TABLE CATEGORIA (
CAT_COD INT PRIMARY KEY AUTO_INCREMENT,
CAT_NOME VARCHAR(50),
CAT_TIPO VARCHAR(50)
);

CREATE TABLE LANCAMENTO (
LCT_COD INT PRIMARY KEY AUTO_INCREMENT,
LCT_DESCRI VARCHAR( 200),
LCT_DTCADASTR DATETIME,
LCT_DTRECEB DATETIME,
LCT_DTPAG DATETIME,
LCT_VLRPAGO DOUBLE(10,2),
LCT_VLRTITULO DOUBLE(10,2),
LCT_JUROSDIA INT,
LCT_NPARC TINYINT,
LCT_FRMPAG VARCHAR(30),
LCT_STATUSLANC VARCHAR(30),
LCT_TIPO VARCHAR(30),
CAT_COD INT,
CLI_COD INT,
FOREIGN KEY(CAT_COD) REFERENCES CATEGORIA (CAT_COD)
);

CREATE TABLE USUARIO (
USR_COD INT PRIMARY KEY AUTO_INCREMENT,
USR_SENHA VARCHAR(50),
USR_LOGIN VARCHAR(50)
);

CREATE TABLE CLIENTE (
CLI_COD INT PRIMARY KEY AUTO_INCREMENT,
CLI_CPF_CNPJ VARCHAR(15),
CLI_NOME VARCHAR(50),
CLI_RZSOCIAL VARCHAR(50),
CLI_NMFANT VARCHAR(50),
CLI_TELEFONE VARCHAR(15),
CLI_CELULAR VARCHAR(15),
CLI_EMAIL VARCHAR( 200),
CLI_TIPO CHAR(2),
CLI_SEXO CHAR(1),
CLI_NUM_END CHAR(8),
USR_COD INT,
FOREIGN KEY(USR_COD) REFERENCES USUARIO (USR_COD)
);

CREATE TABLE ENDERECO (
END_COD INT PRIMARY KEY AUTO_INCREMENT,
END_NOME VARCHAR(250),
END_BAIRRO VARCHAR(250),
END_CEP CHAR(8),
END_COMP VARCHAR(250),
UF_COD INT,
CLI_COD INT,
FOREIGN KEY(UF_COD) REFERENCES UF (UF_COD),
FOREIGN KEY(CLI_COD) REFERENCES CLIENTE (CLI_COD)
);

ALTER TABLE USUARIO_GRUPO ADD FOREIGN KEY(GRP_COD) REFERENCES GRUPO_USR (GRP_COD);
ALTER TABLE USUARIO_GRUPO ADD FOREIGN KEY(USR_COD) REFERENCES USUARIO (USR_COD);
ALTER TABLE GRUPO_USR ADD FOREIGN KEY(PERMS_COD) REFERENCES PERMISSAO (PERMS_COD);
ALTER TABLE LANCAMENTO ADD FOREIGN KEY(CLI_COD) REFERENCES CLIENTE (CLI_COD);

/*---------------------------INSERTS--------------------------------------*/

INSERT INTO CATEGORIA VALUES(0,'Mercado','Compras'),(0,'Investimento','Receita'),(0,'Roupas','Consumo'),(0,'Gas','Consumo'),(0,'Agua','Consumo'),(0,'Luz','Consumo');
INSERT INTO PERMISSAO VALUES (0,'Administrador'),(0,'Usuario'),(0,'Cliente'),(0,'Outros');
INSERT INTO GRUPO_USR VALUES(0,'Gerenciador',1),(0,'Funcionario',1),(0,'Office Boy',4),(0,'Cliente',3),(0,'Auxliar',2);
INSERT INTO USUARIO VALUES(0,'123456','josicleia'),(0,'123456','antunes'),(0,'124556','silsil');
INSERT INTO USUARIO_GRUPO VALUES (0,1,1),(0,2,2),(0,3,3);
INSERT INTO CLIENTE VALUES (0,'11122233344','ANTUNES JOAQUIM PINTO',NULL,NULL,'1155667788','11988774455','antunes@antunesgigolo.com.br','PF','M','198',1),(0,'11122233344','JOAQUINA DARUELA GRANDE',NULL,NULL,'1155667788','11988774455','JOAQUINA@ADVOGADALEGAL.COM.BR','PF','F','1058',2),(0,'12356987000144','ELETROPAULO','ELETROPAULO','ELETROPAULO','1155667788','11988774455','sac@aeseletropaulo.com.br','PJ',NULL,'15887',3);
INSERT INTO UF VALUES (0,"SP", "São Paulo"), (0, "AC", "Acre"), (0, "AL", "Alagoas"), (0, "AP", "Amapá"), (0, "AM", "Amazonas"), (0, "BA", "Bahia"),
(0, "CE", "Ceará"), (0, "DF	", "Distrito Federal"), (0, "ES", "Espírito Santo"), (0, "GO", "Goiânia"), (0, "MA", "Maranhão"), (0, "MT", "Mato Grosso"), (0, "MS", "Mato Grosso do Sul"), (0, "MG", "Minas Gerais"), (0, "PA", "Pará"),
(0, "PB	", "Paraíba"), (0, "PR", "Paraná"), (0, "PE", "Pernambunco"), (0, "PI", "Piauí"), (0, "RJ", "Rio de Janeiro"), (0, "RN", "Rio Grande do Norte"), (0, "RS", "Rio Grande do Sul"), (0, "RO", "Rondônia"), (0, "RR", "Roraima"), 
(0, "SC", "Santa Catarina"), (0, "SE", "Sergipe"), (0, "TO", "Tocantins");
<<<<<<< HEAD
INSERT INTO ENDERECO VALUES(0,'rua joaquim barros','jardim joaquim','988','02555898','ao lado do supermercado Anal',1,1),(0,'Rua dos Camileiros','Jardim dos Anos','988','02578987','ao lado do supermercado Vagi',1,2),(0,'rua Landos Alves','jardim joaquim','8974','87985465','Posto IBE',1,3);
INSERT INTO LANCAMENTO VALUES(0,'QUALQUER COISA',NOW(),NOW(),NOW(),100.5,100.5,5,5,'DEBITO EM CONTA','PAGO',1,1),(0,'Luz',NOW(),'2017-10-25','2017-10-25',80.59,80.59,0,0,'Boleto','Em Aberto',2,2);




select LCT_COD CODIGO, LCT_DESCRI DESCRICAO, LCT_DTCADASTR DATA, LCT_VLRPAGO VALOR, LCT_FRMPAG PAGAMENTO FROM LANCAMENTO WHERE LCT_DTCADASTR BETWEEN '2017-09-25' AND '2017-09-26' ;
=======
INSERT INTO ENDERECO VALUES(0,'rua joaquim barros','jardim joaquim','02555898','ao lado do supermercado Anal',1,1),(0,'Rua dos Camileiros','Jardim dos Anos','02578987','ao lado do supermercado Vagi',1,2),(0,'rua Landos Alves','jardim joaquim','87985465','Posto IBE',1,3);
INSERT INTO LANCAMENTO VALUES(0,'QUALQUER COISA',NOW(),NOW(),NOW(),100.5,100.5,5,5,'DEBITO EM CONTA','PAGO','RECEITA',1,1),(0,'Luz',NOW(),'2017-10-25','2017-10-25',80.59,80.59,0,0,'Boleto','Em Aberto','DESPESA',2,2);
>>>>>>> 2ce473b906d0cffb527f669014b98fd3c6d235cc
