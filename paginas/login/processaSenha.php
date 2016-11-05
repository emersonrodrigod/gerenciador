<?php
session_start();

include('../conexao.php');

$atual = $_POST['atual'];
$nova = $_POST['nova'];
$id = $_SESSION['login']['id'];

$sqlVerifica = "select senha from usuario where id = $id";
$resultado = $conexao->query($sqlVerifica);
$resultado = $resultado->fetch_array();

if($resultado['senha'] == $atual){

    $sql = "update usuario set senha = '$nova' where id = $id";
    $resultado = $conexao->query($sql);
    
    if($resultado){
        
        header("location:/gerenciador");
        
    }else {
        echo "Ocorreu um erro ao alterar a sehha";
    }
    
    
}else {
   echo "ERRO: Senha atual inválida!!"; 
}