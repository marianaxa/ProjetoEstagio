<?php 

require 'crud.php';
$arvore = new Crud();
$pesagem = new Crud();
$lote = new Crud();
$amostra = new Crud();
$teoragua = new Crud();
$repeticao = new Crud();
$pesomil = new Crud();
$germinacao = new Crud();

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


	header("Location: ver-lote-colhido.php?idcol=".$codigo);

	break;
	
	case "deletePesagem":
	$idpes = $_GET['idpes'];

	$idteoragua=0;

	$teoragua->select("SELECT teor_aguaFK FROM pesagem_teor_agua WHERE idpesagem_teor_agua=$idpes");
	foreach ($teoragua->result() as $teoragua ){ 
		$idteoragua =  $teoragua['teor_aguaFK'];
	}

	$idamostra=0;

	$amostra->select("SELECT amostraFK FROM teor_agua WHERE idteor_agua=$idteoragua");
	foreach ($amostra->result() as $amostra ){ 
		$idamostra =  $amostra['amostraFK'];
	}	

	$pesagem->delete("pesagem_teor_agua", array("idpesagem_teor_agua" => $idpes));

	header("Location: editar-teoragua.php?idamostra=".$idamostra);
	
break;


case "deletePesoMil":
	$idps = $_GET['idps'];

	$idpesomil=0;

	$repeticao->select("SELECT peso_mil_sementesFK FROM repeticao_mil_sementes 
		WHERE idrepeticao_mil_sementes=$idps");
	foreach ($repeticao->result() as $repeticao ){ 
		$idpesomil =  $repeticao['peso_mil_sementesFK'];
	}

	$idamostra=0;

	$amostra->select("SELECT amostraFK FROM peso_mil_sementes WHERE idpeso_mil_sementes=$idpesomil");
	foreach ($amostra->result() as $amostra ){ 
		$idamostra =  $amostra['amostraFK'];
	}	

	$pesomil->delete("repeticao_mil_sementes", array("idrepeticao_mil_sementes" => $idps));

	header("Location: editar-pesomilsementes.php?idamostra=".$idamostra);
	
break;

case "deleteRepeticao":
	$idrep = $_GET['idps'];

	$idgerminacao=0;

	$germinacao->select("SELECT germinacaoFK FROM checagem WHERE idchecagem=$idrep");
	foreach ($germinacao->result() as $checagem ){ 
		$idgerminacao =  $checagem['germinacaoFK'];
	}

	$idamostra=0;

	$amostra->select("SELECT amostraFK FROM germinacao WHERE idgerminacao=$idgerminacao");
	foreach ($amostra->result() as $amostra ){ 
		$idamostra =  $amostra['amostraFK'];
	}	

	$repeticao->delete("checagem", array("idchecagem" => $idrep));

	header("Location: editar-germinacao.php?idamostra=".$idamostra);

break;

case "deleteResultado":
	$idgerminacao = $_GET['idps'];

	$idamostra=0;

	$amostra->select("SELECT amostraFK FROM germinacao WHERE idgerminacao=$idgerminacao");
	foreach ($amostra->result() as $amostra ){ 
		$idamostra =  $amostra['amostraFK'];
	}	

	$repeticao->delete("germ_resultado", array("germinacaoFK" => $idgerminacao));

	header("Location: editar-germinacao.php?idamostra=".$idamostra);

break;

	default:
	echo "Acao nao encontrada";
}

?>