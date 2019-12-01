<?php

session_start();                          // verificação que a sessão existe.
 if(!isset($_SESSION['id_usuario']))     // (!isset = negação / verificação que esta logada

{
    header("location: index.php");      // como não esta logada vai ser reencaminhado para a pagina de Login para que faça login
    exit;

}

?>

SEJA BEM VINDO!
<a href="sair.php"> Sair! </a>

