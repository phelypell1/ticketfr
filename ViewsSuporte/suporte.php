<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../ViewsSuporte/loginSuporte.php?erro=1');
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
    <script lang="javascript">
        $(document).ready(function() {
            function atualiza() {
                $.ajax({
                    url: '../ControllerSuporte/getListaSuporte.php',
                    success: function(data) {
                        $('#lista_aberta').html(data);
                        

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
                <a href="#"><?= $_SESSION['login'] ?></a>
                <hr>
                <a href="MeusDados.php">Meus dados</a>
                <hr>
                <a href="#">Alterar senha</a>
                <hr>
                <a href="../ViewsSuporte/logoutSuporte.php">Logout</a>
            </div>
        </div>
        <a href="suporte.php" class="logoImg"><img src="../imagens/home-logo.png" class="imagem-logo" alt=""></a>
        <button type="button" class="botao" onclick="window.location='suporte.php'">Chamados</button>
        <button type="button" class="botao">Equipe</button>
        <input type="search" class="input-form">
        <button class="btnbusca" type="submit"><img src="../imagens/lupa.png" class="lupaconf" alt=""></button>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <h4 class="">Chamados</h4>
                <hr>
                <button type="button" id="btn_aberto" class="btnchamados" onclick="window.location='suporte.php'">Chamados em aberto</button>
                <button type="button" id="btn_fechados" class="btnchamados" onclick="window.location='../ViewsSuporte/chamadosFechados.php'">Fechados</button>

                <hr class="hr1">
            </div>

            <hr>
            <div class="col-md-12">
                <br><br>
                <div class="list-group" id="lista_aberta">
                    <div class="list-group" id="chamados_fechados"></div>
                </div>
            </div>

        </div>
</body>

</html>