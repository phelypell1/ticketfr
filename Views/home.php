<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('Location: login.php?erro=1');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FRControl</title>
    <script src="../jquery/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../PageStyle/styleHome.css">
    <script src="../scripts/jquery-3.4.1.js"></script>
    <script lang="javascript">
        $(document).ready(function(){
            function atualiza(){
                $.ajax({
                    url: '../Controllers/get_chamados.php',
                    success: function(data){
                        $('#chamados_aberto').html(data);
                    }
                });
            }
            atualiza();
        });
    </script>
</head>
<body>
    <nav class="cabecalho position-static">
        <div class="dropdown position-menu">
            <img src="../imagens/user.png" class="img dropbtn" alt="">
            <div class="dropdown-content">
                <a href="#"><?=$_SESSION['login']?></a>
                <hr>
                <a href="MeusDados.php">Meus dados</a>
                <hr>
                <a href="#">Alterar senha</a>
                <hr>
                <a href="../Views/logoutHome.php">Logout</a>
            </div>
        </div>
        <a href="home.php" class="logoImg"><img src="../imagens/home-logo.png" class="imagem-logo" alt=""></a>
        <button type="button" class="botao" onclick="window.location='home.php'">Chamados</button>
        <button type="button" class="botao">Equipe</button>
        <input type="search" class="input-form">
        <button class="btnbusca" type="submit"><img src="../imagens/lupa.png" class="lupaconf" alt=""></button>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <h4 class="">Chamados</h4>
                <hr>
            <button type="button" id="btn_aberto" class="btnchamados" onclick="window.location='home.php'">Abertos</button>
            <button type="button" id="btn_fechados" class="btnchamados" onclick="window.location='fechados.php'" >Fechados</button>
            <button type="button" class="btnNovoChamado" onclick="window.location='../Views/chamado.php'"> Novo Chamado</button>
            <hr class="hr1">
            <div class="row">
            <div class="col-md-12 ">
                <h4 class="">Chamados em aberto</h4>
                <hr>
                <div class="list-group" id="chamados_aberto">
                    <hr>
                </div>
            </div>
            </div>
            
            <hr>
            <div class="col-md-12">
                
            <div class="list-group" id="chamados_fechados"></div>
            </div>
        </div>

    </div>
</body>
</html>