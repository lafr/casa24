<?PHP
    include "conecta.php";

    $id_cliente = $_POST['id_cliente'];
    $evento_data_inicio = $_POST['evento_data_inicio'];

    $sql = "insert into paradas (fk_cliente, evento_data_inicio) values ('$id_cliente', '$evento_data_inicio')";
    $result = $conn->query($sql);

    header("location: paradas.php");

    ?>