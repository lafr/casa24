<?PHP
    session_start();
    include "conecta.php";

    $ranking = $_SESSION['ranking'];
    $nome = $_SESSION['nome'];
?>
    <!DOCTYPE html>
      <html lang='pt-BR'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Casa Siga Bem</title>
            <link rel='stylesheet' href='css/main.css'>
        </head>
        <body>

        <div class="top-bar">
            <button>Usuários</button>
            <button>Paradas</button>
            <button>Distribuidores</button>
            <button>Brindes</button>
            
            <button>Sair</button>
        </div>

<?PHP include "footer.php";  ?>