<?php
// Inicie a sessão (se já não estiver iniciada)
session_start();

// Verifique se a variável de sessão 'nomeUsuario' está definida
if (isset($_SESSION['nomeUsuario'])) {
    $nomeUsuario = $_SESSION['nomeUsuario'];
    echo "Bem-vindo, $nomeUsuario!";
} else {
    // Se a variável de sessão não estiver definida, redirecione para a página de login
    header("Location: login.php");
    exit; // Encerre o script para evitar que o restante da página seja carregado
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
</head>
<body>
    <!-- Conteúdo da página principal -->
</body>
</html>
