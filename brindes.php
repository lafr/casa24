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
                <th>Qtd. Inicial</th>
                <th>Qtd. Atual</th>
                <th>Editar</th>
            </tr>";

    for ($i = 0; $i < $linhas_brindes; $i++) {
        $registro_brindes = mysqli_fetch_array($resultado_brindes);
        $id_brinde = $registro_brindes['id_brinde'];
        $nome = $registro_brindes['nome'];
        $descricao = $registro_brindes['descricao'];
        $qtd_inicial = $registro_brindes['qtd_inicial'];
        $qtd_atual = $registro_brindes['qtd_atual'];

        if ($cor_fundo == "lightgray") {
            $cor_fundo = "white";
        } else {
            $cor_fundo = "lightgray";
        }

        echo "<tr style='background-color:$cor_fundo'>
                <td>$nome</td>
                <td>$descricao</td>
                <td>$qtd_inicial</td>
                <td>$qtd_atual</td>
                <td><button><a href='brindes.php?acao=repor&id_brinde=$id_brinde'>Repor</a></button>&nbsp;<button><a href='brindes.php?acao=retirar&id_brinde=$id_brinde'>Retirar</a></button></td>
              </tr>";
    }

    echo "</table></div>";

    $sql_retiradas = "SELECT * FROM retirar_brindes";
    $resultado_retiradas = mysqli_query($conn, $sql_retiradas);
    $linhas_retiradas = mysqli_num_rows($resultado_retiradas);
    
    $sql_repostas = "SELECT * FROM repor_brindes";
    $resultado_repostas = mysqli_query($conn, $sql_repostas);
    $linhas_repostas = mysqli_num_rows($resultado_repostas);

    echo "<div class='bloco_centro'>";
        if ($acao == "novo") {
            echo "<div class='content'><fieldset>
                <h2>Cadastro de brindes</h2>
                <form action='insere_brindes.php' method='POST'>
                    <label>Nome do brinde:</label><input type='text' name='nome' id='nome' required><br>
                    <label>Descrição:</label><textarea name='descricao' id='descricao' required rows='6'></textarea><br>
                    <label>Quantidade:</label><input type='number' name='quantidade' id='quantidade' required><br>
                    <button type='submit' name='acao' value='novo_brinde'>Cadastrar</button>
                </form>
            </fieldset></div>";
        }
    echo "</div>";

    if ($acao == "repor" && $user_ranking == '1' or $user_ranking == '5') {
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
                 <h2>Repor brindes</h2>
                    $nome | qtd.: $qtd_atual<br>
                    <input type='number' name='qtd' id='qtd' required><br>
                    <input type='hidden' name='id_brinde' value='$id_brinde'>
                    <input type='hidden' name='acao' value='repor'>
                    <button type='submit'>Acrescentar</button>
                    </form>
                    </fieldset>
                    </div>";
                }
        echo "</div>";
    }
    if ($acao == "retirar" && $user_ranking == '1' or $user_ranking == '5') {
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
?>