<?php

session_start();                          // verificação que a sessão existe.
 if(!isset($_SESSION['id_usuario']))     // (!isset = negação / verificação que esta logada

{
    header("location: index.php");      // como não esta logada vai ser reencaminhado para a pagina de Login para que faça login
    exit;

}

?>
<link rel="stylesheet" href="css/estilo.css">
<div id="benvindo">   <!-- como temos varias mensagens de erro criamos uma classe (dentro de uma div em codigo html)-->
 <h1>Seja Bem Vindo!</h1><br>
 <p>Obrigado por preencher o nosso formulário! Analisaremos o seu registo. Enviamos um e-mail com o código da sua pré-inscrição para endereço de e-mail que você forneceu.</p><br>
<a href="sair.php"><strong> Sair!</strong></a></a>
</div>

