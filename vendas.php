<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Vendas | Ladamia Cosmetics</title>
	
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

        if(empty($_SESSION['id'])) {
             header('location:formlogon.php'); 
        }
	
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';

    

    $consultaVenda= $conn->query("select * from vw_vendaadm group by nome");
	
	
	?>
	
<div class="container-fluid"  style=" background-color:whitesmoke;border-radius:10px; width:auto; height:auto">

<h1 class="text-center" style="margin-bottom:50px">Vendas</h1>

	
	
	<div class="row" style="margin-top: 15px;font-size: 15px;margin-bottom: 15px;">
		<b>
        
		<div class="col-sm-1 col-sm-offset-1"><b><h4> Data </h4></b></div>
		<div class="col-sm-2"><b><h4> Nome </h4> </b></div>

    </b>
				
	</div>		


<?php while($exibeVenda = $consultaVenda->fetch(PDO::FETCH_ASSOC)) { ?>
    <div class="row" style="margin-bottom: 10px">
		
		<div class="col-sm-1 col-sm-offset-1"> <?php echo date('d/m/Y', strtotime($exibeVenda['dt_venda'])); ?> </div>
		<div class="col-sm-2"><a href="vendas2.php?nome=<?php echo $exibeVenda['nome']; ?>" style="color:#f10680"><?php echo $exibeVenda['nome']; ?></a> </div>

	</div>
    <?php } ?>
	
	
</div>
	

	<?php
	
	include 'rodape.html';
	
	?>
	
</body>
</html>