<?php

require 'crud.php';
//https://bootsnipp.com/snippets/0BDPG

$idamostra = $_GET['idamostra'];
$pesomilsementes = new Crud();


$pesomilsementes->select('SELECT * FROM peso_mil_sementes WHERE amostraFK ='.$idamostra);
$numlinha = 0;
$numlinha = $pesomilsementes->numRows();

echo $numlinha;
if($numlinha>0){
	// j avai direto pra tela da lista de analise germincao
//	echo "entrou if";
	header('Location: lista-peso-mil-sementes.php?idamostra='.$idamostra);
}else {
	//vai pra tela cadastrar primeiro a data e o analista
	//echo "entrou else";

	header('Location: cadastro-pesomilsementes.php?idamostra='.$idamostra);
}

?>