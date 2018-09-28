<?php

require 'crud.php';
$amostra = new Crud();

$amostra->select("SELECT idamostra, nome_vulgar, condicao_armazenamento, data_implantacao, categoria, situacao FROM amostra, lote, especie WHERE loteFK=idlote_sementes AND especieFK=id_especie;");

//sleelcionar os dados como na lista, 
//adicionar o id da especie pra ser mais rapido (talvez)
//idela puxar td da tabela do banco so com1d do lote
require_once 'header.php';


?>

<div class="container">
	<fieldset>
		<legend style="padding-top: 20px">Lista de Amostras</legend>
		<br>
		<!--	<button>Cadastrar</button> -->
		<div class="row">
			<div class="col-sm-8"></div>
			<div class="col-sm-4">
				<div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control" id="myInput" onkeyup="BuscaLista()" placeholder="Buscar por...">
						<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
					</div>
				</div>
			</div>
		</div>
		<table class="table table-hover table-responsive">
			<thead>
				<tr>
					<th scope="col">Código</th>
					<th scope="col">Espécie</th>
					<th scope="col">Condição Armazenamento</th>
					<th scope="col">Data Implantação</th>
					<th scope="col">Categoria</th>
					<th scope="col">Situação</th> 
					<th scope="col">Opções</th>
				</tr>
			</thead>
			<tbody>
				<!-- -->
				<?php 
				if ($amostra->numRows() > 0) {
					foreach ($amostra->result() as $amostra ){ ?>
						<tr>
							<td><?php echo $amostra['idamostra']; ?></td>
							<td><?php echo $amostra['nome_vulgar']; ?></td>
							<td><?php echo $amostra['condicao_armazenamento']; ?></td>
							<td><?php echo date('d-m-Y',strtotime($amostra['data_implantacao'])); ?></td>
							<td><?php echo $amostra['categoria']; ?></td>
							<td><?php echo $amostra['situacao']; ?></td> 
            					<!--Aqui fica mais simbolos dos testes,ou algo q fosse tipo, ao clicar vai pro cadastro do teste em questao,
            						e depois aki sinalizasse, o que ja foi "concluido" -->
            						<td>
            							<a href="informacao-amostra.php?idamostra=<?php echo $amostra['idamostra']; ?>"><button class="btn btn-info">Ver Análises</button></a>
            							<button class="btn btn-primary">Editar</button>
            							<button class="btn btn-danger">Excluir</button>
            						</td>
            					</tr>
            				<?php }
            			} 

            			?>

            		</tbody>
            	</table>
            </div>
        </fieldset>
    </div>
    <?php
    require_once 'footer.php';
    ?>