<?php
session_start();

include('../conexao.php');

//recupera as variaveis digitadas pelo usuario
$descricao = $_POST['descricao'];
$emissao = $_POST['emissao'];
$vencimento = $_POST['vencimento'];
$valor = $_POST['valor'];
$categoria = $_POST['categoria'];
$tipo = "R";
$situacao = "A";
$usuario = $_SESSION['login']['id'];

$sql = "insert into lancamento values("
        . "null, '$descricao', '$emissao',"
        . "'$vencimento','$tipo','$situacao',"
        . "$valor, null, $categoria, null, $usuario)";

//executa a inserção
$query = $conexao->query($sql);

//testa se deu certo
if($query) {
    header('location:index.php');
}else {
    echo "Aconteceu algum erro : " . $conexao->error;
}
