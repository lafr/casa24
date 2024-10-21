<?PHP
    include 'header.php';

    $sql = "SELECT * FROM clientes";
    $result = mysqli_query($conn, $sql);

    echo "<div class='content'>
            <h1>Clientes</h1>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>SAP</th>
                        <th>Endereço</th>
                        <th>Bairro</th>
                        <th>CEP</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        <th>Contato</th>
                        <th>Cliente</th>
                    </tr>";
    
    while ($row = mysqli_fetch_assoc($result)) {

        switch ($row['tipo']) {
            case 1:
                $ver_tipo = "Vibra";
                break;
            case 2:
                $ver_tipo = "Cooper";
                break;
            case 3:
                $ver_tipo = "-";
                break;
            case 4:
                $ver_tipo = "-";
                break;
            case 5:
                $ver_tipo = "Outros";
                break;
        }

        if ($cor_fundo == "lightgray") {
            $cor_fundo = "white";
        } else {
            $cor_fundo = "lightgray";
        }

        $i = $i + 1;

        $row['cep'] = substr($row['cep'], 0, 5) . '-' . substr($row['cep'], 5);

        echo "<tr style='background-color:" . $cor_fundo . "'>";
        echo "<td>" . $i . "</td>";
        echo "<td>" . $row['razao'] . "</td>";
        echo "<td>" . $row['sap'] . "</td>";
        echo "<td>" . $row['endereco'] . "</td>";
        echo "<td>" . $row['bairro'] . "</td>";
        echo "<td>" . $row['cep'] . "</td>";
        echo "<td>" . $row['cidade'] . "</td>";
        echo "<td>" . $row['uf'] . "</td>";
        echo "<td><button>CONTATO</button></td>";
          echo "<td>" . $ver_tipo . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    echo "</div>";

    include 'footer.php';
?>