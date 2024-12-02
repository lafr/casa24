<?php 

    /**
     * Formulário para inserção de clientes e rotina para inserir na base
     * 
     */
    
    include "header.php";

    if ($_POST) {
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

        $sql_insert = "INSERT INTO clientes (nome, razao, sap, cnpj, endereco, bairro, cep, cidade, uf, representante, ddd, telefone, email, responsavel, tipo) VALUES ('$nome', '$razao', '$sap', '$cnpj', '$endereco', '$bairro', '$cep', '$cidade', '$uf', '$representante', '$ddd', '$telefone', '$email', '$responsavel', '$tipo')";
        $sql_insert = str_replace("''", "NULL", $sql_insert);
        $result_insert = mysqli_query($conn, $sql_insert);

        if ($result_insert) {
            echo "<script>alert('Cliente atualizado com sucesso!');</script>";
            echo "<script>window.location.href='clientes.php';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar cliente!');</script>";
        }
    }
?>

<div class='bloco_centro'>
    <div class='content'>
        <fieldset>
        <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
            <label for="nome">Nome Fantasia</label><input type='text' name='nome'>
            <label for="razao">Razão Social</label><input type='text' name='razao'>
            <label for="sap">SAP</label><input type='text' name='sap'>
            <label for="cnpj">CNPJ</label><input type='text' name='cnpj'>
            <label for="endereco">Endereço</label><input type='text' name='endereco'>
            <label for="bairro">Bairro</label><input type='text' name='bairro'>
            <label for="cep">CEP</label><input type='text' name='cep'>
            <label for="cidade">Cidade</label><input type='text' name='cidade'>
            <label for="uf">UF</label><input type='text' name='uf'>
            <label for="representante">Representante</label><input type='text' name='representante'>
            <label for="ddd">DDD</label><input type='text' name='ddd'>
            <label for="telefone">Telefone</label><input type='text' name='telefone'>
            <label for="email">E-mail</label><input type='text' name='email'>
            <label for="responsavel">Responsável</label><input type='text' name='responsavel'>
            <label for="tipo">Tipo</label>
            <select name='tipo'>
                <option value='1'>Vibra</option>
                <option value='2'>Cooper</option>
            </select>
            <input type='submit' value='Inserir'>
        </form>
        </fieldset>
    </div>
</div>