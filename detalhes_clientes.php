<?php 
    include 'header.php';

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
            <form action='$_SELF' method='post'>
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
                <label for="tipo">Cliente</label><input type='input' list='tipo' name='tipo' value='<?php echo $ver_tipo ?>'>
                <datalist id='tipo'>
                    <option value='1'>Vibra</option>
                    <option value='2'>Cooper/Goodyear</option>
                </datalist>
            </form>
        </fieldset> 
    </div>
</div>

<?php include 'footer.php'; ?>