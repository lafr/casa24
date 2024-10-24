<?PHP
    session_start();
    include "conecta.php";

    $user_ranking = $_SESSION['user_ranking'];
    $user_nome = $_SESSION['user_nome'];

    if ($user_ranking == '') {
        header("Location: index.php");
    }

    $hoje_formato = date('d/m/Y');
    $hoje = date('Y-m-d');

    $sql_paradas = "SELECT * FROM paradas";
    $result_paradas = mysqli_query($conn, $sql_paradas);
    $total_paradas = mysqli_num_rows($result_paradas);

   $sql_proxima_parada = "SELECT * FROM paradas WHERE evento_data_inicio > '$hoje' ORDER BY evento_data_inicio ASC LIMIT 1";
    $result_proxima_parada = mysqli_query($conn, $sql_proxima_parada);
    $row_proxima_parada = mysqli_fetch_assoc($result_proxima_parada);
    $data_proxima_parada = $row_proxima_parada['evento_data_inicio'];
    $ver_proxima_parada = date('d/m/Y', strtotime($data_proxima_parada));
?>
    <!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
      <meta charset='UTF-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <title>Casa Siga Bem</title>
      <link rel='stylesheet' href='css/main.css'>

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    </head>
        <body>

        <div class="top-bar">
            <button><a href="principal.php">Início</a></button>
            <button><a href="usuarios.php">Usuários</a></button>
            <button><a href="paradas.php">Paradas</button</a></button>
            <button><a href="clientes.php">Clientes</a></button>
            <button><a href="brindes.php">Brindes</a></button>
            <button><a href="relatorios.php">Relatórios</a></button>
            <button>Sair</button>
        </div>

    <div class="top">
        <img src="img/logo_casa.png" alt="Casa Siga Bem" height="120px" style="margin-right: 20px;">
        <div class="top-ficha">
            <h1>Olá, <?PHP echo"$user_nome"; ?></h1>
            <h3><?PHP echo "$hoje_formato"; ?> - Próximo evento no dia <?PHP echo"$ver_proxima_parada"; ?><br>
            Nr. de interações: XXXX | Total: <?PHP echo"$total_paradas"; ?> dias</h3>
        </div>
    </div>