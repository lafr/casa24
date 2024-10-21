<?PHP
    include "conecta.php";

    $acao = $_GET['acao'];
    $id_parada = $_GET['id_parada'];
    $evento_data_inicio = $_GET['evento_data_inicio'];

    function getPreviousDay($date) {
        $dateTime = new DateTime($date);
        $dateTime->modify('-1 day');
        return $dateTime->format('Y-m-d');
    }

    function getNextDay($date) {
        $dateTime = new DateTime($date);
        $dateTime->modify('+1 day');
        return $dateTime->format('Y-m-d');
    }
    
    if ($acao == "sobe"){
        $nova_data_inicio = getPreviousDay($evento_data_inicio);

        $move_dia = "update paradas set evento_data_inicio = '$nova_data_inicio' where id_parada = '$id_parada'";
        $novo_dia = mysqli_query($conn, $move_dia);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        header("location: paradas.php");
    } elseif ($acao == "desce"){
        $nova_data_inicio = getNextDay($evento_data_inicio);

        $move_dia = "update paradas set evento_data_inicio = '$nova_data_inicio' where id_parada = '$id_parada'";
        $novo_dia = mysqli_query($conn, $move_dia);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        header("location: paradas.php");
    }
?>