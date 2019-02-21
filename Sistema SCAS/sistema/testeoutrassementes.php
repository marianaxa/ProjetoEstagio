<?php

require 'crud.php';
//https://bootsnipp.com/snippets/0BDPG

$idamostra = $_GET['idamostra'];
$outrassementes = new Crud();


$outrassementes->select('SELECT * FROM outras_sementes WHERE amostraFK ='.$idamostra);
$numlinha = 0;
$numlinha = $outrassementes->numRows();

echo $numlinha;
if($numlinha>0){
	// j avai direto pra tela da lista de analise germincao
//	echo "entrou if";
	header('Location: lista-outras-sementes.php?idamostra='.$idamostra);
}else {
	//vai pra tela cadastrar primeiro a data e o analista
	//echo "entrou else";

	header('Location: cadastro-outras-sementes.php?idamostra='.$idamostra);
}

?>