<?php 

$idlote = $_GET['idlote'];
//echo $idlote
require 'crud.php';
$loteRecebido = new Crud();

$loteRecebido->select("SELECT idlote_sementes, nome_vulgar, data_chegada, nome_fornecedor, renasem, telefone, rua, bairro, cidade, estado, cep FROM lote, especie, fornecedor, endereco WHERE idlote_sementes='$idlote' and especieFK=id_especie AND origemFK=id_fornecedor AND enderecoFK = id_endereco");
;

foreach ($loteRecebido->result() as $loteRecebido ){
	$idlote= $loteRecebido['idlote_sementes'];
	$especie = $loteRecebido['nome_vulgar'];
	$data = $loteRecebido['data_chegada'];
	$nomeFornecedor = $loteRecebido['nome_fornecedor'];
	$renasem = $loteRecebido['renasem'];
	$rua = $loteRecebido['rua'];
	$bairro = $loteRecebido['bairro'];
	$cidade = $loteRecebido['cidade'];
	$cep = $loteRecebido['cep'];
	$estado = $loteRecebido['estado'];


}
require_once 'header.php';
?>

<div style="padding: 30px">
	<fieldset style="padding: 10px">
		<legend align="center" style="width:70%;">Cadastro Lote de Semente</legend>

		<form name="formEdicaoLoteSemente" id="formEdicaoLoteSemente" method="POST" action="crud-lote-recebido.php">


			<div class="row">
				<div class="form-group col-sm-2"></div>
				<div  class="form-group col-sm-2">
					<label for="nome">Código:</label>
					<input type="text" class="form-control" name="idlote" id="idlote" value="<?php echo $idlote?>" readonly></input>
				</div>

				<div class="col-sm-4">
					<div class="form-group">
						<label for="especie">Especie:</label>
						<div class="input-group">
							<input type="text" class="form-control" name="nome-vulgar" id="nome-vulgar" maxlength="30" minlength="1" placeholder="Pesquisar..." value="<?php echo $especie?>" readonly>
							<div class="input-group-btn">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-especies">Pesquisar</button>
							</div>
						</div>
					</div>
				</div>	

				<div class="form-group col-sm-2">
					<label for="dataChegada">Data Chegada:</label>
					<input type="date" class="form-control" name="dataChegada" id="dataChegada" required="" value="<?php echo $data?>">
				</div>
				<div class="form-group col-sm-2"></div>					
			</div>
		</fieldset>

		<fieldset style="padding: 10px">
			<legend align="center" style="width:70%;">Dados Fornecedor</legend>

			<div class="row">
				<div class="form-group col-sm-2"></div>
				<div class="form-group col-sm-4">
					<label for="fornecedor">Fornecedor:</label>
					<input type="text" class="form-control" name="fornecedor" id="fornecedor"  maxlength="50" minlength="1" placeholder="Ex.: Universidade Federal do Acre" required="" value="<?php echo $nomeFornecedor?>">
				</div>

				<div class="form-group col-md-4">	     		   
					<label for="numRenasem">N° Renasem:</label>
					<input type="text" class="form-control" name="numRenasem" id="numRenasem"  maxlength="10" minlength="1" placeholder="AC-03117/2118" required="" value="<?php echo $renasem?>">
				</div>
				<div class="form-group col-sm-2"></div>
			</div>



			<div  class="row">
				<div class="form-group col-sm-2"></div>
				<div class="form-group col-sm-4">	
					<label for="rua">Endereço:</label>
					<input type="text" class="form-control" name="rua" id="rua" placeholder="Ex.: Rua Santo Antonio, n° 312"  maxlength="100" minlength="2" required=""  value="<?php echo $rua?>">
				</div>

				<div class="form-group col-sm-4">	
					<label for="cep">CEP:</label>
					<input type="text" class="form-control" name="cep" id="cep" maxlength="10" minlength="9" placeholder="Ex.: 69920-900" required=""  value="<?php echo $cep?>">
				</div>
				<div class="form-group col-sm-2"></div>
			</div>

			<div  class="row">
				<div class="form-group col-sm-2"></div>
				<div class="form-group col-sm-3">
					<label for="bairro">Bairro:</label>
					<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Ex.: Distrito Industrial" required=""  value="<?php echo $bairro?>">
				</div>

				<div class="form-group col-sm-3">
					<label for="cidade">Cidade:</label>
					<input type="text" class="form-control" name="cidade" id="cidade" placeholder="EX.: Rio Branco" required=""  value="<?php echo $cidade?>">
				</div>

				<div class="form-group col-sm-2">
					<label for="estado">UF:</label>
					<select name="estado" id="estado" class="form-control" for="estado">
						<option value="">--</option>
						<option value="AC" <?php echo $estado=='AC'?'selected':'';?> >AC</option>
						<option value="AL" <?php echo $estado=='AL'?'selected':'';?> >AL</option>
						<option value="AP" <?php echo $estado=='AP'?'selected':'';?> >AP</option>
						<option value="AM" <?php echo $estado=='AM'?'selected':'';?> >AM</option>
						<option value="BA" <?php echo $estado=='BA'?'selected':'';?> >BA</option>
						<option value="CE" <?php echo $estado=='CE'?'selected':'';?> >CE</option>
						<option value="DF" <?php echo $estado=='DF'?'selected':'';?> >DF</option>
						<option value="ES" <?php echo $estado=='ES'?'selected':'';?> >ES</option>
						<option value="GO" <?php echo $estado=='GO'?'selected':'';?> >GO</option>
						<option value="MA" <?php echo $estado=='MA'?'selected':'';?> >MA</option>
						<option value="MT" <?php echo $estado=='MT'?'selected':'';?> >MT</option>
						<option value="MS" <?php echo $estado=='MS'?'selected':'';?> >MS</option>
						<option value="MG" <?php echo $estado=='MG'?'selected':'';?> >MG</option>
						<option value="PA" <?php echo $estado=='PA'?'selected':'';?> >PA</option>
						<option value="PB" <?php echo $estado=='PB'?'selected':'';?> >PB</option>
						<option value="PR" <?php echo $estado=='PR'?'selected':'';?> >PR</option>
						<option value="PE" <?php echo $estado=='PE'?'selected':'';?> >PE</option>
						<option value="RJ" <?php echo $estado=='RJ'?'selected':'';?> >RJ</option>
						<option value="PI" <?php echo $estado=='PI'?'selected':'';?> >PI</option>
						<option value="RN" <?php echo $estado=='RN'?'selected':'';?> >RN</option>
						<option value="RS" <?php echo $estado=='RS'?'selected':'';?> >RS</option>
						<option value="RO" <?php echo $estado=='RO'?'selected':'';?> >RO</option>
						<option value="SC" <?php echo $estado=='SC'?'selected':'';?> >SC</option>
						<option value="RR" <?php echo $estado=='RR'?'selected':'';?> >RR</option>
						<option value="SP" <?php echo $estado=='SP'?'selected':'';?> >SP</option>
						<option value="SE" <?php echo $estado=='SE'?'selected':'';?> >SE</option>
						<option value="TO" <?php echo $estado=='TO'?'selected':'';?> >TO</option>
					</select>
				</div>
				<div class="form-group col-sm-2"></div>
			</div>
			<!--Fim informações-->


			<div class="row" style="padding: 10px">
				<div class="form-group col-sm-4"></div>
				<div class="form-group col-sm-1">
					<a href="lista-lote.php"><button type="button" class="btn btn-primary" style=" min-width: 200px"><i class="fa fa-reply"></i> Voltar</button></a>
				</div>
				<div class="form-group col-sm-1"></div>
				<div class="form-group col-sm-1">
					<button type="submit" name="acao" value="edit" class="btn btn-primary" style=" min-width: 200px">Confirmar</button>
				</div>
				<div class="form-group col-sm-4"></div>
			</div>
		</form>
	</fieldset>
</div>

<?php
require_once 'footer.php';
include('modal-especies.php');
?>

