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
/*			$nome = $_GET['nome'];
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
*/
			$nome = $_GET['nome'];
			$login = $_GET['email'];
			$senha = MD5($_GET['senha']);
			$cargo = $_GET['cargo'];
		//	echo $nome, $login, $senha, $cargo;
			$nivel=1;
			$ativo=1;
			if($cargo==5){
				$nivel=2;
			}

			
			if ($usuario->numRows() > 0) {
				header('Location: cadastro-usuario.php');
				alert("Usuário não cadastrado");
			}else{
				$usuario->insert("usuarios",
				array("nome" => $nome,
						"email"      => $login,
						"senha"      => $senha,
						"nivel"     => $nivel,
						"ativo"		=> $ativo,
						"categoriausuariofk" => $cargo 
					)
				);

		//	header('Location: lista-usuario.php');
			}

        break;
    case "edit":
    		$id = $_GET['idusuario'];
    		$nome = $_GET['nome'];
			$login = $_GET['email'];
			$cargo = $_GET['cargo'];
	//		echo $id, $nome, $login, $cargo;

			$nivel=1;
			$ativo=1;
			if($cargo==5){
				$nivel=2;
			}

			if ($usuario->numRows() > 0) {
				header('Location: editar-usuario.php');
				alert("Usuário não cadastrado");
			}else{
				$usuario->update("usuarios",
				array("nome" => $nome,
						"email"      => $login,
						"nivel"     => $nivel,
						"ativo"		=> $ativo,
						"categoriausuariofk" => $cargo 
					),
				array("id" => $id)
				);

			header('Location: lista-usuario.php');
			}
   

        
        break;
    case "delete":
		    $id = $_GET['id'];

		    $usuario->delete("usuarios", array("id" => $id));

		    header('Location: lista-usuario.php');
        break;
    default:
        echo "Acao nao encontrada";
}

?>