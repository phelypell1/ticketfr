<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../ViewsSuporte/loginSuporte.php?erro=1');
}
$cad = isset($_GET['ok']) ? $_GET['ok'] : 0;
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
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../PageStyle/styleHome.css">

    <script lang="javascript">
        $(document).ready(function() {
            $('#btnEnvia').click(function() {
                if ($('#campo_login').val().length > 0 && $('#campo_email').val().length > 0) {
                    $.ajax({
                        url: '../Controllers/get_alteraDados.php',
                        method: 'post',
                        data: $('#meusDados').serialize(),
                        success: function(data) {
                            $('#campo_login').val;
                            $('#campo_senha').val;
                            $('#campo_email').val;
                            alert('Atualizado com sucesso !');
                        }
                    });
                }
            });
        });
    </script>
</head>
<body>
    <nav class="cabecalho">
        <div class="dropdown position-menu">
            <img src="../imagens/user.png" class="img dropbtn" alt="">
            <div class="dropdown-content">
                <a href="#"><?= $_SESSION['login'] ?></a>
                <hr>
                <!--<a href="#">Meus dados</a>
                <hr>-->
                <a href="../Cadastros/alteraSenha.php">Alterar senha</a>
                <hr>
                <a href="../Views/logoutHome.php">Logout</a>
            </div>
        </div>
        <a href="../ViewsSuporte/suporte.php" class="logoImg"><img src="../imagens/home-logo.png" class="imagem-logo" alt=""></a>
        <button type="button" class="botao" onclick="window.location='../ViewsSuporte/suporte.php'">Chamados</button>
        <button type="button" class="botao">Equipe</button>
        <input type="search" class="input-form">
        <button class="btnbusca" type="submit"><img src="../imagens/lupa.png" class="lupaconf" alt=""></button>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <h4 class="">Meus Dados</h4>
                <hr>
                <br>
                <form method="POST" id="meusDados" action="">
                    <fieldset class="borderchamado">
                        <div class="form-group col-md-12">
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
                                    echo '<label for="">Nome:</label>';
                                    echo '<input type="text" value="'.$registro['login'].'" class="form-control" id="campo_login" name="campo_login">';
                                    echo '</div>';
                                    echo '<div class="form-group col-md-12">';
                                    echo '<label for="">Senha:</label>';
                                    echo '<input type="password" value="'.$registro['pass'].'" readonly="true"  class="form-control" id="campo_senha" name="campo_senha">';
                                    echo '</div>';
                                    echo '<div class="form-group col-md-12">';
                                    echo '<label for="">Email:</label>';
                                    echo '<input name="campo_email" value="'.$registro['email'].'" id="campo_email" class="form-control">';
                                    echo '</div>';
                                }
                            }
                            ?>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="button" class="btn btn-primary" id="btnEnvia">Alterar</button>
                            </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>