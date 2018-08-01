<?php 

require 'crud.php';
$especie = new Crud();


//oega um id pra cada, e sempre limpar dentro do if
//fazer 3 if, uma variavel pra cada, e ai limpar depois de executar

$acaoDEL = $_GET['acaoDEL'];
$acaoEsp = $_POST['acao'];

if($acaoDEL="delete"){
	$id = $_GET['id'];

	$especie->delete("especie", array("id_especie" => $id));
	$acaoDEL=null;

	header('Location: lista-especie.php');
}

echo $acaoDEL;

switch ($acaoEsp) {
	case "create":
	$nomeCientifico = $_POST['nome_cientifico'];
	$nomeVulgar = $_POST['nome_vulgar'];
	$familia = $_POST['familia'];


	if ($especie->numRows() > 0) {
		header('Location: cadastro-especie.php');
		alert("Especie não cadastrada");
	}else{
		$especie->insert("especie",
			array("nome_cientifico" => $nomeCientifico,
				"nome_vulgar"     => $nomeVulgar,
				"familia"         => $familia
			)
		);
		$acaoEsp=null;
		header('Location: lista-especie.php');
	}
	break;
	case "edit":
	$idespecie = $_POST['idesp'];
	$nomeCientifico = $_POST['nome_cientifico'];
	$nomeVulgar = $_POST['nome_vulgar'];
	$familia = $_POST['familia'];
			//echo $idusuario, $nome, $login, $senha;

	if ($especie->numRows() > 0) {
		header('Location: cadastro-especie.php');
		alert("Espécie não cadastrada");
	}else{
		$especie->update("especie",
			array("nome_cientifico" => $nomeCientifico,
				"nome_vulgar"      => $nomeVulgar,
				"familia" => $familia 
			),
			array("id_especie" => $idespecie)
		);
		$acaoEsp=null;
		header('Location: lista-especie.php');
	}

	break;
/*  case "delete":
    		$id = $_POST['idesp'];

		    $especie->delete("especie", array("id_especie" => $id));

		    header('Location: lista-especie.php');
		    break;*/
		    default:
		    echo "Acao nao encontrada";
		}
?>