<?php

session_start();

    if(empty($_SESSION['adm']) || $_SESSION['adm'] != 1){
        header('location:index.php');
    }


include 'conexao.php';


$nome_categoria = $_POST['txtcategoria'];

try { 
	
	$inserir=$conn->query("INSERT INTO tbl_categoria(ds_categoria) VALUES ('$nome_categoria')");
    header('location:adm.php');

}catch(PDOException $e) {
	
	echo $e->getMessage();
	
}

?>