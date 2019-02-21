<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Rio_branco');

require '../crud.php';
$idrequerente=$_GET['codigoreq'];

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
	<div style="border:1px solid #000; margin: 1">
		<!--<h2 align="middle" >BOLETIM DE ANÁLISE DE SEMENTES N°<span></span></h2>-->
		<h2 align="middle" >BOLETIM DE ANÁLISE DE SEMENTES </h2>
		<div style="border:1px solid #EEE;">
			<table  width="100%" class="tabela" align="center" border=1 cellspacing=0>
				<thead> 
					<tr style="COLOR: #000080"><th colspan=12 align="center" bgcolor="#f2f2f2" ><b>IDENTIFICAÇÃO DO REQUERENTE</b></tr>
					</thead>
					<tr>
						<td><b>Requerente:</b> <?php echo $nome_requerente; ?></td>
						<td><b>N° RENASEM:</b> <?php echo $num_renasem; ?></td>
					</tr>

					<tr>
						<td width="50%"><b>Endereço:</b> <?php echo $endereco; ?></td>
					</tr>
					<!-- -->
					<tr style="COLOR: #000080">
						<td colspan=12 align="center" bgcolor="#f2f2f2" ><b>IDENTIFICAÇÃO DA AMOSTRA</b></td>
					</tr>    	
					<!--Esses dados provavelmente vem de um pre cadastro-->
					<tr>
						<td width="50%"><b>Espécie:</b> <?php echo $nomevulgar; ?> (<i><?php echo $nomecientifico; ?></i>)</td>
						<td width="50%"><b>Procedencia:</b> <?php echo $nome_fornecedor; ?></td>
					</tr>

					<tr>
						<td width="50%"><b>N° do Lote:</b> <?php echo $idlote; ?> </td>
						<td><b>N° RENASEM:</b> <?php echo $num_renasem_fornecedor; ?> </td>
					</tr>

					<tr>
						<td width="50%"><b>Nome do Amostrador:</b> <?php echo $amostrador; ?></td>
					</tr>

					<tr>
						<td width="50%"><b>Data da Amostragem:</b> <?php echo date('d-m-Y',strtotime($dtimplantacao)); ?></td>
					</tr>
					<!-- -->
					<tr style="COLOR: #000080" align=center>
						<td colspan=12 align=center bgcolor="#f2f2f2"><b>IDENTIFICAÇÃO DA AMOSTRA NO LABORATÓRIO</b></td>
					</tr>
					<tr>
						<td><b>N° da Amostra:</b> <?php echo $idamostra; ?></td>
						<td><b>Data do Recebimento:</b> <?php echo date('d-m-Y',strtotime($dtchegada)); ?></td>
					</tr>
				</table>
				<table width="100%" class="tabela" align="center" border=1 cellspacing=0>
					<thead> 
						<tr style="COLOR: #000080"><th colspan="12" bgcolor="#f2f2f2" align="middle">RESULTADO DA ANÁLISE</th></tr>
					</thead>
					<tfoot>
						<tr>
							<td>Substrato: <?php echo $substrato; ?> </td>
							<td>Temperatura (°C): <?php echo $temperatura; ?></td>
						</tr>
		<!--	<tr>
				<td>Data de Conslusão do Teste de Germinação: </td>
				<td>Duração do Teste de Germinação: </td>
			</tr>
		-->
	</tfoot>

	<tr>
		<td colspan=12 align="center" ><b>GERMINAÇÃO</b><br>(%)</td>
	</tr>
	<tr>
		<td align="center">Plântulas Normais </td>
		<td align="center">Plântulas Anormais </td>
		<td align="center">Sementes Duras </td>
		<td align="center">Sementes Dormentes </td>
		<td align="center">Sementes Mortas </td>
	</tr>
	<tr>
		<td align="center"> <?php echo $totalplantulas; ?></td>
		<td align="center"> <?php echo $totalplantulasanormais; ?></td>
		<td align="center"> <?php echo $totalsementesfirmes; ?></td>
		<td align="center"> <?php echo $totalsementeschocas; ?></td>
		<td align="center"> <?php echo $totalsementesmortas; ?></td>
	</tr>
	<tr>
		<td align="center"> <?php echo $porcent_totalplantulasnormais; ?></td>
		<td align="center"> <?php echo $porcent_totalplantulasanormais; ?></td>
		<td align="center"> <?php echo $porcent_totalsementesfirmes; ?></td>
		<td align="center"> <?php echo $porcent_totalsementeschocas; ?></td>
		<td align="center"> <?php echo $porcent_totalsementesmortas; ?></td>
	</tr>
</table>

<table width="100%" class="tabela" align="center" border=1 cellspacing=0>
	<thead> 
		<tr style="COLOR: #000080"><th colspan="12" bgcolor="#f2f2f2" align="middle">OUTRAS DETERMINAÇÕES</th></tr>
	</thead>
	<tr>
		<td align="center">Det. de Grau de Umidade<br> %</td>
		<td align="center">Peso da Amostra </td>
		<td align="center">Número de Sementes por kg </td>
	</tr>
	<tr>
		<td align="center">  <?php echo $porcent_umidade; ?></td>
		<td align="center"> <?php echo $pesoamostra; ?></td>
		<td align="center"> <?php echo $kgnumsementes; ?></td>
	</tr>
	<tr>
		<td><b>OBSERVAÇÕES: </b> <?php echo $observacoes; ?></td>
	</tr>
</table>
<table width="100%" class="tabela" align="center"> 
	<tr>
		<td ><br><b>Rio Branco, <?php echo strftime(' %d de %B de %Y', strtotime('today'));?>.</b> </td>
	</tr>
	<tr>
		<td align="middle"><br><br><br>_________________________________________</td>
	</tr>
	<tr>
		<td align="middle">RESPONSÁVEL TÉCNICO</td>
	</tr>

</table>
</div>
</div>
</body>

</html>