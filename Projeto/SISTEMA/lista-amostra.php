<?php 
require_once 'header.php';
?>


<fieldset>
	<legend>Lista de Amostras</legend>

	<!--	<button>Cadastrar</button> -->
	<table class="table table-bordered">
		<thead>
			<tr>
				<th scope="col">Código</th>
				<th scope="col">Espécie</th>
				<th scope="col">Condição Armazenamento</th>
				<th scope="col">Data Implantação</th>
				<th scope="col">Categoria</th>
				<th scope="col">Analises</th>
				<th scope="col">Opções</th>
			</tr>
		</thead>
		<tbody>
			<!--Só um exemplo de conteudo-->
			<tr>
				<td>001</td>
				<td>pupunha</td>
				<td>Estufa</td>
				<td>13/07/2018</td>
				<td>Fornecida</td>
				<td>Iniciada</td>
            					<!--Aqui fica mais simbolos dos testes,ou algo q fosse tipo, ao clicar vai pro cadastro do teste em questao,
            						e depois aki sinalizasse, o que ja foi "concluido" -->
            						<td>
            							<a href="informacao-amostra.php"><button class="btn btn-info">Ver Análises</button></a>
            							<button class="btn btn-primary">Editar</button>
            							<button class="btn btn-danger">Excluir</button>
            						</td>
            					</tr>
            					<!--a janela do editar é igual do formulario com os dados carregados, e a de excluir so abre um moral perguntando se realmente deseja excluir (ainda acho essa opçcao meio perigosa, mas deixa ai kkk)-->
            					<!--Fim do exemplo-->
            				</tbody>
            			</table>
            		</div>
            	</fieldset>

<?php
   require_once 'footer.php';
?>