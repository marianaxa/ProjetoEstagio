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
$tbresultado = new Crud();
$tboutrassem = new Crud();
$tbgerminacao = new Crud();


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
	$renasemamostrador = $_POST['renasemamostrador'];
	$peneira = $_POST['peneira'];
	$representatividade = $_POST['representatividade'];

	$amostra->insert("amostra",
		array("condicao_armazenamento" => $condicaoArmazenamento,
			"data_implantacao"  => $dataImplantacao,	
			"loteFK" => $loteFK,
			"amostrador" => $amostrador,
			"renasem_amostrador" => $renasemamostrador,
			"peneira" => $peneira,
			"representatividade" => $representatividade,
			"situacao" => 'Iniciada'
		)
	);
	header('Location: lista-amostra.php');

	break;

	case "edit":

	$idamostra = $_POST['codamostra'];
	$amostrador =$_POST['amostrador'];
	$renasemamostrador = $_POST['renasemamostrador'];
	$dataImplantacao = $_POST['dataImplantacao'];
	$condicaoArmazenamento = $_POST['condicaoArmazenamento'];
	$peneira = $_POST['peneira'];
	$representatividade = $_POST['representatividade'];

	$amostra->update("amostra",
		array("condicao_armazenamento" => $condicaoArmazenamento,
			"data_implantacao" =>$dataImplantacao,
			"amostrador" =>  $amostrador,
			"renasem_amostrador" =>  $renasemamostrador,
			"peneira" => $peneira,
			"representatividade" => $representatividade),
		array("idamostra" => $idamostra)
		
	);

	header("Location: lista-amostra.php");

	break;
