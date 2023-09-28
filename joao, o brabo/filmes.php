<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes por Gênero ou Ano de Lançamento</title>
    <style>
        .filme-card {
            display: inline-block;
            width: 200px; /* Largura do card de filme */
            margin: 10px; /* Espaço entre os cards */
            background-color: red;
        }

    </style>
</head>
<body>
    <h1>Filmes por Gênero ou Ano de Lançamento</h1>
    

    <div class="filmes">
    <?php
    session_start();
    $_GET["genero"] = "comedia";
    $_GET["ano"] = 2005;
    // Verifique se o filtro de gênero ou ano foi enviado
    if (isset($_GET["genero"]) || isset($_GET["ano"])) {
        // Coletar os valores do filtro
        $genero = isset($_GET["genero"]) ? $_GET["genero"] : "";
        $ano = isset($_GET["ano"]) ? $_GET["ano"] : "";

        // Conecte-se ao banco de dados e faça a consulta (substitua com suas próprias configurações)
        $conexao = new mysqli("localhost", "joao", "joao", "filmes");

        if ($conexao->connect_error) {
            die("Erro na conexão: " . $conexao->connect_error);
        }

        // Crie a consulta SQL com base no filtro (substitua com sua própria lógica)
        $sql = "SELECT * FROM filmes WHERE ";

        if (!empty($genero)) {
            $sql .= "genero = '$genero' ";
        }

        if (!empty($ano)) {
            if (!empty($genero)) {
                $sql .= "AND ";
            }
            $sql .= "ano = '$ano' ";
        }

        $sql .= "ORDER BY titulo";

        // Execute a consulta
        $result = $conexao->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Exiba os resultados em cards de filme
                echo '<div class="filme-card">';
                echo '<h2>' . $row["titulo"] . '</h2>';
                echo '<p>Gênero: ' . $row["genero"] . '</p>';
                echo '<p>Ano de Lançamento: ' . $row["ano"] . '</p>';
                echo '<p>Duração: ' . $row["duracao"] . ' minutos</p>';
                echo '<p>Avaliação: ' . $row["avaliacao"] . '</p>';
                echo '</div>';
            }
        } else {
            echo "Nenhum filme encontrado com os critérios selecionados.";
        }

        $conexao->close();
    }
    ?>
    </div>
    <p><a href="seu_site.php">Voltar</a></p>
    <?php
    if (isset($_SESSION['nomeUsuario'])) {
        $nomeUsuario = $_SESSION['nomeUsuario'];
        echo "Bem-vindo, $nomeUsuario!";
    } else {
        // Se a variável de sessão não estiver definida, redirecione para a página de login
        header("Location: login.php");
        exit; // Encerre o script para evitar que o restante da página seja carregado
    }
    ?>
    
</body>
</html>
