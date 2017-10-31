-- JOIN PARA JUNTAR USUSARIO, EMPRESA CONTA. 
select * from CONTA INNER JOIN EMPRESA ON EMPRESA.EMP_COD = CONTA.COD_EMPR INNER JOIN USR_EMPR ON
 EMPRESA.EMP_COD = USR_EMPR.COD_EMPR INNER JOIN USUARIO ON USUARIO.USR_COD = USR_EMPR.COD_USR;
 
-- JOIN PARA JUNTAR EMPRESA DE USUARIOS COM CLAUSULA WHERE 
 SELECT EMP_COD, EMP_NOME_EMPRESA, EMP_CNPJ FROM USUARIO INNER JOIN USR_EMPR ON USUARIO.USR_COD = USR_EMPR.COD_USR INNER JOIN EMPRESA ON EMPRESA.EMP_COD = USR_EMPR.COD_EMPR WHERE COD_USR = 2;

-- JOIN PARA JUNTAR TODAS AS CONTAS DAS EMPRESAS NO QUAL O USUARIO FAZ PARTE 
SELECT CNT_COD, CNT_NOME, CNT_BANCO, CNT_AGNC, CNT_NMCONTA, CNT_TIPO, CNT_TIPO, CNT_SALDOINICIAL, EMP_NOME_EMPRESA  FROM CONTA INNER JOIN
EMPRESA ON EMPRESA.EMP_COD = CONTA.COD_EMPR INNER JOIN USR_EMPR ON USR_EMPR.COD_EMPR = EMPRESA.EMP_COD WHERE COD_USR = 2;

 -- JOIN NÃO FUNCIONA 

select * from USUARIO INNER JOIN USR_EMPR ON USR_EMPR.COD_USR = USUARIO.USR_COD;

SELECT * FROM USUARIO
WHERE USR_COD IN ( SELECT COD_USR FROM USR_EMPR);


SELECT DISTINCT USR_COD, USR_NOME, USR_LOGIN, USR_PERMISSAO FROM USR_EMPR INNER JOIN USUARIO ON USUARIO.USR_COD = USR_EMPR.COD_USR WHERE
 COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR = 2);

-- 
select * from USUARIO;
SELECT * FROM USR_EMPR;


SELECT EMP_COD, EMP_NOME_EMPRESA, EMP_CNPJ,
IF(EMP_STATUS = 1,REPLACE( EMP_STATUS,1,'Ativo'),REPLACE( EMP_STATUS,0,'Inativo')) from EMPRESA;


SELECT * FROM EMPRESA;
SELECT EMP_COD, EMP_NOME_EMPRESA, EMP_CNPJ,
                        IF(EMP_STATUS = 1,REPLACE( EMP_STATUS,1,'Ativo'),REPLACE( EMP_STATUS,2,'Inativo')) as EMP_STATUS 
                        FROM USUARIO JOIN USR_EMPR ON USR_COD = COD_USR INNER JOIN EMPRESA ON EMP_COD = COD_EMPR WHERE EMP_COD = 1;
                        
            
--             
-- INSERT INTO CONTA VALUES (0,'teste','Itaubis','1234','123','CC',12000,'1',1) 
-- INSERT INTO CONTA VALUES(0, "Fisa Itau", "Itaú", "5607", "00657-3", 'CC',0,60000.00,1)     ; 
-- 
-- desc CONTA;

select * from CONTA;


SELECT CNT_COD, CNT_NOME, CNT_BANCO, CNT_AGNC, CNT_NMCONTA, CNT_TIPO, CNT_TIPO, CNT_SALDOINICIAL, EMP_NOME_EMPRESA, IF(CNT_STATUS = 1,REPLACE( CNT_STATUS,1,'Ativo'),REPLACE( CNT_STATUS,0,'Inativo')) as CNT_STATUS  FROM CONTA INNER JOIN
                EMPRESA ON EMPRESA.EMP_COD = CONTA.COD_EMPR INNER JOIN USR_EMPR ON USR_EMPR.COD_EMPR = EMPRESA.EMP_COD;
                
                
SELECT * FROM CONTA;

