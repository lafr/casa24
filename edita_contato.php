<?php 
    include "header.php";

    if ($_POST) {
        $id_contato = $_POST['id_contato'];
        $nome = $_POST['nome'];
        $ddd = $_POST['ddd'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $cargo = $_POST['cargo'];

        echo $id_contato . "<br>";

        $sql = "UPDATE contatos SET nome = '$nome', ddd = '$ddd', telefone = '$telefone', email = '$email', cargo = '$cargo' WHERE id_contato = $id_contato";
        $result = $conn->query($sql);

        header("Location: clientes.php");
    } else {
        $id_contato = $_GET['id_contato'];
        $sql_contato = "SELECT * FROM contatos WHERE id_contato = $id_contato";
        $result_contato = $conn->query($sql_contato);
        $row_contato = $result_contato->fetch_assoc();
    }
?>

<div class="bloco_centro">
    <div class="content">
        <h1>Editar Contato</h1>
        <form action="edita_contato.php" method="POST">
            <input type="hidden" name="id_contato" value="<?php echo $id_contato; ?>">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $row_contato['nome']; ?>" required>
            <label for="ddd">DDD:</label>
            <input type="text" name="ddd" id="ddd" value="<?php echo $row_contato['ddd']; ?>" required>
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" value="<?php echo $row_contato['telefone']; ?>" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $row_contato['email']; ?>" required>
            <label for="cargo">Cargo:</label>
            <input type="text" name="cargo" id="cargo" value="<?php echo $row_contato['cargo']; ?>" required>
            <button type="submit">EDITAR</button>
        </form>
    </div>
</div>

<?php 
    include "footer.php";
?>