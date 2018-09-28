<?php 
//NAO FINALIZADA
require_once 'header.php';
$idamostra = $_GET['idamostra'];

require 'crud.php';

$amostra = new Crud();
$lote = new Crud();

$amostra->update("amostra",
 array("situacao" => "Finalizada"),
 array("idamostra" => $idamostra)
);

$amostra->select("SELECT idlote_sementes, amostrador, data_chegada, categoria, nome_vulgar, nome_cientifico, familia, condicao_armazenamento, data_implantacao FROM amostra, lote, especie WHERE idamostra=$idamostra and loteFK=idlote_sementes and especieFK=id_especie ");

foreach ($amostra->result() as $amostra ){
	$idlote = $amostra['idlote_sementes'];
	$amostrador = $amostra['amostrador'];
	$dtchegada = $amostra['data_chegada'];
	$categoria = $amostra['categoria'];
	$nomevulgar= $amostra['nome_vulgar'];
	$nomecientifico = $amostra['nome_cientifico'];
	$familia = $amostra['familia'];
	$armazenamento = $amostra['condicao_armazenamento'];
	$dtimplantacao = $amostra['data_implantacao'];
}

$lote->select("SELECT idlote_sementes, nome_fornecedor, renasem,  cidade, estado FROM amostra, lote, fornecedor, endereco 
WHERE idamostra=$idamostra and loteFK=idlote_sementes AND origemFK=id_fornecedor AND enderecoFK=id_endereco");
foreach ($lote->result() as $lote ){
	$idlote = $lote['idlote_sementes'];
	$fornecedor = $lote['nome_fornecedor'];
	$renasem = $lote['renasem'];
	$cidade = $lote['cidade'];
	$estado= $lote['estado'];
}

$procedencia = $cidade." - ".$estado;
?>


<fieldset>
	<legend>Dados Relatorio</legend>


	<form  name="formCardastroRequente" id="formCardastroRequente" method="POST" action="crud-relatorio.php">

						<div class="row">
							<div class="col-sm-4 ">
								<div class="form-group">
									<label for="requerente">Requerente:</label> 
									<input type="text" class="form-control" name="requerente" id="requerente" maxlength="25" minlength="1"  required="" >
								</div>	
							</div>
							<div class="form-group col-sm-3 ">
								<label for="numRenasem">N° Renasem:</label> 
								<input type="text" class="form-control" name="numRenasem" id="numRenasem" maxlength="10" minlength="1" required="" >
							</div>
						</div>

						<div  class="row">
							<div class="form-group col-sm-4">	
								<label for="rua">Endereço:</label>
								<input type="text" class="form-control" name="rua" id="rua" placeholder="Ex.: Rua Santo Antonio, n° 312"  maxlength="100" minlength="2" required="">
							</div>

							<div class="form-group col-sm-3">	
								<label for="cep">CEP:</label>
								<input type="text" class="form-control" name="cep" id="cep" maxlength="10" minlength="9" placeholder="Ex.: 69920-900" required="">
							</div>
						</div>

						<div  class="row">
							<div class="form-group col-sm-3">
								<label for="bairro">Bairro:</label>
								<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Ex.: Distrito Industrial" required="">
							</div>

							<div class="form-group col-sm-3">
								<label for="cidade">Cidade:</label>
								<input type="text" class="form-control" name="cidade" id="cidade" placeholder="Ex.: Rio Branco" required="">
							</div>

							<div class="form-group col-sm-1">
								<label for="estado">UF:</label>
								<select name="estado" id="estado" class="form-control" for="estado">
									<option value="">--</option>
									<option value="AC">AC</option>
									<option value="AL">AL</option>
									<option value="AP">AP</option>
									<option value="AM">AM</option>
									<option value="BA">BA</option>
									<option value="CE">CE</option>
									<option value="DF">DF</option>
									<option value="ES">ES</option>
									<option value="GO">GO</option>
									<option value="MA">MA</option>
									<option value="MT">MT</option>
									<option value="MS">MS</option>
									<option value="MG">MG</option>
									<option value="PA">PA</option>
									<option value="PB">PB</option>
									<option value="PE">PE</option>
									<option value="PI">PI</option>
									<option value="PR">PR</option>
									<option value="RJ">RJ</option>
									<option value="RN">RN</option>
									<option value="RO">RO</option>
									<option value="RS">RS</option>
									<option value="SC">SC</option>
									<option value="SE">SE</option>
									<option value="SP">SP</option>
									<option value="RR">RR</option>
									<option value="TO">TO</option>
								</select>
							</div>
						</div>
					</div>

					<div  class="row">
						<div class="form-group col-sm-4">	
							<label for="especie">Especie:</label>
							<input type="text" class="form-control" name="especie" id="especie" 
							value="<?php echo $nomevulgar?>"  maxlength="100" minlength="2" required="" readonly="">
						</div>

						<div class="form-group col-sm-3">	
							<label for="procedencia">Procedencia:</label>
							<input type="text" class="form-control" name="procedencia" id="procedencia" 
							value="<?php echo $procedencia?>" maxlength="10" minlength="9"  required="" readonly="">
						</div>
					</div>

					<div  class="row">
						<div class="form-group col-sm-4">	
							<label for="numLote">N° do Lote:</label>
							<input type="text" class="form-control" name="numLote" id="numLote" 
							value="<?php echo $idlote?>" maxlength="100" minlength="2" required="" readonly="">
						</div>

						<div class="form-group col-sm-3">	
							<label for="numRenasem">N° Renasem:</label>
							<input type="text" class="form-control" name="numRenasem" id="numRenasem" 
							value="<?php echo $renasem?>" maxlength="10" minlength="9" required="" readonly="">
						</div>
					</div>

					<div  class="row">
						<div class="form-group col-sm-2">	
							<label for="numAmostra">N° da Amostra:</label>
							<input type="text" class="form-control" name="numAmostra" id="numAmostra" 
							value="<?php echo $idamostra?>" maxlength="100" minlength="2" required="" readonly="">
						</div>	

						<div class="form-group col-sm-3">	
							<label for="amostrador">Nome do Amostrador:</label>
							<input type="text" class="form-control" name="amostrador" id="amostrador" maxlength="100" value="<?php echo $amostrador?>"minlength="2" required="" readonly="">
						</div>

						<div class="form-group col-sm-2">	
							<label for="dataAmostragem">Data da Amostragem:</label>
							<input type="text" class="form-control" name="dataAmostragem" id="dataAmostragem" 
							value="<?php echo date('d-m-Y',strtotime($dtimplantacao))?>" maxlength="10" minlength="9" required="" readonly="">
						</div>
					</div>

					<div  class="row">
								
					</div>


					<div class="row">
						<div class="form-group col-sm-6">
							<button type="submit" class="btn btn-primary">Voltar</button>
							<button type="submit" name="acao" value="create" class="btn btn-success">Confirmar</button>
						</div>
					</div>
				</form>


				

			</fieldset>
			<?php
			//include('modal-lotes.php'); 
			require_once 'footer.php';

			?>