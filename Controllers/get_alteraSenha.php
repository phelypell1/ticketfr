<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('location: ../Views/home.php?erro=1');
    }
    require_once('../Connections/Conexao.php');
    $text_nSenha = $_POST['campo_novasenha'];
    $text_cSenha = $_POST['campo_confsenha'];
    $login = $_SESSION['id'];
    if($text_nSenha == '' || $text_cSenha == '' || $login == ''){
        echo'<br>';
        echo'<div class="alert alert-warning" role="alert"><p>Preencha os campos!</p></div>';
        die();
    }
    $ObjDB = new DB();
    $link = $ObjDB -> connecta_mysql();
    if($text_nSenha != $text_cSenha){
        echo'<br>';
        echo'<div class="alert alert-warning" role="alert"><p>Atenção ! senhas não conferem!</p></div>';
    }else{
        $sql="update logins set pass='".$text_nSenha."' where idLogin ='".$login."'";
    if(mysqli_query($link, $sql)){
        echo'<br>';
        echo'<div class="alert alert-primary" role="alert"><p>Senha Alterada com sucesso!</p></div>';
    }else{
       echo'Error'.mysqli_error($link);
    }
    }
    
?>