//*******************
	case "createPesoMilSementes":

	$idamostra = $_POST['codamostra'];
	$dataMilSementes =$_POST['dataEnsaioMilSementes'];
	$analistaMilSementes = $_POST['analistaMilSementes'];
	$pesoMilSementes = $_POST['pesoMilSementes'];
	$numMedioSementes = $_POST['numMedioSementes'];
	$obsMilSementes = $_POST['obsMilSementes'];
	$pesoamostrams = $_POST['pesoamostrams'];
	$desc_repeticao = $_POST['descrep'];
	$peso_amostra_mil = $_POST['pesoamos'];
	$peso_medio = $_POST['xpesosmenetes'];
	$desvio_padrao = $_POST['desviopadrao'];
	$variancia = $_POST['variancia'];
	$coef_variacao = $_POST['coef_variacao'];
	$idpmilsementes = null;

	$quant_linhas_ps = count($desc_repeticao);

	$testenumerosementes->insert("peso_mil_sementes",
		array("data_ensaio" => $dataMilSementes,
			"analista_mil_sementes"  => $analistaMilSementes,
			"peso_medio" => $peso_medio,
			"desvio_padrao" => $desvio_padrao,
			"variancia" => $variancia,	
			"coeficiente_variacao" => $coef_variacao,
			"kg_mil_sementes" => $pesoMilSementes,
			"kg_num_medio" => $numMedioSementes,
			"peso_amostra" => $pesoamostrams,
			"obs_peso_mil_sementes" => $obsMilSementes,
			"amostraFK" => $idamostra		  
		)
	);

	$tbpmilsementes->select("SELECT idpeso_mil_sementes FROM  peso_mil_sementes 
		WHERE amostraFK= '$idamostra'");
	foreach ($tbpmilsementes->result() as $checagem) {
		$idpmilsementes = $checagem['idpeso_mil_sementes'];
	}

//echo $desc_repeticao[0];
//echo $peso_amostra_mil[0];

	for ($i=0; $i<$quant_linhas_ps; $i++){
		$tbpmilsementes->insert("repeticao_mil_sementes",
			array("descricao_rep" => $desc_repeticao[$i],
				"peso_amostra_rep" => $peso_amostra_mil[$i],			
				"peso_mil_sementesFK" => $idpmilsementes
			)
		);
	}

	header("Location: informacao-amostra.php?idamostra=".$idamostra);

	break;

	/***/

	case "editPesoMilSementes":

	$idamostra = $_POST['codamostra'];
	$dataMilSementes =$_POST['dataEnsaioMilSementes'];
	$analistaMilSementes = $_POST['analistaMilSementes'];
	$pesoMilSementes = $_POST['pesoMilSementes'];
	$numMedioSementes = $_POST['numMedioSementes'];
	$obsMilSementes = $_POST['obsMilSementes'];
	$pesoamostrams = $_POST['pesoamostrams'];
	$desc_repeticao = $_POST['descrep'];
	$peso_amostra_mil = $_POST['pesoamos'];
	$peso_medio = $_POST['xpesosmenetes'];
	$desvio_padrao = $_POST['desviopadrao'];
	$variancia = $_POST['variancia'];
	$coef_variacao = $_POST['coef_variacao'];
	$idpmilsementes = 0;

	$tbpmilsementes->select("SELECT idpeso_mil_sementes FROM  peso_mil_sementes 
		WHERE amostraFK= '$idamostra'");
	foreach ($tbpmilsementes->result() as $checagem) {
		$idpmilsementes = $checagem['idpeso_mil_sementes'];
	}

	$testenumerosementes->update("peso_mil_sementes",
		array("data_ensaio" => $dataMilSementes,
			"analista_mil_sementes"  => $analistaMilSementes,
			"peso_medio" => $peso_medio,
			"desvio_padrao" => $desvio_padrao,
			"variancia" => $variancia,	
			"coeficiente_variacao" => $coef_variacao,
			"kg_mil_sementes" => $pesoMilSementes,
			"kg_num_medio" => $numMedioSementes,
			"peso_amostra" => $pesoamostrams,
			"obs_peso_mil_sementes" => $obsMilSementes,
			"amostraFK" => $idamostra),
		array("idpeso_mil_sementes" => $idpmilsementes)
	);




	header("Location: editar-amostra.php?idamostra=".$idamostra);

	break;

/************/
	case "editRepeticaoPMS":

	$idamostra = $_POST['codamostra'];
	$repmilsementes = $_POST['repeticao'];
	$pamostramilsem = $_POST['pesoamostra'];
	$idpmilsementes = 0;

	$quant_linhas = count($repmilsementes);


	$tbpmilsementes->select("SELECT idpeso_mil_sementes FROM  peso_mil_sementes 
		WHERE amostraFK= '$idamostra'");
	foreach ($tbpmilsementes->result() as $checagem) {
		$idpmilsementes = $checagem['idpeso_mil_sementes'];
	}

	for ($i=0; $i<$quant_linhas; $i++){
		$tbpmilsementes->insert("repeticao_mil_sementes",
			array("descricao_rep" => $repmilsementes[$i],	
				"peso_amostra_rep" => $pamostramilsem[$i],			
				"peso_mil_sementesFK" => $idpmilsementes
			)
		);
	}

//	header("Location: editar-pesomilsementes.php?idamostra=".$idamostra);
	break;

//*******************************************/
/*	case "createRepeticaoMilSementes":

	$idamostra = $_POST['codamostra'];
	$repmilsementes = $_POST['repeticao'];
	$numsementesmilsem = $_POST['nsementes'];
	$pamostramilsem = $_POST['pesoamostra'];
	$idpmilsementes = 0;

	$quant_linhas = count($repmilsementes);
	*/
/*
	for ($i=0; $i<$quant_linhas; $i++) {
		echo  "Descricao: ".$repmilsementes[$i]."<br />";
		echo  "N Sementes: ".$numsementesmilsem[$i]."<br />";
		echo  "Peso: ".$pamostramilsem[$i]."<br />";

	}*/
/*
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
*/
	case "createTeorAgua":

	$idamostra = $_POST['codamostra'];
	$datateoragua =$_POST['datateoragua'];
	$analistateoragua = $_POST['analistateoragua'];
	$pesoamostraumidade = $_POST['pesoamostraumidade'];
	$ncadinho = $_POST['ncadinho'];
	$pesocadinho = $_POST['pesocadinho'];
	$pesoumido = $_POST['pesoumido'];
	$pesoseco = $_POST['pesoseco'];
	$umidade = $_POST['umidade'];
	$umidademedia = $_POST['umidademedia'];
	$obsteoragua = $_POST['obsteoragua'];
	$idteoragua = 0;

	$quant_linhas = count($ncadinho);

	$testenumerosementes->insert("teor_agua",
		array("data_teor_agua" => $datateoragua,
			"analista_teor_agua"  => $analistateoragua,	
			"peso_amostra_umi" => $pesoamostraumidade,
			"umidade_media" => $umidademedia,
			"obs_teor_agua" => $obsteoragua,
			"amostraFK" => $idamostra
		)
	);

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
				"teor_aguaFK" => $idteoragua
			)
		);
	}