SELECT CNT_COD, CNT_NOME, CNT_BANCO, CNT_AGNC, CNT_NMCONTA, CNT_TIPO, CNT_TIPO, CNT_SALDOINICIAL, EMP_NOME_EMPRESA  FROM CONTA INNER JOIN
		EMPRESA ON EMPRESA.EMP_COD = CONTA.COD_EMPR INNER JOIN USR_EMPR ON USR_EMPR.COD_EMPR = EMPRESA.EMP_COD WHERE COD_USR = 2 order by CNT_COD;
        

SELECT DISTINCT CNT_COD, CNT_NOME, CNT_BANCO, CNT_AGNC, CNT_NMCONTA, CNT_TIPO, CNT_TIPO, CNT_SALDOINICIAL, EMP_COD,EMP_NOME_EMPRESA, IF(CNT_STATUS = 1,REPLACE( CNT_STATUS,1,'Ativo'),REPLACE( CNT_STATUS,0,'Inativo')) as CNT_STATUS  FROM CONTA INNER JOIN
                EMPRESA ON EMPRESA.EMP_COD = CONTA.COD_EMPR INNER JOIN USR_EMPR ON USR_EMPR.COD_EMPR = EMPRESA.EMP_COD WHERE CNT_COD =  2;
                
                


SELECT DISTINCT CAT_NOME,CAT_COD, CAT_STATUS, EMP_NOME_EMPRESA  FROM EMPRESA JOIN CATEGORIA ON COD_EMPRESA = EMP_COD AND EMP_COD IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR = 4);



		




SELECT DISTINCT USR_COD,COD_EMPR,EMP_NOME_EMPRESA, USR_NOME, USR_LOGIN, USR_PERMISSAO, USR_EMAIL, USR_SENHA, IF(USR_STATUS = 1,REPLACE( USR_STATUS,1,'Ativo'),REPLACE( USR_STATUS,0,'Inativo')) as USR_STATUS, 
		IF(USR_PERMISSAO = 0, REPLACE(0, USR_PERMISSAO, 'Usuário'), REPLACE(USR_PERMISSAO, 1, 'Administrador')) as USR_PERMISSAO FROM USR_EMPR INNER JOIN USUARIO ON 
		USUARIO.USR_COD = USR_EMPR.COD_USR join EMPRESA on COD_EMPR = EMP_COD WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR = 3)
        ;
        
        
        SELECT DISTINCT USR_COD, USR_NOME, USR_STATUS, EMP_NOME_EMPRESA FROM USR_EMPR INNER JOIN USUARIO ON 
		USUARIO.USR_COD = USR_EMPR.COD_USR left join EMPRESA on COD_EMPR = EMP_COD WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR = 2) and USR_STATUS != 0;
        
		
    
SELECT DISTINCT USR_LOGIN, USR_COD, USR_NOME, USR_PERMISSAO, USR_EMAIL, IF(USR_STATUS = 1,REPLACE( USR_STATUS,1,'Ativo'),REPLACE( USR_STATUS,0,'Inativo')) as USR_STATUS, 
		IF(USR_PERMISSAO = 0, REPLACE(USR_PERMISSAO, 0, 'Usuário'), REPLACE(USR_PERMISSAO, 1, 'Administrador')) as USR_PERMISSAO FROM USR_EMPR INNER JOIN USUARIO ON 
		USUARIO.USR_COD = USR_EMPR.COD_USR WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR = 2) and USR_STATUS != "Inativo"  ;
        
        
        
        select * from CATEGORIA right join EMPRESA on EMP_COD = COD_EMPRESA;
        
        
        
        SELECT DISTINCT EMP_COD, EMP_NOME_EMPRESA, USR_COD, USR_NOME FROM EMPRESA
        INNER JOIN USR_EMPR ON EMP_COD IN (SELECT DISTINCT COD_EMPR FROM USR_EMPR WHERE COD_USR = 2) LEFT JOIN USUARIO ON COD_USR =1
        ;




SELECT EMP_COD, EMP_NOME_EMPRESA, EMP_CNPJ FROM USUARIO INNER JOIN USR_EMPR ON USUARIO.USR_COD = USR_EMPR.COD_USR INNER JOIN
EMPRESA ON EMPRESA.EMP_COD = USR_EMPR.COD_EMPR WHERE COD_USR = 2 order by (EMP_NOME_EMPRESA) asc;


