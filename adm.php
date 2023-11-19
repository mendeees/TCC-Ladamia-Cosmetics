<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Painel administrativo | Ladamia Cosmetics</title>
	
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
	
	session_start();

    if(empty($_SESSION['adm']) || $_SESSION['adm'] != 1){
        header('location:index.php');
    }
	
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';
	
	?>
	
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4 text-center" style="background-color:whitesmoke;border-radius:10px;">
				
				<h2>Área administrativa</h2>
				
				
				<a href="formProduto.php" style="text-decoration:none">			
				<button type="submit" class="btn btn-block btn-lg btn-default" style="margin-bottom:10px;background-color:#f10680;color:white;">
					
					Adicionar Produto
					
				</button>
					
				</a>
				
				<a href="lista.php" style="text-decoration:none">
				<button type="submit" class="btn btn-block btn-lg btn-default"style="margin-bottom:10px;background-color:#f10680;color:white;">
					
					Alterar / Excluir Produto
					
				</button>
				</a>

				<a href="formCategoria.php" style="text-decoration:none">
				<button type="submit" class="btn btn-block btn-lg btn-default"style="margin-bottom:10px;background-color:#f10680;color:white;">
					
					Adicionar Categoria
					
				</button>
				</a>

				<a href="listaCategoria.php" style="text-decoration:none">
				<button type="submit" class="btn btn-block btn-lg btn-default"style="margin-bottom:10px;background-color:#f10680;color:white;">
					
					Alterar / Excluir Categoria
					
				</button>
				</a>
				
				<a href="vendas.php" style="text-decoration:none">
				<button type="submit" class="btn btn-block btn-lg btn-default"style="margin-bottom:10px;background-color:#f10680;color:white;">
					
					Vendas
					
				</button>
				</a>
				
				
				<a href="sair.php" style="text-decoration:none">
				<button type="submit" class="btn btn-block btn-lg btn-default"style="margin-bottom:10px;background-color:#f10680;color:white;">
					
					Sair da àrea administrativa
					
				</button>
				</a>
				
				
				
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
	
	
	
</body>
</html>