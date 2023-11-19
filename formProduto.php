<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastro de Produtos | Ladamia Cosmetics</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
<script src="jquery.mask.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script>
	
	
	
$(document).ready(function(){
	
$('#preco').mask('000.000.000.000.000,00', {reverse: true});
	
});
	
</script>
	
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

    $consulta_categoria=$conn->query("select * from tbl_categoria");
	
	?>
	
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<form method="post" action="insprod.php" name="incluiProd" enctype="multipart/form-data" style="background-color:whitesmoke;border-radius:10px; padding: 25px">
                <h2 style="text-align: center; margin-top:0; margin-bottom: 25px">Inclusão de Produtos</h2>

					<div class="form-group">
				
						<label for="txtproduto">Nome do Produto</label>
						<input name="txtproduto" type="text" class="form-control" required id="txtproduto" autocomplete="off">
					</div>		

	                <div class="form-group">
				
					<label for="txtdesc">Descrição</label>
					
						<textarea rows="5" class="form-control" name="txtdesc"></textarea>
						

					</div>

                    <div class="form-group">					
					
					<label for="sltcat">Categoria</label>
					
					<select class="form-control" name="sltcat">
					  <option value="">Selecione</option>
                      <?php while($listaCat = $consulta_categoria->fetch(PDO::FETCH_ASSOC)) {  ?>
					  <option value="<?php echo $listaCat['cd_categoria'];?>"><?php echo $listaCat['ds_categoria'];?></option>
                      <?php } ?>
                    </select>			
					</div>

					<div class="form-group">
				
					<label for="txtpreco">Preço</label>
					
					<input type="text" class="form-control"  name="txtpreco"  required id="txtpreco" autocomplete="off">

					</div>
					
					
					<div class="form-group">
				
					<label for="txtqtde">Quantidade em Estoque</label>
					
					<input type="number" class="form-control" name="txtqtde" required id="txtqtde" autocomplete="off">

					</div>
					

					<div class="form-group">
				
					<label for="txtfoto1">Imagem do Produto</label>
					
					<input type="file" accept="image/*" class="form-control" name="txtfoto1" required id="txtfoto1">

					</div>
					
					<div class="form-group">
				
					<label for="sltdestaque">Destaque?</label>
					
					<select class="form-control" name="sltdestaque">
					  <option value="">Selecione</option>
					  <option value="S">Sim</option>
					  <option value="N">Não</option>					  
					</select>
						

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
