<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Ladamia Cosmetics</title>
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
	
<script>
	
$(document).ready(function(){
    $("#cep").mask("00 000-000");
});
	
	
</script>
	
</head>
<body>
<?php
	
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';

	?>

	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4" style="background-color:whitesmoke;border-radius: 10px;height: auto;">
				
				
				<form name="frmusuario" method="post" action="validausuario.php">
					
				<h2 style="text-align: center; margin-top:15px; margin-bottom: 25px">Login de Usuário</h2>
					<div class="form-group">
				
						<label for="email">Email</label>
						<input name="email" type="email" class="form-control" autofocus autocomplete="off" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" id="email">
					</div>
				
				<div class="form-group">
				
						<label for="senha">Senha</label>
						<input name="senha" type="password" class="form-control" autocomplete="off" value="<?php echo isset($_POST['senha']) ? $_POST['senha'] : ''; ?>" id="senha">
				</div>
				
				
				<div style="margin-bottom:15px">			
				<button type="submit" class="btn btn-lg btn-default btn-block" style="background-color:#f10680;color:white">
					
					<span class="glyphicon glyphicon-ok"> Entrar</span>
					
				</button>
				</form>	
				
			<a href="formusuario.php">
				<button type="button" class="btn btn-sm btn-link" style="color:#f10680; text-decoration: none; margin-top:25px;">
					
					Ainda não sou cadastrado
					
				</button>
			</a>

			
</div>
           						
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
	
	
	
</body>
</html>