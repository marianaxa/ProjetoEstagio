<?php 

require 'crud.php';
$requerente= new Crud();
$endereco = new Crud();


$acao = $_POST['acao'];


switch ($acao){

//if($acao="create"){
	case "create":
	$idamostra = $_POST['numAmostra'];
	$nome_requerente = $_POST['requerente'];
	$renasem = $_POST['numRenasem'];
	$rua = $_POST['rua'];
	$cep = $_POST['cep'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];

	
		//insert endereco
		$endereco->insert("endereco", array("rua" => $rua, "bairro" => $bairro,  "cidade" => $cidade, 
			"estado" => $estado, "cep" => $cep) );

		//select id endereco
		$idEndereco = 0;

		$endereco->select("SELECT * FROM endereco order by id_endereco desc limit 1");
		foreach ($endereco->result() as $endereco ){ 
			$idEndereco =  $endereco['id_endereco'];
		}
		//fim endereco

		//insert 
		$requerente->insert("requerente",
			array("nome_requerente" => $nome_requerente,
				"num_renasem" => $renasem, 
				"enderecoFK" => $idEndereco, 
				"amostraFK" => $idamostra) );


		$idRequerente = 0;

		$requerente->select("SELECT * FROM requerente order by idrequerente desc limit 1");
		foreach ($requerente->result() as $requerente ){ 
			$idRequerente =  $requerente['idrequerente'];
		}

		$endereco = null;
	
	header('Location: lista-requerente.php');

//	header('Location: sistema/pdf/print.php?idrequerente='.$idRequerente);

	break;




	default:
	echo "Acao nao encontrada";
}


?>