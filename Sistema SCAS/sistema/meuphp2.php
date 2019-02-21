<?php 

$id = $_POST['id'];

require 'crud.php';
$especie = new Crud();


$especie->select("SELECT id_especie, nome_cientifico, nome_vulgar, familia FROM especie where id_especie = $id ");

$ncientifico='';
$nvulgar='';
$familia='';

foreach ($especie->result() as $especie ){
  $ncientifico= $especie['nome_cientifico'];
  $nvulgar = $especie['nome_vulgar'];
  $familia = $especie['familia'];
}


$arr = array($ncientifico, $nvulgar, $familia);
echo implode("|",$arr);

//$string = $id . "|" .$nvulgar ;
//echo $string;


?>
