<?php

// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
  header("Location: login.php"); exit;
}

// Tenta se conectar ao servidor MySQL
$servername="localhost";
$username="root";
$password="root";
$db_name="lasfac2";

$connect = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()){
	echo "Falha na conexão: ".mysqli_connect_error();
}

$email = mysqli_escape_string($connect, $_POST['email']);
$senha = mysqli_escape_string($connect, $_POST['senha']);

// Validação do usuário/senha digitados
$sql = "SELECT id, email, nivel FROM usuarios WHERE (email = '". $email ."') AND (senha = '". sha1($senha) ."') AND (ativo = 1) LIMIT 1";

$query = mysqli_query($connect, $sql);

$rows = mysqli_num_rows($query);
if (empty($rows)) {
  // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
  session_start();
  $_SESSION['msg'] = "<div class='alert alert-danger'>Login inválido!</div>";
  header("Location: login.php");
  exit;
} else {
  // Salva os dados encontados na variável $resultado
  $resultado = mysqli_fetch_assoc($query);

// Se a sessão não existir, inicia uma
  if (!isset($_SESSION)) session_start();
  // Salva os dados encontrados na sessão
  $_SESSION['UsuarioID'] = $resultado['id'];
  $_SESSION['UsuarioNome'] = $resultado['email'];
  $_SESSION['UsuarioNivel'] = $resultado['nivel'];
  // Redireciona o visitante

  
  header("Location: principal.php"); exit;
}
