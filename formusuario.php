<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastro de Cliente | Ladamia Cosmetics</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="jquery.mask.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
<style>

body{
        background-image: linear-gradient(
        125deg,
        #f4eb8c 100px,
        #f10680
        );
    }
    .navbar{
        margin-bottom : 0;
        background: rgba( 255, 255, 255, 0.35 );
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 13.5px );
        -webkit-backdrop-filter: blur( 13.5px );
        border: 1px solid rgba( 255, 255, 255, 0.18 );
    }
	
	
	
</style>
	

	
</head>
	
	
	


<body>
	
<?php
	
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';
	
	?>
	
	
	<div class="container-fluid" >
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4"style="background-color:whitesmoke;border-radius: 10px;height: auto;">
				
				
				
				<form method="post" action="inserirusuario.php" name="logon" >
				
				<h2 style="text-align: center; margin-top:15px; margin-bottom: 25px">Cadastro de novo Cliente</h2>
					<div class="form-group">
				
						<label for="nome">Nome</label>
						<input name="txtnome" type="text" class="form-control" autofocus required id="nome" autocomplete="off">
					</div>
				
				<div class="form-group">
				
						<label for="sobrenome">Sobrenome</label>
						<input name="txtsobrenome" type="text" class="form-control" required id="sobrenome" autocomplete="off">
				</div>
					
					
				<div class="form-group">
				
						<label for="email">E-mail</label>
						<input name="txtemail" type="email" class="form-control" required id="email" autocomplete="off">
				</div>
					
				
				<div class="form-group">
				
						<label for="senha">Senha</label>
						<input name="txtsenha" type="password" class="form-control" required id="senha" autocomplete="off">
				</div>

					<button type="submit" class="btn btn-lg btn-block btn-default" style="background-color:#f10680;color:white;margin-bottom:15px">
					
					<span class="glyphicon glyphicon-pencil"> Cadastrar</span>
					
				</button>
				
				</form>
							
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
	
	
	
</body>
</html>