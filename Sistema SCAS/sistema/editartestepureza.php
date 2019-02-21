<?php

require 'crud.php';
//https://bootsnipp.com/snippets/0BDPG

$idamostra = $_GET['idamostra'];
$pureza = new Crud();


$pureza->select('SELECT * FROM pureza WHERE amostraFK ='.$idamostra);

$numlinha = 0;
$numlinha = $pureza->numRows();
$zero = 0;
echo $numlinha;
if($numlinha>0){
	// j avai direto pra tela da lista de analise germincao
//	echo "entrou if";
	header('Location: editar-pureza.php?idamostra='.$idamostra);
}else {
	//vai pra tela cadastrar primeiro a data e o analista
	//echo "entrou else";
	header('Location: editar-amostra.php?idamostra='.$idamostra);
	//alert("Não há registro para editar!");
//	header('Location: cadastro-teoragua.php?idamostra='.$idamostra);
}

?>