<?php     

    include 'header.php';
    
    echo"<div class='bloco_centro'><div class='content'>
            <form action='novo_contato.php' method='post'>
                <label>Nome:</label><input type='text' name='nome' placeholder='Nome ffantasia' required>
                <label>Razão Social</label><input type='text' name='razao' placeholder='Razão Social' required>
                <label>SAP (se aplicável)</label><input type='text' name='sap' placeholder='SAP'>
                <label>Endereço</label><input type='text' name='endereco' placeholder='Endereço' required>
                <label>Bairro</label><input type='text' name='bairro' placeholder='Bairro' required>
                <label>CEP</label><input type='text' name='cep' placeholder='CEP' required>
                <label>UF</label>
                    <select name='uf' id='uf'>
                        <option value='AC'>AC</option>
                        <option value='AL'>AL</option>
                        <option value='AP'>AP</option>
                        <option value='AM'>AM</option>
                        <option value='BA'>BA</option>
                        <option value='CE'>CE</option>
                        <option value='DF'>DF</option>
                        <option value='ES'>ES</option>
                        <option value='GO'>GO</option>
                        <option value='MA'>MA</option>
                        <option value='MT'>MT</option>
                        <option value='MS'>MS</option>
                        <option value='MG'>MG</option>
                        <option value='PA'>PA</option>
                        <option value='PB'>PB</option>
                        <option value='PR'>PR</option>
                        <option value='PE'>PE</option>
                        <option value='PI'>PI</option>
                        <option value='RJ'>RJ</option>
                        <option value='RN'>RN</option>
                        <option value='RS'>RS</option>
                        <option value='RO'>RO</option>
                        <option value='RR'>RR</option>
                        <option value='SC'>SC</option>
                        <option value='SP'>SP</option>
                        <option value='SE'>SE</option>
                        <option value='TO'>TO</option>
                    </select>
                <label>Cidade</label><input type='text' name='cidade' placeholder='Cidade' required>
                <label>DDD</label><input type='number' name='ddd' placeholder='DDD' required>
                <label>Telefone</label><input type='tel' name='telefone' placeholder='Telefone' required>
                <label>Email</label><input type='email' name='email' placeholder='Email' required>
                <label>Tipo</label><select name='tipo'>
                    <option value='1'>Vibra</option>
                    <option value='2'>Cooper</option>
                    <option value='3'>-</option>
                    <option value='4'>-</option>
                    <option value='5'>Outros</option>
                </select>
                <input type='hidden' name='id_cliente' value='" . $id_cliente . "'>
                <input type='hidden' name='razao' value='" . $razao . "'>
                <input type='submit' value='INSERE'>
            </form>";
    ?>