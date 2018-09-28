<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Rio_branco');

require '../crud.php';
$idrequerente=1;

$requerente = new Crud();
$amostra = new Crud();
$tbgerminacao = new Crud();
$tbnumerosementes = new Crud();
$tbteoragua = new Crud();
$tbtotalplantulas = new Crud();
$tbplantulasanormais = new Crud();
$tbsementesfirmes = new Crud();
$tbsementesmortas = new Crud();
$tbsementeschocas = new Crud();

$requerente->select("SELECT nome_requerente, num_renasem, amostraFK, rua, bairro, cidade, estado, cep from requerente, endereco where idrequerente=$idrequerente and enderecoFK=id_endereco;");

foreach ($requerente->result() as $requerente ){
	$nome_requerente = $requerente['nome_requerente'];
	$num_renasem = $requerente['num_renasem'];
	$idamostra = $requerente['amostraFK'];
	$rua_req = $requerente['rua'];
	$bairro_req = $requerente['bairro'];
	$cidade_req = $requerente['cidade'];
	$estado_req = $requerente['estado'];
	$cep_req = $requerente['cep'];
}

$endereco = $rua_req." ".$bairro_req." ".$cidade_req." - ".$estado_req." CEP - ".$cep_req;

$amostra->select("SELECT idlote_sementes, idamostra, data_chegada, amostrador, categoria, nome_vulgar, nome_cientifico, nome_fornecedor, renasem,  condicao_armazenamento, data_implantacao FROM amostra, lote, fornecedor, especie WHERE idamostra=$idamostra and loteFK=idlote_sementes and especieFK=id_especie and origemFK=id_fornecedor;");

foreach ($amostra->result() as $amostra ){
	$idlote = $amostra['idlote_sementes'];
	$idamostra = $amostra['idamostra'];
	$amostrador = $amostra['amostrador'];
	$dtchegada = $amostra['data_chegada'];
	$categoria = $amostra['categoria'];
	$nomevulgar= $amostra['nome_vulgar'];
	$nomecientifico = $amostra['nome_cientifico'];
	$armazenamento = $amostra['condicao_armazenamento'];
	$dtimplantacao = $amostra['data_implantacao'];
	$nome_fornecedor = $amostra['nome_fornecedor'];
	$num_renasem_fornecedor = $amostra['renasem'];
}

$tbgerminacao->select("SELECT distinct temperatura, substrato from teste_germinacao where amostraFK=$idamostra;");
foreach ($tbgerminacao->result() as $tbgerminacao ){
	$temperatura = $tbgerminacao['temperatura'];
	$substrato = $tbgerminacao['substrato'];
}

$observacoes='';
//*************PESO AMOSTRA************
$tbnumerosementes->select('SELECT * FROM teste_num_sementes WHERE amostraFK ='.$idamostra);
$cont3=0;
foreach ($tbnumerosementes->result() as $tbnumerosementes ){
	$cont3++;
	$pesoamostra = $tbnumerosementes['peso_amostra'];
	$kgnumsementes = $tbnumerosementes['kh_num_sementes'];
	$obsnumsementes = $tbnumerosementes['observacoes_num_sementes'];
}

