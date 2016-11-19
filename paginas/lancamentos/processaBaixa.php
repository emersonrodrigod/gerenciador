<?php

include('../conexao.php');

$id = $_POST['id'];
$dataBaixa = $_POST['baixa'];
$caixa = $_POST['caixa'];

//define o comando sql para inserir no banco
$sql = "update lancamento set situacao = 'R',baixa = '$dataBaixa', caixa_id = $caixa where id = $id";

//executa a inserção
$query = $conexao->query($sql);

//testa se deu certo
if($query) {
    header('location:index.php');
}else {
    echo "Aconteceu algum erro";
}

