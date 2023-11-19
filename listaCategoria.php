<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Lista de Categorias | Ladamia Cosmetics</title>
	
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
	
	
	$consulta = $conn->query("SELECT * from tbl_categoria");
	
	
	?>
	
<div class="container-fluid" >
	
	
	<?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
	
	?>
	
	
	<div class="row" style="margin-top: 15px;background-color:whitesmoke;border-radius:10px; width:auto; height:auto">
		
		
		<div class="col-sm-5"><h4 style="padding-top:20px"><?php echo $exibe['ds_categoria']; ?></h4></div>
		<div class="col-sm-2" style="padding-top:20px">
    
		<div style="margin-top:5px;margin-bottom:15px;">	
		<a href="frmAlterarCat.php?id=<?php echo $exibe['cd_categoria'];?>">
		<button class="btn btn-lg btn-block btn-default">
		<span class="glyphicon glyphicon-pencil"> Alterar</span>
		</button>
		</a>
    </div>
    </div>
    <div style="margin-top:5px;margin-bottom:15px">
		<div class="col-sm-2 col-xs-offset-right-1" style="padding-top:20px">
		<a href="excluircat.php?id=<?php echo $exibe['cd_categoria']; ?>">	
		<button class="btn btn-lg btn-block btn-danger">
		<span class="glyphicon glyphicon-remove"> Excluir</span>		
		</button>
		</a>
		</div>
    </div>
		</div> 
					
	
	
	<?php } ?>
	

	
</div>
	
	<?php
	
	include 'rodape.html';
	
	?>
	
</body>
</html>