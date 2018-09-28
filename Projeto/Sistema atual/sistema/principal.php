<?php 
require_once 'header.php';
require 'crud.php';
$totalamostras = new Crud();
$totalanalises = new Crud();
$totalfinalizadas = new Crud();

$qtdamostras=0;
$qtdanalises=0;
$qtdfinalizadas=0;

$totalamostras->select("SELECT count(*) FROM amostra;");
foreach ($totalamostras->result() as $totalamostras ){
	$qtdamostras = $totalamostras['count(*)'];
}

$totalanalises->select("SELECT count(*) FROM amostra WHERE situacao like 'Iniciada';");
foreach ($totalanalises->result() as $totalanalises ){
	$qtdanalises = $totalanalises['count(*)'];
}

$totalfinalizadas->select("SELECT count(*) FROM amostra WHERE situacao like 'Finalizada';");
foreach ($totalfinalizadas->result() as $totalfinalizadas ){
	$qtdfinalizadas = $totalfinalizadas['count(*)'];
}
?>

	<section class="container">

		<div id="interface" >
			<!--Parte de cima-->
			<div class="jumbotron" >
				<div class="row" align="center">
					<div class="col-sm-4">
						<!--<img class="img-responsive" src="imagens/semente.png"> -->
						<i class="far fa-lemon" style="font-size:40px"></i> 
						<span style="font-size:20px">Amostras</span>
						<span style="font-size:20px"><?php echo $qtdamostras ?></span>
					</div>
					<div class="col-sm-4">
						<!-- <span class="glyphicon glyphicon-asterisk"></span> -->
						<i class="fa fa-flask"  style="font-size:40px"></i>
						<span style="font-size:20px">Em Análise</span>
						<span style="font-size:20px"><?php echo $qtdanalises ?></span>
					</div>
					<div class="col-sm-4">
						<i class="fa fa-file-alt" style="font-size:38px"></i>
						<span style="font-size:20px">Finalizados</span>
						<span style="font-size:20px"><?php echo $qtdfinalizadas ?></span>
					</div>
				</div>
			</div>

			<hr>

			<!--Parte de baixo-->
			<div style="padding: 20px; padding-left: 70px">
				<div class="row">
					<div class="col-sm-4">
						<a href="cadastro-lote.php"><button class="btn btn-primary btn-sm" style="font-size:24px; min-width: 250px"><i class="fa fa-edit" style="font-size:35px"></i> <p>Cadastrar Lote</p> </button></a>
					</div>				
					<div class="col-sm-4">
						<a href="cadastro-colheita.php"><button class="btn btn-primary btn-sm" style="font-size:24px; min-width: 250px"><i class="fa fa-edit" style="font-size:35px"></i> <p>Cadastrar Colheita</p> </button></a>
					</div>
					<div class="col-sm-4">
						<a href="cadastro-especie"><button class="btn btn-primary btn-sm" style="font-size:24px; min-width: 250px"><i class="fa fa-edit" style="font-size:35px"></i> <p>Cadastrar Espécie</p> </button></a>
					</div>
				<!--
				<div class="col-sm-4">
					<a href="lista-requerente"><button class="btn btn-primary btn-sm" style="font-size:24px; min-width: 250px"><i class="fa fa-file-text"  style="font-size:35px"></i> <p>Gerar Relatórios</p> </button></a>
				</div>	
			-->				
		</div>
		<br>
		<div class="row">				
			<div class="col-sm-4">
				<a href="cadastro-amostra.php"><button class="btn btn-primary btn-sm" style="font-size:24px; min-width: 250px"><i class="fa fa-book" style="font-size:35px"></i> <p>Iniciar Análise</p> </button></a>
			</div>

			<div class="col-sm-4">
				<a href="lista-lote.php"><button class="btn btn-primary btn-sm" style="font-size:24px; min-width: 250px"><i class="fa fa-list" style="font-size:35px"></i><p>Lista de Lotes</p></button></a>
			</div>
			<div class="col-sm-4">
				<a href="lista-especie.php"><button class="btn btn-primary btn-sm" style="font-size:24px; min-width: 250px"><i class="fa fa-list" style="font-size:35px"></i> <p>Lista de Espécies</p> </button></a>
			</div>				
		</div>
		<br>
		<div class="row">
			<div class="col-sm-4">
				<a href="lista-amostra.php"><button class="btn btn-primary btn-sm" style="font-size:24px; min-width: 250px"><i class="fa fa-list" style="font-size:35px"></i> <p>Lista de Análises</p> </button></a>
			</div>					
		</div>
	</div>
</div>
</section>


<?php
require_once 'footer.php';
?>