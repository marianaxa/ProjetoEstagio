<?php 

require 'crud.php';
$lote= new Crud();
$fornecedor = new Crud();
$endereco = new Crud();
$especie = new Crud();

//oega um id pra cada, e sempre limpar dentro do if
//fazer 3 if, uma variavel pra cada, e ai limpar depois de executar

//$acaoDEL = $_GET['acaoDEL'];

//echo $acao;
/*
if($acaoDEL="delete"){
	$id = $_GET['id'];

	$lote->delete("lote", array("id" => $id));
	$acaoDEL=null;

	header('Location: lista-lote.php');
}

*/


$acaoForn = $_POST['acao'];


switch ($acaoForn){

//if($acao="create"){
	case "create":
	$id = $_POST['idlote'];
//	$nomeespecie = $_POST['idradio'];
	$nomeespecie = $_POST['nome-vulgar'];
	$data = $_POST['dataChegada'];
	$nomeFornecedor = $_POST['fornecedor'];
	$renasem = $_POST['numRenasem'];
	$rua = $_POST['rua'];
	$telefone = $_POST['telefone'];
	$cep = $_POST['cep'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];

	if ($lote->numRows() > 0) {
		alert("Algo deu errado!");
	}else{
		//select id especie
		$idespecie = 0;

		$especie->select("SELECT id_especie FROM especie where nome_vulgar= '$nomeespecie' ");
		foreach ($especie->result() as $especie) {
			$idespecie = $especie['id_especie'];
		}
		//fim especie

		//inser endereco
		$endereco->insert("endereco", array("rua" => $rua, "bairro" => $bairro,  "cidade" => $cidade, 
			"estado" => $estado, "cep" => $cep) );

		//select id endereco
		$idEndereco = 0;

		$endereco->select("SELECT * FROM endereco order by id_endereco desc limit 1");
		foreach ($endereco->result() as $endereco ){ 
			$idEndereco =  $endereco['id_endereco'];
		}
		//fim endereco

		//insert fornecedor
		$fornecedor->insert("fornecedor", 
			array("nome_fornecedor" => $nomeFornecedor, "renasem" => $renasem, "telefone" => $telefone,
				"enderecoFK" => $idEndereco) );

		//select fornecedor
		$idFornecedor = 0;

		$fornecedor->select("SELECT * FROM fornecedor order by id_fornecedor desc limit 1");
		foreach ($fornecedor->result() as $fornecedor ){ 
			$idFornecedor =  $fornecedor['id_fornecedor'];
		}
		//fim fornecedor
		$codigo = "LF".$idFornecedor;//id pra o lote
		//insert lote
		$lote->insert("lote",
			array("idlote_sementes" => $codigo,
				"especie" => $especie, 
				"data_chegada" => $data, 
				"categoria" => "fornecido",
				"origemFK" => $idFornecedor, 
				"especieFK" => $idespecie) );


		$fornecedor = null;
		$endereco = null;
		$especie = null;
	}

	$lote = null;
	header('Location: lista-lote.php');
	break;

	$acao = null;

	case "edit":

	echo "entrou no if";
	$id = $_POST['idlote'];
//	$nomeespecie = $_POST['idradio'];
	$nomeespecie = $_POST['nome-vulgar'];
	$data = $_POST['dataChegada'];
	$nomeFornecedor = $_POST['fornecedor'];
	$renasem = $_POST['numRenasem'];
	$rua = $_POST['rua'];
	$cep = $_POST['cep'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];

	//select id especie
	//	echo "select especie";
	$idespecie = 0;

	$especie->select("SELECT id_especie FROM especie where nome_vulgar= '$nomeespecie' ");
	foreach ($especie->result() as $especie) {
		$idespecie = $especie['id_especie'];
	}
	//fim especie

	//echo "SELECT lote pra pega os ids";
	$lote->select("SELECT idlote_sementes, id_especie,  id_fornecedor, id_endereco FROM lote, especie, fornecedor, endereco where idlote_sementes='$id' and especieFK=id_especie and origemFK=id_fornecedor and enderecoFK = id_endereco");

	$idFornecedor = 0;
	$idEndereco = 0 ;


	foreach ($lote->result() as $lotef) {
		$idFornecedor = $lotef['id_fornecedor'];
		$idEndereco = $lotef["id_endereco"];
	}
	//echo $idEndereco;

	//echo "update do endereco";
		//upadte endereco
	$endereco->update("endereco", 
		array("rua" => $rua, 
			"bairro" => $bairro,  
			"cidade" => $cidade, 
			"estado" => $estado, 
			"cep" => $cep),
		array("id_endereco" => $idEndereco)
	);

	//echo "update do fornecedor";
		//update fornecedor
	$fornecedor->update("fornecedor",
		array("nome_fornecedor" => $nomeFornecedor, 
			"renasem" => $renasem, 
			"enderecoFK" => $idEndereco),
		array("id_fornecedor" => $idFornecedor)
	);

	//echo "upadte do lote";
	//upadte lote
	$lote->update("lote",
		array( "data_chegada" => $data, 
			"origemFK" => $idFornecedor, 
			"especieFK" => $idespecie),
		array("idlote_sementes" => $id)
	);

	//echo "depois do uptado";
	header('Location: lista-lote.php');
	$acao = null;

	break;


	case "voltar":

	header('Location: lista-lote.php');
	
	break;


	default:
	echo "Acao nao encontrada";
}


?>