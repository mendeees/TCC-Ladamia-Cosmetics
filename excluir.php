<?php

include 'conexao.php'; 

$cd=$_GET['id'];


$pasta = "images/";


$consulta = $conn->query("SELECT * FROM tbl_produto WHERE cd_produto='$cd'");


$exibe = $consulta->fetch(PDO::FETCH_ASSOC);


$excluir = $conn->query("DELETE FROM tbl_produto WHERE cd_produto='$cd'");

$foto1=$exibe['ds_imagem'];

if ($foto1!="") { 
	
	unlink($pasta.$foto1);
	
}


header('location:lista.php');

?>