<?php

require 'crud.php';
//https://bootsnipp.com/snippets/0BDPG

$idamostra = $_GET['idamostra'];
$teoragua = new Crud();


$teoragua->select('SELECT * FROM teor_agua WHERE amostraFK ='.$idamostra);
$numlinha = 0;
$numlinha = $teoragua->numRows();
$zero = 0;
echo $numlinha;
if($numlinha>0){
	// j avai direto pra tela da lista de analise germincao
//	echo "entrou if";
	header('Location: lista-teoragua.php?idamostra='.$idamostra);
}else {
	//vai pra tela cadastrar primeiro a data e o analista
	//echo "entrou else";

	header('Location: cadastro-teoragua.php?idamostra='.$idamostra);
}

?>