SELECT * FROM EMPRESA LEFT JOIN USR_EMPR ON EMP_COD IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR = 2);




SELECT * FROM USR_EMPR;

SELECT * FROM USUARIO;



SELECT EMP_COD, EMP_NOME_EMPRESA EMPRESA, COD_USR, COD_USR_EMPR FROM EMPRESA LEFT JOIN USR_EMPR ON COD_EMPR = EMP_COD and COD_USR = 3 
WHERE EMP_COD IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR = 2);




SELECT * FROM USR_EMPR;

SELECT DISTINCT CLI_NOME,CLI_COD FROM CLIENTE INNER JOIN EMPRESA ON COD_EMPR = EMP_COD WHERE EMP_COD = 1;

select * from CLIENTE;

select CNT_COD, CNT_NOME from CONTA where COD_EMPR = 1 and CNT_STATUS = 1 order by (CNT_NOME) asc;



select CAT_COD, CAT_NOME from CATEGORIA where COD_EMPRESA = 1 and CAT_STATUS = 1 order by (CAT_NOME) asc;



SELECT CLI_COD, CLI_NOME FROM CLIENTE;

select * from CLIENTE;

SELECT DISTINCT CAT_NOME,EMP_COD,CAT_COD, CAT_STATUS, EMP_NOME_EMPRESA, 
IF(CAT_STATUS = 1,REPLACE(CAT_STATUS,1,'Ativo'),REPLACE(CAT_STATUS,0,'Inativo')) as CAT_STATUSDESC 
 FROM EMPRESA JOIN CATEGORIA ON COD_EMPRESA = EMP_COD where CAT_COD = 47;
 
 
 
 
 

 
 
SELECT * FROM EMPRESA WHERE EMP_COD IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR = 2);

 


INSERT INTO CLIENTE VALUES (0, '$_GET[cadCliFornName]', 'PF', '115558779', '$_GET[cadCliFornTel]', '$_GET[cadCliFornEmail]','Bradesco','1158','1158855','CC', 1,1);

SELECT DISTINCT CLI_NOME, CLI_TIPO,CLI_CPF_CNPJ,CLI_TELEFONE,CLI_CONTA,CLI_EMAIL,CLI_BANCO,CLI_AGENCIA,CLI_TIPOCONTA,IF(CLI_STATUS = 1,REPLACE( CLI_STATUS,1,'Ativo'),REPLACE( CLI_STATUS,0,'Inativo')) as CLI_STATUS,EMP_COD,EMP_NOME_EMPRESA FROM CLIENTE INNER JOIN EMPRESA ON EMP_COD = COD_EMPR WHERE EMP_COD = 2;
SELECT DISTINCT CLI_NOME, CLI_COD ,CLI_TIPO, CLI_CPF_CNPJ,CLI_TELEFONE,CLI_EMAIL,CLI_BANCO,CLI_AGENCIA,CLI_CONTA,CLI_TIPOCONTA,IF(CLI_STATUS = 1,REPLACE( CLI_STATUS,1,'Ativo'),REPLACE( CLI_STATUS,0,'Inativo')) as CLI_STATUS,EMP_COD,EMP_NOME_EMPRESA FROM CLIENTE INNER JOIN EMPRESA ON EMP_COD = COD_EMPR WHERE EMP_COD = 3;
;


SELECT DISTINCT USR_COD,COD_EMPR,EMP_NOME_EMPRESA, USR_NOME, USR_LOGIN, USR_PERMISSAO, USR_EMAIL, USR_SENHA, IF(USR_STATUS = 1,REPLACE( USR_STATUS,1,'Ativo'),REPLACE( USR_STATUS,0,'Inativo')) as USR_STATUS, 
		IF(USR_PERMISSAO = 0, REPLACE(0, USR_PERMISSAO, 'Usuário'), REPLACE(USR_PERMISSAO, 1, 'Administrador')) as USR_PERMISSAO FROM USR_EMPR INNER JOIN USUARIO ON 
		USUARIO.USR_COD = USR_EMPR.COD_USR join EMPRESA on COD_EMPR = EMP_COD WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR = 2) and USR_COD = 2;
			


        ;
        SELECT DISTINCT CLI_NOME,CLI_COD,CLI_TIPO,CLI_CPF_CNPJ,CLI_TELEFONE,CLI_EMAIL,CLI_BANCO,CLI_AGENCIA,CLI_CONTA,CLI_TIPOCONTA,IF(CLI_STATUS = 1,REPLACE( CLI_STATUS,1,'Ativo'),REPLACE( CLI_STATUS,0,'Inativo')) as CLI_STATUSDESC,CLI_STATUS,EMP_COD,EMP_NOME_EMPRESA FROM CLIENTE INNER JOIN EMPRESA ON EMP_COD = COD_EMPR WHERE CAT_COD = 47;
        
        
        
        

