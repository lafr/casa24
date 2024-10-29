<?PHP

    /**
     * Para composição do roteiro usei 3 clientes especiais para distribuir os dias de descanso, deslocamento e Vem de Vibra
     * Se for 1000, o dia é de descanso
     * Se for 1001, o dia é de deslocamento
     * Se for 1002, o dia é o evento Vem de Vibra
     * 
     * Importante: Não pode haver dia sem eventos do início ao fim do roteiro
     * 
     * Os clientes especiais não existem na tabela de clientes, só nas paradas e estão apenas neste código
     */

    include 'header.php';

    $sql_paradas = "SELECT * FROM paradas order by evento_data_inicio";
    $result_paradas = mysqli_query($conn, $sql_paradas);

    $sql_clientes = "SELECT * FROM clientes order by uf,cidade";
    $result_clientes = mysqli_query($conn, $sql_clientes);

    echo" <form action='insere_paradas.php' method='POST'>
            <div class='content'>
             <h2>Incluir</h2>
                <input type='date' name='evento_data_inicio' required> 
                <select name='id_cliente'>
                <option value='1000'>Descanso</option>
                <option value='1001'>Deslocamento</option>
                <option value='1002'>Vem de Vibra</option>
                <option value=''>---</option>";
                
                while ($row_cliente = mysqli_fetch_assoc($result_clientes)) {
                    echo "<option value='" . $row_cliente['id_cliente'] . "'>" . $row_cliente['razao'] . " - " . $row_cliente['cidade'] . " [" . $row_cliente['uf'] . "]   " . $row_cliente['sap'] . "</option>";
                }

    echo "      </select>
               <input type='submit' value='INCLUIR PARADA' required>
            </div>
            </form>";

    echo "<div class='content'>
                <h2>Paradas</h2>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Data</th>
                        <th>Dia da semana</th>
                        <th>SAP</th>
                        <th>Parada</th>
                        <th>Endereco</th>
                        <th>UF</th>
                        <th>Cidade</th>
                        <th>Números</th>
                        <th>Anotações</th>
                    </tr>";

    while ($row_parada = mysqli_fetch_assoc($result_paradas)) {
     
        $id_parada = $row_parada['id_parada'];
        $fk_cliente = $row_parada['fk_cliente'];
        $evento_data_inicio = $row_parada['evento_data_inicio'];

        $dia_semana = date('w', strtotime($evento_data_inicio));
        
        if ($dia_semana == 6 or $dia_semana == 0) {
            $cor_fundo = "yellow";
        } else {
            $cor_fundo = "white";
        }

        $dias_semana = [
            'Domingo', 'Segunda-feira', 'Terça-feira', 
            'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'
        ];

        $ver_dia_semana = $dias_semana[$dia_semana];
        $ver_data_limpa = date('d/m/Y', strtotime($evento_data_inicio));

        $sql_cliente = "SELECT * FROM clientes WHERE id_cliente = $fk_cliente";
        $result_cliente = mysqli_query($conn, $sql_cliente);
        $row_cliente = mysqli_fetch_assoc($result_cliente);

        $i = $i + 1;

        if ($fk_cliente == 1000) {
            $razao = "Descanso";
            $cor_fundo = "lightblue";
        } elseif ($fk_cliente == 1001) {
            $razao = "Deslocamento";
            $cor_fundo = "orange";
        } elseif ($fk_cliente == 1002) {
            $razao = "Vem de Vibra";
            $cor_fundo = "green";
        } else {
            $razao = $row_cliente['razao'];
        }

        // Se o usuário for o administrador, ele pode subir ou descer a parada
        
        if ($user_ranking == 1) {
            $ajuste_datas = "$ver_data_limpa <a href='edita_parada.php?acao=sobe&id_parada=$id_parada&evento_data_inicio=$evento_data_inicio'><img src='img/up.png' style='width: 20px;'></a> <a href='edita_parada.php?acao=desce&id_parada=$id_parada&evento_data_inicio=$evento_data_inicio'><img src='img/down.png' style='width: 20px;'></a>";
        }
        else {
            $ajuste_datas = "$ver_data_limpa";
        }

        // Se o usuário for o administrador ou o operador, ele pode inserir números e anotações

        if ($fk_cliente < 1000 and $user_ranking == 1 or $user_ranking == 2) {
            $insere_numeros = "<button value='VER'><a href='insere_numeros.php?id_parada=" . $row_parada['id_parada'] . "&razao=" . $razao . "'>VER</a></button>";
            $insere_anotacoes = "<button value='VER'><a href='insere_anotacoes.php?id_parada=" . $row_parada['id_parada'] . "'>VER</a></button>";
        }
        else {
            $insere_numeros = "&nbsp;";
            $insere_anotacoes = "&nbsp;";
        }

        echo "<tr style='background-color:" . $cor_fundo . "'>
                <td>" . $i . "</td>";
        
        echo "  <td>" . $ajuste_datas . "</td>";

        echo "  <td>" . $ver_dia_semana . "</td>
                <td>" . $row_cliente['sap'] . "</td>
                <td>" . $razao . "</td>
                <td>" . $row_cliente['endereco'] . "</td>
                <td>" . $row_cliente['uf'] . "</td>
                <td>" . $row_cliente['cidade'] . "</td>
                <td>$insere_numeros</td>
                <td>$insere_anotacoes</td>
            </tr>";
    }

    echo "</table></div>";
    include 'footer.php';
?>