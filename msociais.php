<?php 

    /**
     * Fazer a sleção das mídias sociais
     * Criar o formulário para edição e inclusão de novos
     */

    include 'header.php';

    $sql_clientes = "SELECT * FROM clientes WHERE id_cliente = " . $_GET['id_cliente'];
    $result_clientes = mysqli_query($conn, $sql_clientes);
    $row_clientes = mysqli_fetch_assoc($result_clientes);

    echo "<div class='content'>
        <h2>Mídias Sociais de " . $row_clientes['razao'] . "</h2>";

        $sql_sociais = "SELECT * FROM sociais WHERE fk_cliente = " . $_GET['id_cliente'];
        $result_sociais = mysqli_query($conn, $sql_sociais);

        /*
        while ($row_sociais = mysqli_fetch_assoc($result_sociais)) {
            echo "<fieldset>
                    <legend>" . $row_sociais['tipo'] . "</legend>
                    <form action='$_SELF' method='post'>
                        <label for='url'>URL</label><input type='text' name='url' value='" . $row_sociais['url'] . "'>
                        <label for='usuario'>Usuário</label><input type='text' name='usuario' value='" . $row_sociais['usuario'] . "'>
                        <label for='senha'>Senha</label><input type='password' name='senha' value='" . $row_sociais['senha'] . "'>
                        <label for='obs'>Observações</label><input type='text' name='obs' value='" . $row_sociais['obs'] . "'>
                    </form>
                </fieldset>";
        }
        */
        echo "</div>";

    include "footer.php";  
?>