/*
	$tbanaliseteor->update("teor_agua",
		array("umidade_media" => $umidademedia),
		array("idteor_agua" => $idteoragua) );
*/
		header("Location: informacao-amostra.php?idamostra=".$idamostra);

		break;
		/*******/
		case "editTeorAgua":

		$idamostra = $_POST['codamostra'];
		$datateoragua =$_POST['dataAnalise'];
		$analistateoragua = $_POST['analista'];
		$pesoamostraumidade = $_POST['pesoamostraumidade'];
		$umidademedia = $_POST['umidademedia'];
		$obsteoragua = $_POST['obsteoragua'];

		$idteoragua = 0;

		$tbanaliseteor->select("SELECT idteor_agua FROM  teor_agua 
			WHERE amostraFK= '$idamostra'");
		foreach ($tbanaliseteor->result() as $pesagemteoragua) {
			$idteoragua = $pesagemteoragua['idteor_agua'];
		}

		$tbanaliseteor->update("teor_agua",
			array("data_teor_agua" => $datateoragua,
				"analista_teor_agua"  => $analistateoragua,	
				"peso_amostra_umi" => $pesoamostraumidade,
				"umidade_media" => $umidademedia,
				"obs_teor_agua" => $obsteoragua),
			array("idteor_agua" => $idteoragua)
		);


		header("Location: editar-amostra.php?idamostra=".$idamostra);

		break;
		/********/
		case "editAnaliseTeorAgua":

		$idamostra = $_POST['codamostra'];
		$ncadinho = $_POST['ncadinho'];
		$pesocadinho = $_POST['pesocadinho'];
		$pesoumido = $_POST['pesoumido'];
		$pesoseco = $_POST['pesoseco'];
		$umidade = $_POST['umidade'];
		$umidademedia = $_POST['umidademedia'];
		$idteoragua = 0;

		$quant_linhas = count($ncadinho);

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
					"teor_aguaFK" => $idteoragua
				)
			);
		}

		header("Location: editar-teoragua.php?idamostra=".$idamostra);

		break;
		/**************************************************************************************************************/
		case "createGerminacao":

		$idamostra = $_POST['codamostra'];
		$dataSemeadura =$_POST['dataSemeadura'];
		$analista = $_POST['analista'];
		$temperatura = $_POST['temperatura'];
		$substrato = $_POST['substrato'];
		$sementesRepeticao = $_POST['sementesRepeticao'];
		$tratamento = $_POST['tratamento'];
		$pesoamostragerminacao = $_POST['pesoamostra'];
		$numrepeticoes = $_POST['repeticoes'];
		$obsgerminacao = $_POST['obsgerminacao'];



		$testegerminacao->insert("germinacao",
			array("datasemeadura" => $dataSemeadura,
				"analista"  => $analista,	
				"temperatura" => $temperatura,
				"substrato" => $substrato,		
				"tratamento" => $tratamento,
				"numsementes_repeticao" => $sementesRepeticao,	
				"numrepeticoes" => $numrepeticoes,
				"peso_amostra_germinacao" => $pesoamostragerminacao,
				"obs_germinacao" => $obsgerminacao,		
				"amostraFK" => $idamostra
			)
		);

//	echo "fim cadastro ..";
		header("Location: informacao-amostra.php?idamostra=".$idamostra);

		break;
