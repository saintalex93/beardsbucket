
<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript">
        function exibearquivo(){
            var arquivo = new FileReader();
                arquivo.onloadend = function(){
                    document.getElementById('imgperfil').src = arquivo.result;
                };
            if (document.all.fotoperfil.files[0]) {
                arquivo.readAsDataURL(document.all.fotoperfil.files[0]);
                document.getElementById('imgperfil').style.display = 'block';
            }else{
                document.getElementById('imgperfil').style.display = 'none';
            }    
        }

        function ajaximg(){
            var oPagina = new XMLHttpRequest();
            with(oPagina){

                open('GET', 'http://localhost/DSI/section/cadastroconteudo.php');

                send();

                
                onload = function(){

                    
                    var oDados = JSON.parse(responseText);      

                    
                }


    }


    </script>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>

        *{margin: 0;
        padding: 0;
        box-sizing: border-box;
        
    }
        
        l{
            float: left;
        }
        
        
        .direita{
            float: left;
            width: 60%;
            //background: pink;
         overflow: hidden;
            padding: 0 5%;
            
        }
        
        
        .direita img{
            margin: 0 auto;
            width: 100%;
        }
        
        .direita h1{
            
        }
        
        .direita p{
            text-align: justify;
        }
        
        .esquerda{
            float: left;
            width: 40%;
            height: 50%;
            
            overflow: hidden;
            text-align: center;
            
        }
        .esquerda img{
            width: 80%;
            height: 50%;
            margin-left: 15%;
        }
       
        .esquerda h1{
            padding: 5% 5%;
        }
        
        .esquerda p{
            padding: 5% 5%;
        }
        
        .caixa{
            width: 100%;
            height: 200px;
            background-color: aqua;
            padding: 5%;
            margin-top: 15px;
        }
        
        
        .caixa img{
            width: 15%;
            float: left;
            margin-bottom: 10px;
        }
         .caixa h3{
            width: 80%;
             float: left;
             padding-left: 5%;
            
             
        }
         .caixa p{
            clear: both;
        }
        
        .espaco{
            
            width: 100%;
           background-color: rgba(0,0,0,0.5);
            height: 80px;
            
        }
        iframe{
            float: right;
        }
        
        .tudo{
            clear: both;
            margin-top: 30px;
        }
        
    </style>
</head>

<body>

<div class="espaco">
<iframe src="iframe2.php" frameborder="0">
    
    
</iframe>
</div>
<div class="tudo">
<div class="esquerda">
    <form action="cadastroconteudo.php" method="POST" enctype="multipart/form-data" target="gravabostagem">
        <img src="X" alt="" name="imgperfil" id="imgperfil" onerror="this.style.display = 'none'"><br>
            <input type="text" name="autor" id="autor"><br><br>
            <textarea name="textperfil" id="textperfil"></textarea><br>

            <button name="buttonperfil" id="buttonperfil">Incluir midia</button><br><br>
            <input type="file" name="fotoperfil" id="fotoperfil" onchange="exibearquivo()">
            <br><br>
    </form>
  <!-- <a href="cadastro.php"> <button>Cadastrar</button></a> -->
    <iframe name="gravabostagem"></iframe>
</div>


<div class="direita">
    <div class="imagemTopo">
        <img src="imgG.jpg" alt="">
        
        

            <h1>Texto</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi numquam, ut dolore illo ducimus at atque nesciunt? Reiciendis blanditiis nulla dolores, accusamus adipisci fugiat tempora. Enim quisquam laboriosam optio modi!</p>
    </div>
    
    <div class="caixa">
        <img src="perfilP1.jpg" alt="" class="l">
        <h3 class="l">Nome</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, saepe enim possimus libero veritatis dolores, ullam accusantium eaque.</p>
        
    </div>
    
    <div class="caixa">
        <img src="perfilP2.jpg" alt="">
        <h3>Nome</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, saepe enim possimus libero veritatis dolores, ullam accusantium eaque.</p>
        
    </div>
    
</div>
</div>
</body>


</html>