if($cont3==0){
	$pesoamostra=0;
	$kgnumsementes=0;
}else{
	$observacoes=$obsnumsementes;
}
//*************UMIDADE*****************
$tbteoragua->select('SELECT * FROM teste_teor_agua WHERE amostraFK ='.$idamostra);
$cont=0;
$totalumidade=0;
foreach ($tbteoragua->result() as $tbteoragua ){
	$cont++;
	$totalumidade = $totalumidade+$tbteoragua['umidade'];
	$obsteoragua= $totalumidade['obs_teor_agua'];
}
if ($cont > 0){

	$porcent_umidade= ($totalumidade/$cont);
	$observacoes = $observacoes."\n".$obsteoragua;

}else{
	$porcent_umidade=0;
}
//*************PORCENTAGEM DA GERMINACAO ***********************
$tbtotalplantulas->select('SELECT * FROM total_plantulas4 WHERE amostraFK ='.$idamostra);
$cont2=0;
foreach ($tbtotalplantulas->result() as $totalplantulas ){
	$cont2++;
	$totalplantulas = $totalplantulas['total'];
}
if ($cont2>0){



	$tbplantulasanormais->select('SELECT * FROM plantulas_anormais4 WHERE amostraFK ='.$idamostra);
	foreach ($tbplantulasanormais->result() as $plantulasanormais ){

		$totalplantulasanormais = $plantulasanormais['total'];
	}

	$porcent_totalplantulasanormais = (($totalplantulasanormais*100)/$totalplantulas);
//
	$totalplantulasnormais = ($totalplantulas-$totalplantulasanormais);
	$porcent_totalplantulasnormais = (($totalplantulasnormais*100)/$totalplantulas);
//
	$tbsementesfirmes->select('SELECT * FROM sementes_firmes4 WHERE amostraFK ='.$idamostra);
	foreach ($tbsementesfirmes->result() as $sementesfirmes ){
		$totalsementesfirmes = $sementesfirmes['total'];
	}

	$porcent_totalsementesfirmes = (($totalsementesfirmes*100)/$totalplantulas);

	$tbsementesmortas->select('SELECT * FROM sementes_mortas4 WHERE amostraFK ='.$idamostra);
	foreach ($tbsementesmortas->result() as $sementesmortas ){

		$totalsementesmortas = $sementesmortas['total'];
	}

	$porcent_totalsementesmortas = (($totalsementesmortas*100)/$totalplantulas);

	$tbsementeschocas->select('SELECT * FROM sementes_chocas4 WHERE amostraFK ='.$idamostra);
	foreach ($tbsementeschocas->result() as $sementeschocas ){
		$totalsementeschocas = $sementeschocas['total'];
	}

	$porcent_totalsementeschocas = (($totalsementeschocas*100)/$totalplantulas);
}else{
	$totalplantulas=0;
	$totalplantulasnormais=0;
	$porcent_totalplantulasnormais=0;
	$totalplantulasanormais=0;
	$porcent_totalplantulasanormais=0;
	$totalsementesfirmes=0;
	$porcent_totalsementesfirmes=0;
	$totalsementesmortas=0;
	$porcent_totalsementesmortas=0;
	$totalsementeschocas=0;
	$porcent_totalsementeschocas=0;
	$substrato='';
	$temperatura='';
}
//FIM



?>

<html>

<head>
	<!-- <meta charset="utf-8"> -->
	<title>Boletim de Análise</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="/estilo.css" rel="stylesheet" type="text/css"> 
</head>

<!-- <script>window.print();</script> -->

