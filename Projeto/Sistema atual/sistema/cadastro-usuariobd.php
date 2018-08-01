<?php 
 
//NAO USADA

/*
$link = mysqli_connect('localhost', 'root', 'root');
if (!$link) {
    die('Não foi possível conectar: ' . mysqli_error());
}
echo 'Conexão bem sucedida';
*/

require 'crud.php';
$usuario = new Crud();

$nome = $_POST['nome'];
$login = $_POST['email'];
$senha = MD5($_POST['senha']);
$cargo = $_POST['cargo'];

if ($usuario->numRows() > 0) {
  header('Location: cadastro-usuario.php');
  alert("Usuário não cadastrado");
}else{
  $usuario->insert("usuario",
  array("nome_usuario" => $nome,
        "email"        => $login,
        "senha"        => $senha,
        "categoriausuariofk" => $cargo 
      )
);
  header('Location: lista-usuario.php');
}

/*
$query1 = "select email FROM usuario where email = '".$login."' ";
$result=mysqli_query($link, $query1);

$row=mysqli_num_rows($result);

  if ($row > 0){

    echo "EMAIL JÁ EXISTE";
  }

else {
$usuario->insert("usuario",
  array("nome_usuario" => $nome,
        "email"        => $login,
        "senha"        => $senha,
        "categoriausuariofk"        => $cargo 
      )
);


  //header('Location: lista-usuario.php');
}
*/
?>