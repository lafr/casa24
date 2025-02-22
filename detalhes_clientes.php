<?php 
    include 'header.php';

    if ($_POST) {
        $id_cliente = $_POST['id_cliente'];
        $nome = $_POST['nome'];
        $razao = $_POST['razao'];
        $sap = $_POST['sap'];
        $cnpj = $_POST['cnpj'];
        $endereco = $_POST['endereco'];
        $bairro = $_POST['bairro'];
        $cep = $_POST['cep'];
        $cidade = $_POST['cidade'];
        $uf = $_POST['uf'];
        $representante = $_POST['representante'];
        $ddd = $_POST['ddd'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $responsavel = $_POST['responsavel'];
        $tipo = $_POST['tipo'];

        $sql_update = "UPDATE clientes SET nome='$nome', razao='$razao', sap='$sap', cnpj='$cnpj', endereco='$endereco', bairro='$bairro', cep='$cep', cidade='$cidade', uf='$uf', representante='$representante', ddd='$ddd', telefone='$telefone', email='$email', responsavel='$responsavel' WHERE id_cliente='$id_cliente'";
        $sql_update = str_replace("''", "NULL", $sql_update);
        $result_update = mysqli_query($conn, $sql_update);

        if ($result_update) {
            echo "<script>alert('Cliente atualizado com sucesso!');</script>";
            echo "<script>window.location.href='clientes.php';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar cliente!');</script>";
        }
    }

    $sql_clientes = "SELECT * FROM clientes WHERE id_cliente = " . $_GET['id_cliente'];
    $result_clientes = mysqli_query($conn, $sql_clientes);
    $row_clientes = mysqli_fetch_assoc($result_clientes);

    switch ($row_clientes['tipo']) {
        case '1':
            $ver_tipo = 'Vibra';
            break;
        case '2':
            $ver_tipo = 'Cooper';
            break;
        
        default:
            $ver_tipo = 'Indefinido';
            break;
    }
?>

<div class='bloco_centro'> 
    <div class='content'>
        <fieldset>
            <h2>Detalhes de <?php echo $row_clientes['razao']; ?></h2>
            <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
                <input type='hidden' name='id_cliente' value='<?php echo $_GET['id_cliente']; ?>'>
                <label for="nome">Nome Fantasia</label><input type='text' name='nome' value='<?php echo $row_clientes['nome']; ?>'>
                <label for="razao">Razão Social</label><input type='text' name='razao' value='<?php echo $row_clientes['razao']; ?>'>
                <label for="sap">SAP</label><input type='text' name='sap' value='<?php echo $row_clientes['sap']; ?>'>
                <label for="cnpj">CNPJ (apenas números)</label><input type='number' name='cnpj' value='<?php echo $row_clientes['cnpj']; ?>' >
                <label for="endereco">Endereço</label><input type='text' name='endereco' value='<?php echo $row_clientes['endereco']; ?>'>
                <label for="bairro">Bairro</label><input type='text' name='bairro' value='<?php echo $row_clientes['bairro']; ?>'>
                <label for="cep">CEP</label><input type='text' name='cep' value='<?php echo $row_clientes['cep']; ?>'>
                <label for="cidade">Cidade</label><input type='text' name='cidade' value='<?php echo $row_clientes['cidade']; ?>'>
                <label for="uf">UF</label><input type='text' name='uf' value='<?php echo $row_clientes['uf']; ?>'>
                <label for="representante">Representante</label><input type='text' name='representante' value='<?php echo $row_clientes['representante']; ?>'>
                <label for="ddd">DDD</label><input type='number' name='ddd' value='<?php echo $row_clientes['ddd']; ?>'>
                <label for="telefone">Telefone</label><input type='tel' name='telefone' value='<?php echo $row_clientes['telefone']; ?>'>
                <label for="email">Email</label><input type='text' name='email' value='<?php echo $row_clientes['email']; ?>'>
                <label for="responsavel">Responsável</label><input type='text' name='responsavel' value='<?php echo $row_clientes['responsavel']; ?>'>
                <input type='submit' value='Salvar'>
            </form>
        </fieldset> 
    </div>
</div>

<?php include 'footer.php'; ?>