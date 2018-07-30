<?php 

require 'crud.php';
$lote= new Crud();
$fornecedor = new Crud();
$endereco = new Crud();


//oega um id pra cada, e sempre limpar dentro do if
//fazer 3 if, uma variavel pra cada, e ai limpar depois de executar

$acaoDEL = $_GET['acaoDEL'];

//echo $acao;

if($acaoDEL="delete"){
	$id = $_GET['id'];

	$lote->delete("lote", array("id" => $id));
	$acaoDEL=null;

	header('Location: lista-lote-recebido.php');
}




$acaoForn = $_POST['acao'];


switch ($acaoForn){

//if($acao="create"){
		case "create":
		$id = $_POST['idlote'];
		$especie = $_POST['idradio'];
		$data = $_POST['dataChegada'];
		$nomeFornecedor = $_POST['fornecedor'];
		$renasem = $_POST['numRenasem'];
		$rua = $_POST['rua'];
		$cep = $_POST['cep'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		if ($lote->numRows() > 0) {
			header('Location: cadastro-especie.php');
			alert("Especie não cadastrada");
		}else{
			$lote->insert("lotefor",
				array( "especie" => $especie, "data" => $data, "nomeFornecedor" => $nomeFornecedor, 
					"renasem" => $renasem, "rua" => $rua, "cep" => $cep, "bairro" => $bairro,
					"cidade" => $cidade, "estado" => $estado)
			);
		}

		$lote = null;
		header('Location: lista-lote-recebido.php');
		break;

		$acao = null;

		case "edit":
		$id = $_POST['idlote'];
		$especie = $_POST['idradio'];
		$data = $_POST['dataChegada'];
		$nomeFornecedor = $_POST['fornecedor'];
		$renasem = $_POST['numRenasem'];
		$rua = $_POST['rua'];
		$cep = $_POST['cep'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];

		$lote->update("lotefor",
			array( "especie" => $especie, "data" => $data, "nomeFornecedor" => $nomeFornecedor, 
				"renasem" => $renasem, "rua" => $rua, "cep" => $cep, "bairro" => $bairro,
				"cidade" => $cidade, "estado" => $estado),
			array("id" => $id)
		);
		echo "depois do uptado";
		header('Location: lista-lote-recebido.php');
		$acao = null;

		break;
		default:
		echo "Acao nao encontrada";
	}

	
?>