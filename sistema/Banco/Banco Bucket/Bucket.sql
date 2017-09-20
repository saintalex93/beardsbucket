DROP DATABASE IF EXISTS BUCKET;
CREATE DATABASE BUCKET;
USE BUCKET;


CREATE TABLE GRUPO_USR (
GRP_COD INT PRIMARY KEY AUTO_INCREMENT,
GRP_DESC VARCHAR(20),
PERMS_COD INT
);

CREATE TABLE PERMISSAO (
PERMS_COD INT PRIMARY KEY AUTO_INCREMENT,
PERMS_DESC VARCHAR(40 )
);

CREATE TABLE USUARIO (
USR_COD INT PRIMARY KEY AUTO_INCREMENT,
USR_NOME VARCHAR( 200),
USR_EMAIL VARCHAR( 200),
USR_CELULAR VARCHAR( 15),
USR_SENHA VARCHAR(50),
USR_LOGIN VARCHAR(50)
);

CREATE TABLE RECEITA (
RCEI_COD INT PRIMARY KEY AUTO_INCREMENT,
RCEI_DESCRI VARCHAR( 200),
RCEI_DTCADASTR DATETIME,
RCEI_DTRECEB DATETIME,
RCEI_DTVENC DATETIME,
RCEI_VLRRECEBIDO DOUBLE(10,2),
RCEI_VLRTITULO DOUBLE(10,2),
RCEI_JUROSAODIA DOUBLE(4,1),
RCEI_FORPG VARCHAR(30),
RCEI_NPARCELAS TINYINT,
CAT_COD INT
);

CREATE TABLE DESPESA (
DESP_COD INT PRIMARY KEY AUTO_INCREMENT,
DESP_DESCRI VARCHAR( 200),
DESP_DTCADASTR DATETIME,
DESP_DTVENC DATETIME,
DESP_DTPAG DATETIME,
DESP_VLRPAGO DOUBLE(10,2),
DESP_VALRTITULO DOUBLE(10,2),
DESP_JUROSAODIA DOUBLE(4,1),
DESP_NPARCELAS TINYINT,
DESP_FORMPG VARCHAR(30),

CAT_COD INT
);

CREATE TABLE UF (
UF_COD INT PRIMARY KEY AUTO_INCREMENT,
UF_SIGLA CHAR(2),
UF_ESTADO VARCHAR(50)
);

CREATE TABLE PJ (
PJ_COD INT PRIMARY KEY AUTO_INCREMENT,
PJ_CNPJ VARCHAR( 15),
PJ_RAZAO_SOCIAL VARCHAR( 200),
PJ_NOME_FANTASIA VARCHAR( 200),
PJ_NOME_REPRESN VARCHAR( 200),
PJ_TELEFONE VARCHAR( 15),
PJ_TEL_REPRESN VARCHAR( 15)
);

CREATE TABLE PF (
PF_COD INT PRIMARY KEY AUTO_INCREMENT,
PF_SEXO CHAR(4),
PF_CPF VARCHAR( 11),
PF_CEL VARCHAR(15),
PF_NOME VARCHAR(200),
PF_EMAIL VARCHAR(200 ),
PF_TEL VARCHAR( 15)
);

CREATE TABLE PJ_RECEITA (
PJ_RECEITA_CODIGO INT PRIMARY KEY AUTO_INCREMENT,
PJ_COD INT,
RCEI_COD INT,
USUARIO_COD INT,
FOREIGN KEY(PJ_COD) REFERENCES PJ (PJ_COD),
FOREIGN KEY(RCEI_COD) REFERENCES RECEITA (RCEI_COD),
FOREIGN KEY(USUARIO_COD) REFERENCES USUARIO (USR_COD)
);

CREATE TABLE PF_RECEITA (
PF_RECEITA_COD INT PRIMARY KEY AUTO_INCREMENT,
PF_COD INT,
RCEI_COD INT,
USUARIO_COD INT,
FOREIGN KEY(PF_COD) REFERENCES PF (PF_COD),
FOREIGN KEY(RCEI_COD) REFERENCES RECEITA (RCEI_COD),
FOREIGN KEY(USUARIO_COD) REFERENCES USUARIO (USR_COD)
);

