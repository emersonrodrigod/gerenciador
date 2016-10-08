<?php

include('../conexao.php');

//recupera as variaveis digitadas pelo usuario
$descricao = $_POST['descricao'];
$id = $_POST['id'];

//define o comando sql para inserir no banco
$sql = "update caixa set descricao = '$descricao' where id = $id";

//executa a inserção
$query = $conexao->query($sql);

//testa se deu certo
if($query) {
    header('location:index.php');
}else {
    echo "Aconteceu algum erro";
}
