<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">

	<!-- BOOTSTRAP -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- FONTE AWESOME -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<div >
		<section>

			<fieldset class="container">
				<div class="jumbotron">
					<legend class="text-center">Login</legend>
					<form name="formLogin" id="formLogin" method="get" action="#">
						
						<div class="row">
							<div class="col-sm-3"></div>
							<div class="col-sm-6">
								<div class="form-grup">
									<label for="email">E-mail:</label>
									<input type="email" class="form-control" name="email" id="email">
								</div>
							</div>
							<div class="col-sm-3"></div>
						</div>

						<div class="row">
							<div class="col-sm-3"></div>
							<div class="col-sm-6">
								<div class="form-grup">
									<label for="senha">Senha:</label>
									<input type="password" class="form-control" name="senha" id="senha">
								</div>
							</div>
							<div class="col-sm-3"></div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<button type="submit" class="btn btn-primary">Entrar</button>
							</div>
						</div>
					</form>
				</div>
			</fieldset>
		</section>
	</div>
</body>
</html>