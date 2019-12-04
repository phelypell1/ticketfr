<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../Views/login.php?erro=1');
}
$cad = isset($_GET['status']) ? $_GET['status'] : 0;
header("Refresh:240");
$email = $_SESSION['email'];
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
    <!--<script lang="javascript">
        $(document).ready(function(){
            $('#btn_acesso').click(function(){
                if($('#campo_selection').val().length > 0 && $('#campo_assuntos').val().length > 0 && $('#campo_descricao').val().length > 0){
                   $.ajax({
                       url: '../Controllers/solicitaChamado.php',
                       method: 'post',
                       data: $('#formulario_Chamado').serialize(),
                       success: function(data){
                           $('#campo_selection').val('');
                           $('#campo_assuntos').val('');
                           $('#campo_descricao').val('');
                            alert('Enviando...');
                       }
                   });
                }
            });
        });
    </script>-->
    <script lang="javascript">
    $(document).ready(function(){
        $('#btn_acesso').click(function(){
            $.ajax({
                url: '../EmaiPhp/envia_email.php',
                method: 'post',
                data: $('#formulario_Chamado').serialize(),
                success: function(data){
                    alert('Chamado realizado com sucesso !');
                }
            });
        });
    });
    </script>
</head>

<body>
    <nav class="cabecalho">
        <div class="dropdown position-menu fixed-top">
            <img src="../imagens/user.png" class="img dropbtn" alt="">
            <div class="dropdown-content">
                <a href="#"><?= $_SESSION['login'] ?></a>
                <hr>
                <a href="../CadastrosH/MeusDados.php">Meus dados</a>
                <hr>
                <a href="../CadastrosH/alteraSenha.php">Alterar senha</a>
                <hr>
                <a href="../Views/logoutHome.php">Logout</a>
            </div>
        </div>
        <a href="home.php" class="logoImg"><img src="../imagens/home-logo.png" class="imagem-logo" alt=""></a>
        <button type="button" class="botao">Chamados</button>
        <button type="button" class="botao">Equipe</button>
        <input type="search" class="input-form">
        <button class="btnbusca" type="submit"><img src="../imagens/lupa.png" class="lupaconf" alt=""></button>
    </nav>
    <div class="container">
        <div class="row">

            <div class="col-md-12 ">

                <h4 class="">Novo Chamado</h4>
                <hr>
                <br>
                <form method="POST" id="formulario_Chamado" action="../Controllers/solicitaChamado.php">
                    <fieldset class="borderchamado">
                    <?php
                        if ($cad == 1) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                   <strong>ATENÇÃO!</strong> Sua Solicitação foi enviada. <br> Fique atendo ao seu email, sua resposta
                   chegará por lá. Agora e só aguardar =)
                   <button id="myAlert" type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>';
                        } elseif ($cad == 2) {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>ATENÇÃO!</strong> ERROR!
                   <button id="myAlert" type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>';
                        } elseif ($cad == 3) {
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Opssssss !</strong>Cadê o e-mail ? vá em "Meus Dados" e acrescente seu e-mail
                    <button id="myAlert" type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                        }
                        ?>
                        <div class="form-group col-md-12">
                            <label for="">Tipo de mensagem:</label>
                            <select name="campo_selection" id="campo_selection" class="form-control inputs-l">
                                <option value="Selecione">--Selecione--</option>
                                <option value="Solicita reparo">Solicitação reparo</option>
                                <option value="Solicitação Suporte">Solicitação Suporte</option>
                                <option value="Solicitação troca">Solicitação troca</option>
                                <option value="Solicitação materias">Solicitação materias</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Assunto:</label>
                            <input type="text" class="form-control inputs-l" id="campo_assuntos" name="campo_assuntos">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Descrição:</label>
                            <textarea name="campo_descricao" id="campo_descricao" cols="3" rows="2" class="form-control inputs-l"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Email:</label>
                            <input name="campo_email" id="campo_email" class="form-control inputs-l" value="<?echo$email?>" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <a href="#" class="btn btn-default fileinput-button inputs-l">
                                <span class="glyphicon glyphicon-paperclip">Enviar arquivos</span>
                                <input type="file" class="fileinput-button">
                            </a>
                            <button type="submit" class="btn-criar-chamado pull-right" id="btn_acesso">Criar Chamado</button>
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