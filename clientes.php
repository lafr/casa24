<?PHP

// 

include 'header.php';

    $sql = "SELECT * FROM clientes";
    $result = mysqli_query($conn, $sql);

    echo "<div class='top-menu'><button><a href='insere_cliente.php'>NOVO</a></button></div>";

    echo "<div class='content'>
            <h1>Vibra, Distribuidores e Representantes</h1>
            <table>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>SAP</th>
                    <th style='width: 500px';>Endereço</th>
                    <th>Contato</th>
                    <th>Social</th>
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
                <td style='text-align:center;'>" . $i . "</td>
                <td>" . $row['razao'] . "</td>
                <td class='centro'>" . $row['sap'] . "</td>
                <td><details><summary>" . $row['cidade'] . "/" . $row['uf'] . "</summary>" . $row['endereco'] . " - " . $row['bairro'] . " - CEP " . $row['cep'] . "</details></td>
                <td style='text-align:center;'><button><a href='contatos.php?id_cliente=" . $row['id_cliente'] . "&razao=" . $row['razao'] . "'>CONTATO</a></button></td>
                <td style='text-align:center;'><button><a href='msociais.php?id_cliente=" . $row['id_cliente'] . "&razao=" . $row['razao'] . "'>M. SOCIAIS</a></button></td>
                <td style='text-align:center;'><button><a href='detalhes_clientes.php?id_cliente=" . $row['id_cliente'] . "&razao=" . $row['razao'] . "'>DADOS</a></button></td>
                <td style='text-align:center;font-weight: bold;'>" . $ver_tipo . "</td>
            </tr>";
    }
    
    echo "</table></div></div>";
    include 'footer.php';
?>