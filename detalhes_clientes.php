<?php 
    include 'header.php';

    $sql_clientes = "SELECT * FROM clientes WHERE id_cliente = " . $_GET['id_cliente'];
    $result_clientes = mysqli_query($conn, $sql_clientes);
    $row_clientes = mysqli_fetch_assoc($result_clientes);
?>

<div class='content'>
    <h1>Detalhes do cliente</h1>
    <form action='$_SELF' method='post'>
        <input type='text' name='razao' value='<?php echo $row_clientes['razao']; ?>'>
        <input type='text' name='sap' value='<?php echo $row_clientes['sap']; ?>'>
        <input type='text' name='cnpj' value='<?php echo $row_clientes['cnpj']; ?>'>
        <input type='text' name='endereco' value='<?php echo $row_clientes['endereco']; ?>'>
        <input type='text' name='bairro' value='<?php echo $row_clientes['bairro']; ?>'>
        <input type='text' name='cep' value='<?php echo $row_clientes['cep']; ?>'>
        <input type='text' name='cidade' value='<?php echo $row_clientes['cidade']; ?>'>
        <input type='text' name='uf' value='<?php echo $row_clientes['uf']; ?>'>
        <input type='text' name='representante' value='<?php echo $row_clientes['representante']; ?>'>
        <input type='text' name='ddd' value='<?php echo $row_clientes['ddd']; ?>'>
        <input type='text' name='telefone' value='<?php echo $row_clientes['telefone']; ?>'>
        <input type='text' name='email' value='<?php echo $row_clientes['email']; ?>'>
        <input type='text' name='responsavel' value='<?php echo $row_clientes['responsavel']; ?>'>
        <input type='text' name='tipo' value='<?php echo $row_clientes['tipo']; ?>'>
    </form>
</div>

<?php include 'footer.php'; ?>