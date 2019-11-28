<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('location: home.php?erro=1');
    }
    require_once('../Connections/Conexao.php');
    $id_login = $_SESSION['id'];
    $login = $_POST['campo_login'];
    $email = $_POST['campo_email'];
    $ObjDB = new DB();
    $link = $ObjDB -> connecta_mysql();
    $sql ="update logins set login='".$login."', email='".$email."'  where idLogin ='".$id_login."'";

    if($login == '' || $email == ''){
        echo'<a class="alert-warning"> Atenção os campo Usuário e email não podem estar em branco !</a>';
        die();
    }
    if(mysqli_query($link, $sql)){
        echo'<a class="alert-success">Sucesso ! foi atualizado.</a>';
    }else{
        echo mysqli_error($link);
    }
?>