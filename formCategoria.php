<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastro de Categorias | Ladamia Cosmetics</title>
	
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
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<form method="post" action="addcat.php" name="incluiCat" style="background-color:whitesmoke;border-radius:10px; padding: 25px">
                <h2 style="text-align: center; margin-top:0; margin-bottom: 25px">Inclusão de Categorias</h2>

					<div class="form-group">
				
						<label for="txtproduto">Nome da Categoria</label>
						<input name="txtcategoria" type="text" class="form-control" required id="txtcategoria" autocomplete="off">
					</div>		
							
				<button type="submit" class="btn btn-lg btn-default btn-block" style="background-color:#f10680;color:white;">
					
					<span class="glyphicon glyphicon-pencil"> Cadastrar </span>
					
				</button>
				
				</form>
				
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
	
	
	
</body>
</html>
