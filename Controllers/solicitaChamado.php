<?php
    session_start();

    if(isset($_SESSION['login'])){
        header('Location: ../Views/login.php?erro=1');
    }

    require_once('../Connections/Conexao.php');
    
    $text_selection = $_POST['campo_selection'];
    $text_assunto = $_POST['campo_assuntos'];
    $text_descricao = $_POST['campo_descricao'];
    $txt_email = $_POST['campo_email'];
    $login = $_SESSION['id'];
    $email = $_SESSION['email'];
    $nome = $_SESSION['login'];


    if($text_selection =='' || $text_assunto == '' || $text_descricao == '' || $login == '' || $txt_email==''){
        header('location: ../Views/chamado.php?status=3');
        die();
    }

    $ObjDB = new DB();
    $link = $ObjDB -> connecta_mysql();

    $sql = "insert into Chamados(tipoMensagem, assunto, descricao, idSolicitante, email_sol) 
    values('$text_selection', '$text_assunto','$text_descricao', '$login', '$txt_email')";

    if(mysqli_query($link,$sql)){
        header('location: ../Views/chamado.php?status=1');
        echo 'ok';
    }else{
        header('location: ../Views/chamado.php?status=2');
        mysqli_error($link);
    }

?>