<?php 
//conexao com banco

$servername="localhost";
$username="root";
$password="root";
$db_name="lasfac2";

$connect = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()){
	echo "Falha na conexão: ".mysqli_connect_error();
}