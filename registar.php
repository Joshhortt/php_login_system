<?php
   require_once 'classes/usuarios.php';
   $u = new Usuario;
   ?>

<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
      <title>Curso de Treinadores</title>
      <link rel="stylesheet" href="css/estilo.css">
   </head>
   <body>
      <div id="corpo-form-Reg">
         <!-- Criar 'div' de toda a area do formulario com um id' próprio -->
         <h1>Formulário de Registo</h1>
         <!-- Criar titulo do formulário-->
         <!-- Criar um formulario com metodo POST (Com o metodo POST enviar password é mais seguro que o metodo GET) -->
         <form method="POST">
            <!-- Criar 6 inputs (nome, telefone, email, password e confirmar senha e 1 para botão de envio de dados) -->
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
            <input type="text" name="telefone" placeholder="Telefone/Telemóvel" maxlength="30">
            <input type="email" name="email" placeholder="Usuário/E-mail" maxlength="40">
            <input type="password" name="senha" placeholder="Senha/Password" maxlength="15">
            <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
            <input type="submit" value="Registar">
            

            <!-- este link não é necessario nesta página
               <a href="registar.php">Ainda não está inscrito?<strong> Registe-se!</strong></a> -->
         </form>
      </div>
      <?php
         // verificar se clicou no botão verifica a existencia de uma array
                    if(isset($_POST['nome']))
                    {
                        $nome = addslashes($_POST['nome']);    // o addslashes' permite impedir hackers de enviar codigo no formulario
                        $telefone = addslashes($_POST['telefone']);
                        $email= addslashes($_POST['email']);
                        $senha= addslashes($_POST['senha']);
                        $confirmarSenha= addslashes($_POST['confSenha']);
         // verificar se está preenchido. Não deixar em branco o empty'
                if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
                {
                    $u->conectar("curso_de_treinadores","localhost","root","");
                    if($u->msgErro == "")  // se está tudo ok
                    {
                        if($senha == $confirmarSenha)
                        {
                            if($u->registar($nome,$telefone,$email,$senha)) // Não pode ficar só assim é preciso ainda encriptar a senha, baralhando-a
                        {
                            ?>
                           <div id="msg-sucesso">  <!-- como temos só uma mensagen de sucesso criamos um id (dentro de uma div em codigo html)-->
                            
                            <a href="index.php"> Registado com sucesso! Faça login para entrar!! </a>
                           </div>
                            <?php
                        }
         
                        else
                        {
                            ?>
                            <div class="msg-erro">   <!-- como temos varias mensagens de erro criamos uma classe (dentro de uma div em codigo html)-->
                            Email ja registado!
                           </div>
                            <?php
                        }  
                    }
                        else
                        {
                            ?>
                            <div class="msg-erro">   <!-- como temos varias mensagens de erro criamos uma classe (dentro de uma div em codigo html)-->
                            Senha e Confirmar senha não correspondem!
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
                        <div class="msg-erro">   <!-- como temos varias mensagens de erro criamos uma classe (dentro de uma div em codigo html)-->
                        Preencha todos os campos!         <!-- ecoa ao utilizador de que é obrigatorio preencher todos os campos -->
                        </div>
                        <?php
                
                }
            };
         
                    ?>
   </body>
</html>