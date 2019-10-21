<?php
    //sempre iniciar o session;

    session_start();
      require_once('../Connections/Conexao.php');
      $usuario = $_POST['login'];
      $passwords = $_POST['senha'];

      $ObjDB = new DB();
      $link = $ObjDB -> connecta_mysql();

      $sql = "select idLogin, login, email, ehAtivo, nivel_acesso from logins where login='$usuario'  and pass='$passwords' and ehAtivo = '1'";
      
      $result = mysqli_query($link, $sql);

      if($result){
         $dados = mysqli_fetch_array($result);
         if(isset($dados['login'])){
             
            $_SESSION['id'] = $dados['idLogin'];
            $_SESSION['login'] = $dados['login'];
            $_SESSION['email'] = $dados['email'];
            $_SESSION['ehAtivo'] = $dados['ehAtivo'];
            $_SESSION['nivel']  = $dados['nivel_acesso'];

             header('location: ../Views/home.php');
         
            if($_SESSION['nivel'] == 'Suporte'){
            header('location: ../ViewsSuporte/suporte.php');
            }

         }else{
             header('location: ../Views/login.php?erro=1');
         }
      }else{
          echo 'ERROR ! Contate o suporte';
      }
?>
