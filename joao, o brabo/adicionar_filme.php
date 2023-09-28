<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Filme</title>
</head>
<body>
    <h1>Adicionar Filme</h1>
    
    <?php
    // Verifique se o formulário de adição de filme foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Coletar os dados do formulário
        $titulo = $_POST["titulo"];
        $genero = $_POST["genero"];
        $ano_lancamento = $_POST["ano_lancamento"];
        $duracao = $_POST["duracao"];
        $avaliacao = $_POST["avaliacao"];
        $youtube = $_POST["youtube"];

        // Validar e salvar os dados no banco de dados (substitua isso com sua lógica de validação e inserção no banco de dados)
        if (!empty($titulo) && !empty($genero) && !empty($ano_lancamento) && !empty($duracao) && !empty($avaliacao) && !empty($youtube)) {
            // Conecte-se ao banco de dados e insira os dados (substitua com suas próprias configurações)
            $conexao = new mysqli("localhost", "joao", "joao", "filmes");

            if ($conexao->connect_error) {
                die("Erro na conexão: " . $conexao->connect_error);
            }

            // Inserir os dados na tabela de filmes (assumindo que a tabela se chama 'filmes')
            $sql = "INSERT INTO filmes (titulo, genero, ano, duracao, avaliacao, youtube) 
                    VALUES ('$titulo', '$genero', '$ano_lancamento', '$duracao', '$avaliacao', '$youtube')";

            if ($conexao->query($sql) === TRUE) {
                echo "Filme adicionado com sucesso!";
            } else {
                echo "Erro ao adicionar filme: " . $conexao->error;
            }

            $conexao->close();
        } else {
            echo "Todos os campos são obrigatórios.";
        }
    }
    ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="genero">Gênero:</label>
        <input type="text" id="genero" name="genero" required><br><br>

        <label for="ano_lancamento">Ano de Lançamento:</label>
        <input type="number" id="ano_lancamento" name="ano_lancamento" required><br><br>

        <label for="youtube">Youtube:</label>
        <input type="text" id="youtube" name="youtube" required><br><br>

        <label for="duracao">Duração (minutos):</label>
        <input type="number" id="duracao" name="duracao" required><br><br>

        <label for="avaliacao">Avaliação:</label>
        <input type="number" step="0.1" min="0" max="10" id="avaliacao" name="avaliacao" required><br><br>

        <input type="submit" value="Adicionar Filme">
    </form>
</body>
</html>