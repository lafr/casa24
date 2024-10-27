<?PHP

// ajustar o layout

include 'header.php';

    $sql = "SELECT * FROM clientes";
    $result = mysqli_query($conn, $sql);

    echo "<div class='content'>
            <button><a href='$_SELF'>NOVO</a></button>
            <h1>Clientes</h1>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>SAP</th>
                        <th>UF</th>
                        <th>Cidade</th>
                        <th>Contato</th>
                        <th>Detalhes</th>
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

        echo "<tr style='background-color:" . $cor_fundo . "'>
                <td>" . $i . "</td>
                <td>" . $row['razao'] . "</td>
                <td>" . $row['sap'] . "</td>
                <td>" . $row['uf'] . "</td>
                <td>" . $row['cidade'] . "</td>
                <td><button><a href='detalhes_contatos.php?id_cliente=" . $row['id_cliente'] . "'>CONTATO</a></button></td>
                <td><button><a href='detalhes_clientes.php?id_cliente=" . $row['id_cliente'] . "'>DADOS</a></button></td>
                <td>" . $ver_tipo . "</td>
            </tr>";
    }
    
    echo "</table></div>";
    include 'footer.php';
?>