CREATE TABLE USUARIO_GRUPO (
USR_GRUPO_COD INT PRIMARY KEY AUTO_INCREMENT,
GRP_COD INT,
USR_COD INT,
FOREIGN KEY(GRP_COD) REFERENCES GRUPO_USR (GRP_COD),
FOREIGN KEY(USR_COD) REFERENCES USUARIO (USR_COD)
);

CREATE TABLE PF_END (
PF_END_COD INT PRIMARY KEY AUTO_INCREMENT,
END_COD INT,
PF_COD INT,
FOREIGN KEY(PF_COD) REFERENCES PF (PF_COD)
);

CREATE TABLE PJ_DESPESA (
PJ_DESPESA_COD INT PRIMARY KEY AUTO_INCREMENT,
PJ_COD INT,
DESP_COD INT,
USUARIO_COD INT,
FOREIGN KEY(PJ_COD) REFERENCES PJ (PJ_COD),
FOREIGN KEY(DESP_COD) REFERENCES DESPESA (DESP_COD),
FOREIGN KEY(USUARIO_COD) REFERENCES USUARIO (USR_COD)
);

CREATE TABLE PJ_END (
PJ_END_COD INT PRIMARY KEY AUTO_INCREMENT,
END_COD INT,
PJ_COD INT,
FOREIGN KEY(PJ_COD) REFERENCES PJ (PJ_COD)
);

CREATE TABLE CATEGORIA (
CAT_COD INT PRIMARY KEY AUTO_INCREMENT,
CAT_NOME VARCHAR(50),
CAT_TIPO VARCHAR(50)
);

CREATE TABLE ENDERECO (
END_COD INT PRIMARY KEY AUTO_INCREMENT,
END_NOME VARCHAR(250),
END_BAIRRO VARCHAR(250),
END_NUM CHAR(8),
END_CEP CHAR(8),
END_COMP VARCHAR(250),
UF_COD INT,
FOREIGN KEY(UF_COD) REFERENCES UF (UF_COD)
);

CREATE TABLE PF_DESPESA (
PF_DESP_COD INT PRIMARY KEY AUTO_INCREMENT,
PF_COD INT,
DESP_COD INT,
USUARIO_COD INT,
FOREIGN KEY(PF_COD) REFERENCES PF (PF_COD),
FOREIGN KEY(DESP_COD) REFERENCES DESPESA (DESP_COD),
FOREIGN KEY(USUARIO_COD) REFERENCES USUARIO (USR_COD)
);

ALTER TABLE GRUPO_USR ADD FOREIGN KEY(PERMS_COD) REFERENCES PERMISSAO (PERMS_COD);
ALTER TABLE RECEITA ADD FOREIGN KEY(CAT_COD) REFERENCES CATEGORIA (CAT_COD);
ALTER TABLE DESPESA ADD FOREIGN KEY(CAT_COD) REFERENCES CATEGORIA (CAT_COD);
ALTER TABLE PF_END ADD FOREIGN KEY(END_COD) REFERENCES ENDERECO (END_COD);
ALTER TABLE PJ_END ADD FOREIGN KEY(END_COD) REFERENCES ENDERECO (END_COD);


-- ------------------------- INSERTS INICIAIS -- -----------------------------------

