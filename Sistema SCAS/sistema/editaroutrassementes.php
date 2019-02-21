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
	header('Location: editar-outras-sementes.php?idamostra='.$idamostra);
}else {
	//echo  "<script>alert('Não há registro para editar!');</script>";
	
	header('Location: editar-amostra.php?idamostra='.$idamostra);
	//alert("Não há registro para editar!");
}

?>