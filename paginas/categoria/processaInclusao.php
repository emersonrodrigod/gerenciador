<?php

include('../conexao.php');

//recupera as variaveis digitadas pelo usuario
$descricao = $_POST['descricao'];

//define o comando sql para inserir no banco
$sql = "insert into categoria values(null,'$descricao')";

//executa a inserção
$query = $conexao->query($sql);

//testa se deu certo
if($query) {
    header('location:index.php');
}else {
    echo "Aconteceu algum erro";
}
