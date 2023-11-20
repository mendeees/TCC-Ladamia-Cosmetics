<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Carrinho de compras | Ladamia Cosmetics </title>
	
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
	

	if(empty($_SESSION['id'])){
		
		header('location:formlogon.php');
		
	}

	
	include 'conexao.php';
	include 'nav.php'; 
	include 'cabecalho.html'; 
	

	if (!empty($_GET['cd'])) {
	

	$cd_prod=$_GET['cd'];
	

	if (!isset($_SESSION['carrinho'])) {
		  $_SESSION['carrinho'] = array();
	}


	

	if (!isset($_SESSION['carrinho'][$cd_prod])) {
		$_SESSION['carrinho'][$cd_prod]=1;
	}

	else {
		  $_SESSION['carrinho'][$cd_prod]+=1;

	}

		include 'mostraCarrinho.php';
		
	} else {
	
		include 'mostraCarrinho.php';
		
		
	}	
	
	?>
	

	<div class="row text-center" style="margin-top: 15px;">
		<h1 style="color:white"><b>Total: R$ <?php echo number_format($total,2,',','.'); ?> </b></h1>
	</div>
	
	
	<div class="row text-center" style="margin-top: 15px;">
		<a href="index.php"><button class="btn btn-lg btn-default">Continuar Comprando</button></a>

		<?php if(count($_SESSION['carrinho']) > 0) { ?>
		<a href="finalizarCompra.php"><button class="btn btn-lg btn-default" style="background-color:#f10680;color:white;">Finalizar Compra</button></a>
			<?php } ?>
	</div>

	
</div>
	
	
	<?php
	
	include 'rodape.html';
	
	?>
	
</body>
</html>