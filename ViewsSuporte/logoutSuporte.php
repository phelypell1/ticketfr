<?php
    session_start(); session_destroy();
    unset($_SESSION['login']);
    unset($_SESSION['email']);
    header('Location: ../ViewsSuporte/loginSuporte.php');
?>
