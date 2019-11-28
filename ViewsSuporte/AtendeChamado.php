<?php
    session_start();
    if(!isset($_SESSION['login'])){
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
        $(document).ready(function(){
            $('#btn_acesso').click(function(){
                if($('#campo_id').val().length > 0 && $('#campo_resolucao').val().length > 0){
                   $.ajax({
                       url: '../ControllerSuporte/SalvaAtendimento.php',
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
                       url: '../ControllerSuporte/get_AtualizaChamado.php',
                       method: 'post',
                       data: $('#formulario_atendimento').serialize(),
                       success: function(data){
                           $('#campo_id').val('');
                           $('#campo_selection').val('');
                           $('#campo_resolucao').val('');
                           alert('Lista de chamados atualizada!');
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
                       url: '../EmaiPhp/email_atende_chamado.php',
                       method: 'post',
                       data: $('#formulario_atendimento').serialize(),
                       success: function(data){
                        alert('Enviado');
                       }
                   });
                }
            });
        });
    </script>
<script language='JavaScript'>
function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}
</script>
</head>
<body>
    <nav class="cabecalho">
        <div class="dropdown position-menu">
            <img src="../imagens/user.png" class="img dropbtn" alt="">
            <div class="dropdown-content">
                <a href="#"><?=$_SESSION['login']?></a>
                <hr>
                <a href="../Cadastros/MeusDados.php">Meus dados</a>
                <hr>
                <a href="../Cadastros/alteraSenha.php">Alterar senha</a>
                <hr>
                <a href="../ViewsSuporte/logoutSuporte.php">Logout</a>
            </div>
        </div>
        <a href="../ViewsSuporte/suporte.php" class="logoImg"><img src="../imagens/home-logo.png" class="imagem-logo" alt=""></a>
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
                <?php
                    require_once('../Connections/Conexao.php');
                    $id_login = $_SESSION['id'];
                    $ObjDB = new DB();
                    $link = $ObjDB -> connecta_mysql();
                    $txt_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                    $sql = "select * from Chamados where idChamado = $txt_id";
                    $resultado = mysqli_query($link, $sql);
                    if($resultado){
                        while($registro = mysqli_fetch_array($resultado)){
                            $email = $registro['email_sol'];
                        }
                    }
                ?>
                <form action="" method="POST" id="formulario_atendimento" >
                    <fieldset class="borderchamado">
                        <div class="form-group col-md-12">
                            <br>
                            <div class="form-group col-md-0">
                            <label for="">ID do atendimento.</label>
                            <input type="text" value="<?php echo $txt_id?>" class="form-control" name="campo_id" id="campo_id" readonly>
                        </div>
                            <label for="">Status Pedido:</label>
                            <select name="campo_selecao" id="campo_selecao" class="form-control">
                                <option value="Selecione">--Selecione--</option>
                                <option value="Fechado">Fechado</option>
                                <option value="Aguardando resposta">Aguardando resposta</option>
                                <option value="Sem material para troca">Sem equipamento para solicitação</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Resposta Atendimento:</label>
                            <textarea name="campo_resolucao" id="campo_resolucao" cols="5" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Email resposta.:</label>
                            <input type="text" value="<?php echo $email?>" class="form-control" name="campo_email" id="campo_email" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="button" class="btn-criar-chamado pull-left" id="btn_acesso">Concluir Chamado</button>
                        </div>
                    </fieldset>
                    <br><br>
                </form>
                </div>
            </div>
        </div>
    </div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>