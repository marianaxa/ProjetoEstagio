<?php 

require 'crud.php';
$especie = new Crud();


$acaoEsp = $_POST['acao'];

//$acaoEsp = $_GET['acao'];



echo $acaoEsp;

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

			header('Location: lista-especie.php');
			}
        break;
    case "edit":
        echo "Your favorite color is blue!";
        break;
    case "delete":
    		$id = $_GET['id'];

		    $especie->delete("especie", array("id_especie" => $id));

		    header('Location: lista-especie.php');
        break;
    default:
        echo "Acao nao encontrada";
}



?>