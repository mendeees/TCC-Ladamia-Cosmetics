<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Minhas Compras | Ladamia Cosmetics</title>
	
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
	
	if (empty($_SESSION['id'])) {
		
		header('location:formLogon.php');
		
	}
	
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';
	
	
	$ticket_compra=$_GET['ticket'];
	

	$consultaVenda = $conn->query("SELECT * FROM vw_venda WHERE no_ticket='$ticket_compra'");
	
	
	?>
	
<div class="container-fluid" style=" background-color:whitesmoke;border-radius:10px; width:auto; height:auto">
	
	
	<div class="row" style="margin-top: 15px;">
		
		<h1 class="text-center" >Compra: <a href="#" style="color:#f10680; text-decoration: none;"><?php echo $ticket_compra ?></a></h1>
		
	</div>
	
	
	<div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-1 col-sm-offset-1"><h4>Data</h4> </div>
		<div class="col-sm-2"><h4>Ticket </h4></div>
		<div class="col-sm-5"><h4>Produto</h4></div>
		<div class="col-sm-1"><h4>Quantidade</h4></div>
		<div class="col-sm-2"><h4>Preço</h4></div>
		
				
	</div>
	
	
	<?php
	
	$total=0;
			
	while ($exibeVenda=$consultaVenda->fetch(PDO::FETCH_ASSOC)) {		
		
		$total += $exibeVenda['vl_total_item'];
	
	?>
	
	<div class="row" style="margin-top: 15px;">		
		<div class="col-sm-1 col-sm-offset-1"><?php echo date('d/m/Y',strtotime($exibeVenda['dt_venda']));?></div>
		<div class="col-sm-2"><?php echo $exibeVenda['no_ticket'];?></div>
		<div class="col-sm-5"><?php echo $exibeVenda['nm_produto'];?></div>
		<div class="col-sm-1"><?php echo $exibeVenda['qt_produto'];?></div>
		<div class="col-sm-2"><?php echo number_format($exibeVenda['vl_total_item'],2,',','.');?></div>				
	</div>	
	<?php } ?>
	
	<div class="row" style="margin-top: 15px;">
		<h2 class="text-center">Total desta compra: R$ <?php echo number_format($total,2,',','.');?></h2>
	</div>
	<a href="areaUser.php" style="text-decoration:none">
				<button type="submit" class="btn btn-block btn-lg btn-default"style="margin-bottom:15px;background-color:#f10680;color:white;width:auto; margin-top:35px;">Voltar</button>
				</a>
</div>
	
	<?php
	
	include 'rodape.html';
	
	?>
	
</body>
</html>