<?PHP 
    /**
     * Data do evento
     * Cliente
     * Cortes de cabelo
     * Manicure
     * Acuidade Visual
     * Serviços de saúde
     * Vacinas
     * Telemedicina
     * Pulseira de identificação
     * Anotações [botão] 
     */

    include 'header.php';

        $sql_parada = "SELECT * FROM paradas WHERE evento_data_inicio <= '$hoje' order by evento_data_inicio desc";
        $result_parada = mysqli_query($conn, $sql_parada);

        if (!$result_parada) {
            die('Query failed: ' . mysqli_error($conn));
        }
        
        echo "<div class='content'>
                <h2>Eventos realizados</h2>
                <table>
                    <tr>
                        <th>Data</th>
                        <th>SAP</th>
                        <th>Cliente</th>
                        <th>Cabelo</th>
                        <th>Manicure</th>
                        <th>Acuidade</th>
                        <th>Serv. saúde</th>
                        <th>Vacinas</th>
                        <th>Telemedicina</th>
                        <th>Pulseiras</th>
                        <th>Anotações</th>
                    </tr>";    
/**
 *  Fazer o cálculo dos totais
 */
        echo "<tr style='background-color: #ffc000'>
                <td style='font-weight: bold;'>TOTAIS</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>$total_cabelereiro</td>
                <td>$total_manicure</td>
                <td>$total_acuidade</td>
                <td>$total_atd_saude</td>
                <td>$total_vacinas</td>
                <td>$total_telemedicina</td>
                <td>$total_pulseiras</td>
                <td>&nbsp;</td>
            </tr>";
        
        while ($row_parada = mysqli_fetch_assoc($result_parada)) {
            $sql_cliente = "SELECT * FROM clientes WHERE id_cliente = " . $row_parada['fk_cliente'];
            $result_cliente = mysqli_query($conn, $sql_cliente);
            $row_cliente = mysqli_fetch_assoc($result_cliente);

            $ver_data = date('d/m/Y', strtotime($row_parada['evento_data_inicio']));

            if ($row_cliente['id_cliente']){

                if ($cor_fundo == "lightgray") {
                    $cor_fundo = "white";
                } else {
                    $cor_fundo = "lightgray";
                }

                echo "<tr style='background-color:$cor_fundo'>
                        <td>" . $ver_data . "</td>
                        <td>" . $row_cliente['sap'] . "</td>
                        <td>" . $row_cliente['razao'] . "</td>
                        <td>" . $row_parada['cabelereiro'] . "</td>
                        <td>" . $row_parada['manicure'] . "</td>
                        <td>" . $row_parada['acuidade'] . "</td>
                        <td>" . $row_parada['atd_saude'] . "</td>
                        <td>" . $row_parada['vacinas'] . "</td>
                        <td>" . $row_parada['telemedicina'] . "</td>
                        <td>" . $row_parada['pulseiras'] . "</td>
                        <td><button value='VER'><a href='insere_numeros.php?id_parada=" . $row_parada['id_parada'] . "'>VER</a></button></td>
                    </tr>";
            }
        }
        echo "</table>
            </div>";

    include 'footer.php';
?>