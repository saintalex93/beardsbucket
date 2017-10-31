 <?php
 require "conecta.php";

 if($_GET['funcao'] == 'buscaReceita'){

        $cSql = "SELECT LCT_COD, LCT_DESCRICAO, LCT_DTCADASTR, LCT_DTPAG, LCT_DTVENC,  LCT_VLRPAGO, LCT_VLRTITULO, LCT_JUROSDIA, LCT_NPARC, LCT_STATUSLANC, LCT_TIPO, LCT_FRMPAG, LANCAMENTO.CAT_COD, CLI_COD, CNT_COD, LANCAMENTO.USR_COD, USR_NOME, CATEGORIA.CAT_COD, CAT_NOME, COD_EMPRESA FROM LANCAMENTO  INNER JOIN USUARIO ON LANCAMENTO.USR_COD = USUARIO.USR_COD INNER JOIN CATEGORIA ON LANCAMENTO.CAT_COD=CATEGORIA.CAT_COD  WHERE COD_EMPRESA IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR = $_GET[codUsuario]) AND LCT_DTVENC LIKE '2017-10-30%' AND LCT_TIPO = 'Receita' AND COD_EMPRESA = $_GET[cmbEmpresaSelecao] ";

        $result = mysqli_query($conecta,$cSql);

        $json_array = array();

        while($row = mysqli_fetch_assoc($result)){

                $json_array[] = $row;

        }

        echo json_encode($json_array, JSON_UNESCAPED_UNICODE);
}
else if($_GET['funcao'] == 'buscaDespesa'){

        $cSql = "SELECT LCT_COD, LCT_DESCRICAO, LCT_DTCADASTR, LCT_DTPAG, LCT_DTVENC, LCT_VLRPAGO, LCT_VLRTITULO, LCT_JUROSDIA, LCT_NPARC, LCT_STATUSLANC, LCT_TIPO, LCT_FRMPAG, LANCAMENTO.CAT_COD, CLI_COD, CNT_COD, LANCAMENTO.USR_COD, USR_NOME, CATEGORIA.CAT_COD, CAT_NOME, COD_EMPRESA FROM LANCAMENTO  INNER JOIN USUARIO ON LANCAMENTO.USR_COD = USUARIO.USR_COD INNER JOIN CATEGORIA ON LANCAMENTO.CAT_COD=CATEGORIA.CAT_COD  WHERE COD_EMPRESA IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR = $_GET[codUsuario]) AND LCT_DTVENC LIKE '2017-10-30%' AND LCT_TIPO = 'Despesa' AND COD_EMPRESA = $_GET[cmbEmpresaSelecao] ";

        $result = mysqli_query($conecta,$cSql);

        $json_array = array();

        while($row = mysqli_fetch_assoc($result)){

                $json_array[] = $row;

        }

        echo json_encode($json_array, JSON_UNESCAPED_UNICODE);
}

?>