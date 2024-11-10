<?php     

    include 'header.php';
    
    $id_cliente = $_GET['id_cliente'];
    $razao = $_GET['razao'];
    $acao = $_POST['acao'];

    if ($_POST) {
        $id_cliente = $_POST['id_cliente'];
        $nome = $_POST['nome'];
        $ddd = $_POST['ddd'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $cargo = $_POST['cargo'];

        $sql = "INSERT INTO contatos (fk_cliente, nome, ddd, telefone, email, cargo) VALUES ('$id_cliente', '$nome', '$ddd', '$telefone', '$email', '$cargo')";
        $result = mysqli_query($conn, $sql);

        header("Location: clientes.php");
    }

    echo "<div class='bloco_centro'>
            <div class='content'>
                <h1>Novo Contato para " . $razao . "</h1>
                <form action='insere_contato.php' method='POST'>
                    <input type='hidden' name='id_cliente' value='" . $id_cliente . "'>
                    <label for='nome'>Nome:</label>
                    <input type='text' name='nome' id='nome' required>
                    <label for='ddd'>DDD:</label>
                    <input type='text' name='ddd' id='ddd' required>
                    <label for='telefone'>Telefone:</label>
                    <input type='text' name='telefone' id='telefone' required>
                    <label for='email'>Email:</label>
                    <input type='email' name='email' id='email' required>
                    <label for='cargo'>Cargo:</label>
                    <input type='text' name='cargo' id='cargo' required>
                    <button type='submit'>INSERIR</button>
                </form>
            </div>
        </div>";
?>