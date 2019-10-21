<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('location: home.php?erro=1');
    }

    require_once('../Connections/Conexao.php');
    $id_login = $_SESSION['id'];

    $ObjDB = new DB();
    $link = $ObjDB -> connecta_mysql();

    $sql ="select login, pass, email from logins where idLogin ='".$id_login."'";
    
    $resultado = mysqli_query($link, $sql);

    if($resultado){
        while($registro = mysqli_fetch_array($resultado)){
            echo '<a href= "">';
            echo '<method="POST"';
                echo '<hr class="hr-chamado list-group-item-heading">';
                echo '<input type="text" value="'.$registro['login'].'"/>';
               
                
                echo '</a>';
           
        }
    }else{
        echo 'ERROR !'.mysqli_error($link);
    }
?>
