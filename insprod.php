<?php

session_start();

    if(empty($_SESSION['adm']) || $_SESSION['adm'] != 1){
        header('location:index.php');
    }


include 'conexao.php';
include 'resize-class.php';


$nome_produto = $_POST['txtproduto'];
$descricao = $_POST['txtdesc'];
$cd_cat = $_POST['sltcat'];
$preco = $_POST['txtpreco'];
$qtde = $_POST['txtqtde'];
$destaque = $_POST['sltdestaque'];
$remover1='.'; 
$preco = str_replace($remover1, '', $preco);
$remover2=',';
$preco = str_replace($remover2, '.', $preco); 
$recebe_foto1 = $_FILES['txtfoto1'];
$destino = "images/";


preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto1['name'],$extencao1);

$img_nome1 = md5(uniqid(time())).".".$extencao1[1];


try { 
	
	$inserir=$conn->query("INSERT INTO tbl_produto(cd_categoria, nm_produto, vl_preco, qt_estoque, ds_produto, ds_imagem, destaque) VALUES ('$cd_cat', '$nome_produto', '$preco', '$qtde', '$descricao', '$img_nome1', '$destaque')");
	
    move_uploaded_file($recebe_foto1['tmp_name'], $destino.$img_nome1);             
    $resizeObj = new resize($destino.$img_nome1);
    $resizeObj -> resizeImage(340, 482, 'crop');
    $resizeObj -> saveImage($destino.$img_nome1, 100);

    header('location:index.php');

}catch(PDOException $e) {
	
	echo $e->getMessage();
	
}

?>