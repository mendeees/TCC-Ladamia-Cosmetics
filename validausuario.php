<?php
include('conexao.php');

session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$consulta = $conn->prepare("SELECT id, senha, adm FROM usuarios WHERE email = :email");
$consulta->bindParam(':email', $email);
$consulta->execute();

if ($consulta->rowCount() == 1) {
    $exibeUsuario = $consulta->fetch(PDO::FETCH_ASSOC);

    if (password_verify($senha, $exibeUsuario['senha'])) {
        $_SESSION['id'] = $exibeUsuario['id'];
        
        if ($exibeUsuario['adm'] == 0) {
            $_SESSION['adm'] = 0;
        } else {
            $_SESSION['adm'] = 1;
        }

        header('Location:index.php');
    } else {
        header('Location:erro.php');
    }
} else {
    header('Location:erro.php');
}
?>
