<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('Location: ../Views/login.php?erro=1');
    }
    $cad = isset($_GET['ok']) ? $_GET['ok'] : 0;
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
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../PageStyle/styleHome.css">
    <script>
        function alertas(){
            $('#myAlert').on('closed.bs.alert',function(){
                //do something...
            });
            }
    </script>
    <script lang="javascript">
        $(document).ready(function(){
            $('#btn_acesso').click(function(){
                if($('#campo_selection').val().length > 0 && $('#campo_assuntos').val().length > 0 && $('#campo_descricao').val().length > 0){
                   $.ajax({
                       url: '../Controllers/solicitaChamado.php',
                       method: 'post',
                       data: $('#formulario_Chamado').serialize(),
                       success: function(data){
                           $('#campo_selection').val('testando');
                           $('#campo_assuntos').val('');
                           $('#campo_descricao').val('');
                            alert('Enviado com sucesso !');
                       }
                   });
                }
            });
        });
    </script>

    <script lang="javascript">
    $(document).ready(function(){
        $('#btn_acesso').click(function(){
            $.ajax({
                url: '../EmaiPhp/enviar_email.php',
                method: 'post',
                data: $('#formulario_Chamado').serialize(),
                success: function(data){
                    alert('Email enviado');
                }
            });
        });
    });
    </script>
</head>
<body>
    <nav class="cabecalho">
        <div class="dropdown position-menu">
            <img src="../imagens/user.png" class="img dropbtn" alt="">
            <div class="dropdown-content">
                <a href="#"><?=$_SESSION['login']?></a>
                <hr>
                <a href="#">Meus dados</a>
                <hr>
                <a href="#">Alterar senha</a>
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
            <?php
               if($cad == 1){
                   echo' <div class="alert alert-success alert-dismissible fade show" role="alert">
                   <strong>ATENÇÃO!</strong> Sua Solicitação foi enviada com sucesso!
                   <button id="myAlert" type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>';
                }
            ?>
                <h4 class="">Novo Chamado</h4>
                <hr>
                <br>
                <form method="POST" id="formulario_Chamado" action="../EmaiPhp/envia_email.php">
                    <fieldset class="borderchamado">
                        <div class="form-group col-md-12">
                            <br>
                            <label for="">Tipo de mensagem:</label>
                            <select name="campo_selection" id="campo_selection" class="form-control">
                                <option value="Selecione">--Selecione--</option>
                                <option value="Solicita reparo">Solicitação reparo</option>
                                <option value="Solicitação Suporte">Solicitação Suporte</option>
                                <option value="Solicitação troca">Solicitação troca</option>
                                <option value="Solicitação materias">Solicitação materias</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Assunto:</label>
                            <input type="text" class="form-control" id="campo_assuntos" name="campo_assuntos">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Descrição:</label>
                            <textarea name="campo_descricao" id="campo_descricao" cols="5" rows="3" class="form-control"></textarea>
                        </div> 
                        <div class="form-group col-md-12">
                            <a href="#" class="btn btn-default fileinput-button">
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
