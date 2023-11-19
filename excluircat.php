<?php

include 'conexao.php';

$cd=$_GET['id']; 

$consulta = $conn->query("SELECT * FROM tbl_categoria WHERE cd_categoria='$cd'");
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

$excluir = $conn->query("DELETE FROM tbl_categoria WHERE cd_categoria='$cd'");

header('location:listaCategoria.php');

?>