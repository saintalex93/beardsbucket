<?php 

if( !isset($_SESSION['user']) )
{

    echo "<script>window.location = 'index.htm';</script>";

    exit;
}


$url = basename($_SERVER['PHP_SELF']);

?>

<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/beards.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/beards.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/beards.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta name="theme-color" content="#41a24c">

    <title>Beards Bucket</title>
    
    <!--Temos que trocar o nome do css do login por que esta o nome de style.css-->

    <!-- <link rel="stylesheet" href="css/style.css"> -->



    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">


</head>
<body>


    <div class="wrapper">


        <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

   <div class="sidebar-wrapper">
    <div class="logo">
        <a href="http://www.beardsweb.com.br" class="simple-text" target="_blank">
            Beards Web
        </a>
    </div>

    <ul class="nav">
        <li <?php if($url == 'dashboard.php'){ echo "class = 'active'" ;}?>>
            <a href="dashboard.php">
                <i class="ti-panel"></i>
                <p>Dashboard</p>
            </a>
        </li>

        <li <?php if($url == 'lancamentos.php'){ echo "class = 'active'" ;}?>>
            <a href="lancamentos.php">
                <i class="ti-server"></i>
                <p>Lançamentos</p>
            </a>
        </li>


        <li <?php if($url == 'cadastro.php'){ echo "class = 'active'" ;}?>>
            <a href="cadastro.php">
                <i class="ti-view-list-alt"></i>
                <p>Cadastro</p>
            </a>
        </li>

        <li <?php if($url == 'relatorio.php'){ echo "class = 'active'" ;}?>>
            <a href="relatorio.php">
                <i class="ti-bar-chart"></i>
                <p>Relatório</p>
            </a>
        </li>

        <li <?php if($url == 'usuario.php'){ echo "class = 'active'" ;}?>>
            <a href="usuario.php">
                <i class="ti-user"></i>
                <p>Usuário / Conta</p>
            </a>
        </li>
    </ul>
    
</div>
</div>

<!-- <i class="ti-server"></i> -->


<div class="main-panel">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a class="navbar-brand" href="#">
                <?php
                if($url == 'dashboard.php'){
                 echo "DashBoard" ;
             }
             else if($url == 'usuario.php'){

                echo "Usuário / Conta";
            }
            else if($url == 'cadastro.php'){

                echo "Cadastro";
            }
            // else if($url == 'consulta.php'){

            //     echo "Consulta";
            // }
            else if($url == 'relatorio.php'){

                echo "Relatório";
            }


            else if($url == 'lancamentos.php'){

                echo "Lançamentos";
            }

            ?>


        </a>
    </div>
    <div class="collapse navbar-collapse">



       <ul class="nav navbar-nav navbar-right">



        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="ti-bell"></i>
            <p class="notification"></p>
            <p>Avisos</p>
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><a href="#">Sem Notificações</a></li>
        </ul>
    </li>
    <li class="dropdown">

       <li>

        <a href="src/deslogar.php">
            <i class="ti-shift-right-alt"></i> Logout
        </a>
    </li> 
</li>
</ul>


<ul class="nav navbar-nav navbar-right">
<!--             <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="ti-panel"></i>
                    <p>Stats</p>
                </a>
            </li> -->

            <?php

            $nome = $_SESSION['user']['name'] ;

            $parte = explode(" ", $nome);

            $nomeNovo = $parte[0] . " " . $parte[count($parte)-1];

            ?>

            <li>
                <a href="usuario.php">
                    <i class="fa ti-user"></i>
                    <p>Usuário: <?php echo $nomeNovo ?></p>
                </a>
            </li>

        </ul>

    </div>
</div>
</nav>


<!--




-->

