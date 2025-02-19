<?php
    include "header.php";

    /**Campos de cadastro: 
    •    Nome
    •    Sobrenome
    •    CPF
    •    Telefone Celular
    •    CEP
    •    Rua
    •    Número
    •    Complemento
    •    Cidade 
    •    Estado
    •    Email (não obrigatório) */

    if ($_POST){
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $cep = $_POST['cep'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $complemento = $_POST['complemento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $email = $_POST['email'];
        $termo_uso = $_POST['termo_uso'];
        $privacidade = $_POST['privacidade'];
        $imagem = $_POST['imagem'];

        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        $telefone = preg_replace('/[^0-9]/', '', $telefone);
        $cep = preg_replace('/[^0-9]/', '', $cep);
        $numero = preg_replace('/[^0-9]/', '', $numero);

        if (strlen($cpf) != 11){
            echo "<script>alert('CPF inválido!');</script>";
            return;
        }

        if ($termo_uso != 1){
            $termo_uso = 0;
        }

        if ($privacidade != 1){
            $privacidade = 0;
        }

        $sql = "INSERT INTO cadastro (nome, sobrenome, cpf, telefone, cep, rua, numero, complemento, cidade, estado, email, termo_uso, privacidade, imagem) VALUES ('$nome', '$sobrenome', '$cpf', '$telefone', '$cep', '$rua', '$numero', '$complemento', '$cidade', '$estado', '$email','$termo_uso', '$privacidade', '$imagem')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Cadastro realizado com sucesso!');</script>";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<div class="bloco_centro">
    <div class="container">    
    <h1>Cadastro</h1>
    <p>Preencha os campos abaixo para realizar o cadastro</p>
    <form method="post">
    <div class="form-group">
        <label for="nome">Nome: </label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </div>
    <div class="form-group">
        <label for="sobrenome">Sobrenome: </label>
        <input type="text" class="form-control" id="sobrenome" name="sobrenome" required>
    </div>
    <div class="form-group">
        <label for="cpf">CPF: </label>
        <input type="text" class="form-control" id="cpf" name="cpf" required>
    </div>
    <div class="form-group">
        <label for="telefone">Telefone (com DDD)): </label>
        <input type="text" class="form-control" id="telefone" name="telefone" required>
    </div>
<!--
    <div class="form-group">
        <label for="cep">CEP: </label>
        <input type="text" class="form-control" id="cep" name="cep" required>
    </div>
    <div class="form-group">
        <label for="rua">Rua: </label>
        <input type="text" class="form-control" id="rua" name="rua" required>
    </div>
    <div class="form-group">
        <label for="numero">Número: </label>
        <input type="text" class="form-control" id="numero" name="numero">
    </div>
    <div class="form-group">
        <label for="complemento">Complemento: </label>
        <input type="text" class="form-control" id="complemento" name="complemento">
    </div>
    <div class="form-group">
        <label for="cidade">Cidade</label>
        <input type="text" class="form-control" id="cidade" name="cidade" required>
    </div>
    <div class="form-group">
        <label for="estado">Estado</label>
        <select name="estado" id="estado" class="form-control">
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
        </select>
    </div>
-->
    <div class="form-group">
        <label for="email">Email (opcional)</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <br>
    <div class="form-group">
        <label for="termo_uso">Concordo com os <b><a href="termo_uso.html" target="_blank">Termos de uso</a></b></label>
        <input type="checkbox" class="form-control" id="termo_uso" name="termo_uso" value="1"><br>
        <label for="privacidade">Concordo com os <b><a href="privacidade.html" target="_blank">Termos de privacidade</a></b></label>
        <input type="checkbox" class="form-control" id="privacidade" name="privacidade" value="1"><br>
        <label for="imagem">Concordo com os <b><a href="termo_uso_imagem.html" target="_blank">Termos de uso da imagem</a></b></label>
        <input type="checkbox" class="form-control" id="imagem" name="imagem" value="1">
        
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
</div>

<?php
    include "footer.php";
?>