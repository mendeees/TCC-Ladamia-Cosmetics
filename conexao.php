<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "ladamiabd";

try {
    $conn = new PDO("mysql:host=$host;dbname=$banco", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}
?>
