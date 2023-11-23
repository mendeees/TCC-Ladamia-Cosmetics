<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Erro | Ladamia Cosmetics</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        body {
            background-image: linear-gradient(
            125deg,
            #f4eb8c 100px,
            #f10680
            );
        }

        .navbar {
            margin-bottom: 0;
            background: rgba(255, 255, 255, 0.35);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(13.5px);
            -webkit-backdrop-filter: blur(13.5px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        /* Adiciona estilo para exibir produtos lado a lado */
        .produto-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .produto {
            text-align: center;
            margin: 10px;
        }

        .produto img {
            max-width: 100px;
            max-height: 100px;
            margin: 10px;
        }
    </style>
</head>

<body>

<?php
ob_start(); 

include 'conexao.php';
include('nav.php');
include ('cabecalho.html');

$cd = $_GET['id'];

$verificaProdutos = $conn->query("SELECT COUNT(*) as total_produtos FROM tbl_produto WHERE cd_categoria='$cd'");
$totalProdutos = $verificaProdutos->fetch(PDO::FETCH_ASSOC)['total_produtos'];

if ($totalProdutos > 0) { 
    $consultaProdutos = $conn->query("SELECT * FROM tbl_produto WHERE cd_categoria='$cd'");
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 text-center" style="background-color:whitesmoke;border-radius: 10px;height: auto;">
                <h3 style="margin-bottom:15px">Não é possível excluir a categoria, pois ela está associada a um ou mais produtos.</h3>
                <div class="produto-container">
                    <?php
                    // Exibe informações sobre os produtos associados
                    while ($produto = $consultaProdutos->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="produto">';
                        echo '<img src="images/' . $produto['ds_imagem'] . '" alt="Imagem do Produto">';
                        echo '<p>' . $produto['nm_produto'] . '</p>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <a href="listaCategoria.php" class="btn btn-block btn-default" style="background-color:#f10680;margin-bottom:15px;color:white" role="button">Voltar</a>
            </div>
        </div>
    </div>
    <?php
} else {
    $excluir = $conn->query("DELETE FROM tbl_categoria WHERE cd_categoria='$cd'");
    header('location: listaCategoria.php');
}

include 'rodape.html';

ob_end_flush(); 
?>
</body>
</html>