SELECT * FROM LANCAMENTO ;

SELECT LANCAMENTO.*, USR_NOME, CATEGORIA.CAT_COD, CAT_NOME, COD_EMPRESA FROM LANCAMENTO INNER JOIN USUARIO ON LANCAMENTO.USR_COD = USUARIO.USR_COD INNER JOIN CATEGORIA ON LANCAMENTO.CAT_COD=CATEGORIA.CAT_COD;

SELECT LCT_COD, LCT_DESCRICAO, LCT_DTCADASTR, LCT_DTPAG, LCT_DTVENC, CONCAT('R$ ',format(LCT_VLRPAGO,2,'de_DE')) AS LCT_VLRPAGO, 
CONCAT('R$ ',format(LCT_VLRTITULO,2,'de_DE')) AS LCT_VLRTITULO, LCT_JUROSDIA, LCT_NPARC, LCT_STATUSLANC, LCT_TIPO, LCT_FRMPAG,
 LANCAMENTO.CAT_COD, CLI_COD, CNT_COD, LANCAMENTO.USR_COD, USR_NOME, CATEGORIA.CAT_COD, CAT_NOME, COD_EMPRESA FROM LANCAMENTO
 INNER JOIN USUARIO ON LANCAMENTO.USR_COD = USUARIO.USR_COD INNER JOIN CATEGORIA ON LANCAMENTO.CAT_COD=CATEGORIA.CAT_COD INNER JOIN;


SELECT * FROM EMPRESA;







SELECT
LCT_COD, LCT_DESCRICAO, LCT_DTCADASTR, LCT_DTPAG, LCT_DTVENC, CONCAT('R$ ',format(LCT_VLRPAGO,2,'de_DE')) AS LCT_VLRPAGO,
 CONCAT('R$ ',format(LCT_VLRTITULO,2,'de_DE')) AS LCT_VLRTITULO, LCT_JUROSDIA, LCT_NPARC, LCT_STATUSLANC, LCT_TIPO, LCT_FRMPAG, 
 LANCAMENTO.CAT_COD, CLI_COD, CNT_COD, LANCAMENTO.USR_COD, USR_NOME, CATEGORIA.CAT_COD, CAT_NOME, COD_EMPRESA, EMP_NOME_EMPRESA 
 FROM LANCAMENTO INNER JOIN USUARIO ON LANCAMENTO.USR_COD = USUARIO.USR_COD 
 INNER JOIN CATEGORIA ON LANCAMENTO.CAT_COD=CATEGORIA.CAT_COD INNER JOIN EMPRESA ON COD_EMPRESA = EMP_COD WHERE COD_EMPRESA IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR = 2) AND LCT_DTVENC LIKE '2017-10-27%';
 
 

