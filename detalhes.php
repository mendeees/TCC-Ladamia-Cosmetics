<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Ladamia Cosmetics</title>
	
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
	
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';

if(!empty($_GET['cd'])){

    $cd_produto=$_GET['cd'];
    $consulta= $conn->query("select * from vw_produto where cd_produto = '$cd_produto'");
    $exibe= $consulta->fetch(PDO::FETCH_ASSOC);

} else {
    header('location:index.php');
};
	
	?>
	
<div class="container-fluid">
	
	
	
	<div class="row">
		
		 <div class="col-sm-4 col-sm-offset-1">
			 
			 <img src="images/<?php echo $exibe['ds_imagem'];?>" class="img-responsive" style="width:100%;">
			
		</div>
		
				
 		 <div class="col-sm-7" style="background-color:whitesmoke;border-radius:10px;width:auto;height:auto;margin:30px; padding-top:10px;padding-left:45px;padding-right:45px">
         <h1><b><?php echo $exibe['nm_produto'];?></b></h1>
		
		<h4><b>Descrição: </b><?php echo $exibe['ds_produto'];?></h4>
		
		<h4><b>Categoria: </b><?php echo $exibe['ds_categoria'];?></h4>
		
		<h4><b>R$<?php echo number_format($exibe['vl_preco'],2,',','.');?></b></h4>
			 
		
		<div class="text-center" style="margin-top:5px; margin-bottom:20px;">
            <?php if($exibe['qt_estoque'] > 0 ) { ?>
                <a href='carrinho.php?cd=<?php echo $exibe['cd_produto'];?>'>
                <button class="btn btn-lg btn-block btn-default" style="background-color:#f10680;color:white;">
                    <span class="glyphicon glyphicon-usd"> Comprar</span>
                </button>
            </a>
            <?php } else { ?>

                <button class="btn btn-lg btn-block btn-default" style="color:#f10680" disabled>
                    <span class="glyphicon glyphicon-remove-circle"> Indisponível</span>
                </button>

            <?php } ?>

            </div>		
		</div>		
	

	
</div>
	
	<?php
	
	include 'rodape.html';
	
	?>
	
</body>
</html>