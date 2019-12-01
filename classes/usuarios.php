<?php

Class Usuario  #  Classe criada vai ter 3 funçoes/metodos
{


 private $pdo;
 public $msgErro = "";  // tudo ok (variavel publica que inicia em vazio)

# 1. metodo que faz a conexão com a Base de Dados
#    mais os parametros exigidos para conectar com a Base de Dados
 public function conectar($nome, $host, $usuario, $senha)                           
{
    global $pdo;

    try 
    {
        $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);

    } catch (PDOException $e) {
        $msgErro = $e->getMessage();
    }
}

# 2. metodo de registo no formulario que vai enviar para a Base de Dados
#    mais os parametros exigidos para conectar com a Base de Dados
public function registar($nome, $telefone, $email, $senha)  
{
    global $pdo;
    // verificar se ja existe o email registado
     $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");  // o ':e' vai subtituir o '$email'
     //metodo 'prepare' o 'pdo' para aceder o sql
     $sql->bindValue(":e",$email);
     $sql->execute();   // esse comando retorna ou nao um id'
     if($sql->rowCount() > 0 )   // ver se vem alguma linha do 'id_usuario ' nessa coluna é porque esta registada e nao pode se registar  novamente
     {
         return false;  //  se já está registado
     }
     else
     {
      // caso nao registado 
      $sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
      // a coluna id_usuarios não se insere porque esta é automatica.
      $sql->bindValue(":n",$nome);
      $sql->bindValue(":t",$telefone);
      $sql->bindValue(":e",$email);
      $sql->bindValue(":s",md5($senha));  // o md5 criptografa a senha
      $sql->execute();
      return true;  // foi registado com sucesso
     }
}

# 3. # metodo de login que é para verificar se o user está registado ou não
public function logar($email, $senha)   
{
    global $pdo;

        // verificar se email e senha ja estão registados, se sim
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));  // o md5 criptografa a senha
        $sql->execute();
        if($sql->rowCount() > 0 )
        {
            // entrar no sistema (sessão)
            $dado = $sql->fetch();  // a função fetch pega em tudo na Base de Dadaos e transforma numa array (lista) com os nome das colunas
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];  // o id do usuario que acabou de logar esta armazenado numa sessão
            return true;  // entrou/logado com sucesso
        }
        else
        {
            return false;  // não foi possivel entrar no login
        }
      }
    }



?>