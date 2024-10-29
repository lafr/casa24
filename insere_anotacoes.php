<?php 
    include ('header.php');
    $fk_parada = $_GET['fk_parada'];

    if ($_POST['acao'] == 'insere'){
        $fk_parada = $_POST['fk_parada'];
        $anotacao = $_POST['anotacao'];
        $status = $_POST['status'];
        $data_criacao = $hoje;

        $sql_insere = "INSERT INTO anotacoes (fk_parada, anotacao, status, data_criacao) VALUES ('$fk_parada', '$anotacao', '$status', '$data_criacao')";
        $result_insere = mysqli_query($conn, $sql_insere);

        header("Location: principal.php");
    }

    $sql_anotacoes = "SELECT * FROM anotacoes WHERE fk_parada = '$fk_parada'";
    $result_anotacoes = mysqli_query($conn, $sql_anotacoes);

    echo "<div class='bloco_cetro><div class='content'>
            <h2>Anotações</h2>
            <table>
                <tr>
                    <th>Anotação</th>
                    <th>Status</th>
                    <th>Data</th>
                </tr>";

    while ($row_anotacao = mysqli_fetch_assoc($result_anotacoes)) {
            echo "<tr>
                    <td>" . $row_anotacao['anotacao'] . "</td>
                    <td>" . $row_anotacao['status'] . "</td>
                    <td>" . $row_anotacao['data_criacao'] . "</td>
                </tr>";
    }

    echo "</table></div></div>";
?>

<div class="bloco_centro">
    <div class="content">
        <form action="insere_anotacoes.php" method="post">
            <input type="hidden" name="fk_parada" value="<?php echo $fk_parada; ?>">
            <input type="hidden" name="data_criacao" value="$hoje">
            <label for="anotacao">Anotação:</label>
            <input type="textarea" name="anotacao" id="anotacao" rows="6">
            <select name="status" id="status">
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
            <input type="hidden" name="acao" value="insere">
            <input type="submit" value="Inserir">
        </form>
    </div>
</div>

<?php include "footer.php"; ?>