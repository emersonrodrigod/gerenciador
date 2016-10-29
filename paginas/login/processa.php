<?php
session_start();

include('../conexao.php');

$username = $_POST['username'];
$senha = $_POST['senha'];


$sql = "select * from usuario where username = '$username' and senha='$senha'";
$resultado = $conexao->query($sql);


if($resultado->num_rows == 1){
    
    $resultado = $resultado->fetch_array();
    
    $_SESSION['login'] = $resultado;
    header('location:/gerenciador/index.php');
    
}else {
    echo "Usuário ou senha invalidos";
}

