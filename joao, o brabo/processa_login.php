<?php
// Conecte-se ao banco de dados (substitua com suas próprias configurações)
$conexao = new mysqli("localhost", "joao", "joao", "filmes");

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

// Obtenha os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Consulta SQL para verificar as credenciais
$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

$result = $conexao->query($sql);

if ($result->num_rows == 1) {
    session_start(); // Inicia a sessão (se já não estiver iniciada)

    // Recupere o nome do usuário a partir do banco de dados
    $row = $result->fetch_assoc();
    $nomeUsuario = $row['nome']; // Supondo que o nome do usuário esteja na coluna 'nome' do banco de dados

    // Armazene o nome do usuário em uma variável de sessão
    $_SESSION['nomeUsuario'] = $nomeUsuario;

    header("Location: index.php"); // Redirecione para a página principal

} else {
    // Credenciais inválidas, exiba uma mensagem de erro
    echo "Credenciais inválidas. Por favor, tente novamente.";
}


?>
