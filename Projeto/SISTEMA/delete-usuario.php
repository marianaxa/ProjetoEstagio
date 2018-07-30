<?php
//NAO USADA

require 'crud.php';
$usuario = new Crud();

$id = $_GET['id'];

$usuario->delete("usuario", array("idusuario" => $id));

  header('Location: lista-usuario.php');
?>