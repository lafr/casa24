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
            <table style='max-width: 800px;'>";

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
        if ($opiniao_visitantes == 1) {
            $opiniao_visitantes = 'Fraca';
        } elseif ($opiniao_visitantes == 2) {
            $opiniao_visitantes = 'Média';
        } else {
            $opiniao_visitantes = 'Boa';
        }
        if ($opiniao_geral == 1) {
            $opiniao_geral = 'Fraca';
        } elseif ($opiniao_geral == 2) {
            $opiniao_geral = 'Média';
        } else {
            $opiniao_geral = 'Boa';
        }

        echo "      <tr style='background-color:lightgrey;'>
                        <td width='150' style='font-weight:bold;'>Criação:</td><td width='150'>$data_criacao</td>
                        <td width='150' style='font-weight:bold;'>Última interação:</td><td width='150'>$ultima_interacao</td>
                    </tr>
                    <tr rowspan='6'>
                        <td colspan='4'>Descrição: <pre style='white-space: pre-wrap;'>$descricao</pre></td>
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
?>