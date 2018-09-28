<?php 

$id = $_POST['id'];

require 'crud.php';
$lote = new Crud();
$especie = new Crud();


//1 fazer slect do lote, inmpotar crud
//2 pega id da especie 
//3 faze selec com id da especie
//4 enviar dentro do array i id dle, data, nome vulgar, cientifoc e especie

$lote->select("SELECT especieFK, data_chegada FROM lote where idlote_sementes = '$id' ");

$idespecie = 0;
$datachegada = '';
foreach ($lote->result() as $lote ){
  $idespecie= $lote['especieFK'];
  $datachegada = $lote['data_chegada'];
}


$especie->select("SELECT id_especie, nome_cientifico, nome_vulgar, familia FROM especie where id_especie = $idespecie ");

$ncientifico='';
$nvulgar='';
$familia='';

foreach ($especie->result() as $especie ){
  $ncientifico= $especie['nome_cientifico'];
  $nvulgar = $especie['nome_vulgar'];
  $familia = $especie['familia'];
}

//$espec = "dudu";

$arr = array($id, $ncientifico, $nvulgar, $familia, $datachegada );
echo implode("|",$arr);

//$string = $id . "|" .$nvulgar ;
//echo $string;


?>
