<?php
// Configuração de cabeçalhos para evitar cache
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Inclui o arquivo de conexão
include "../conecta.php";

// Validação e sanitização de entrada
$id_brinde = filter_input(INPUT_GET, 'id_brinde', FILTER_VALIDATE_INT);
$acao = filter_input(INPUT_GET, 'acao', FILTER_SANITIZE_STRING);

if ($acao == "repor" && $id_brinde) {
    // Uso de prepared statements para evitar injeção de SQL
    $stmt = $conn->prepare("SELECT * FROM brindes WHERE id_brinde = ?");
    $stmt->bind_param("i", $id_brinde);
    $stmt->execute();
    $resultado_brindes = $stmt->get_result();
    $linhas_brindes = $resultado_brindes->num_rows;

    if ($linhas_brindes > 0) {
        echo "<div class='bloco_centro'>";
        while ($row_brindes = $resultado_brindes->fetch_assoc()) {
            $id_brinde = htmlspecialchars($row_brindes['id_brinde']);
            $nome = htmlspecialchars($row_brindes['nome']);
            $descricao = htmlspecialchars($row_brindes['descricao']);
            $qtd_inicial = htmlspecialchars($row_brindes['qtd_inicial']);
            $qtd_atual = htmlspecialchars($row_brindes['qtd_atual']);

            echo "<div class='content'><fieldset><form action='edita_brindes.php' method='post'>
                <h2>Repor brindes</h2>
                $nome | qtd.: $qtd_atual<br>
                <input type='number' name='qtd' id='qtd' required><br>
                <input type='hidden' name='id_brinde' value='$id_brinde'>
                <button type='submit'>Repor</button>
            </form></fieldset></div>";
        }
        echo "</div>";
    } else {
        echo "Nenhum brinde encontrado.";
    }
    $stmt->close();
} else {
    echo "Ação inválida ou ID de brinde não fornecido.";
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Brindes</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        button {
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        a {
            color: inherit;
            text-decoration: none;
        }
        .logo {
            margin-bottom: 20px;
            margin-top: 20px;
            position: absolute;
            top: 0;
        }
        .listagem {
            margin-bottom: 20px;
            text-align: center;
        }
        .botoes {
            display: flex;
            gap: 10px;
        }
        .botoes button {
            padding: 10px 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="logo">
        <a href="index.php"><img src="../img/logo_casa_simbolo.png" alt="Logo" width="150"></a>
    </div>
    <h1>Brindes</h1>
    <div class="listagem">
        <!-- Conteúdo dinâmico será inserido aqui -->
    </div>
</body>
</html>