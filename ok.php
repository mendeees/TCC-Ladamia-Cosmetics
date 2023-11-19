<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Usuário cadastrado com sucesso | Ladamia Cosmetics</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
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
	
		<div class="row" style="background-color:whitesmoke;border-radius:10px; width:auto; height:auto;padding-bottom:20px;margin-left:350px;margin-right:350px">
		
			<div class="col-sm-4 col-sm-offset-4 text-center">
				
				<h4>Usuário cadastrado com sucesso.</h4>
				
				<a href="formlogon.php" class="btn btn-block btn-default" style="background-color:#f10680;color:white;" role="button">Entrar no loja</a>
							
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
	
	
	
</body>
</html>