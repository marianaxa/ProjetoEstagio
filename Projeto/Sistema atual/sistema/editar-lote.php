<?php 
//conexao
require_once 'db_connect.php';

//sessao
session_start();

if(!isset($_SESSION['logado'])):
	header('Location: login.php');
endif;



$idlote = $_GET['idlote'];
$categoria = $_GET['categoria'];

if($categoria=='fornecido'){
	header('Location: editar-lote-recebido.php?idlote=<?php echo $idlote?>');
}