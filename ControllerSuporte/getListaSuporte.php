<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('location: ../ViewsSuporte/suporte.php?erro=1');
    }

    require_once('../Connections/Conexao.php');
    $id_login = $_SESSION['id'];

    $ObjDB = new DB();
    $link = $ObjDB -> connecta_mysql();

    $sql = "select t.idChamado, t.tipoMensagem, t.assunto, t.descricao,  DATE_FORMAT(t.date_Cad,'%d-%m-%Y') as daten , u.login,  t.status_chamado ";
    $sql.= "from Chamados as t join logins as u on (t.idSolicitante = u.idLogin) ";
    $sql.= "where status_chamado ='Aberto' or status_chamado='Aguardando resposta' or status_chamado='Sem material para troca' order by date_cad desc";
    
    $resultado = mysqli_query($link, $sql);
    if($resultado){
        while($registro = mysqli_fetch_array($resultado)){
            $id = $registro['idChamado'];
           echo '<a href= "../ViewsSuporte/AtendeChamado.php?id='.$id.'">';
            echo '<form method="post" action="../ViewsSuporte/AtendeChamado.php"';
                echo '<hr class="hr-chamado list-group-item-heading">';
                echo '<small class="date">'.$registro['daten'].'</small>';
                echo '<h4 class="h4-st" name="campo_id" id="h4-reg"> #'.$registro['idChamado'].'   :<small>'.$registro['assunto'].'</small></h4>';
                echo '<p class="assunto list-group-item-text"> '.$registro['descricao'].'</p><br>';
                echo '<p class="assunto list-group-item-text">Solicitante. '.$registro['login'].'</p>';
                echo '<small class="status">'.$registro['status_chamado'].'</small>';
                echo '<hr class="hr-chamado">';
                echo '</form>';
                echo '</a type="submit">';
           
        }
    }else{
        echo 'ERROR !'.mysqli_error($link);
    }
?>
