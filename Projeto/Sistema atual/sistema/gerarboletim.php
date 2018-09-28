<?php

require 'crud.php';
//https://bootsnipp.com/snippets/0BDPG

$idamostra = $_GET['idamostra'];
$amostra =  new Crud();


$amostra->update("lote",
			array("situacao" => "Finalizada"),
			array("idamostra" =>$idamostra)
		);

header('Location: ./pdf/boletim.php?idamostra='.$idamostra);


?>