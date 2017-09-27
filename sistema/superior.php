<?php 


session_start();

if( !isset($_SESSION['user']) )
{
    header("Location: index.html");

    exit;
}


$url = basename($_SERVER['PHP_SELF']);

?>

<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/faces/beards.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/faces/beards.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

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
        <a href="http://www.beardsweb.com.br" class="simple-text">
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

        <li <?php if($url == 'financas.php'){ echo "class = 'active'" ;}?>>
            <a href="financas.php">
                <i class="ti-server"></i>
                <p>Finanças</p>
            </a>
        </li>


        <li <?php if($url == 'cadastro.php'){ echo "class = 'active'" ;}?>>
            <a href="cadastro.php">
                <i class="ti-view-list-alt"></i>
                <p>Cadastro</p>
            </a>
        </li>
<!--         <li <?php if($url == 'consulta.php'){ echo "class = 'active'" ;}?>>
            <a href="consulta.php">
                <i class="ti-files"></i>
                <p>Consulta</p>
            </a>
        </li> -->

        <li <?php if($url == 'relatorio.php'){ echo "class = 'active'" ;}?>>
            <a href="relatorio.php">
                <i class="ti-bar-chart"></i>
                <p>Relatório</p>
            </a>
        </li>

        <li <?php if($url == 'usuario.php'){ echo "class = 'active'" ;}?>>
            <a href="usuario.php">
                <i class="ti-user"></i>
                <p>Usuário</p>
            </a>
        </li>
        
        <li <?php if($url == 'notifications.php'){ echo "class = 'active'" ;}?>>
            <a href="notifications.php">
                <i class="ti-bell"></i>
                <p>Notifications</p>
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

                echo "Usuário";
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
            else if($url == 'chat.php'){

                echo "Chat";
            }

            else if($url == 'notifications.php'){

                echo "Notifications";
            }

            else if($url == 'financas.php'){

                echo "Finanças";
            }

            ?>


        </a>
    </div>
    <div class="collapse navbar-collapse">



     <ul class="nav navbar-nav navbar-right">



        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="ti-bell"></i>
            <p class="notification">5</p>
            <p>Avisos</p>
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><a href="#">Notification 1</a></li>
            <li><a href="#">Notification 2</a></li>
            <li><a href="#">Notification 3</a></li>
            <li><a href="#">Notification 4</a></li>
            <li><a href="#">Another notification</a></li>
        </ul>
    </li>
    <li class="dropdown">

     <li>
        
        <a href="sair.php">
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

            <li>
                <a href="usuario.php">
                    <i class="fa ti-user"></i>
                    <p>Usuário: <?php echo $_SESSION['user']['name'] ?></p>
                </a>
            </li>

        </ul>

    </div>
</div>
</nav>


<!--




-->



