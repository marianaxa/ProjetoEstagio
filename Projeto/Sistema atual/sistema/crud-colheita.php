<?php 

require 'crud.php';
$especie = new Crud();
$colheita = new Crud();

//oega um id pra cada, e sempre limpar dentro do if
//fazer 3 if, uma variavel pra cada, e ai limpar depois de executar

$acaoDEL = $_GET['acaoDEL'];
// $acaoEsp = $_POST['acao'];
// $acaoLote = $_POST['acao'];

if($acaoDEL="delete"){
	$id = $_GET['id'];

	$colheita->delete("colheita", array("idcolheita" => $id));
	$acaoDEL=null;

	header('Location: lista-colheita.php');
}

echo $acaoDEL;

switch ($acaoCol) {
	case "create":
	$data = $_POST['dataColheita'];
	$local = $_POST['localColheita'];
	$colhedores = $_POST['colhedores'];
	$observacoes = $_POST['obsColheita'];


	if ($colheita->numRows() > 0) {
		header('Location: cadastro-colheita.php');
		alert("Colheita não cadastrada");
	}else{
		$colheita->insert("colheita",
			array("dataColheita" => $dataColheita,
				"localColheita"     => $localColheita,
				"colhedores"         => $colhedores,
				"obsColheita" => $obsColheita
			)
		);
		$acaoCol=null;
		header('Location: lista-colheita.php');
	}
	break;

	case "edit":
	$idcolheita = $_POST['idcolheita'];
	$dataColheita = $_POST['dataColheita'];
	$localColheita = $_POST['localColheita'];
	$colhedores = $_POST['colhedores'];
	$obsColheita = $_POST['obsColheita'];
			//echo $idusuario, $nome, $login, $senha;

	if ($colheita->numRows() > 0) {
		header('Location: cadastro-colheita.php');
		alert("Colheita não cadastrada");
	}else{
		$colheita->update("colheita",
			array("dataColheita" => $dataColheita,
				"localColheita"     => $localColheita,
				"colhedores"         => $colhedores,
				"obsColheita" => $obsColheita
			),
			array("idcolheita" => $idcolheita)
		);
		$acaoCol=null;
		header('Location: lista-colheita.php');
	}

	break;
/*  case "delete":
    		$id = $_POST['idesp'];

		    $especie->delete("especie", array("id_especie" => $id));

		    header('Location: lista-especie.php');
		    break;*/
		    default:
		    echo "Ação não encontrada";
		}
?>