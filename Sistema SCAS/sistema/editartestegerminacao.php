<?php

require 'crud.php';
//https://bootsnipp.com/snippets/0BDPG

$idamostra = $_GET['idamostra'];
$germinacao = new Crud();


$germinacao->select('SELECT * FROM germinacao WHERE amostraFK ='.$idamostra);
$numlinha = 0;
$numlinha = $germinacao->numRows();
$zero = 0;
echo $numlinha;
if($numlinha>0){
	// j avai direto pra tela da lista de analise germincao
	//echo "entrou if";
	header('Location: editar-germinacao.php?idamostra='.$idamostra);
}else {

	header('Location: editar-amostra.php?idamostra='.$idamostra);
}

?>