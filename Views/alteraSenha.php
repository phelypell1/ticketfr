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
    <div class="container col-md-3">
    <br><br>
        <div class="row">
            
        <form method="POST" id="formulario_Chamado" class=" col-md-12 alteraSenha">
        <fieldset class="borderchamado">
                        <div class="form-group">
                            <br>
                            <?php
                            require_once('../Connections/Conexao.php');
                            $id_login = $_SESSION['id'];
                            $ObjDB = new DB();
                            $link = $ObjDB->connecta_mysql();
                            $sql = "select login, pass, email from logins where idLogin ='" . $id_login . "'";
                            $resultado = mysqli_query($link, $sql);
                            if ($resultado) {
                                while ($registro = mysqli_fetch_array($resultado)) {
                                    echo '<div class="form-group col-md-12">';
                                    echo '<label for="">Senha Antiga:</label>';
                                    echo '<input type="password" value="'.$registro['pass'].'" readonly="true"  class="form-control" id="campo_senha" name="campo_senha">';
                                    echo '</div>';
                                }
                            }
                            ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Nova Senha.:</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Confirmar Senha.:</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary col-md-12">Alterar</button>
                                <br>
                                <br>
                            </div>
                        
        </fieldset>
                </form>

    </div>
</body>
</html>