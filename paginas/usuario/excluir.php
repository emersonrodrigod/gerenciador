<?php

include ('../conexao.php');

$id = $_GET['id'];

$sql = "delete from usuario where id = $id";

//executa o delete
$query = $conexao->query($sql);

//testa se deu certo
if($query) {
    header('location:index.php');
}else {
    echo "Aconteceu algum erro";
}