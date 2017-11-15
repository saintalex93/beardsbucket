-- ﻿CREATE USER 'bucket'@'localhost' IDENTIFIED BY '123';
	-- GRANT ALL PRIVILEGES ON * . * TO 'bucket'@'localhost';
	-- 
	-- SELECT * FROM mysql.user;
	-- 
-- 	select * from INFORMATION_SCHEMA.PROCESSLIST;

	DROP DATABASE IF EXISTS BUCKET;
	CREATE DATABASE BUCKET;
	USE BUCKET;


	CREATE TABLE EMPRESA (
	EMP_COD INT PRIMARY KEY AUTO_INCREMENT,
	EMP_NOME_EMPRESA VARCHAR(200) NOT NULL,
	EMP_CNPJ VARCHAR(30),
	EMP_STATUS TINYINT
	);

	CREATE TABLE CONTA (
	CNT_COD INT PRIMARY KEY AUTO_INCREMENT,
	CNT_NOME VARCHAR(50) NOT NULL,
	CNT_BANCO VARCHAR(30),
	CNT_AGNC VARCHAR(30),
	CNT_NMCONTA VARCHAR(30),
	CNT_TIPO CHAR(2),
	CNT_STATUS TINYINT,
	CNT_SALDOINICIAL DOUBLE(10,2) NOT NULL,
	COD_EMPR INT NOT NULL,
	FOREIGN KEY(COD_EMPR) REFERENCES EMPRESA (EMP_COD)
	);

	CREATE TABLE CLIENTE (
	CLI_COD INT PRIMARY KEY AUTO_INCREMENT,
	CLI_NOME VARCHAR(100) NOT NULL,
	CLI_TIPO CHAR(2) NOT NULL,
	CLI_CPF_CNPJ VARCHAR(20),
	CLI_TELEFONE VARCHAR(20),
	CLI_EMAIL VARCHAR(200),
	CLI_BANCO VARCHAR(15),
	CLI_AGENCIA VARCHAR(15),
	CLI_CONTA VARCHAR(15),
	CLI_TIPOCONTA CHAR(2),
	CLI_STATUS TINYINT,
	COD_EMPR INT NOT NULL,
	FOREIGN KEY(COD_EMPR) REFERENCES EMPRESA (EMP_COD)
	);



	CREATE TABLE USUARIO (
	USR_COD INT PRIMARY KEY AUTO_INCREMENT,
	USR_SENHA VARCHAR(50),
	USR_LOGIN VARCHAR(50) UNIQUE,
	USR_NOME VARCHAR(200),
	USR_EMAIL VARCHAR(200),
	USR_PERMISSAO TINYINT,
	USR_STATUS TINYINT,
	USR_PONTUACAO INT
	);
	 

	CREATE TABLE USR_EMPR (
	COD_USR_EMPR INT PRIMARY KEY AUTO_INCREMENT,
	COD_USR INT NOT NULL,
	COD_EMPR INT NOT NULL,
	FOREIGN KEY(COD_USR) REFERENCES USUARIO (USR_COD),
	FOREIGN KEY(COD_EMPR) REFERENCES EMPRESA (EMP_COD)
	);

	CREATE TABLE LANCAMENTO (
	LCT_COD INT PRIMARY KEY AUTO_INCREMENT,
	LCT_DESCRICAO VARCHAR(200) NOT NULL,
	LCT_DTCADASTR DATETIME,
	LCT_DTPAG DATETIME ,
    LCT_DTVENC DATETIME,
	LCT_VLRPAGO DOUBLE(10,2),
	LCT_VLRTITULO DOUBLE(10,2),
	LCT_JUROSDIA FLOAT,
	LCT_NPARC TINYINT,
	LCT_STATUSLANC VARCHAR(30),
	LCT_TIPO VARCHAR(30) NOT NULL,
	LCT_FRMPAG VARCHAR(15),
	CAT_COD INT NOT NULL,
	CLI_COD INT NOT NULL,
	CNT_COD INT NOT NULL,
	USR_COD INT NOT NULL,
	FOREIGN KEY(CLI_COD) REFERENCES CLIENTE (CLI_COD),
	FOREIGN KEY(CNT_COD) REFERENCES CONTA (CNT_COD),
	FOREIGN KEY(USR_COD) REFERENCES USUARIO (USR_COD)
	);



	CREATE TABLE CATEGORIA (
	CAT_COD INT PRIMARY KEY AUTO_INCREMENT,
	CAT_NOME VARCHAR(50) NOT NULL,
	CAT_STATUS TINYINT,
	COD_EMPRESA INT NOT NULL,
	FOREIGN KEY(COD_EMPRESA) REFERENCES EMPRESA (EMP_COD)
	);

	ALTER TABLE LANCAMENTO ADD FOREIGN KEY(CAT_COD) REFERENCES CATEGORIA (CAT_COD);
	

	-- ---------------------------INSERTS--------------------------------------/

	INSERT INTO USUARIO VALUES
	(0, '123', 'bucket', 'Sistema', 'contato@beardsweb.com.br', 1,1,0),
	(0, '123', 'alex', 'Alex Santos', 'alexsantosinformatica@gmail.com', 1,1,1000),
	(0, '123', 'rogerio', 'Rogério Santos', 'contato@hotelclubeazuldomar.com.br', 0,1,0),
	(0, '123', 'brazolin', 'José Brazolin', 'brazolin@brazolin.com.br', 1,1,0);
	--

	INSERT INTO EMPRESA VALUES(0, "Fisa Prestadora de Serviços", "18.176.989/0001-09",1),
	(0, "Beards Web", "66.666.666/0001-66",1), (0, "Albroz Empreendimentos", "07.833-690/0001-09",1),
	(0, "Pessoal", null,0); 

	INSERT INTO CONTA VALUES(0, "Fisa Itau", "Itaú", "5607", "00657-3", 'CC',1,60000.00,1),
	(0, "Beards", "Itaú", "5602", "00127-3", 'CP',1, 20000.00,2),
	(0, "Albroz BB", "Banco do Brasil", "5602", "00127-3",'CC',1, 90000.00,3),
	(0, "Pessoal", "Banco do Brasil", "5612", "00132-3", 'CS',1, 1000.00,4);


	INSERT INTO USR_EMPR VALUES(0,1,2);
	INSERT INTO USR_EMPR VALUES(0,2,2);
	INSERT INTO USR_EMPR VALUES(0,3,3);
	INSERT INTO USR_EMPR VALUES(0,2,3);

	INSERT INTO USR_EMPR VALUES(0,4,1);
	INSERT INTO USR_EMPR VALUES(0,4,3);
	-- 

	insert into CATEGORIA VALUES
	(0,"Aluguel",1,1),(0,"Salário",1,1),
    (0,"Transporte",1,1),(0,"Alimentação",1,1),
    (0,"Pessoal",1,1),(0,"Vendas",1,1),
	
    (0,"Aluguel",1,2),(0,"Salário",1,2),
    (0,"Transporte",1,2),(0,"Alimentação",1,2),
    (0,"Pessoal",1,2),(0,"Vendas",1,2),
	
    (0,"Aluguel",1,3),(0,"Salário",1,3),
    (0,"Transporte",1,3),(0,"Alimentação",1,3),
    (0,"Pessoal",1,3),(0,"Vendas",1,3);

	-- 

	-- 
	INSERT INTO CLIENTE VALUES (0, "SABESP", 'PJ', NULL, NULL, NULL, NULL, NULL, NULL, 'CC',1,1),
	(0, "Alex Santos", 'PF', "399.305.222-22", "(11) 96695-3835", "alexsantosinformatica@gmail.com", "Itaú", "5607", "00657-3", 'CP',1,3),
	(0, "Alex Santos", 'PF', "399.123.222-22", "(11) 96695-3835", "alexsantosinformatica@gmail.com", "Itaú", "5607", "00657-3", 'CP',1,4),
	(0, "Alex Santos", 'PF', "399.312.222-22", "(11) 96695-3835", "alexsantosinformatica@gmail.com", "Itaú", "5607", "00657-3", 'CP',1,2);



	INSERT INTO LANCAMENTO VALUES (0,'Aluguel do Hotel',NOW(),NULL, NOW(), NULL,12000.00,1,1,'A Pagar - Receber','Receita','Dinheiro',13,2,3,4);
	INSERT INTO LANCAMENTO VALUES (0,'Salário funcionário',NOW(), NOW(),NOW(), 1000.00,1000.00,0,1,'Pago - Recebido','Despesa','Dinheiro',14,2,3,2);
    
	INSERT INTO LANCAMENTO VALUES (0,'Salário funcionário','2017-10-28',NULL, '2017-10-28', NULL,5000.00,1,1,'A Pagar - Receber','Despesa','Dinheiro',8,4,2,2);
    INSERT INTO LANCAMENTO VALUES (0,'Salário funcionário',NOW(),NULL, NOW(), NULL,5000.00,1,1,'A Pagar - Receber','Despesa','Dinheiro',8,4,2,2);
    
	INSERT INTO LANCAMENTO VALUES (0,'Aluguel escritório',NOW(),NOW(),NOW(), 2000.00,2000.00,0,1,'Pago - Recebido','Despesa','Dinheiro',7,4,2,2);
    
    
	Delimiter //

	CREATE TRIGGER TR_CATEGORIA after INSERT ON EMPRESA
	FOR EACH ROW
	BEGIN
	insert into CATEGORIA VALUES
		(0,"Aluguel",1,new.EMP_COD),(0,"Salário",1,new.EMP_COD),
		(0,"Transporte",1,new.EMP_COD),(0,"Alimentação",1,new.EMP_COD),
		(0,"Pessoal",1,new.EMP_COD),(0,"Vendas",1,new.EMP_COD);
	END //
	delimiter ;
                 
                              
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    