/**/

		case "editGerminacao":

		$idamostra = $_POST['codamostra'];
		$dataSemeadura =$_POST['dataSemeadura'];
		$analista = $_POST['analista'];
		$temperatura = $_POST['temperatura'];
		$substrato = $_POST['substrato'];
		$sementesRepeticao = $_POST['sementesRepeticao'];
		$tratamento = $_POST['tratamento'];
		$pesoamostragerminacao = $_POST['pesoamostra'];
		$numrepeticoes = $_POST['repeticoes'];
		$obsgerminacao = $_POST['obsgerminacao'];

		$idgerminacao = 0;

		$tbgerminacao->select("SELECT idgerminacao FROM  germinacao 
			WHERE amostraFK= '$idamostra'");
		foreach ($tbgerminacao->result() as $germinacao) {
			$idgerminacao = $germinacao['idgerminacao'];
		}

		$testegerminacao->update("germinacao",
			array("datasemeadura" => $dataSemeadura,
				"analista"  => $analista,	
				"temperatura" => $temperatura,
				"substrato" => $substrato,		
				"tratamento" => $tratamento,
				"numsementes_repeticao" => $sementesRepeticao,	
				"numrepeticoes" => $numrepeticoes,
				"peso_amostra_germinacao" => $pesoamostragerminacao,
				"obs_germinacao" => $obsgerminacao,		
				"amostraFK" => $idamostra),
			array("idgerminacao" => $idgerminacao)
		);


//	echo "fim cadastro ..";
	header("Location: editar-amostra.php?idamostra=".$idamostra);

		break;
//************************************************
/*	case "createAnaliseTeorAgua":

	$idamostra = $_POST['codamostra'];
	$ncadinho = $_POST['ncadinho'];
	$pesocadinho = $_POST['pesocadinho'];
	$pesoumido = $_POST['pesoumido'];
	$pesoseco = $_POST['pesoseco'];
	$umidade = $_POST['umidade'];
	$umidademedia = $_POST['umidademedia'];
	$idteoragua = 0;

	$quant_linhas = count($ncadinho);

	echo $umidademedia;

/*
	for ($i=0; $i<$quant_linhas; $i++) {
		echo  "N cadinho: ".$ncadinho[$i]."<br />";
		echo  "Peso Cadinho: ".$pesocadinho[$i]."<br />";
		echo  "Peso umido: ".$pesoumido[$i]."<br />";
		echo  "Peso seco: ".$pesoseco[$i]."<br />";
		echo  "umidade: ".$umidade[$i]."<br />";
		echo  "umidade media: ".$umidademedia[$i]."<br />";

	}*/

/*
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
				"teor_aguaFK" => $idteoragua
			)
		);
	}


	$tbanaliseteor->update("teor_agua",
		array("umidade_media" => $umidademedia),
		array("idteor_agua" => $idteoragua) );


	header("Location: lista-teoragua.php?idamostra=".$idamostra);

	break;
	*/
//************************************************************
	case "createRepeticao":

	$idamostra = $_POST['codamostra'];
	$diasemeadura = $_POST['diassemeadura'];
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
		array("ndias_semeadura" => $diasemeadura,
			"data" => $dataRepeticao,			
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
	/***********************************************************************/
	case "createPureza":

	$idamostra = $_POST['codamostra'];
	$dataensaio = $_POST['dataensaio'];
	$analistapureza = $_POST['analistapureza'];
	$amostrarecebida = $_POST['pamostrarecebida'];
	$amostratrabalho = $_POST['pamostratrabalho'];
	$sementespuras  = $_POST['sementespuras'];
	$outrassementes = $_POST['outrassementes'];
	$materialinerte = $_POST['materialinerte'];
	$naturezamaterial = $_POST['naturezamatinerte'];
	$outrascultivares = $_POST['outrascultivares'];
	$obspureza = $_POST['obspureza'];

	$tbpureza->insert("pureza",
		array("data_ensaio" => $dataensaio,
			"analista" => $analistapureza,
			"peso_amostra_media" => $amostrarecebida,
			"peso_amostra_trab" => $amostratrabalho,
			"sementes_puras" => $sementespuras,
			"outras_sementes" => $outrassementes,
			"material_inerte" => $materialinerte,
			"natureza_material_inerte" => $naturezamaterial,
			"outras_cultivares" => $outrascultivares,
			"obs_pureza" => $obspureza,
			"amostraFK"	=> $idamostra
		)
	);

	header("Location: informacao-amostra.php?idamostra=".$idamostra);

	break;
	/*************/
	case "editPureza":

	$idamostra = $_POST['codamostra'];
	$dataensaio = $_POST['dataensaio'];
	$analistapureza = $_POST['analistapureza'];
	$amostrarecebida = $_POST['pamostrarecebida'];
	$amostratrabalho = $_POST['pamostratrabalho'];
	$sementespuras  = $_POST['sementespuras'];
	$outrassementes = $_POST['outrassementes'];
	$materialinerte = $_POST['materialinerte'];
	$naturezamaterial = $_POST['naturezamatinerte'];
	$outrascultivares = $_POST['outrascultivares'];
	$obspureza = $_POST['obspureza'];

	$idpureza=0;

	$tbpureza->select("SELECT idpureza FROM  pureza 
		WHERE amostraFK= '$idamostra'");
	foreach ($tbpureza->result() as $pur) {
		$idpureza = $pur['idpureza'];
	}


	$tbpureza->update("pureza",
		array("data_ensaio" => $dataensaio,
			"analista" => $analistapureza,
			"peso_amostra_media" => $amostrarecebida,
			"peso_amostra_trab" => $amostratrabalho,
			"sementes_puras" => $sementespuras,
			"outras_sementes" => $outrassementes,
			"material_inerte" => $materialinerte,
			"natureza_material_inerte" => $naturezamaterial,
			"outras_cultivares" => $outrascultivares,
			"obs_pureza" => $obspureza,
			"amostraFK"	=> $idamostra),
		array("idpureza" => $idpureza)
	);



	header("Location: editar-amostra.php?idamostra=".$idamostra);

	break;


	/********************************************************/
	case "addResultado":
/*
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
	); */

	$idamostra = $_POST['codamostra'];
	$desc_repeticao = $_POST['descrepeticao'];
	$porcent_germinacao = $_POST['pgerminacao'];
	$velo_germinacao = $_POST['velogerminacao'];
	$porcent_normais = $_POST['pnormais'];
	$porcent_anormais = $_POST['panormais'];
	$semementesduras = $_POST['semduras'];
	$sementesdormentes = $_POST['semdormentes'];
	$sementesmortas = $_POST['semmortas'];
	$idgerm = 0;

	$qtd_linhas_res = count($sementesmortas);

	$tbresultado->select("SELECT idgerminacao FROM  germinacao 
		WHERE amostraFK= '$idamostra'");
	foreach ($tbresultado->result() as $checagem) {
		$idgerm = $checagem['idgerminacao'];
	}

//echo($idgerm);
//echo $qtd_linhas_res;

	for ($i=0; $i<$qtd_linhas_res; $i++){
		$tbresultado->insert("germ_resultado",
			array("descrepeticao" => $desc_repeticao[$i],
				"porcent_germinacao" => $porcent_germinacao[$i],	
				"velocidade_germinacao" => $velo_germinacao[$i],	
				"plantulas_normais" => $porcent_normais[$i],	
				"plantulas_anormais" => $porcent_anormais[$i],	
				"sementes_duras" => $semementesduras[$i],	
				"semenstes_dormentes" => $sementesdormentes[$i],	
				"sementes_mortas" => $sementesmortas[$i],	
				"germinacaoFK" => $idgerm
			)
		);
	}
//	echo "fim cadastro ..";
	header("Location: lista-germinacao.php?idamostra=".$idamostra);

	break;

	case "createOutrasSem":

	$idamostra = $_POST['codamostra'];
	$dataensaioos = $_POST['dataensaioos'];
	$analistaoutrassem = $_POST['analistaoutrassem'];
	$peamostra = $_POST['peamostra'];
	$outras_especies = $_POST['outrasespecies'];
	$sementes_silvestres  = $_POST['sementessilvestres'];
	$sementes_toleradas = $_POST['sementestoleradas'];
	$sementes_proibidas = $_POST['sementesproibidas'];
	$obsoutrassem = $_POST['obsoutrassementes'];

	$tbpureza->insert("outras_sementes",
		array("dt_outras_sementes" => $dataensaioos,
			"analista_outras_sementes" => $analistaoutrassem,
			"peso_amostra_os" => $peamostra,
			"outras_especies" => $outras_especies,
			"sementes_silvestres" => $sementes_silvestres,
			"sementes_toleradas" => $sementes_toleradas,
			"sementes_proibidas" => $sementes_proibidas,
			"obs_outras_sementes" => $obsoutrassem,
			"amostraFK"	=> $idamostra
		)
	);

	header("Location: informacao-amostra.php?idamostra=".$idamostra);

	break;

	case "editOutrasSementes":

	$idamostra = $_POST['codamostra'];
	$dataensaioos = $_POST['dataensaio'];
	$analistaoutrassem = $_POST['analista'];
	$peamostra = $_POST['peamostra'];
	$outras_especies = $_POST['outrasespecies'];
	$sementes_silvestres  = $_POST['sementessilvestres'];
	$sementes_toleradas = $_POST['sementestoleradas'];
	$sementes_proibidas = $_POST['sementesproibidas'];
	$obsoutrassem = $_POST['obsoutrassem'];

	$idoutrassem=0;

	$tboutrassem->select("SELECT idoutras_sementes FROM  outras_sementes 
		WHERE amostraFK= '$idamostra'");
	foreach ($tboutrassem->result() as $tos) {
		$idoutrassem = $tos['idoutras_sementes'];
	}

	$tboutrassem->update("outras_sementes",
		array("dt_outras_sementes" => $dataensaioos,
			"analista_outras_sementes" => $analistaoutrassem,
			"peso_amostra_os" => $peamostra,
			"outras_especies" => $outras_especies,
			"sementes_silvestres" => $sementes_silvestres,
			"sementes_toleradas" => $sementes_toleradas,
			"sementes_proibidas" => $sementes_proibidas,
			"obs_outras_sementes" => $obsoutrassem,
			"amostraFK"	=> $idamostra),
		array("idoutras_sementes" => $idoutrassem)
	);

	header("Location: editar-amostra.php?idamostra=".$idamostra);
	
	break;

	default:
	echo "Ação não encontrada";
}

?>