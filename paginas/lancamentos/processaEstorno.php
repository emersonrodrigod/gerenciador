<?php

include('../conexao.php');

$id = $_GET['id'];

//define o comando sql para inserir no banco
$sql = "update lancamento set situacao = 'A', caixa_id = null, baixa = null where id = $id";

//executa a inserção
$query = $conexao->query($sql);

//testa se deu certo
if($query) {
    header('location:index.php');
}else {
    echo "Aconteceu algum erro";
}


