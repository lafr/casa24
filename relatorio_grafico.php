<html>
<head>
    <title>Relatório Gráfico</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", { packages: ["corechart", "line"] })
    google.charts.setOnLoadCallback(drawBackgroundColor)

        function drawBackgroundColor() {
        var data = new google.visualization.DataTable()
        data.addColumn("number", "X")
        data.addColumn("number", "Interações")	

<?php
    include "conecta.php";

    $sql_paradas = "SELECT * FROM paradas";
    $result_paradas = $conn->query($sql_paradas);

    if ($result_paradas->num_rows > 0) {
        $i = 0;
        echo "data.addRows([";
        while($row_paradas = $result_paradas->fetch_assoc()) {
            $i++;
            $evento_data_inicio = $row_paradas['evento_data_inicio'];
            $cabelereior = $row_paradas['cabelereiro'];
            $manicure = $row_paradas['manicure'];
            $acuidade = $row_paradas['acuidade'];
            $atd_saude = $row_paradas['atd_saude'];
            $telemedicina = $row_paradas['telemedicina'];
            $pulseiras = $row_paradas['pulseiras'];
            $prf = $row_paradas['prf'];
            $sest = $row_paradas['sest'];

            $interacoes = $cabelereiro + $manicure + $acuidade + $atd_saude + $telemedicina + $pulseiras + $prf + $sest;

            echo "[" . $i . ", " . $interacoes . "],";
        }

        echo "])";

    } else {
        echo "0 results";
    }

    echo"
            var options = {
            hAxis: {
            title: 'Eventos',
            },
            vAxis: {
            title: 'Interações',
            },
            backgroundColor: '#f1f8e9',
        }

        var chart = new google.visualization.LineChart(
            document.getElementById('chart_div'),
        )
        chart.draw(data, options)
        }
    </script>

    <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
    <div id='chart_div'></div>
    </head>
    <body>
    </body>
    </html>";

    include "footer.php";
?>