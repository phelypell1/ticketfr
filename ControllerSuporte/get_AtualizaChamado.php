<?php
    session_start();
    if(isset($_SESSION['login'])){
        header('Location: login.php?erro=1');
    }
    require_once('Conexao.php');
    $text_id = $_POST['campo_id'];
    $text_selection = $_POST['campo_selection'];
    $ObjDB = new DB();
    $link = $ObjDB -> connecta_mysql();
    $sql = "update Chamados set status_chamado = 'Fechado' where idChamado = '34'";
    $resusult = mysqli_query($link,$sql);
?>