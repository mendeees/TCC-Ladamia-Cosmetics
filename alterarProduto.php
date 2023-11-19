<?php
include 'conexao.php';
include 'resize-class.php';

$cd_produto = $_GET['cd_altera'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoria = $_POST['sltcat'];
    $produto = $_POST['txtproduto'];
    $preco = $_POST['txtpreco'];
    $descricao = $_POST['txtdesc'];
    $qtde = $_POST['txtqtde'];
    $destaque = $_POST['sltdestaque'];

    if (!is_numeric($preco)) {

    } else {
        $preco = number_format($preco, 2, '.', ''); 
    }

    $recebe_foto1 = $_FILES['txtfoto1'];
    $destino = "images/";

    if (!empty($recebe_foto1['name'])) {
        preg_match("/\.(jpg|jpeg|png|gif){1}$/i", $recebe_foto1['name'], $extencao1);
        $img_nome1 = md5(uniqid(time())) . "." . $extencao1[1];
        $upload_foto1 = 1;
    } else {

        $consulta = $conn->query("SELECT ds_imagem FROM tbl_produto WHERE cd_produto='$cd_produto'");
        $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
        $img_nome1 = $exibe['ds_imagem'];
        $upload_foto1 = 0;
    }

    try {
        $alterar = $conn->query("UPDATE tbl_produto SET  
            cd_categoria = '$categoria',
            nm_produto = '$produto',
            vl_preco = '$preco',
            qt_estoque = '$qtde',
            ds_produto = '$descricao',
            ds_imagem = '$img_nome1',
            destaque = '$destaque'	
            WHERE cd_produto = '$cd_produto'
        ");

        if ($upload_foto1 == 1) {
            move_uploaded_file($recebe_foto1['tmp_name'], $destino . $img_nome1);
            $resizeObj = new resize($destino . $img_nome1);
            $resizeObj->resizeImage(340, 482, 'crop');
            $resizeObj->saveImage($destino . $img_nome1, 100);
        }

        header('location:index.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