<body >
<!--	<div style="border:1px solid #000; margin: 1"> -->
		<!--<h2 align="middle" >BOLETIM DE ANÁLISE DE SEMENTES N°<span></span></h2>-->
		<!-- <h2 align="middle" >BOLETIM DE ANÁLISE DE SEMENTES N°</h2> -->
		<!--<div style="border:1px solid #EEE;"> -->
			<table width="100%" class="tabela" align="center"  cellspacing=0>
				<thead> 
					<tr ><th colspan=12 align="center" ><h2><b>BOLETIM DE ANÁLISE DE SEMENTES N°</b></h2></th>
					<tr>
			</table>
			<!-- tabela da idenficacao do requerente -->
			<table  width="100%" class="tabela" align="center" border=1 cellspacing=0>
				<thead> 
					<tr style="COLOR: #000080"><th colspan=12 align="center" bgcolor="#f2f2f2" ><b>IDENTIFICAÇÃO DO REQUERENTE</b></tr>
					</thead>
					<tr>
						<td><b>Requerente:</b> <?php echo $nome_requerente; ?></td>
						<td><b>N° RENASEM:</b> <?php echo $num_renasem; ?></td>
					</tr>
					<tr>
						<td colspan="2" width="50%"><b>Endereço:</b> <?php echo $endereco; ?></td>
					</tr>
				</table>


				<!-- tabela da idenficacao da amostra -->
				<table  width="100%" class="tabela" align="center" border=1 cellspacing=0>
					<!-- -->
					<thead>
						<tr style="COLOR: #000080">
							<td colspan=12 align="center" bgcolor="#f2f2f2" ><b>IDENTIFICAÇÃO DA AMOSTRA</b></td>
						</tr>  
					</thead>  	
					<!--Esses dados provavelmente vem de um pre cadastro-->
					<tr>
						<td width="50%"><b>Espécie:</b> <?php echo $nomevulgar; ?> (<i><?php echo $nomecientifico; ?></i>)</td>
						<td width="50%"><b>Cultivar:</b> <?php echo $nomevulgar; ?></td>
						
					</tr>

					<tr>
						<td width="50%"><b>N° do Lote:</b> <?php echo $idlote; ?> </td>
						<td><b>Representatividade:</b> <?php echo "XXX Kg" ?> </td>
					</tr>

					<tr>
						<td><b>Safra:</b> <?php echo "Ano" ?> </td>
						<td width="50%"><b>Procedencia:</b> <?php echo $nome_fornecedor; ?></td>
					</tr>

					<tr>
						<td width="50%"><b>Nome do Amostrador/RT:</b> <?php echo $amostrador; ?></td>
						<td><b>N° RENASEM:</b> <?php echo "Renasem do aamostrador" ?> </td>
					</tr>

					<tr>
						<td width="50%"><b>Data da Amostragem:</b> <?php echo date('d-m-Y',strtotime($dtimplantacao)); ?></td>
						<td width="50%"><b>Peneira:</b> <?php echo "-0-"; ?></td>
					</tr>

				</table>	
				<!-- -->
				<table width="100%" class="tabela" align="center" border=1 cellspacing=0>
					<tr style="COLOR: #000080" align=center>
						<td colspan=12 align=center bgcolor="#f2f2f2"><b>IDENTIFICAÇÃO DA AMOSTRA NO LABORATÓRIO</b></td>
					</tr>
					<tr>
						<td ><b>N° da Amostra:</b> <?php echo $idamostra; ?></td>
						<td><b>Data do Recebimento:</b> <?php echo date('d-m-Y',strtotime($dtchegada)); ?></td>
					</tr>
				</table>
				
				<table width="100%" class="tabela" align="center" border=1 cellspacing="0" >
					<thead> 
						<tr style="COLOR: #000080"><th colspan="12" bgcolor="#f2f2f2" align="middle">RESULTADO DA ANÁLISE</th></tr>
					</thead>


					<tr>
						<td colspan="3" align="center" ><b>Pureza em <?php echo "XXX Kg"; ?></b><br>(%)</td>
						<td colspan="1" rowspan="2" align="center" ><b>VERIFICAÇÃO <br>DE OUTRAS<br> CULTIVARES</b><br>(Nº)<br> em -0-</td>
						<td colspan="8" align="center" ><b>GERMINAÇÃO</b><br>(%)</td>
					</tr>

					<tr>		
						<td align="center">Sementes  Puras </td>
						<td align="center">Material  Inerte </td>
						<td align="center">Outras  Sementes </td>
						<td align="center">Plântulas  Normais </td>
						<td align="center">Plântulas  Anormais </td>
						<td align="center">Sementes Duras </td>
						<td align="center">Sementes Dormentes </td>
						<td align="center">Sementes Mortas </td>
					</tr>
					<tr>
						<td align="center"> 1</td>
						<td align="center"> 2</td>
						<td align="center"> 3</td>
						<td align="center"> 4</td>
						<td align="center"> 5</td>
						<td align="center"> 6</td>
						<td align="center"> 7</td>
						<td align="center"> 8</td>
						<td align="center"> 9</td>
					</tr>
					<tr>
						<td align="center"> <?php echo "XXX" ?></td>
						<td align="center"> <?php echo "XXX" ?></td>
						<td align="center"> <?php echo "XXX" ?></td>
						<td align="center"> <?php echo "XXX" ?></td>
						<td align="center"> <?php echo $porcent_totalplantulasnormais; ?></td>
						<td align="center"> <?php echo $porcent_totalplantulasanormais; ?></td>
						<td align="center"> <?php echo $porcent_totalsementesfirmes; ?></td>
						<td align="center"> <?php echo $porcent_totalsementeschocas; ?></td>
						<td align="center"> <?php echo $porcent_totalsementesmortas; ?></td>
					</tr>
					<tr>
						<td  colspan="12"  ><p>Natureza do Material Inerte: <?php echo "-0-" ?></p></td>
					</tr>
					<tr >
						<td  colspan="3" border=none>Substrato: <?php echo $substrato; ?> </td>
						<td  colspan="2" border="0">Temperatura (°C): <?php echo $temperatura; ?></td>
						<td  colspan="7" border=none>Tratamento Especial: <?php echo "-N-" ?></td>
					</tr>
					<tr>
						<td  colspan="5" border:none >Data de Conslusão do Teste de Germinação: </td>
						<td colspan="6">Duração do Teste de Germinação: </td>
					</tr>
					<!-- Outras determinacoes -->
					<tr>
						<td colspan="4" align="center" ><b>OUTRAS SEMENTES POR NÚMERO</b></td>
						<td colspan="7" align="center" ><b>OUTRAS DETERMINAÇÕES</b></td>
					</tr>

					<tr>
						<td rowspan="2" colspan="1" align="center">Outras Espécies Cultivadas<br> %</td>
						<td rowspan="2" colspan="1" align="center">Sementes Silvestres </td>
						<td rowspan="1" colspan="2" align="center">Sementes Nocivas </td>
						<td rowspan="2" colspan="1" align="center">Det. do Grau de Umidade %</td>
						<td rowspan="2" colspan="1" align="center">Peso de mil Sementes g </td>
						<td rowspan="2" colspan="1" align="center">Número de Sementes por kg </td>
						<td rowspan="2" colspan="1" align="center"> </td>
						<td rowspan="2" colspan="1" align="center"> </td>
					</tr>
					<tr>						
						<td align="center">Toleradas </td>
						<td align="center">Proibidas</td>
					</tr>
					<tr>
						<td align="center"> 10</td>
						<td align="center"> 11</td>
						<td align="center"> 12</td>
						<td align="center"> 13</td>
						<td align="center"> 14</td>
						<td align="center"> 15</td>
						<td align="center"> 16</td>
						<td align="center"> 17</td>
						<td align="center"> 18</td>
					</tr>
					<tr>
						<td align="center">  <?php echo "XXX" ?></td>
						<td align="center"> <?php echo "XXX" ?></td>
						<td align="center"> <?php echo "XXX" ?></td>
						<td align="center">  <?php echo "XXX" ?></td>
						<td align="center">  <?php echo $porcent_umidade; ?></td>
						<td align="center"> <?php echo $pesoamostra; ?></td>
						<td align="center"> <?php echo $kgnumsementes; ?></td>
						<td align="center"> <?php echo "-0-" ?></td>
						<td align="center">  <?php echo "-0-" ?></td>
					</tr>
					<tr>
						<td rowspan="2" colspan="12"><b>OBSERVAÇÕES: </b> <?php echo $observacoes; ?></td>
					</tr>
					
				</table>
				<table width="100%" class="tabela" align="center"  cellspacing="0"> 
				<!--
					<tr >
						<td  width="50%"><b>NOTAS:</b></td>
						<td  width="50%"><b>Rio Branco, <?php echo strftime(' %d de %B de %Y', strtotime('today'));?>.</b></td>
					</tr>
				-->
				<tr >
					<td width="50%" style="border: 1px solid #000;">
						<b>NOTAS:</b>
						<p>
							1-A identificação da amostra é de exclusiva responsabilidade do temetente.
							<br>
							2-A presente análise tem seu valor restrito à amostra entregue no laboratório.
							<br>
							3- Métodos de análise segundo a RAS em vigor ou outro informado no campo observações.
						</p>
						<br>
					</td>
					<!--&nbsp; PRA DA UM TAB -->
					<td width="50%" style="border: 1px solid #000;" >
						<br>
						<b>&nbsp; Rio Branco, <?php echo strftime(' %d de %B de %Y', strtotime('today'));?>.</b>
						<p align="middle">
							<br><br><br>__________________________________
							<br>Eng.ª Agr.ª Marilene de Campos Bento
							<br>CREA - AC-2584/D &nbsp; RENASEM &nbsp; AC - 00237/2017
							<br>RESPONSÁVEL TÉCNICO
						</p>
						<br>
					</td>
				</tr>

				</table>
				<table width="100%" class="tabela" align="center"  cellspacing="0" >
					<tr align="middle" >
						<td colspan="2">1°Via-Requerente</td>
						<td colspan="2">2°Via-Lasf</td>
						<td colspan="2">3°Via LASO-Supervisor</td>
					</tr>
				</table>
		<!--		  
			</div>
		</div>
	-->
	</body>

	</html>