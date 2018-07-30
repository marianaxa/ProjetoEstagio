<?php 

//NAO USADA

	require 'crud.php';

	$teste = new Crud();

	$email = md5("du@mail.com");

	// $teste->insert("usuario",
	// 		array("nome_usuario" => "Eduardo",
	// 			  "email"        => $email)
	// 		);

	// $teste->update("usuario",
	// array("nome_usuario" => "Marimar",
 //          "email"        => "marimar@mail.com"),
	// array("idusuario" => "3")
	// );

	// $teste->delete("usuario", array("idusuario" => "3"));

	$teste->select("SELECT * FROM usuario");

	// echo "Quantidade de usuários:" . $teste->numRows();

	if ($teste->numRows() >0) {
	 	foreach ($teste->result() as $tabela ){ ?>

	 		<form>
	 			<fieldset>
	 				<legend>Meu Form</legend>
	 				<input type="text" name="" disabled value="<?php echo $tabela['nome_usuario']; ?>">
	 				<br>
	 				<input type="text" name="" disabled value="<?php echo $tabela['email']; ?>">
	 			</fieldset>
	 		</form>
	 		<table>
	 			<tr>
	 				<th>nome</th>
	 			</tr>
	 			<tr>
	 				<td>
	 					<?php echo $tabela['nome_usuario']; ?>
	 				</td>
	 			</tr>
	 		</table>
	 		
	 		<!-- // echo "Nome:" .  . "<br>";
	 		// echo "Nome:" .  . "<br>"; -->

	 	<?php }
	 } 

 ?>

 <!--
<?php 
										$cargo->select("SELECT nome_cat_usuario FROM categoria_usuario WHERE idcat_usuario='".$usuario['categoriaUsuarioFK']."' ");
										if ($cargo->numRows() > 0) {
											foreach ($cargo->result() as $cargo ){ 
												echo $cargo['nome_cat_usuario'];
											}
										} ?>
 -->