insert into PERMISSAO values (0,'Administrador'),(0,'Usuario'),(0,'Cliente'),(0,'Outros');
insert into GRUPO_USR values(0,'Gerenciador',1),(0,'Funcionario',1),(0,'Office Boy',4),(0,'Cliente',3),(0,'Auxliar',2);
insert into USUARIO values(0,'Josicleia Antunes','josecleiaantu@gmail.com','1195555-8773','123456','josicleia'),(0,'Antunes','blablalba@blablabla.com.br','11958749654','123456','antunes'),(0,'silvana silva','silsil@gmail.com','11985478966','124556','silsil');
insert into USUARIO_GRUPO values (0,1,1),(0,2,2),(0,3,3);
insert into CATEGORIA values(0,'Mercado','Compras'),(0,'Investimento','Receita'),(0,'Roupas','Consumo'),(0,'Gas','Consumo'),(0,'Agua','Consumo'),(0,'Luz','Consumo');
insert into DESPESA values(0,'Conta de Luz',now(),'2017-10-19','2017-10-19','100.5','100.5','5','0','Boleto',6),(0,'Conta de Agua',now(),'2017-10-20','2017-10-20','100.5','100.5','5','0','Boleto',5),(0,'Mercado',now(),'2017-10-19','2017-10-19','200.00','200.00','0','0','Cartão Debito',1);
insert into RECEITA values(0,'Salario',NOW(),'2017-10-05','2017-10-05',12000.00,12000.00,'5','Credito em Conta',0.0,6),(0,'Servico terceiro','2017-09-19','2017-10-20','2017-10-20','500.00','500.00','5','Credito','0',5),(0,'Sexo com a bunda','2017-09-19',NOW(),'2017-10-19','20000.00','20000.00','0','Credito em Conta','0',1);
insert into PF values(0,'F','12345678900','11950000008','Josicleia Santos','josicleicasantos@gmail.com','1132220987'),(0,'F','12345678900','11950000008','Josicleia Santos','josicleicasantos@gmail.com','1132220987'),(0,'F','12345678900','11950000008','Josicleia Santos','josicleicasantos@gmail.com','1132220987');
insert into PF_DESPESA values(0,1,1,1),(0,2,2,2),(0,3,3,3);
insert into PF_RECEITA values(0,1,1,1),(0,2,2,2),(0,3,3,3);
insert into PJ values(0,'12300400000133','Guanabarando a ruela','Ruelas a venda','Ruelas Perfeitas','1123456789','1123456789'),(0,'12300400000133','Guanabarando a ruela','Ruelas a venda','Ruelas Perfeitas','1123456789','1123456789'),(0,'12300400000133','Guanabarando a ruela','Ruelas a venda','Ruelas Perfeitas','1123456789','1123456789');
insert into PJ_DESPESA values(0,1,1,1),(0,2,2,2),(0,3,3,3);
insert into PJ_RECEITA values(0,1,1,1),(0,2,2,2),(0,3,3,3);

INSERT INTO UF VALUES (0,"SP", "São Paulo"), (0, "AC", "Acre"), (0, "AL", "Alagoas"), (0, "AP", "Amapá"), (0, "AM", "Amazonas"), (0, "BA", "Bahia"),
(0, "CE", "Ceará"), (0, "DF	", "Distrito Federal"), (0, "ES", "Espírito Santo"), (0, "GO", "Goiânia"), (0, "MA", "Maranhão"), (0, "MT", "Mato Grosso"), (0, "MS", "Mato Grosso do Sul"), (0, "MG", "Minas Gerais"), (0, "PA", "Pará"),
(0, "PB	", "Paraíba"), (0, "PR", "Paraná"), (0, "PE", "Pernambunco"), (0, "PI", "Piauí"), (0, "RJ", "Rio de Janeiro"), (0, "RN", "Rio Grande do Norte"), (0, "RS", "Rio Grande do Sul"), (0, "RO", "Rondônia"), (0, "RR", "Roraima"), 
(0, "SC", "Santa Catarina"), (0, "SE", "Sergipe"), (0, "TO", "Tocantins");


insert into ENDERECO values(0,'rua joaquim barros','jardim joaquim','988','02555898','ao lado do supermercado Anal',1),(0,'Rua dos Camileiros','Jardim dos Anos','988','02578987','ao lado do supermercado Vagi',1),(0,'rua Landos Alves','jardim joaquim','8974','87985465','Posto IBE',1);

insert into PF_END values (0,1,1),(0,2,2),(0,3,3);
insert into PJ_END values (0,1,1),(0,2,2),(0,3,3);
-- ------------------------- INSERTS INICIAIS -- -----------------------------------
