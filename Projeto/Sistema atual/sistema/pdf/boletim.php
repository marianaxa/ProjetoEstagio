<?php 
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Rio_branco');

session_start();
//require_once 'conexao.php';

require '../crud.php';
$idamostra = $_GET['idamostra'];
$amostra = new Crud();
$tbpureza = new Crud();
$tbgerminacao = new Crud();
$tbpesomilsementes = new Crud();


//********************** DADOS AMOSTRA ********************
$amostra->select("SELECT idlote_sementes, idamostra, data_chegada, amostrador, categoria, nome_vulgar, nome_cientifico, nome_fornecedor, renasem, rua, cidade, estado, cep, condicao_armazenamento, data_implantacao FROM amostra, lote, fornecedor, endereco, especie WHERE idamostra=$idamostra and loteFK=idlote_sementes and especieFK=id_especie and origemFK=id_fornecedor and id_endereco=enderecoFK;");

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
	$rua = $amostra['rua'];
	$cidade = $amostra['cidade'];
	$estado = $amostra['estado'];
	$cep = $amostra['cep'];
}

$endereco = $rua.", ".$cidade." - ".$estado."	CEP - ".$cep;
$peneira = "-0-";
//*********************************************************
//********************** DADOS ANALISES *******************
$tbpureza->select("SELECT sementes_puras, outras_sementes, material_inerte, outras_cultivares FROM pureza where amostraFK=$idamostra;");
foreach ($tbpureza->result() as $tbpureza) {
	$sementes_puras = $tbpureza['sementes_puras'];
	$outras_sementes = $tbpureza['outras_sementes'];
	$material_inerte = $tbpureza['material_inerte'];
	$outras_cultivares = $tbpureza['outras_cultivares'];
}

