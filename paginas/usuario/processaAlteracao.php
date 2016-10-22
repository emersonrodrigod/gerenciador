<?php

include('../conexao.php');

//recupera as variaveis digitadas pelo usuario
$nome = $_POST['nome'];
$username = $_POST['username'];
$senha = $_POST['senha'];

$id = $_POST['id'];

//define o comando sql para inserir no banco
$sql = "update usuario set nome = '$nome', username = '$username', senha = '$senha' where id = $id";

//executa a inserção
$query = $conexao->query($sql);

//testa se deu certo
if($query) {
    header('location:index.php');
}else {
    echo "Aconteceu algum erro";
}
