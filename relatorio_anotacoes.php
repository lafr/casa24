<!DOCTYPE html>
<html lang='pt-BR'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Casa Siga Bem</title>
<link rel='stylesheet' href='css/main.css'>
<link rel="icon" href="img/favicon.png" type="image/png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
    <body>

    <?php
        include "conecta.php";

        $sql_paradas = "SELECT * FROM paradas where fk_cliente < '1000' order by id_parada";
        $resultado_paradas = mysqli_query($conn, $sql_paradas);

        while ($row_parada = mysqli_fetch_array($resultado_paradas)) {

            $ver_cliente = mysqli_query($conn, "SELECT * FROM clientes where id_cliente = " . $row_parada['fk_cliente']);
            $row_cliente = mysqli_fetch_array($ver_cliente);

            $sql_anotacoes = "SELECT * FROM anotacoes where fk_parada = " . $row_parada['fk_cliente'];
            $resultado_anotacoes = mysqli_query($conn, $sql_anotacoes);
            $row_anotacoes = mysqli_fetch_array($resultado_anotacoes);

            $razao = $row_cliente['razao'];
            $data_criacao = $row_anotacoes['data_criacao'];
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

            $data_criacao = date('d/m/Y', strtotime($data_criacao));

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
            switch ($opiniao_geral) {
                case 1:
                    $opiniao_geral = 'Ruim';
                    break;
                case 2:
                    $opiniao_geral = 'Regular';
                    break;
                case 3:
                    $opiniao_geral = 'Bom';
                    break;
                }
                switch ($opiniao_visitantes) {
                case 1:
                    $opiniao_visitantes = 'Ruim';
                    break;
                case 2:
                    $opiniao_visitantes = 'Regular';
                    break;
                case 3:
                    $opiniao_visitantes = 'Bom';
                    break;
                }
            if ($ver_status == 1) {
                $ver_status = 'Ativo';
            } else {
                $ver_status = 'Inativo';
            }

            if ($descricao != '') {
            echo "<table style='max-width: 800px;'>
                    <tr style='background: lightgrey';>
                        <td colspan='8'><h2>$razao</h2></td>
                    </tr>
                    <tr>
                        <td colspan='8'><h3><b>Descrição:</b></h3> <pre style='white-space: pre-wrap;'>$descricao</pre></td>
                    </tr>
                    <tr>
                        <td><b>Data de Criação:</b></td><td>$data_criacao</td>
                        <td><b>Brindes:</b></td><td>$brindes</td>
                        <td><b>Redes Sociais:</b></td><td>$msociais</td>
                        <td><b>Contato Responsável:</b></td><td>$contato_responsavel</td>
                    </tr>
                    <tr>
                        <td><b>Show no Posto:</b></td><td>$show_posto</td>
                        <td><b>AB:</b></td><td>$ab</td>
                        <td><b>Promoção:</b></td><td>$promocao</td>
                        <td>&nbsp;</td><td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><b>Opinião Geral:</b></td><td>$opiniao_geral</td>
                        <td><b>Opinião dos Visitantes:</b></td><td>$opiniao_visitantes</td>
                        <td>&nbsp;</td><td>&nbsp;</td>
                        <td><b>Status:</b></td><td>$ver_status</td>
                    </tr>
                </bable><br><br>";
            }
        }
    ?>

    </body>
</html>