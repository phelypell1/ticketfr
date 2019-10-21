<?php
    session_start();

    if(isset($_SESSION['login'])){
        header('Location: ../Views/login.php?erro=1');
    }

    require_once('../Connections/Conexao.php');
    
    $text_selection = $_POST['campo_selection'];
    $text_assunto = $_POST['campo_assuntos'];
    $text_descricao = $_POST['campo_descricao'];
    $login = $_SESSION['id'];

    if($text_assunto == '' || $text_descricao == '' || $login == ''){
        die();
    }

    $ObjDB = new DB();
    $link = $ObjDB -> connecta_mysql();

    $sql = "insert into Chamados(tipoMensagem, assunto, descricao, idSolicitante) values('$text_selection', '$text_assunto',
    '$text_descricao', $login)";

    mysqli_query($link,$sql);

?>