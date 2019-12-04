<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('location: ../Views/home.php?erro=1');
    }

    require_once('../Connections/Conexao.php');
    $id_login = $_SESSION['id'];

    $ObjDB = new DB();
    $link = $ObjDB -> connecta_mysql();

    $sql = "select t.idChamado, t.tipoMensagem, t.assunto, t.descricao,  DATE_FORMAT(t.date_Cad,'%d-%m-%Y') ";
    $sql.= "as daten , u.login,  t.status_chamado ";
    $sql.= "from Chamados as t join logins as u on (t.idSolicitante = u.idLogin)";
    $sql.="where t.idSolicitante = '".$id_login."'";
    $sql.="and status_chamado != 'Fechado'";
    $sql.="order by date_cad desc";
    
    $resultado = mysqli_query($link, $sql);

    if($resultado){
        while($registro = mysqli_fetch_array($resultado)){
            echo '<a href="#">';
            echo '<form action="" method="post" ';
                echo '<hr class="hr-chamado list-group-item-heading">';
                echo '<small class="date">'.$registro['daten'].'</small>';
                echo '<h4 class="h4-st" name="campo_id" id="h4-reg"> #'.$registro['idChamado'].' :<small>'.$registro['tipoMensagem'].'</small></h4>';
                echo '<p class="assunto list-group-item-text" name="campo_desc"> '.$registro['descricao'].'</p><br>';
                echo '<p class="assunto list-group-item-text">Solicitante. '.$registro['login'].'</p>';
                echo '<small class="status">'.$registro['status_chamado'].'</small>';
                echo '<hr class="hr-chamado">';
                echo '</form>';
                echo '</a>';
        }
    }else{
        echo 'ERROR !'.mysqli_error($link);
    }
?>
