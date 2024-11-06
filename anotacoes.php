<?php 

/**
 * Data da criação
 * Última interação
 * Descrição
 * 
 * Brindes
 * Mídias sociais
 * Contato_responsável
 * Show_posto
 * AB
 * Promoção
 * Opiniao_visitante
 * Opiniao_geral 
 */

include 'header.php';

$id_parada = $_GET['id_parada'];

$sql_anotacoes = "SELECT * FROM anotacoes WHERE fk_parada = $id_parada";
$result_anotacoes = $conn->query($sql_anotacoes);

    echo "<div class='bloco_centro'>
            <div class='content'>
            <table>";

if ($result_anotacoes->num_rows > 0) {
    while($row_anotacoes = $result_anotacoes->fetch_assoc()) {

        $data_criacao = $row_anotacoes['data_criacao'];
        $ultima_interacao = $row_anotacoes['ultima_interacao'];
        $descricao = $row_anotacoes['descricao'];
        $brindes = $row_anotacoes['brindes'];
        $msociais = $row_anotacoes['msociais'];
        $contato_responsavel = $row_anotacoes['contato_responsavel'];
        $show_posto = $row_anotacoes['show_posto'];
        $ab = $row_anotacoes['ab'];
        $promocao = $row_anotacoes['promocao'];
        $opiniao_visitantes = $row_anotacoes['opiniao_visitantes'];
        $opiniao_geral = $row_anotacoes['opiniao_geral'];
        $ver_status = $row_anotacoes['ver_status'];

        if ($brindes == 1) {
            $brindes = 'Sim';
        } else {
            $brindes = 'Não';
        }

        if ($msociais == 1) {
            $msociais = 'Sim';
        } else {
            $msociais = 'Não';
        }

        if ($contato_responsavel == 1) {
            $contato_responsavel = 'Sim';
        } else {
            $contato_responsavel = 'Não';
        }

        if ($show_posto == 1) {
            $show_posto = 'Sim';
        } else {
            $show_posto = 'Não';
        }

        if ($ab == 1) {
            $ab = 'Sim';
        } else {
            $ab = 'Não';
        }

        if ($promocao == 1) {
            $promocao = 'Sim';
        } else {
            $promocao = 'Não';
        }

        if ($ver_status == 1) {
            $ver_status = 'Válido';
        } else {
            $ver_status = 'Cancelado';
        }

        echo "      <tr style='background-color:lightgrey;'>
                        <td width='150' style='font-weight:bold;'>Criação:</td><td width='150'>$data_criacao</td>
                        <td width='150' style='font-weight:bold;'>Última interação:</td><td width='150'>$ultima_interacao</td>
                    </tr>
                    <tr rowspan='6'>
                        <td colspan='4'>Descrição: $descricao</td>
                    </tr>
                    <tr>
                        <td>Brindes: $brindes</td>
                        <td>Mídias sociais: $msociais</td>
                        <td>Contato responsável: $contato_responsavel</td>
                        <td>Show posto: $show_posto</td>
                    </tr>
                    <tr>
                        <td>AB: $ab</td>
                        <td>Promoção: $promocao</td>
                        <td>Opinião dos visitantes: $opiniao_visitantes</td>
                        <td>Opinião geral: $opiniao_geral</td>
                    </tr>
                    <tr style='background-color:lightgrey;'>
                        <td colspan='4' style='text-align: center; font-weight:bold;'>Ver status: $ver_status</td>
                    </tr>";
    }
} else {

    echo "<div class='top-menu'>
        <button><a href='insere_anotacoes.php?id_parada=$id_parada'>NOVO</a></button>
    </div>";

    echo "<tr><td>0 anotações</td></tr>";
}

    echo "      </table>
                </div>
            </div>";

/*
 $sql_anotacoes = "SELECT * FROM anotacoes WHERE fk_parada = '$fk_parada'";
    $result_anotacoes = mysqli_query($conn, $sql_anotacoes);

    echo "<div class='bloco_cetro'><div class='content'>
            <h2>Anotações</h2>
            <table>
                <tr>
                    <th style='width: 80px;'>Criação</th>
                    <th style='width: 80px;'>ver_status</th>
                    <th style='width: 80px;'>Ultima Interação</th>
                    <th style='width: 600px;'>Descrição</th>
                    <th style='width: 80px;'>Detalhamento</th>
                </tr>";
                    
                $data_criacao = $row_anotacao['data_criacao'];
                $ultima_interacao = $row_anotacao['ultima_interacao'];
                $descricao = $row_anotacao['descricao'];
                $brindes = $row_anotacao['brindes'];
                $msociais = $row_anotacao['msociais'];
                $contsto_responsavel = $row_anotacao['contato_responsavel'];
                $show_posto = $row_anotacao['show_posto'];
                $ab = $row_anotacao['ab'];
                $promocao = $row_anotacao['promocao'];
                $opiniao_visitantes = $row_anotacao['opiniao_visitantes'];
                $opiniao_geral = $row_anotacao['opiniao_geral'];
                $ver_status = $row_anotacao['ver_status'];

    while ($row_anotacao = mysqli_fetch_assoc($result_anotacoes)) {
            echo "<tr>
                    <td>$data_criacao</td>
                    <td>$ver_status</td>
                    <td>$ultima_interacao</td>
                    <td>$descricao</td>
                    <td>&nbsp;</td>
                </tr>";
    }

    echo "</table></div></div>";
*/
?>