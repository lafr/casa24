<?PHP
    // Conexão com o banco de dados
    $servername = "localhost";
    $username = "lafr";
    $password = "e7vhg3";
    $dbname = "casa24";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
?>