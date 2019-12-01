<?php

session_start();    // iniciar a sessão
unset($_SESSION['id_usuario']);   // destroi a sessão (unset' é o contrario de isset')
header("location: index.php");    // vai reedirecionar para a pagina de inicio
?>