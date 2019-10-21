<?php
    session_start();

    if(isset($_SESSION['login'])){
        header('Location: ../ViewsSuporte/loginSuporte.php?erro=1');
    }
    require_once('../Connections/Conexao.php');
    $text_id = $_POST['campo_id'];
    $text_selection = $_POST['campo_selection'];
    $text_descricao = $_POST['campo_resolucao'];
    if($text_descricao == '' || $text_id ==''){
        die();
    }
    $ObjDB = new DB();
    $link = $ObjDB -> connecta_mysql();

    $sql = "insert into historico_chamados(chamadoId, resposta, data_resposta) values('$text_id', '$text_descricao', DEFAULT)";
    mysqli_query($link,$sql);
?>