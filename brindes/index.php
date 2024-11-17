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
            font-size: 12px;
        }
        button a {
            color: white;
            text-decoration: none;
        }
        table, th, td {
            border: 0px darkgreen solid;
        }
        th {
            padding: 6px;
            text-align: center;
            background-color: #00893f;
            color: white;
            white-space: nowrap;
        }
        td {
            padding: 6px;
            text-align: left;
            white-space: nowrap;
        }
        input {
            padding: 5px;
            margin-bottom: 10px;
            width: 20%;
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

    </style>
</head>

    <?php 
        header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        include "../conecta.php";

        $id_brinde = filter_input(INPUT_GET, 'id_brinde', FILTER_VALIDATE_INT);
        $acao = filter_input(INPUT_GET, 'acao', FILTER_SANITIZE_STRING);    
    ?>

    <body>
        <div class="logo">
            <a href="index.php"><img src="../img/logo_casa_simbolo.png" alt="Logo" width="150"></a>
        </div>

        <h1>Brindes</h1>

        <div class="listagem">

    <?php
        if ($acao == "repor" && $id_brinde) {
            echo "<div class='bloco_centro'>";

                $sql_brindes = "SELECT * FROM brindes where id_brinde = $id_brinde";
                $resultado_brindes = mysqli_query($conn, $sql_brindes);
                $linhas_brindes = mysqli_num_rows($resultado_brindes);

                while($row_brindes = $resultado_brindes->fetch_assoc()) {
                    $id_brinde = $row_brindes['id_brinde'];
                    $nome = $row_brindes['nome'];
                    $descricao = $row_brindes['descricao'];
                    $qtd_inicial = $row_brindes['qtd_inicial'];
                    $qtd_atual = $row_brindes['qtd_atual'];
                
                    echo "<div class='content'>
                            <fieldset>
                                <form action='edita_brindes.php' method='post'>
                                <h2>Repor brindes</h2>
                                    $nome | qtd.: $qtd_atual<br><br>
                                    <span>
                                        <input type='number' name='qtd' id='qtd' required>
                                        <input type='hidden' name='id_brinde' id='id_brinde' value='$id_brinde'>
                                        <input type='hidden' name='acao' value='repor'>
                                        <button type='submit'>REPOR</button>
                                    </span>
                                </form>
                            </fieldset>
                        </div>";
                    }
            echo "</div>";
        }
        elseif ($acao == "retirar" && $id_brinde) {
            echo "<div class='bloco_centro'>";

                $sql_brindes = "SELECT * FROM brindes where id_brinde = $id_brinde";
                $resultado_brindes = mysqli_query($conn, $sql_brindes);
                $linhas_brindes = mysqli_num_rows($resultado_brindes);

                while($row_brindes = $resultado_brindes->fetch_assoc()) {
                    $id_brinde = $row_brindes['id_brinde'];
                    $nome = $row_brindes['nome'];
                    $descricao = $row_brindes['descricao'];
                    $qtd_inicial = $row_brindes['qtd_inicial'];
                    $qtd_atual = $row_brindes['qtd_atual'];
                
                    echo "<div class='content'><fieldset><form action='edita_brindes.php' method='post'>
                        <h2>Retirar brindes</h2>
                        $nome | qtd.: $qtd_atual<br>
                        <input type='number' name='qtd' id='qtd' required><br>
                        <input type='hidden' name='id_brinde' value='$id_brinde'>
                        <input type='hidden' name='acao' value='retirar'>
                        <button type='submit'>Retirar</button>
                        </form>
                        </fieldset>
                        </div>";
                    }
            echo "</div>";
        }
        else {
            $sql_brindes = "SELECT * FROM brindes";
            $result_brindes = mysqli_query($conn, $sql_brindes);
            $total_brindes = mysqli_num_rows($result_brindes);

                if ($total_brindes > 0) {
                    echo "<table>
                            <tr>
                                <th>NOME</th>
                                <th>QTD</th>
                                <th>AÇÃO</th>
                            </tr>";

                    while ($row_brindes = mysqli_fetch_assoc($result_brindes)) {
                        $id_brinde = htmlspecialchars($row_brindes['id_brinde']);
                        $nome = htmlspecialchars($row_brindes['nome']);
                        $qtd_atual = htmlspecialchars($row_brindes['qtd_atual']);    

                        echo "<tr><td>" . $nome . "</td><td>" . $qtd_atual . "</td><td><button><a href='$_SELF?acao=repor&id_brinde=$id_brinde'>REPOR</a></button> <button><a href='$_SELF?acao=retirar&id_brinde=$id_brinde'>RETIRAR</a></button></td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Nenhum brinde cadastrado";
                }

                echo "<button><a href='index.php?acao=novo'>NOVO</a></button>";
        }
    ?>

        </div>
    </body>
</html>