SELECT
LCT_COD, LCT_DESCRICAO, LCT_DTCADASTR, DATE_FORMAT(LCT_DTPAG, '%d/%m/%Y') as LCT_DTPAG, DATE_FORMAT(LCT_DTVENC, '%d/%m/%Y') as LCT_DTVENC, CONCAT('R$ ',format(LCT_VLRPAGO,2,'de_DE')) AS LCT_VLRPAGO, 
CONCAT('R$ ',format(LCT_VLRTITULO,2,'de_DE')) AS LCT_VLRTITULO, LCT_JUROSDIA, LCT_NPARC, LCT_STATUSLANC, LCT_TIPO, LCT_FRMPAG, 
LANCAMENTO.CAT_COD, CLI_COD, CNT_COD, LANCAMENTO.USR_COD, USR_NOME, CATEGORIA.CAT_COD, CAT_NOME, COD_EMPRESA, EMP_NOME_EMPRESA
 FROM LANCAMENTO INNER JOIN USUARIO ON LANCAMENTO.USR_COD = USUARIO.USR_COD 
 INNER JOIN CATEGORIA ON LANCAMENTO.CAT_COD=CATEGORIA.CAT_COD INNER JOIN EMPRESA ON COD_EMPRESA = EMP_COD WHERE COD_EMPRESA = 2 AND 
 DATE_FORMAT(LCT_DTVENC, '%Y-%m-d')  BETWEEN DATE_FORMAT('2017-12-01', '%Y-%m-d') AND DATE_FORMAT('2017-12-01', '%Y-%m-d');
 

 SELECT (SELECT SUM(LCT_VLRTITULO) from LANCAMENTO INNER JOIN CONTA ON LANCAMENTO.CNT_COD = CONTA.CNT_COD 
 INNER JOIN EMPRESA ON EMP_COD = COD_EMPR  WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR =2) AND LCT_TIPO = 
 'Receita' AND LCT_STATUSLANC ='A Pagar - Receber' AND COD_EMPR = 2   AND  DATE_FORMAT(LCT_DTVENC, '%Y-%m-d')
 BETWEEN DATE_FORMAT('2017-10-01', '%Y-%m-d') AND DATE_FORMAT('2017-10-31', '%Y-%m-d')) AS RECEITA, 
 (SELECT SUM(LCT_VLRTITULO) from LANCAMENTO  INNER JOIN CONTA ON LANCAMENTO.CNT_COD = CONTA.CNT_COD INNER JOIN EMPRESA 
 ON EMP_COD = COD_EMPR  WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR =2) AND LCT_TIPO = 'Despesa' AND 
 LCT_STATUSLANC ='A Pagar - Receber' AND COD_EMPR = 2 AND DATE_FORMAT(LCT_DTVENC, '%Y-%m-d') BETWEEN DATE_FORMAT('2017-10-01', '%Y-%m-d')
 AND DATE_FORMAT('2017-10-31', '%Y-%m-d')) AS DESPESA, (SELECT SUM(CNT_SALDOINICIAL) FROM CONTA WHERE COD_EMPR =2) AS CAIXA;
 
  SELECT (SELECT SUM(LCT_VLRTITULO) from LANCAMENTO INNER JOIN CONTA ON LANCAMENTO.CNT_COD = CONTA.CNT_COD 
 INNER JOIN EMPRESA ON EMP_COD = COD_EMPR  WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR =2) AND LCT_TIPO = 
 'Receita' AND LCT_STATUSLANC ='A Pagar - Receber' AND  DATE_FORMAT(LCT_DTVENC, '%Y-%m-d')
 BETWEEN DATE_FORMAT('2017-10-01', '%Y-%m-d') AND DATE_FORMAT('2017-10-31', '%Y-%m-d')) AS RECEITA, 
 (SELECT SUM(LCT_VLRTITULO) from LANCAMENTO  INNER JOIN CONTA ON LANCAMENTO.CNT_COD = CONTA.CNT_COD INNER JOIN EMPRESA 
 ON EMP_COD = COD_EMPR  WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR =2) AND LCT_TIPO = 'Despesa' AND 
 LCT_STATUSLANC ='A Pagar - Receber' AND DATE_FORMAT(LCT_DTVENC, '%Y-%m-d') BETWEEN DATE_FORMAT('2017-10-01', '%Y-%m-d')
 AND DATE_FORMAT('2017-10-31', '%Y-%m-d')) AS DESPESA, (SELECT SUM(CNT_SALDOINICIAL) FROM CONTA WHERE COD_EMPR IN 
 (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR =2)) AS CAIXA;
 
 
 
 
 
 SELECT SUM(CNT_SALDOINICIAL)FROM CONTA WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR =2);
 
 
 SELECT LCT_VLRPAGO FROM LANCAMENTO  INNER JOIN USUARIO 
 ON LANCAMENTO.USR_COD = USUARIO.USR_COD INNER JOIN CATEGORIA ON LANCAMENTO.CAT_COD=CATEGORIA.CAT_COD  
 WHERE COD_EMPRESA IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR = 2) AND LCT_DTVENC
 LIKE '2017-10-31%' AND LCT_TIPO = 'Despesa' AND COD_EMPRESA = 3 
 