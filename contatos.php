<?php 
    include 'header.php';

    $sql_contatos = "SELECT * FROM contatos WHERE fk_cliente = " . $_GET['id_cliente'];
    $result_contatos = mysqli_query($conn, $sql_contatos);

    $id_cliente = $_GET['id_cliente'];
    $razao = $_GET['razao'];

    echo "<div class='top-menu'>
            <button><a href='insere_contato.php?id_cliente=$id_cliente&razao=$razao'>NOVO</a></button>
            </div>
            <div class='bloco_centro'><div class='content'>
            <h1>Contatos de " . $razao . "</h1>
                <table>
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Cargo</th>
                        <th>Editar</th>
                    </tr>";

        while ($row_contatos = mysqli_fetch_assoc($result_contatos)) {
            echo "<tr>
                    <td>" . $row_contatos['nome'] . "</td>
                    <td>(" . $row_contatos['ddd'] . ") " . $row_contatos['telefone'] . "</td>
                    <td>" . $row_contatos['email'] . "</td>
                    <td>" . $row_contatos['cargo'] . "</td>
                    <td><button><a href='edita_contato.php?id_contato=" . $row_contatos['id_contato'] . "'>EDITAR</a></button></td>
                </tr>";
        }

    echo        "</table>";
    echo "  </div></div>";
?>