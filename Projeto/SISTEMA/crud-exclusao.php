<?php 

require 'crud.php';
$arvore = new Crud();
$lote = new Crud();


$acao = $_GET['acao'];



//Vamos garimpar!
//$id = $_GET['id'];

//echo $id;

echo $acao;

switch ($acao) {
	case "deleteArv":
	$idarv = $_GET['idarv'];
	
	//
	$idcolheita = 0;
//	echo $id;
	$arvore->select("SELECT colheitaFK FROM arvore where idarvores= $idarv ");
	foreach ($arvore->result() as $arv) {
		$idcolheita = $arv['colheitaFK'];
	//	echo $idcolheita;
	}
	//
//	echo $idcolheita;
	//echo $id;
		//selct do lote
	$codigo = 0;
	$lote->select("SELECT idlote_sementes FROM lote WHERE origemFK=$idcolheita");
	foreach ($lote->result() as $lote ){ 
		$codigo =  $lote['idlote_sementes'];
	}

//
	$arvore->delete("arvore", array("idarvores" => $idarv));


	header("Location: cadastro-lote-colhido.php?idcol=".$codigo);

	break;
	default:
	echo "Acao nao encontrada";
}

?>