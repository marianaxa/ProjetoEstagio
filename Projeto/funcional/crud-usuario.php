<?php 

require 'crud.php';
$usuario = new Crud();


$acao = $_GET['acao'];


//Vamos garimpar!
$id = $_GET['id'];

echo $id;

echo $acao;

switch ($acao) {
	case "create":
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
						"email"      => $login,
						"senha"      => $senha,
						"categoriausuariofk" => $cargo 
					)
				);

			header('Location: lista-usuario.php');
			}
        break;
    case "edit":
        
        break;
    case "delete":
		    $id = $_GET['id'];

		    $usuario->delete("usuario", array("idusuario" => $id));

		    header('Location: lista-usuario.php');
        break;
    default:
        echo "Acao nao encontrada";
}

?>