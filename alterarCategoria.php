<?php
include 'conexao.php';

$cd_categoria = $_GET['cd_altera'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $categoria = $_POST['txtcategoria'];

    try {
        $alterar = $conn->query("UPDATE tbl_categoria SET  
            ds_categoria = '$categoria'	
            WHERE cd_categoria = '$cd_categoria'
        ");

        header('location:adm.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
