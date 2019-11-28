<?php
require_once("../NavBar-Menu/nav-menu.php");

$logado = $_SESSION['login'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <script src="../jquery/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../PageStyle/styleHome.css">
    <link rel="stylesheet" href="../PageStyle/inputs.css">
    <script src="../scripts/jquery-3.4.1.js"></script>
</head>

<body>
    <!--Código php para buscar valores no DB referente ao dados do historico de chamados-->
    <?php
    include_once('../Connections/Conexao.php');
    $ObjDB = new DB();
    $link = $ObjDB->connecta_mysql();
    $txt_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $sql = "select h.idHistorico, h.chamadoId, h.resposta, DATE_FORMAT(h.data_resposta,'%d-%m-%Y %H:%i:%s') as dat, l.login from historico_chamados as h
                    inner join logins as l on l.idLogin = id_atendente
                    where chamadoId = '" . $txt_id . "'";
    $resultado = mysqli_query($link, $sql);
    if ($resultado) {
        while ($registros = mysqli_fetch_array($resultado)) {
            $id_h = $registros['idHistorico'];
            $id = $registros['chamadoId'];
            $resposta = $registros['resposta'];
            $data = $registros['dat'];
            $login = $registros['login'];
        }
    } else {
        echo "error" . mysqli_error($link);
    }
    ?>
    <!-- Código para buscar valores da tabela Chamados.-->
    <?php
    include_once('../Connections/Conexao.php');

    $ObjDB = new DB();
    $link = $ObjDB->connecta_mysql();

    $txt_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $sql = "select c.idChamado, c.tipoMensagem, c.assunto, c.descricao, DATE_FORMAT(c.date_Cad,'%d-%m-%Y') as daten, s.login, c.status_chamado
                    from Chamados as c
                    inner join logins as s on c.idSolicitante = idLogin
                    where idChamado ='" . $txt_id . "'";

    $resultado = mysqli_query($link, $sql);
    if ($resultado) {
        while ($registros = mysqli_fetch_array($resultado)) {
            $id = $registros['idChamado'];
            $tipo_m = $registros['tipoMensagem'];
            $assunto = $registros['assunto'];
            $descricao = $registros['descricao'];
            $data_cad = $registros['daten'];
            $id_sol = $registros['login'];
            $status = $registros['status_chamado'];
        }
    } else {
        echo "error" . mysqli_error($link);
    }
    ?>
    <!-- Daqui pra baixo estaŕa presente as tags para a pagina HTML E CSS-->
    <div class="container">
        <div class="menu-lateral">
            <div class="retangular">
                <p>Ticket Informações</p>
                <div class="text-left">
                    <label for="" class=""># <? echo $id ?></label>
                    <hr class="hr">
                    <label for="">Solitante.: <? echo $id_sol ?></label>
                    <hr class="hr">
                    <label for="">Data: <? echo $data_cad ?></label>
                    <hr class="hr">
                    <label for="">Status.:<? echo $status ?></label>
                </div>

            </div>
            <div class="retangular1">
                <p>Outros</p>
                <a href="../Views/home.php" class="btn btn-warning col-md-12 btn-estilo">Sair</a>
            </div>
        </div>
        <div class="painel">
            <div class="nav-painel">
                <a><img src="../imagens/user.png" alt="" class="img-possiton"></a>
                <h5 class="possiton-h5"><? echo $logado ?></h5>

                <fieldset class="fieldset">
                    <hr>
                    <div class="position-s">
                        <p>Atendente: <? echo $login ?></p>
                    </div>
                    <div class="position-a">
                        <p>Cód Atendimento: #<? echo $id_h ?></p>
                    </div>
                    <div class="row a">
                        <p>Resposta: <? echo $resposta ?></p>
                        <div class="b">
                            <p>Data: <? echo $data_cad ?></p>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <h5>Descrição Chamado:</h5>
                    <div class="position-s">
                        <label for="">Solicitante: <? echo $id_sol ?></label>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="form-group">
                                <label for="">Tipo: <? echo $tipo_m ?></label>
                                <label for="">Descrição: <? echo $descricao ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="d">
                        <label for="">Data solicitação: <? echo $data ?></label>
                        <label for="">Status: <? echo $status ?></label>
                </fieldset>
            </div>

        </div>
    </div>
    </div>
</body>

</html>