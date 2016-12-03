<?php
session_start();

include('../conexao.php');

//recupera as variaveis digitadas pelo usuario
$descricao = "Transferencia efetuada";
$emissao = $_POST['emissao'];
$vencimento = $_POST['emissao'];
$baixa = $_POST['emissao'];
$valor = $_POST['valor'];
$caixa_origem = $_POST['caixa_origem'];
$caixa_destino = $_POST['caixa_destino'];
$tipo = "P";
$situacao = "R";
$usuario = $_SESSION['login']['id'];

$sql = "insert into lancamento values("
        . "null, '$descricao', '$emissao',"
        . "'$vencimento','$tipo','$situacao',"
        . "$valor, '$baixa', null,$caixa_origem , $usuario)";
//executa a inserção
$query = $conexao->query($sql);

$sql = "insert into lancamento values("
        . "null, '$descricao', '$emissao',"
        . "'$vencimento','R','$situacao',"
        . "$valor, '$baixa', null,$caixa_destino , $usuario)";

//executa a inserção
$query = $conexao->query($sql);

//testa se deu certo
if($query) {
    header('location:index.php');
}else {
    echo "Aconteceu algum erro : " . $conexao->error;
}
