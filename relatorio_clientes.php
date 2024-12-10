<!DOCTYPE html>
<html lang='pt-BR'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Casa Siga Bem</title>
<link rel='stylesheet' href='css/main.css'>
<link rel="icon" href="img/favicon.png" type="image/png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
    <body>
        <?php
            include "conecta.php";

            $sql_clientes = "SELECT * FROM clientes where id_cliente < '1000' order by id_cliente";
            $resultado_clientes = mysqli_query($conn, $sql_clientes);

            while ($row_cliente = mysqli_fetch_array($resultado_clientes)) {
                $nome = $row_cliente['nome'];
                $razao = $row_cliente['razao'];
                $sap = $row_cliente['sap'];
                $cnpj = $row_cliente['cnpj'];
                $endereco = $row_cliente['endereco'];
                $bairro = $row_cliente['bairro'];
                $cep = $row_cliente['cep'];
                $cidade = $row_cliente['cidade'];
                $uf = $row_cliente['uf'];
                $representante = $row_cliente['representante'];
                $ddd = $row_cliente['ddd'];
                $telefone = $row_cliente['telefone'];
                $email = $row_cliente['email'];
                $responsavel = $row_cliente['responsavel'];
                $tipo = $row_cliente['tipo'];

                echo $razao . "<br>";
            }
        ?>
    </body>
</html>