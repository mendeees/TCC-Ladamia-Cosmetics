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


if (empty($_GET['txtbuscar'])) {
    header('Location: index.php');
    exit;
}

$pesquisa = $_GET['txtbuscar'];
$consulta = $conn->prepare("SELECT * FROM vw_produto WHERE nm_produto LIKE :search");
$consulta->execute(array(':search' => '%' . $pesquisa . '%'));

if ($consulta->rowCount() == 0) {
    header('Location: erro2.php');
    exit;
}
?>

<div class="container-fluid">
    <?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="row" style="margin-top: 15px; background-color: whitesmoke; border-radius: 10px; width: auto; height: auto; margin: 30px; padding-top: 10px;">
            <div class="col-sm-1 col-sm-offset-1" style="margin-bottom: 15px;"><img src="images/<?php echo $exibe['ds_imagem']; ?>" class="img-responsive"></div>
            <div class="col-sm-5"><b><h4 style="padding-top: 20px"><?php echo $exibe['nm_produto']; ?></b></h4></div>
            <div class="col-sm-2"><h4 style="padding-top: 20px"><b>R$<?php echo number_format($exibe['vl_preco'], 2, ',', '.'); ?></b></h4></div>
            <a href='detalhes.php?cd=<?php echo $exibe['cd_produto']; ?>'>
                <div class="col-sm-2 col-xs-offset-right-1" style="padding-top: 20px; margin: 10px"><button class="btn btn-lg btn-block btn-default">
                        <span class="glyphicon glyphicon-info-sign"> Detalhes</span>
                    </button>
                </div>
            </a>
        </div>
    <?php } ?>
</div>

<?php
include 'rodape.html';
?>

	
</body>
</html>