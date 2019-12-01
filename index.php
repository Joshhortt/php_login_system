<?php
  require_once 'classes/usuarios.php';
  $u = new Usuario;
?>


<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
        <title>Curso de Treinadores</title>
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <div id="corpo-form">
            <!-- Criar Div de toda a area do formulario com um id próprio. A 'div' fecha depois de fechar a 'form' -->
            <h1>Entrar</h1>
            <!-- Criar titulo do formulário-->
            <!-- Criar um formulario com metodo POST (enviar password é mais seguro que o GET) -->
            <form method="POST">
                <!-- Criar 3 inputs (1 para o login, 1 para password, 1 para botão de envio de dados) -->
                <input type="email" name="email" placeholder="Usuário/E-mail">
                <input type="password" name="senha" placeholder="Senha/Password">
                <input type="submit" value="Aceder">
                <a href="registar.php">Ainda não está inscrito?<strong> Registe-se!</strong></a>  <!-- link-->
            </form>
        </div>
 

<?php 

if(isset($_POST['email']))
{
    
   
    $email= addslashes($_POST['email']);
    $senha= addslashes($_POST['senha']);
  
if(!empty($email) && !empty($senha))
{
    $u->conectar("curso_de_treinadores","localhost","root","");
            if($u->msgErro == "")
        {
            if($u->logar($email, $senha))
            {
                header("location: areaPrivada.php");  // header vai encaminhar para a area privada
            }
           else
           {
                ?>
                <div class="msg-erro">
                Email e/ou Senha estão incorretos!
                </div>
                <?php
           }
       }
       else  
       {
        ?>
        <div class="msg-erro">
       <?php echo "Erro: ".$u->msgErro;?>
        </div>
        <?php
           
       }

}else
{
    ?>
    <div class="msg-erro">
    Preencha todos os campos!
    </div>
    <?php
   
}  
}

    ?>

  </body>
 </html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               