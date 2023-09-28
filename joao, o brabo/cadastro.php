<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h1>Cadastro de Usuário</h1>
    <?php
    // Verifique se o formulário de cadastro foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Coletar os dados do formulário
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        // Validar e salvar os dados no banco de dados (substitua isso com sua lógica de validação e inserção no banco de dados)
        if (!empty($nome) && !empty($email) && !empty($senha)) {
            // Conecte-se ao banco de dados e insira os dados (substitua com suas próprias configurações)
            $conexao = new mysqli("localhost", "joao", "joao", "filmes");

            if ($conexao->connect_error) {
                die("Erro na conexão: " . $conexao->connect_error);
            }

            // Inserir os dados na tabela de usuários (assumindo que a tabela se chama 'usuarios')
            $sql = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES ('$nome', '$email', '$senha', 'comum')";

            if ($conexao->query($sql) === TRUE) {
                echo "Cadastro realizado com sucesso!";
            } else {
                echo "Erro ao cadastrar: " . $conexao->error;
            }

            $conexao->close();
        } else {
            echo "Todos os campos são obrigatórios.";
        }
    }
    ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
