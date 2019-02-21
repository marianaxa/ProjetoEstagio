<?php

require 'crud.php';
//$amostra = new Crud();

//$amostra->select("SELECT idamostra, nome_vulgar, condicao_armazenamento, data_implantacao, categoria, situacao FROM amostra, lote, especie WHERE loteFK=idlote_sementes AND especieFK=id_especie;");

//sleelcionar os dados como na lista, 
//adicionar o id da especie pra ser mais rapido (talvez)
//idela puxar td da tabela do banco so com1d do lote
require_once 'header.php';


?>

<div class="container">
	<fieldset>
		<legend style="padding-top: 20px"><h3>Lista de Amostras</h3></legend>
		<br>
		<!--	<button>Cadastrar</button> -->
		<div class="row">
			<div class="col-sm-8"></div>
			<div class="col-sm-4">
				<div class="form-group">
					<div class="input-group">
						<input type="search" class="form-control light-table-filter" data-table="order-table" placeholder="Pesquisar" />
						<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
					</div>
				</div>
			</div>
		</div>

		<?php
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$pagina = 1;  
			listar($pagina);

		}else{
			$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
			listar($pagina);
		}

		function listar($pagina){


			$amostra = new Crud();
			$amostra->select("SELECT idamostra, nome_vulgar, condicao_armazenamento, data_implantacao, categoria, situacao FROM amostra, lote, especie WHERE loteFK=idlote_sementes AND especieFK=id_especie;");

        //Contar o total de empresas
			$total_amostras = $amostra->numRows();

        //Setar quantidade de empresas por pagina
			$qnt_result_pg = 25;

        //Calcular o inicio da visualização
			$inicio = ($qnt_result_pg*$pagina)-$qnt_result_pg;

        //Selecionar as empresas a serem apresentado na página
			$amostra->select("SELECT idamostra, nome_vulgar, condicao_armazenamento, data_implantacao, categoria, situacao FROM amostra, lote, especie WHERE loteFK=idlote_sementes AND especieFK=id_especie LIMIT $inicio, $qnt_result_pg");      

			?>
			<div class="row">
				<div class="col-sm-12">
					<table class="table order-table table-hover table-responsive" id="tabela">
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

							<?php 
							if ($amostra->numRows() > 0) {
								foreach ($amostra->result() as $amostra ){ ?>
									<tr>
										<td><?php echo $amostra['idamostra']; ?></td>
										<td><?php echo $amostra['nome_vulgar']; ?></td>
										<td><?php echo $amostra['condicao_armazenamento']; ?></td>
										<td><?php echo date('d-m-Y',strtotime($amostra['data_implantacao'])); ?></td>
										<td><?php echo $amostra['categoria']; ?></td>
										<td id="situacao"><?php echo $amostra['situacao']; ?></td> 
            					<!--Aqui fica mais simbolos dos testes,ou algo q fosse tipo, ao clicar vai pro cadastro do teste em questao,
            						e depois aki sinalizasse, o que ja foi "concluido" -->
            						<td>
            							<a href="informacao-amostra.php?idamostra=<?php echo $amostra['idamostra']; ?>"><button class="btn btn-success">Ver Análises</button></a>
            						<!--	<button class="btn btn-primary">Editar</button>
            							<button class="btn btn-danger">Excluir</button> -->
            							<button  name="view" class="btn btn-primary" onclick="document.getElementById('situacao').value = '<?php echo $amostra['situacao']; ?>';" id="<?php echo $amostra['idamostra'];?>" value="<?php echo $amostra['situacao'];?>"> Editar</button>
            						</td>
            					</tr>
            				<?php }
            			} 

            			?>
            		</tbody>
            	</table>
            </div>
        </div>
        <?php

        //************* INICIO PAGINAÇÂO **************/
        //Qunatidade de paginas
        $quantidade_pg = ceil($total_amostras / $qnt_result_pg);

        //Limite de link antes e depois 
        $MaxLinks = 2;

        ?>
        <nav aria-label="Navegação de página exemplo">
        	<ul class="pagination justify-content-center">


        		<li class="page-item">
        			<?php echo "<a href='lista-amostra.php?pagina=1'>Primeira</a> "; ?>
        		</li>

        		<li class="page-item">
        			<?php
        			for($iPag = $pagina - $MaxLinks; $iPag <= $pagina - 1; $iPag++){
        				if($iPag >= 1){
        					echo "<a href='lista-amostra.php?pagina=$iPag'>$iPag</a> ";
        				}
        			}
        			?>
        		</li>

        		<li class="page-item ">
        			<?php  echo "<a href='lista-amostra.php?pagina=$pagina'>$pagina</a> "; ?>
        		</li>

        		<li class="page-item ">
        			<?php
        			for($dPag = $pagina + 1; $dPag <= $pagina + $MaxLinks; $dPag++){
        				if($dPag <= $quantidade_pg){
        					echo "<a href='lista-amostra.php?pagina=$dPag'>$dPag</a> ";
        				}
        			}
        			?>
        		</li>

        		<li class="page-item ">
        			<?php echo "<a href='lista-amostra.php?pagina=$quantidade_pg'>Última</a>"; ?>
        		</li>

        	</ul>
        </nav>
        <?php
    }
    ?>
    
    
</div>
</fieldset>
</div>
<?php
require_once 'footer.php';
?>


<script>
    	/*
    	quando a situacao estiver iniciada so da pra mudar infromaçoes basicas da amostra
		quando fizer o cadastro de qlqr um dos testes deixar editar so se tiver castrados, entao tem q ter um status em cada tipo de teste
		teste de umidade pode ficar tudo na primeira tela de cadstro
		*/
		$('#tabela').find('button[name=view]').click(function(){

			var situacao = this.value;
			var id= this.id;
			if(situacao == "Iniciada"){
				window.location="editar-amostra.php?idamostra="+id;
			}else{
				alert("Não é possivel editar essa amostra! Apenas amostras com status 'Iniciada' podem ser editadas"); 
			}
		});
	</script>