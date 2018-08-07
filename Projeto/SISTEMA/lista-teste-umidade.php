<?php 
require_once 'header.php';

?>

<fieldset>
	<legend>Lista Teor de Água</legend>
	<div>
		<table class="table table-hover table-responsive">
			<thead>
				<tr>
					<th scope="col">N° do Cadinho</th>
					<th scope="col">Peso do Cadinho</th>
					<th scope="col">Peso Úmido</th>
					<th scope="col">Peso Seco</th>
					<th scope="col">Úmidade (%)</th>
					<th scope="col">Úmidade Média (%)</th>
					<th scope="col">Opções</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>10</td>
					<td>20</td>
					<td>5</td>
					<td>80</td>
					<td>75</td>
					<td>
						<button class="btn btn-primary">Editar</button> 
						<button class="btn btn-danger">Excluir</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</fieldset>

<?php
require_once 'footer.php';
?>
