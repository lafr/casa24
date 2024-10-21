<?PHP 
    include 'header.php';

        $sql_paradas = "SELECT * FROM paradas order by evento_data_inicio";
        $result_paradas = mysqli_query($conn, $sql_paradas);

        $data_atual = date('Y-m-d');


/*
        while ($row_parada = mysqli_fetch_assoc($result_paradas)) {
            if ($row_parada['evento_data_inicio'] < $data_atual){
                
                $sql_evento_passado = "SELECT * FROM clientes WHERE id_cliente = $row_parada['fk_cliente']";
                $result_evento_passado = mysqli_query($conn, $sql_evento_passado);
                $row_evento_passado = mysqli_fetch_assoc($result_evento_passado);

                echo $row_parada['evento_data_inicio'] . " - " . $row_evento_passado['razao'] . "<br>";
            }
        }
*/
    include 'footer.php';
?>
