<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Interações</title>

    <link rel='stylesheet' href='css/main.css'>
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        window.onload = function() {
            const element = document.body;

            const options = {
                margin:       [10, 10, 10, 10],  // [top, left, bottom, right]
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { 
                    scale: 1,  // Aumenta a resolução
                    useCORS: true  // Permite carregar imagens de outros domínios
                },
                jsPDF:        {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'landscape' // ou 'landscape'
                }
            };

            html2pdf().set(options).from(element).save('relatorio_interacoes.pdf');
        }
    </script>
</head>
<body>

    <?php

    session_start();

    include "conecta.php";
    include "total_servicos.php";

    $user_ranking = $_SESSION['user_ranking'];
    $user_nome = $_SESSION['user_nome'];

    $hoje_formato = date('d/m/Y');
    $hoje = date('Y-m-d');

        $sql_parada = "SELECT * FROM paradas WHERE evento_data_inicio <= '$hoje' order by evento_data_inicio desc";
        $result_parada = mysqli_query($conn, $sql_parada);

        if (!$result_parada) {
            die('Query failed: ' . mysqli_error($conn));
        }
        
        echo "<div class='content'>
                <h2>Interações: $total_geral</h2>
                <table style='width: 1024px;font-size:10px;'>
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
                        <th>SEST SENAT</th>
                    </tr>";    
    /**
    *  Fazer o cálculo dos totais
    */
        echo "      <tr style='background-color: #ffc000'>
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

        echo "      <tr style='background-color:$cor_fundo'>
                        <td>" . $ver_data . "</td>
                        <td class='centro'>" . $row_cliente['sap'] . "</td>
                        <td>" . $row_cliente['razao'] . "</a></td>
                        <td class='centro'>" . $row_parada['cabelereiro'] . "</td>
                        <td class='centro'>" . $row_parada['manicure'] . "</td>
                        <td class='centro'>" . $row_parada['acuidade'] . "</td>
                        <td class='centro'>" . $row_parada['atd_saude'] . "</td>
                        <td class='centro'>" . $row_parada['vacinas'] . "</td>
                        <td class='centro'>" . $row_parada['telemedicina'] . "</td>
                        <td class='centro'>" . $row_parada['pulseiras'] . "</td>
                        <td class='centro'>" . $row_parada['prf'] . "</td>
                        <td class='centro'>" . $row_parada['sest'] . "</td>
                    </tr>";
            }
        }
        echo "</table>
            </div>";

    include 'footer.php';
    ?>

    <script>
        setTimeout(function() {
            window.location.href = 'principal.php';
        }, 5000);
    </script>

</body>
</html>