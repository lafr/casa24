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

        data.addRows([
            [0, 0],
            [1, 30],
            [2, 23],
            [3, 17],
            [4, 18],
            [5, 9],
            [6, 11],
            [7, 27],
            [8, 33],
            [9, 40],
            [10, 32],
        ])

        var options = {
            hAxis: {
            title: "Time",
            },
            vAxis: {
            title: "Popularity",
            },
            backgroundColor: "#f1f8e9",
        }

        var chart = new google.visualization.LineChart(
            document.getElementById("chart_div"),
        )
        chart.draw(data, options)
        }
    </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="chart_div"></div>

<?php
    include "conecta.php";

    include "footer.php";
?>