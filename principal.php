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
     * Números de atendimentos
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
                        <th style='width: 20px;'>Data</th>
                        <th>SAP</th>
                        <th>Cliente</th>
                        <th>Cabelo</th>
                        <th>Manicure</th>
                        <th>Acuidade</th>
                        <th>Serv. saúde</th>
                        <th>Vacinas</th>
                        <th>Telemedicina</th>
                        <th>Pulseiras</th>
                    </tr>";    
/**
 *  Fazer o cálculo dos totais
 */
        echo "<tr style='background-color: #ffc000'>
                <td style='font-weight: bold;'>TOTAIS</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class='centro'>$total_cabelereiro</td>
                <td class='centro'>$total_manicure</td>
                <td class='centro'>$total_acuidade</td>
                <td class='centro'>$total_atd_saude</td>
                <td class='centro'>$total_vacinas</td>
                <td class='centro'>$total_telemedicina</td>
                <td class='centro'>$total_pulseiras</td>
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
                        <td class='centro'>" . $row_cliente['sap'] . "</td>
                        <td>" . $row_cliente['razao'] . "</td>
                        <td class='centro'>" . $row_parada['cabelereiro'] . "</td>
                        <td class='centro'>" . $row_parada['manicure'] . "</td>
                        <td class='centro'>" . $row_parada['acuidade'] . "</td>
                        <td class='centro'>" . $row_parada['atd_saude'] . "</td>
                        <td class='centro'>" . $row_parada['vacinas'] . "</td>
                        <td class='centro'>" . $row_parada['telemedicina'] . "</td>
                        <td class='centro'>" . $row_parada['pulseiras'] . "</td>
                    </tr>";
            }
        }
        echo "</table>
            </div>";

    include 'footer.php';
?>