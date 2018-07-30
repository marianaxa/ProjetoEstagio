<?php 

require 'crud.php';
$usuario = new Crud();


$acao = $_GET['acao'];


//Vamos garimpar!
//$id = $_GET['id'];

//echo $id;

echo $acao;

switch ($acao) {
	case "create":
			$nome = $_GET['nome'];
			$login = $_GET['email'];
			$senha = MD5($_GET['senha']);
			$cargo = $_GET['cargo'];
			//echo $nome, $login, $senha;

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
    		$idusuario = $_GET['idusuario'];
    		$nome = $_GET['nome'];
			$login = $_GET['email'];
			$cargo = $_GET['cargo'];
			//echo $idusuario, $nome, $login, $senha;

			if ($usuario->numRows() > 0) {
				header('Location: cadastro-usuario.php');
				alert("Usuário não cadastrado");
			}else{
				$usuario->update("usuario",
				array("nome_usuario" => $nome,
						"email"      => $login,
						"categoriausuariofk" => $cargo 
					),
				array("idusuario" => $idusuario)
				);

			header('Location: lista-usuario.php');
			}
   

        
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