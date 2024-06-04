<?php
session_start();

// Obtém os valores de username e senha do formulário
$username = @$_POST["username"];
$senha = @$_POST["senha"];

// Valores fixos para validação
$valid_username = "Chen_admin";
$valid_senha = "Chen987";

// Verifica se o username e a senha são válidos
if ($username === $valid_username && $senha === $valid_senha) {
    $_SESSION['username'] = $username; // Inicia a sessão
    header("Location: acesso_administrador_buscar.php");
    exit();
} else {
    echo "Usuário e/ou senha inválidos";
}
?>
