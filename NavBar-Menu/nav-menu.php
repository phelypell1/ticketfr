<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('Location: login.php?erro=1');
    }
    header("Refresh:240");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FRControl</title>
    <script src="../jquery/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../PageStyle/styleHome.css">
    <script src="../scripts/jquery-3.4.1.js"></script>
</head>
<body>
    <nav class="cabecalho position-static">
        <div class="dropdown position-menu">
            <img src="../imagens/user.png" class="img dropbtn" alt="">
            <div class="dropdown-content">
                <a href="#"><?=$_SESSION['login']?></a>
                <hr>
                <a href="../CadastrosH/MeusDados.php">Meus dados</a>
                <hr>
                <a href="../CadastrosH/alteraSenha.php">Alterar senha</a>
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
</body>
</html>