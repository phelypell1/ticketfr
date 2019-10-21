<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('Location: login.php?erro=1');
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
    <script src="jquery/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../PageStyle/styleHome.css">
    <script lang="javascript">
        $(document).ready(function(){
            $('#btn_acesso').click(function(){
                if($('#campo_id').val().length > 0 && $('#campo_resolucao').val().length > 0){
                   $.ajax({
                       url: 'SalvaAtendimento.php',
                       method: 'post',
                       data: $('#formulario_atendimento').serialize(),
                       success: function(data){
                       }
                   });
                }
            });
        });
    </script>
      <script lang="javascript">
        $(document).ready(function(){
            $('#btn_acesso').click(function(){
                if($('#campo_id').val().length > 0 && $('#campo_resolucao').val().length > 0){
                   $.ajax({
                       url: 'atualizaChamado.php',
                       method: 'post',
                       data: $('#formulario_atendimento').serialize(),
                       success: function(data){
                           $('#campo_id').val('');
                           $('#campo_selection').val('');
                           $('#campo_resolucao').val('');
                        alert('Atualizado!');
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
                <a href="#"><?=$_SESSION['login']?></a>
                <hr>
                <a href="#">Meus dados</a>
                <hr>
                <a href="#">Alterar senha</a>
                <hr>
                <a href="logout.php">Logout</a>
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
                <h4 class="">Concluir Chamados</h4>
                <hr>
                <br>
                <form method="POST" id="formulario_atendimento">
                    <fieldset class="borderchamado">
                        <div class="form-group col-md-12">

                            <br>
                            <div class="form-group col-md-0">
                            <label for="">Informe ID do atendimento.</label>
                            <input type="text" class="form-control" id="campo_id" name="campo_id">
                        </div>
                            <label for="">Status Pedido:</label>
                            <select name="campo_selection" id="campo_selection" class="form-control">
                                <option value="Selecione">--Selecione--</option>
                                <option value="Solicita reparo">Fechado</option>
                                <option value="Solicitação Suporte">Aguardando resposta</option>
                                <option value="Solicitação troca">Sem equipamento para solicitação</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Resposta Atendimento:</label>
                            <textarea name="campo_resolucao" id="campo_resolucao" cols="5" rows="3" class="form-control"></textarea>
                        </div> 
                       
                            <button type="button" class="btn-criar-chamado pull-right" id="btn_acesso">Criar Chamado</button>
                        </div>
                        <br><br>
                    </fieldset>
                </form>
                </div>
            </div>
        </div>
    </div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>