<?PHP
    include 'header.php';

    $sql_paradas = "SELECT * FROM paradas order by evento_data_inicio";
    $result_paradas = mysqli_query($conn, $sql_paradas);

    $sql_clientes = "SELECT * FROM clientes order by uf,cidade";
    $result_clientes = mysqli_query($conn, $sql_clientes);

    echo" <form action='insere_paradas.php' method='POST'>
            <div class='content'>
             <h2>Incluir</h2>
                <input type='date' name='evento_data_inicio' required> 
                <select name='id_cliente'>
                <option value='1000'>Descanso</option>
                <option value='1001'>Deslocamento</option>
                <option value='1002'>Vem de Vibra</option>
                <option value=''>---</option>";
                
                while ($row_cliente = mysqli_fetch_assoc($result_clientes)) {
                    echo "<option value='" . $row_cliente['id_cliente'] . "'>" . $row_cliente['razao'] . " - " . $row_cliente['cidade'] . " [" . $row_cliente['uf'] . "]   " . $row_cliente['sap'] . "</option>";
                }

    echo "      </select>
               <input type='submit' value='INCLUIR PARADA' required>
            </div>
            </form>";

    echo "<div class='content'>
                <h2>Paradas</h2>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Data</th>
                        <th>Dia da semana</th>
                        <th>SAP</th>
                        <th>Parada</th>
                        <th>Endereco</th>
                        <th>UF</th>
                        <th>Cidade</th>
                    </tr>";

    while ($row_parada = mysqli_fetch_assoc($result_paradas)) {
     
        $id_parada = $row_parada['id_parada'];
        $fk_cliente = $row_parada['fk_cliente'];
        $evento_data_inicio = $row_parada['evento_data_inicio'];

        $dia_semana = date('w', strtotime($evento_data_inicio));
        
        if ($dia_semana == 6 or $dia_semana == 0) {
            $cor_fundo = "yellow";
        } else {
            $cor_fundo = "white";
        }

        $dias_semana = [
            'Domingo', 'Segunda-feira', 'Terça-feira', 
            'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'
        ];

        $ver_dia_semana = $dias_semana[$dia_semana];
        $ver_data_limpa = date('d/m/Y', strtotime($evento_data_inicio));

        $sql_cliente = "SELECT * FROM clientes WHERE id_cliente = $fk_cliente";
        $result_cliente = mysqli_query($conn, $sql_cliente);
        $row_cliente = mysqli_fetch_assoc($result_cliente);

        $i = $i + 1;

        if ($fk_cliente == 1000) {
            $razao = "Descanso";
            $cor_fundo = "lightblue";
        } elseif ($fk_cliente == 1001) {
            $razao = "Deslocamento";
            $cor_fundo = "orange";
        } elseif ($fk_cliente == 1002) {
            $razao = "Vem de Vibra";
            $cor_fundo = "green";
        } else {
            $razao = $row_cliente['razao'];
        }
    
        echo "<tr style='background-color:" . $cor_fundo . "'>";
        echo "<td>" . $i . "</td>";
        echo "<td>" . $ver_data_limpa . " <a href='edita_parada.php?acao=sobe&id_parada=" . $id_parada . "&evento_data_inicio=" . $evento_data_inicio . "'><img src='img/sobe.png'></a> <a href='edita_parada.php?acao=desce&id_parada=" . $id_parada . "&evento_data_inicio=" . $evento_data_inicio . "'><img src='img/desce.png'></a></td>";
        echo "<td>" . $ver_dia_semana . "</td>";
        echo "<td>" . $row_cliente['sap'] . "</td>";
        echo "<td>" . $razao . "</td>";
        echo "<td>" . $row_cliente['endereco'] . "</td>";
        echo "<td>" . $row_cliente['uf'] . "</td>";
        echo "<td>" . $row_cliente['cidade'] . "</td>";
        echo "</tr>";
    }

    echo "</table></div>";

    include 'footer.php';
?>