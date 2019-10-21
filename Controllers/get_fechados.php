<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('location: ../Views/home.php?erro=1');
    }
    require_once('../Connections/Conexao.php');
    

    $ObjDB = new DB();
    $link = $ObjDB -> connecta_mysql();

    $sql = "select t.idChamado, t.tipoMensagem, t.assunto, t.descricao,  DATE_FORMAT(t.date_Cad,'%d-%m-%Y') as daten , u.login,  t.status_chamado ";
    $sql.= "from Chamados as t join logins as u on (t.idSolicitante = u.idLogin) ";
    $sql.= "where status_chamado = 'Fechado' and t.idSolicitante =".$_SESSION['id']." order by status_chamado desc ";
    
    
    $resultado = mysqli_query($link, $sql);
    if($resultado){
        while($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            echo '<a href="#" class="btn_conversa">';
                echo '<hr class="hr-chamado list-group-item-heading">';
                echo '<small class="date">'.$registro['daten'].'</small>';
                echo '<h4 class="h4-st"> #'.$registro['idChamado'].' :<small>'.$registro['assunto'].'</small></h4>';
                echo '<p class="assunto list-group-item-text"> '.$registro['descricao'].'</p>';
                echo '<small class="status">'.$registro['status_chamado'].'</small>';
                echo '<hr class="hr-chamado">';
            echo '</a>';
        }
    }else{
        echo 'ERROR ! <br>'.mysqli_error($link);
    }
?>