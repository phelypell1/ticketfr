<?php
    session_start();
    if(isset($_SESSION['login'])){
        header('Location: ../ViewsSuporte/loginSuporte.php?erro=1');
    }
    require_once('../Connections/Conexao.php');
    $text_id = $_POST['campo_id'];
    $text_selection = $_POST['campo_selecao'];
    $ObjDB = new DB();
    $link = $ObjDB -> connecta_mysql();
    $sql = "update Chamados set status_chamado = '".$text_selection."' where idChamado = '".$text_id."'";
    $resusult = mysqli_query($link,$sql);
?>