$tbgerminacao->select("SELECT temperatura, substrato, tratamento, totalplantulas, plantulasanormais,
sementesfirmes, sementesmortas, sementeschocas FROM germinacao where amostraFK=$idamostra;");
foreach ($tbgerminacao->result() as $tbgerminacao) {
	$temperatura = $tbgerminacao['temperatura'];
	$substrato = $tbgerminacao['substrato'];
	$tratamento = $tbgerminacao['tratamento'];
	$plantulasnormais = $tbgerminacao['totalplantulas'];
	$plantulasanormais = $tbgerminacao['plantulasanormais'];
	$sementesfirmes = $tbgerminacao['sementesfirmes'];
	$sementesmortas = $tbgerminacao['sementesmortas'];
	$sementeschocas = $tbgerminacao['sementeschocas'];
}
$naturamaterialinerte="-0-";

$tbpesomilsementes->select("SELECT kg_mil_sementes, kg_num_medio FROM peso_mil_sementes  where amostraFK=$idamostra;");
foreach ($tbpesomilsementes->result() as $tbpesomilsementes) {
	$pesomilsementes = $tbpesomilsementes['kg_mil_sementes'];
	$numsementeskg = $tbpesomilsementes['kg_num_medio'];
}
//*********************************************************

use Dompdf\Dompdf;

require_once 'dompdf/autoload.inc.php';


$dataDia = strftime(' %d de %B de %Y', strtotime('today'));
$nomeEng = "Marilene de Campos Bento";
$crea = "AC-2584/D";
$renasem = "AC - 00237/2017";
$campoN = "-N-";
$campo0 = "-0-";
$html = "";
$nome = "a";

	//$sql = "SELECT * FROM inscricoes WHERE cpf='$cpf'";
	//$result_busca = mysqli_query($connect,$sql) or die(mysqli_error($connect));

	//$row = mysqli_fetch_assoc($result_busca);


	if(!empty($nome)){//orignalme é o $row
		//$html .= $row['cpf'] . "<br>";
		//$nome .= $row['nome'] . "<br>";

		$dompdf = new DOMPDF();

		$dompdf->load_html('
			<style>

			@charset "UTF-8";

			</style>


						<table width="100%" class="tabela" align="center"  cellspacing=0>
				<thead> 
					<tr ><th colspan=12 align="center" ><h2><b>BOLETIM DE ANÁLISE DE SEMENTES </b></h2></th>
					<tr>
			</table>
			<!-- tabela da idenficacao do requerente -->
			<table  width="100%" class="tabela" align="center" border=1 cellspacing=0>
				<thead> 
					<tr style="COLOR: #000080"><th colspan=12 align="center" bgcolor="#f2f2f2" ><b>IDENTIFICAÇÃO DO REQUERENTE</b></tr>
					</thead>
					<tr>
						<td colspan="6"><b>Requerente:</b> '.$nome_fornecedor.'</td>
						<td colspan="6"><b>N° RENASEM:</b> '.$num_renasem_fornecedor.'</td>
					</tr>
					<tr>
						<td colspan="12"><b>Endereço:</b> '.$endereco.'</td>
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
					<tr>
						<td colspan="6"><b>Espécie:</b> '.$nomevulgar.' (<i>'.$nomecientifico.'</i>)</td>
						<td colspan="6"><b>Cultivar:</b> '.$nomevulgar.'</td>
						
					</tr>

					<tr>
						<td colspan="6"><b>N° do Lote:</b> '.$idlote.' </td>
						<td colspan="6"><b>Representatividade:</b> <?php echo "XXX Kg" ?> </td>
					</tr>

					<tr>
						<td colspan="6"><b>Safra:</b> <?php echo "Ano" ?> </td>
						<td colspan="6"><b>Procedência:</b> <?php echo $nome_fornecedor; ?></td>
					</tr>

					<tr>
						<td colspan="6"><b>Nome do Amostrador/RT:</b> '.$amostrador.' <?php echo $amostrador; ?></td>
						<td colspan="6"><b>N° RENASEM:</b> <?php echo "Renasem do aamostrador" ?> </td>
					</tr>

					<tr>
						<td colspan="6"><b>Data da Amostragem:</b> '.$dtimplantacao.'</td>
						<td colspan="6"><b>Peneira:</b> '.$peneira.'</td>
					</tr>

				</table>	
				<!-- -->
				<table width="100%" class="tabela" align="center" border=1 cellspacing=0>
					<tr style="COLOR: #000080" align=center>
						<td colspan=12 align=center bgcolor="#f2f2f2"><b>IDENTIFICAÇÃO DA AMOSTRA NO LABORATÓRIO</b></td>
					</tr>
					<tr>
						<td colspan="6"><b>N° da Amostra:</b>' .$idamostra.'</td>
						<td colspan="6"><b>Data do Recebimento:</b> '.$dtchegada.' </td>
					</tr>
				</table>
				
				<table width="100%" class="tabela" align="center" border=1 cellspacing="0" >
					<tr style="COLOR: #000080" align=center>
						<td colspan=12 align=center bgcolor="#f2f2f2"><b>RESULTADO DA ANÁLISE</b></td>
					</tr>
					<tr>
						<td colspan="3" align="center" ><b>Pureza em <?php echo "XXX Kg"; ?></b><br>(%)</td>
						<td colspan="2" rowspan="2" align="center" ><b>VERIFICAÇÃO <br>DE OUTRAS<br> CULTIVARES</b><br>(Nº)<br> em -0-</td>
						<td colspan="7" align="center" ><b>GERMINAÇÃO</b><br>(%)</td>
					</tr>

					<tr>		
						<td colspan="1" align="center">Sementes  Puras </td>
						<td colspan="1" align="center">Material  Inerte </td>
						<td colspan="1" align="center">Outras  Sementes </td>
						<td colspan="1" align="center">Plântulas  Normais </td>
						<td colspan="2" align="center">Plântulas  Anormais </td>
						<td colspan="1" align="center">Sementes Duras </td>
						<td colspan="1" align="center">Sementes Dormentes </td>
						<td colspan="2" align="center">Sementes Mortas </td>
					</tr>
					<tr>
						<td colspan="1" align="center"> 1</td>
						<td colspan="1" align="center"> 2</td>
						<td colspan="1" align="center"> 3</td>
						<td colspan="2" align="center"> 4</td>
						<td colspan="1" align="center"> 5</td>
						<td colspan="2" align="center"> 6</td>
						<td colspan="1" align="center"> 7</td>
						<td colspan="1" align="center"> 8</td>
						<td colspan="2" align="center"> 9</td>
					</tr>
					<tr>
						<td colspan="1" align="center"> '.$sementes_puras.'</td>
						<td colspan="1" align="center"> '.$material_inerte.'</td>
						<td colspan="1" align="center"> '.$outras_sementes.'</td>
						<td colspan="2" align="center"> '.$outras_cultivares.'</td>
						<td colspan="1" align="center"> '.$plantulasnormais.'</td>
						<td colspan="2" align="center"> '.$plantulasanormais.'</td>
						<td colspan="1" align="center"> '.$sementesfirmes.'</td>
						<td colspan="1" align="center"> '.$sementeschocas.'</td>
						<td colspan="2" align="center"> '.$sementesmortas.'</td>
					</tr>
					<tr>
						<td  colspan="12"><p>Natureza do Material Inerte: <?php echo "-0-" ?></p></td>
					</tr>
					<tr >
						<td  colspan="3" border=none>Substrato: '.$substrato.' </td>
						<td  colspan="3" style="border: 1px  #fff;">Temperatura (°C): '.$temperatura.'</td>
						<td  colspan="6" border=none>Tratamento Especial: '.$tratamento.'</td>
					</tr>
					<tr>
						<td  colspan="5" border:none >Data de Conclusão do Teste de Germinação: </td>
						<td colspan="7">Duração do Teste de Germinação: </td>
					</tr>
					<!-- Outras determinacoes -->
					<tr>
						<td colspan="4" align="center" ><b>OUTRAS SEMENTES POR NÚMERO</b></td>
						<td colspan="8" align="center" ><b>OUTRAS DETERMINAÇÕES</b></td>
					</tr>

					<tr>
						<td rowspan="2" colspan="1" align="center">Outras Espécies Cultivadas<br> %</td>
						<td rowspan="2" colspan="1" align="center">Sementes Silvestres </td>
						<td rowspan="1" colspan="2" align="center">Sementes Nocivas </td>
						<td rowspan="3" colspan="2" align="center">Det. do Grau de Umidade %</td>
						<td rowspan="3" colspan="2" align="center">Peso de mil Sementes g </td>
						<td rowspan="3" colspan="2" align="center">Número de Sementes por kg </td>
						<td rowspan="3" colspan="1" align="center"> </td>
						<td rowspan="3" colspan="1" align="center"> </td>
					</tr>
					<tr>					
						<td colspan="1" align="center">Toleradas </td>
						<td colspan="1" align="center">Proibidas</td>
					</tr>
					<tr>
						<td colspan="2" align="center">(N°) em -0- g </td>
						<td colspan="2" align="center">(N°) em -0- g </td>
					</tr>
					<tr>
						<td colspan="1" align="center"> 10</td>
						<td colspan="1" align="center"> 11</td>
						<td colspan="1" align="center"> 12</td>
						<td colspan="1" align="center"> 13</td>
						<td colspan="2" align="center"> 14</td>
						<td colspan="2" align="center"> 15</td>
						<td colspan="2" align="center"> 16</td>
						<td colspan="1" align="center"> 17</td>
						<td colspan="1" align="center"> 18</td>
					</tr>
					<tr>
						<td colspan="1" align="center"> '.$campoN.' </td>
						<td colspan="1" align="center"> '.$campoN.'</td>
						<td colspan="1" align="center"> '.$campoN.'</td>
						<td colspan="1" align="center"> '.$campoN.'</td>
						<td colspan="2" align="center">  <?php echo $porcent_umidade; ?></td>
						<td colspan="2" align="center"> '.$pesomilsementes.'</td>
						<td colspan="2" align="center"> '.$numsementeskg.'</td>
						<td colspan="1" align="center"> <?php echo "-0-" ?></td>
						<td colspan="1" align="center">  <?php echo "-0-" ?></td>
					</tr>
					<tr>
						<td colspan="12"><b>OBSERVAÇÕES: </b> <?php echo $observacoes; ?></td>
					</tr>
					
				</table>
				<table width="100%" class="tabela" align="center"  cellspacing="0"> 

				<tr >
					<td width="50%" style="border: 1px solid #000;">
						<b>NOTAS:</b>
						<p>
							1 - A identificação da amostra é de exclusiva responsabilidade do remetente.
							<br>
							2 - A presente análise tem seu valor restrito à amostra entregue no laboratório.
							<br>
							3 - Métodos de análise segundo a RAS em vigor ou outro informado no campo observações.
						</p>
					</td>
					<!--&nbsp; PRA DA UM TAB -->
					<td width="50%" style="border: 1px solid #000;" >
						<br>
						<b>&nbsp; Rio Branco, '.$dataDia.'.</b>
						<p align="center">
							<br><br><br>__________________________________
							<br>Eng.ª Agr.ª '.$nomeEng.'
							<br>CREA - '.$crea.' &nbsp; RENASEM &nbsp; '.$renasem.'
							<br>RESPONSÁVEL TÉCNICO
						</p>
					</td>
				</tr>

				</table>
				<table width="100%" class="tabela" align="center"  cellspacing="1" >
					<tr align="middle" >
						<td colspan="3">1°Via-Requerente</td>
						<td colspan="3">2°Via-Lasf</td>
						<td colspan="3">3°Via LASO-Supervisor</td>
					</tr>
				</table>
		<!--		  
			</div>
		</div>
	-->

			');
		$dompdf->setPaper('A4', 'portrait'); 


$dompdf->render();


$dompdf->stream("Boletim.pdf", 
	array(
		"Attachment" => false
			) //so tirar o array pra baixar direto
);
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao geral Boletim!</div>";
		//header("Location: index.php");
}

?>