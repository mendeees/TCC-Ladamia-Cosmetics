<div class="container-fluid">
	
	<div class="row text-center" style="background-color:whitesmoke;padding:20px;border-radius:10px">
		<h1 >Carrinho de Compras | Ladamia Cosmetics</h1>
	</div>
	
	
	<?php
	
	$total = null;

if(!isset($_SESSION['carrinho'])){
	$_SESSION['carrinho'] = array();
}



    foreach ($_SESSION['carrinho'] as $cd => $qnt)  {
    $consulta = $conn->query("SELECT * FROM tbl_produto WHERE cd_produto='$cd'");
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);

    $produto = $exibe['nm_produto']; 
    $preco = number_format(($exibe['vl_preco']),2,',','.'); 
    $total += $exibe['vl_preco'] * $qnt; 
	
	?>
	
	
	
	
	
	<div class="row" style="margin-top: 15px;background-color:whitesmoke;border-radius:10px; width:auto; height:auto">
		
		
		
		<div class="col-sm-1 col-sm-offset-1">
			<img src="images/<?php echo $exibe['ds_imagem']; ?>" class="img-responsive" style="margin:15px">
		</div>
		
		
		<div class="col-sm-4" style="padding-top:50px">
			<h4><?php echo $produto; ?></h4>
		</div>	
		
		
		<div class="col-sm-2" style="padding-top:50px">
			<h4>R$ <?php echo $preco; ?></h4>
		</div>		
		<div class="col-sm-2" style="padding-top:50px">
			<h4><?php echo $qnt; ?> </h4>
		</div>
		
		<div class="col-sm-1 col-xs-offset-right-1" style="padding-top:50px">
		

		<a href="removeCarrinho.php?cd=<?php echo $cd;?>">	
		<button class="btn btn-lg btn-block btn-danger">
		<span class="glyphicon glyphicon-remove"></span>		
		</button>
			</a>
		</div> 
				
	</div>	
	
	
	<?php } ?>