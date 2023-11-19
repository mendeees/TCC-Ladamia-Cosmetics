<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destaques | Ladamia Cosmetics</title>
    <!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery livraria -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- JavaScript compilado-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php

session_start();

include('conexao.php');
include('nav.php');
include('cabecalho.html'); 


$consulta= $conn->query('Select cd_produto, nm_produto, vl_preco, ds_imagem, qt_estoque from vw_produto where destaque="S"');
?>

<style type="text/css">
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

<div class="container-fluid">
    <div class="row">

    <?php while ($exibe= $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="col-sm-3">
            <img src="images/<?php echo $exibe['ds_imagem'];?>" class="img-responsive" style="width:100%">
            <div style="background-color:whitesmoke;border-radius: 5px;height: auto; padding: 0px">
                <h4 style="padding-left: 5px;padding-top: 5px;padding-right: 5px"><b><?php echo mb_strimwidth($exibe['nm_produto'],0,25,'...');?></b></h4>
                <h5 style="padding-left: 5px;padding-bottom: 5px;padding-right: 5px"><b>R$<?php echo number_format($exibe['vl_preco'],2,',','.');?></b></h5>
            </div>

            <div class="text-center">
            <a href='detalhes.php?cd=<?php echo $exibe['cd_produto'];?>'>

<button class="btn btn-lg btn-block btn-default">
    <span class="glyphicon glyphicon-info-sign"> Detalhes</span>
</button>
</a>
            </div>
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
    <?php } ?>    
</div>
<?php include('rodape.html'); ?>
</body>
</html>