<?php 

require 'crud.php';
$especie = new Crud();
$colheita = new Crud();
$arvore = new Crud();
$lote = new Crud();

//oega um id pra cada, e sempre limpar dentro do if
//fazer 3 if, uma variavel pra cada, e ai limpar depois de executar
/*
$acaoDEL = $_GET['acaoDEL'];

if($acaoDEL="delete"){
	$id = $_GET['id'];

	$colheita->delete("colheita", array("idcolheita" => $id));
	$acaoDEL=null;

	header('Location: lista-colheita.php');
}

echo $acaoDEL;
*/

$acaoCol = $_POST['acao'];


switch ($acaoCol) {
	case "create":

	$data = $_POST['dataColheita'];
	$local = $_POST['localColheita'];
	$colhedores = $_POST['colhedores'];
	$nomeespecie = $_POST['idradio'];
	$observacoes = $_POST['obsColheita'];

	//echo $idespecie;



	if ($colheita->numRows() > 0) {
		header('Location: cadastro-colheita.php');
		alert("Colheita não cadastrada");
	}else{

		$idespecie = 0;

		$especie->select("SELECT id_especie FROM especie where nome_vulgar = '$nomeespecie' ");
		foreach ($especie->result() as $especie) {
			$idespecie = $especie['id_especie'];
		}
		//echo $idespecie;


		$colheita->insert("colheita",
			array("data" => $data,
				"local"     => $local,
				"colhedores"         => $colhedores,
				"especieFK" => $idespecie,
				"observacoes_colheita" => $observacoes
			)
		);

		$idColheita = 0;

		$colheita->select("SELECT * FROM colheita order by idcolheita desc limit 1");
			 foreach ($colheita->result() as $colheita ){ 
			 	$idColheita =  $colheita['idcolheita'];
			 }


		$codigo = "LC".$idColheita;

		$lote->insert("lote",
							array("idlote_sementes" => $codigo,
								"data_chegada" => $data, 
								"categoria" => "colhido",
							 	"origemFK" => $idColheita,
							 	"especieFK" => $idespecie) 
						);
		
		$acaoCol=null;
		$lote=null;
		header('Location: lista-lote.php');
	}

	break;

	case "createArvore":
	
	$idcol = $_POST['idcolh'];
//	$data = $_POST['dataColheitaArvore'];
	$alturaTotal = $_POST['alturaTotal'];
	$alturaComercial = $_POST['alturaComercial'];
	$dap = $_POST['dap'];
	$cap = $_POST['cap'];
	$gpsX = $_POST['gpsX'];
	$gpsY = $_POST['gpsY'];
	$radioTipoColheita = $_POST['radioTipoColheita'];
	$radioTipoSolo = $_POST['radioTipoSolo'];
	$radiotipoTerreno = $_POST['radiotipoTerreno'];
	$radiolocalizacao = $_POST['radiolocalizacao'];
	$tipoVegetacao = $_POST['tipoVegetacao'];
	$arvoresVizinhas = $_POST['arvoresVizinhas'];

	if ($arvore->numRows() > 0) {
		alert("Arvore não cadastrada");
	}else{
		$arvore->insert("arvore",
					array("altura_total" => $alturaTotal,
						  "altura_comercial" => $alturaComercial,
						  "dap" => $dap,
						  "cap" => $cap,
						  "gpsX" => $gpsX,
						  "gpsY" => $gpsY,
						  "tipo_colheita" => $radioTipoColheita,
						  "tipo_solo" => $radioTipoSolo,
						  "tipo_terreno" => $radiotipoTerreno,
						  "localizacao" => $radiolocalizacao,
						  "tipo_vegetacao" => $tipoVegetacao,
						  "colheitaFK" => $idcol,
						  "arvores_vizinhas" => $arvoresVizinhas
					)
		);

		//selct do lote
		$codigo = 0;
		$lote->select("SELECT idlote_sementes FROM lote WHERE origemFK=$idcol");
			 foreach ($lote->result() as $lote ){ 
			 	$codigo =  $lote['idlote_sementes'];
			 }
			 echo $codigo;

		 header("Location: cadastro-lote-colhido.php?idcol=".$codigo);
	}
//	

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
			array("dataColheita" => $data,
				"localColheita"  => $local,
				"colhedores"     => $colhedores,
				"obsColheita" => $observacoes
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