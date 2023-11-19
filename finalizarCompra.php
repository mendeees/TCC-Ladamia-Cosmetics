<?php

session_start();

include 'conexao.php';

$data = date('Y-m-d');
$ticket = uniqid(); 
$cd_user = $_SESSION['id'];


foreach ($_SESSION['carrinho'] as $cd => $qnt) {
    $consulta = $conn->prepare("SELECT vl_preco FROM tbl_produto WHERE cd_produto = :cd");
    $consulta->bindParam(':cd', $cd);
    $consulta->execute();
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    $preco = $exibe['vl_preco'];

    $inserir = $conn->prepare("INSERT INTO tbl_venda(no_ticket, id, cd_cliente, cd_produto, qt_produto, vl_item, dt_venda) VALUES (:ticket, :cd_user, :cd_user, :cd, :qnt, :preco, :data)");
    $inserir->bindParam(':ticket', $ticket);
    $inserir->bindParam(':cd_user', $cd_user);
    $inserir->bindParam(':cd', $cd);
    $inserir->bindParam(':qnt', $qnt);
    $inserir->bindParam(':preco', $preco);
    $inserir->bindParam(':data', $data);
    $inserir->execute();
}


unset($_SESSION['carrinho']);

include 'fim.php';
?>
