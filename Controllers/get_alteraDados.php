<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('location: home.php?erro=1');
    }

    require_once('../Connections/Conexao.php');
    include('../Views/MeusDados.php');
    
    $text_login = $_POST['campo_login'];
    $text_email = $_POST['campo_email'];
    $login = $_SESSION['id'];

    if($text_login == '' || $text_email == '' || $login == ''){
        die();
    }

    $ObjDB = new DB();
    $link = $ObjDB -> connecta_mysql();

    $sql="update logins set login='".$text_login."', email='".$text_email."' where idLogin ='".$login."'";

    if(mysqli_query($link, $sql)){
        echo'Update ok';
    }else{
       echo'Error'.mysqli_error($link);
    }

?>