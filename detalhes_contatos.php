<?php 
    include 'header.php';

    $sql_contatos = "SELECT * FROM contatos WHERE fk_cliente = " . $_GET['id_cliente'];
    $result_contatos = mysqli_query($conn, $sql_contatos);

    echo "<div class='content'>
            <button><a href='$_SELF'>NOVO</a></button>
            <h1>Contatos de " . $_GET['razao'] . "</h1>
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
                <td><button><a href='editar_contato.php?id_contato=" . $row_contatos['id_contato'] . "'>EDITAR</a></button></td>
            </tr>";
    }

    echo "</table>
        </div>";
?>