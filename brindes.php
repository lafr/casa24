<?PHP
    include 'header.php';

    if ($user_ranking==1 or $user_ranking==5){
        echo "<div class='top-menu'><button><a href='brindes.php?acao=novo'>Novo brinde</a></button></div>";
    }

    $acao = $_GET['acao'];

    $sql_brindes = "SELECT * FROM brindes";
    $resultado_brindes = mysqli_query($conn, $sql_brindes);
    $linhas_brindes = mysqli_num_rows($resultado_brindes);

    echo "<div class='content'>
        <table>
            <tr>
                <th>Brinde</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Editar</th>
            </tr>";

    for ($i = 0; $i < $linhas_brindes; $i++) {
        $registro_brindes = mysqli_fetch_array($resultado_brindes);
        $id_brinde = $registro_brindes['id_brinde'];
        $nome_brinde = $registro_brindes['nome_brinde'];
        $descricao_brinde = $registro_brindes['descricao_brinde'];
        $quantidade_brinde = $registro_brindes['quantidade_brinde'];

        if ($cor_fundo == "lightgray") {
            $cor_fundo = "white";
        } else {
            $cor_fundo = "lightgray";
        }

        echo "<tr style='background-color:$cor_fundo'>
                <td>$nome_brinde</td>
                <td>$descricao_brinde</td>
                <td>$quantidade_brinde</td>
                <td><button>Acrescentar</button><button>retirar</button></td>
              </tr>";
    }

    echo "</table></div>";

    $sql_retiradas = "SELECT * FROM retirar_brindes";
    $resultado_retiradas = mysqli_query($conn, $sql_retiradas);
    $linhas_retiradas = mysqli_num_rows($resultado_retiradas);
    
    $sql_repostas = "SELECT * FROM repor_brindes";
    $resultado_repostas = mysqli_query($conn, $sql_repostas);
    $linhas_repostas = mysqli_num_rows($resultado_repostas);

    echo "<div class='formulario'>";
        if ($acao == "novo") {
            echo "<div class='content'>
                <form action='brindes.php' method='POST'>
                    <label>Nome do brinde:</label><input type='text' name='nome_brinde' required><br>
                    <label>Descrição:</label><textarea name='descricao_brinde' required rows='6'></textarea><br>
                    <label>Quantidade:</label><input type='number' name='quantidade_brinde' required><br>
                    <button type='submit' name='acao' value='novo_brinde'>Cadastrar</button>
                </form>
            </div>";
        }
    echo "</div>";
?>