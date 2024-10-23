<?PHP 
    include 'header.php';

        $sql_paradas = "SELECT * FROM paradas order by evento_data_inicio";
        $result_paradas = mysqli_query($conn, $sql_paradas);

        $data_atual = date('Y-m-d');

        while ($row_parada = mysqli_fetch_assoc($result_paradas)) {
            if ($row_parada['evento_data_inicio'] <= $data_atual){
            }
        }
    include 'footer.php';
?>
