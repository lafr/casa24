<?PHP
    session_start();
    include "conecta.php";

    $user_ranking = $_SESSION['user_ranking'];
    $user_nome = $_SESSION['user_nome'];

    $dia = date('d'); $mes = date('m'); $ano = date('Y');
    $data_formato = $dia . "/" . $mes . "/" . $ano;
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
            <button><a href="distribuidores.php">Distribuidores</a></button>
            <button><a href="brindes.php">Brindes</a></button>
            <button><a href="relatorios.php">Relatórios</a></button>
            <button>Sair</button>
        </div>

    <div class="top">
        <img src="img/logo_casa.png" alt="Casa Siga Bem" height="120px" style="margin-right: 20px;">
        <div class="top-ficha">
            <h1>Olá, <?PHP echo"$user_nome"; ?></h1>
            <h3><?PHP echo "$data_formato"; ?> - Próximo evento em X dias<br>
            Nr. de interações: XXXX | Dias de evento: XX</h3>
        </div>
    </div>