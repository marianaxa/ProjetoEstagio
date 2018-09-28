<?php

require 'crud.php';
$amostra = new Crud();
$testenumerosementes = new Crud();
$testegerminacao = new Crud();
$tbpmilsementes = new Crud();
$tbchecagem = new Crud();
$tbanaliseteor = new Crud();
$tbrepeticao = new Crud();
$tbpureza = new Crud();


$acaoCol = $_POST['acao'];

switch ($acaoCol) {
	case "create":

	//enviar id do lote pelo btn cadastrar
	//receber o id do lote
	//fazer insert na amostra peganndo os dados: armazenamento e implantacao
	$loteFK = $_POST['idlote'];
	$condicaoArmazenamento = $_POST['condicaoArmazenamento'];
	$dataImplantacao =$_POST['dataImplatacao'];
	$amostrador = $_POST['amostrador'];

	$amostra->insert("amostra",
		array("condicao_armazenamento" => $condicaoArmazenamento,
			"data_implantacao"  => $dataImplantacao,	
			"loteFK" => $loteFK,
			"amostrador" => $amostrador,
			"situacao" => 'iniciada'
		)
	);
	header('Location: lista-amostra.php');

	break;

	case "createNumSementes":

	$idamostra = $_POST['codamostra'];
	$dataNumSementes =$_POST['datanumsementes'];
	$analistaTesteNumSementes = $_POST['analistaTesteNumSementes'];
	$qtdNumSementes = $_POST['numSementes'];
	$pesoAmostra = $_POST['pesoAmostra'];
	$khNumSementes = $_POST['numSementesKh'];
	$obsTesteNumSementes = $_POST['obsTesteNumSementes'];


	$testenumerosementes->insert("num_sementes",
		array("data_num_sementes" => $dataNumSementes,
			"analista_num_sementes"  => $analistaTesteNumSementes,	
			"qtd_num_sementes" => $qtdNumSementes,	
			"peso_amostra" => $pesoAmostra,	
			"kg_num_sementes" => $khNumSementes,
			"observacoes_num_sementes" => $obsTesteNumSementes,
			"amostraFK" => $idamostra		  

		)
	);

	header("Location: informacao-amostra.php?idamostra=".$idamostra);

	break;
//*******************
	case "createPesoMilSementes":

	$idamostra = $_POST['codamostra'];
	$dataMilSementes =$_POST['dataEnsaioMilSementes'];
	$analistaMilSementes = $_POST['analistaMilSementes'];
	$pesoMilSementes = $_POST['pesoMilSementes'];
	$numMedioSementes = $_POST['numMedioSementes'];
	$obsMilSementes = $_POST['obsMilSementes'];


	$testenumerosementes->insert("peso_mil_sementes",
		array("data_ensaio" => $dataMilSementes,
			"analista_mil_sementes"  => $analistaMilSementes,	
			"kg_mil_sementes" => $pesoMilSementes,
			"kg_num_medio" => $numMedioSementes,
			"obs_peso_mil_sementes" => $obsMilSementes,
			"amostraFK" => $idamostra		  
		)
	);

	header("Location: informacao-amostra.php?idamostra=".$idamostra);

	break;

	case "createRepeticaoMilSementes":

	$idamostra = $_POST['codamostra'];
	$repmilsementes = $_POST['repeticao'];
	$numsementesmilsem = $_POST['nsementes'];
	$pamostramilsem = $_POST['pesoamostra'];
	$idpmilsementes = 0;

	$quant_linhas = count($repmilsementes);
/*
	for ($i=0; $i<$quant_linhas; $i++) {
		echo  "Descricao: ".$repmilsementes[$i]."<br />";
		echo  "N Sementes: ".$numsementesmilsem[$i]."<br />";
		echo  "Peso: ".$pamostramilsem[$i]."<br />";

	}*/


	$tbpmilsementes->select("SELECT idpeso_mil_sementes FROM  peso_mil_sementes 
		WHERE amostraFK= '$idamostra'");
	foreach ($tbpmilsementes->result() as $checagem) {
		$idpmilsementes = $checagem['idpeso_mil_sementes'];
	}

	for ($i=0; $i<$quant_linhas; $i++){
		$tbpmilsementes->insert("repeticao_mil_sementes",
			array("descricao_rep" => $repmilsementes[$i],
				"num_sementes" => $numsementesmilsem[$i],	
				"peso_amostra" => $pamostramilsem[$i],			
				"peso_mil_sementesFK" => $idpmilsementes
			)
		);
	}

	header("Location: lista-peso-mil-sementes.php?idamostra=".$idamostra);

	break;
//***********************
	case "createTeorAgua":

	$idamostra = $_POST['codamostra'];
	$datateoragua =$_POST['datateoragua'];
	$analistateoragua = $_POST['analistateoragua'];
	$obsteoragua = $_POST['obsteoragua'];


	$testenumerosementes->insert("teor_agua",
		array("data_teor_agua" => $datateoragua,
			"analista_teor_agua"  => $analistateoragua,	
			"obs_teor_agua" => $obsteoragua,
			"amostraFK" => $idamostra
		)
	);
	header("Location: informacao-amostra.php?idamostra=".$idamostra);

	break;

	case "createGerminacao":

	$idamostra = $_POST['codamostra'];
	$dataSemeadura =$_POST['dataSemeadura'];
	$analista = $_POST['analista'];
	$temperatura = $_POST['temperatura'];
	$substrato = $_POST['substrato'];
	$sementesRepeticao = $_POST['sementesRepeticao'];
	$tratamento = $_POST['tratamento'];




	$testegerminacao->insert("germinacao",
		array("datasemeadura" => $dataSemeadura,
			"analista"  => $analista,	
			"temperatura" => $temperatura,
			"substrato" => $substrato,		
			"tratamento" => $tratamento,
			"numsementes_repeticao" => $sementesRepeticao,			
			"amostraFK" => $idamostra
		)
	);

//	echo "fim cadastro ..";
	header("Location: informacao-amostra.php?idamostra=".$idamostra);

	break;

//************************************************
case "createAnaliseTeorAgua":

	$idamostra = $_POST['codamostra'];
	$ncadinho = $_POST['ncadinho'];
	$pesocadinho = $_POST['pesocadinho'];
	$pesoumido = $_POST['pesoumido'];
	$pesoseco = $_POST['pesoseco'];
	$umidade = $_POST['umidade'];
	$umidademedia = $_POST['umidademedia'];
	$idteoragua = 0;

	$quant_linhas = count($ncadinho);

/*
	for ($i=0; $i<$quant_linhas; $i++) {
		echo  "N cadinho: ".$ncadinho[$i]."<br />";
		echo  "Peso Cadinho: ".$pesocadinho[$i]."<br />";
		echo  "Peso umido: ".$pesoumido[$i]."<br />";
		echo  "Peso seco: ".$pesoseco[$i]."<br />";
		echo  "umidade: ".$umidade[$i]."<br />";
		echo  "umidade media: ".$umidademedia[$i]."<br />";

	}*/


	$tbanaliseteor->select("SELECT idteor_agua FROM  teor_agua 
		WHERE amostraFK= '$idamostra'");
	foreach ($tbanaliseteor->result() as $pesagemteoragua) {
		$idteoragua = $pesagemteoragua['idteor_agua'];
	}


	for ($i=0; $i<$quant_linhas; $i++){
		$tbanaliseteor->insert("pesagem_teor_agua",
			array("num_cadinho" => $ncadinho[$i],
				"peso_cadinho" => $pesocadinho[$i],	
				"peso_umido" => $pesoumido[$i],	
				"peso_seco" => $pesoseco[$i],	
				"umidade" => $umidade[$i],	
				"umidade_media" => $umidademedia[$i],			
				"teor_aguaFK" => $idteoragua
			)
		);
	}

	header("Location: lista-teoragua.php?idamostra=".$idamostra);

	break;
//************************************************************
	case "createRepeticao":

	$idamostra = $_POST['codamostra'];
	$dataRepeticao = $_POST['dataRepeticao'];
	$desrepeticao = $_POST['desrepeticao'];
	$quantidade = $_POST['quantidade'];
	$idgerm = 0;
	$idchecagem = 0;

	$quant_linhas = count($desrepeticao);
/*
	echo $dataRepeticao;
	for ($i=0; $i<$quant_linhas; $i++) {
		echo  "Descricao: ".$desrepeticao[$i]."<br />";
		echo  "Quantidade: ".$quantidade[$i]."<br />";

	}
*/

	$tbchecagem->select("SELECT idgerminacao FROM  germinacao 
		WHERE amostraFK= '$idamostra'");
	foreach ($tbchecagem->result() as $checagem) {
		$idgerm = $checagem['idgerminacao'];
	}

	$tbchecagem->insert("checagem",
		array("data" => $dataRepeticao,			
			"germinacaoFK" => $idgerm
		)
	);


	$tbrepeticao->select("SELECT * FROM checagem order by idchecagem desc limit 1");
	foreach ($tbrepeticao->result() as $repeticao ){ 
		$idchecagem =  $repeticao['idchecagem'];
	}

	for ($i=0; $i<$quant_linhas; $i++){
		$tbrepeticao->insert("repeticao",
			array("descricaorep" => $desrepeticao[$i],
				"qtdgerminada" => $quantidade[$i],			
				"checagemFK" => $idchecagem
			)
		);
	}

	header("Location: lista-germinacao.php?idamostra=".$idamostra);

	break;

	case "createPureza":

	$idamostra = $_POST['codamostra'];
	$dataensaio = $_POST['dataensaio'];
	$analistapureza = $_POST['analistapureza'];
	$amostrarecebida = $_POST['pamostrarecebida'];
	$amostratrabalho = $_POST['pamostratrabalho'];
	$sementespuras  = $_POST['sementespuras'];
	$outrassementes = $_POST['outrassementes'];
	$materialinerte = $_POST['materialinerte'];
	$outrascultivares = $_POST['outrascultivares'];

	$tbpureza->insert("pureza",
		array("data_ensaio" => $dataensaio,
		"analista" => $analistapureza,
		"peso_amostra_media" => $amostrarecebida,
		"peso_amostra_trab" => $amostratrabalho,
		"sementes_puras" => $sementespuras,
		"outras_sementes" => $outrassementes,
		"material_inerte" => $materialinerte,
		"outras_cultivares" => $outrascultivares,
		"amostraFK"	=> $idamostra
		)
	);

	header("Location: informacao-amostra.php?idamostra=".$idamostra);

	break;

	case "addResultado":

	$idamostra = $_POST['codamostra'];
	$plantulasnormais = $_POST['plantulasnormais'];
	$plantulasanormais = $_POST['plantulasanormais'];
	$sementesduras = $_POST['sementesduras'];
	$sementesdormentes = $_POST['sementesdormentes'];
	$sementesmortas = $_POST['sementesmortas'];


	$testegerminacao->update("germinacao",
		array("totalplantulas" => $plantulasnormais,
			"plantulasanormais"  => $plantulasanormais,	
			"sementesfirmes" => $sementesduras,
			"sementesmortas" => $sementesmortas,		
			"sementeschocas" => $sementesdormentes,
			"amostraFK" => $idamostra
		)
	);

//	echo "fim cadastro ..";
	header("Location: lista-germinacao.php?idamostra=".$idamostra);

	break;

	default:
	echo "Ação não encontrada";
}

?>