<?php

require 'crud.php';
$requerente = new Crud();

$requerente->select("SELECT idrequerente, nome_requerente, num_renasem, cidade, estado, cep, loteFK, idamostra, nome_vulgar
FROM requerente, endereco, amostra, lote, especie WHERE  enderecoFK=id_endereco AND amostraFK=idamostra 
AND loteFK=idlote_sementes AND especieFK=id_especie order by idrequerente;");

//sleelcionar os dados como na lista, 
//adicionar o id da especie pra ser mais rapido (talvez)
//idela puxar td da tabela do banco so com1d do lote
require_once 'header.php';


?>


<fieldset>
	<legend>Lista de Requerentes</legend>

	<!--	<button>Cadastrar</button> -->
	<table class="table table-bordered">
		<thead>
			<tr>
				<th scope="col">Código</th>
				<th scope="col">Requerente</th>
				<th scope="col">N° Renasem</th>
				<th scope="col">Endereço</th>
				<th scope="col">CEP</th>
				<th scope="col">Especie</th>				
				<th scope="col">N° Lote</th>
				<th scope="col">N° Amostra</th>
				<th scope="col">Opções</th>
			</tr>
		</thead>
		<tbody>
			<!-- -->
			<?php 
                if ($requerente->numRows() > 0) {
                  foreach ($requerente->result() as $requerente ){ ?>
			<tr>
				<td><?php echo $requerente['idrequerente']; ?></td>
				<td><?php echo $requerente['nome_requerente']; ?></td>
				<td><?php echo $requerente['num_renasem']; ?></td>
				<td><?php echo $requerente['cidade']."-".$requerente['estado']; ?></td>
				<td><?php echo $requerente['cep']; ?></td>
				<td><?php echo $requerente['nome_vulgar']; ?></td>
				<td><?php echo $requerente['loteFK']; ?></td>
				<td><?php echo $requerente['idamostra']; ?></td>
            	<td>
            		
            		<a href="#"  onClick="window.open('pdf/print.php?codigoreq=<?php echo $requerente['idrequerente'];?> ','pagename','resizable,height=1200,width=1000'); return false;">
            			<button class="btn btn-success">Gerar Relatório</button>
            		</a>
            	</td>
            </tr>
            	<?php }
                } 

                ?>

            				</tbody>
            			</table>
            		</div>
            	</fieldset>

<?php
   require_once 'footer.php';
?>