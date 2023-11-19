<?php
include 'conexao.php';

$sql = "SELECT ds_categoria FROM tbl_categoria";
$result = $conn->query($sql);

if ($result !== false && $result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $categoria = $row['ds_categoria'];
        echo '<li><a href="categoria.php?cat=' . $categoria . '">' . $categoria . '</a></li>';
    }
} else {
    echo '<li><a href="#">Nenhuma categoria encontrada</a></li>';
}

$conn = null;
?>
