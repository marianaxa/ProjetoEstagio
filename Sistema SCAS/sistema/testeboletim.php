<?php
session_start();
require 'crud.php';
//https://bootsnipp.com/snippets/0BDPG

$idamostra = $_GET['idamostra'];
$umidade = new Crud();
$germinacao = new Crud();
$pureza = new Crud();
$pesomilsementes = new Crud();
$outras_sementes = new Crud();



$germinacao->select('SELECT * FROM germinacao WHERE amostraFK ='.$idamostra);
$pesomilsementes->select('SELECT * FROM peso_mil_sementes WHERE amostraFK ='.$idamostra);
$pureza->select('SELECT * FROM pureza WHERE amostraFK ='.$idamostra);
$umidade->select('SELECT * FROM teor_agua WHERE amostraFK ='.$idamostra);
$outras_sementes->select('SELECT * FROM outras_sementes WHERE amostraFK ='.$idamostra);


$numlinhapms = 0;
$numlinhapms = $pesomilsementes->numRows();

$numlinhag = 0;
$numlinhag = $germinacao->numRows();

$numlinhap = 0;
$numlinhap = $pureza->numRows();

$numlinhau = 0;
$numlinhau = $umidade->numRows();

$numlinhaos = 0;
$numlinhaos = $outras_sementes->numRows();

if($numlinhapms>0 && $numlinhag>0 && $numlinhap>0 && $numlinhau>0 && $numlinhaos){
	// pode gerar o relatorio
	header('Location: gerarboletim.php?idamostra='.$idamostra);

}else {
	// nao gera relatorio

$_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade in'>
					 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					 <strong>Análise Incompleta ! </strong> Boletim Indiponível.</div>";

		header('Location: informacao-amostra.php?idamostra='.$idamostra);
}

?>