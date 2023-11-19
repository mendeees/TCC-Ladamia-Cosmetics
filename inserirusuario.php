<?php 

include('conexao.php');

$nome= $_POST['txtnome'];
$sobrenome= $_POST['txtsobrenome'];
$email= $_POST['txtemail'];
$senha= $_POST['txtsenha'];

$consulta= $conn->query("select email from usuarios where email = '$email'");
$exibe= $consulta->fetch(PDO::FETCH_ASSOC);

if($consulta->rowCount() == 1) {

    header('Location: erro1.php');

} else {

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $insert = "INSERT INTO usuarios (nome, sobrenome, email, senha) VALUES (:nome,:sobrenome, :email, :senha)";
        $stmt = $conn->prepare($insert);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':sobrenome', $sobrenome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha_hash);
        $stmt->execute();
        header('location:ok.php');

}


?>