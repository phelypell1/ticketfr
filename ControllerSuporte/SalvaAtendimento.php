
<?php
    session_start();
    if(isset($_SESSION['login'])){
        header('Location: ../ViewsSuporte/AtendeChamado.php?erro=1');
    }
    require_once('../Connections/Conexao.php');
    $text_id = $_POST['campo_id'];
    $text_descricao = $_POST['campo_resolucao'];
    $ids = $_SESSION['id'];
    if($text_descricao == '' || $text_id =='' || $ids==''){
        die();
    }
    $ObjDB = new DB();
    $link = $ObjDB -> connecta_mysql();
    
    $sql ="insert into historico_chamados(chamadoId, resposta, data_resposta, id_Atendente)values('$text_id','$text_descricao', DEFAULT, $ids)"; 

    mysqli_query($link,$sql);
?>