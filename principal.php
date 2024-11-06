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
                        <th>Parada</th>
                        <th>Cabelo</th>
                        <th>Manicure</th>
                        <th>Acuidade</th>
                        <th>Serv. saúde</th>
                        <th>Vacinas</th>
                        <th>Telemedicina</th>
                        <th>Pulseiras</th>
                        <th>PRF</th>
                        <th>SEST</th>
                        <th>Anotações</th>
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
                <td class='centro'>$total_prf</td>
                <td class='centro'>$total_sest</td>
                <td class='centro'>&nbsp;</td>
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
            
            if ($user_ranking == 1 or $user_ranking == 2) {
                $link_numeros = "insere_numeros.php?id_parada=" . $row_parada['id_parada'] . "&razao=" . $row_cliente['razao'];
            }   else {
                $link_numeros = "#";
            }

                echo "<tr style='background-color:$cor_fundo'>
                        <td>" . $ver_data . "</td>
                        <td class='centro'>" . $row_cliente['sap'] . "</td>
                        <td><a href='$link_numeros' decoration='none'>" . $row_cliente['razao'] . "</a></td>
                        <td class='centro'>" . $row_parada['cabelereiro'] . "</td>
                        <td class='centro'>" . $row_parada['manicure'] . "</td>
                        <td class='centro'>" . $row_parada['acuidade'] . "</td>
                        <td class='centro'>" . $row_parada['atd_saude'] . "</td>
                        <td class='centro'>" . $row_parada['vacinas'] . "</td>
                        <td class='centro'>" . $row_parada['telemedicina'] . "</td>
                        <td class='centro'>" . $row_parada['pulseiras'] . "</td>
                        <td class='centro'>" . $row_parada['prf'] . "</td>
                        <td class='centro'>" . $row_parada['sest'] . "</td>
                        <td class='centro'><button><a href='anotacoes.php?id_parada=" . $row_parada['id_parada'] . "'>Anotações</a></button></td>
                    </tr>";
            }
        }
        echo "</table>
            </div>";

    include 'footer.php';
?>