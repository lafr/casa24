<?php 

    /**
     * Fazer a sleção das mídias sociais
     * Criar o formulário para edição e inclusão de novos registros
     */

    /**
     * 	- 01 - facebook
     *	- 02 - instagram
     *	- 03 - youtube
     *	- 04 - linkedin
     *	- 05 - tiktok
     *	- 06 - kaway
     *	- 07 - whatsapp
     *	- 08 - telegram
     *	- 09 - mastodon
     *	- 10 - twitter
     *	- 11 - bluesky
     *	- 12 - threats
     *	- 13 - zelo
     *	- 14 - wechat
     *	- 15 - pinterest
     *	- 16 - twitch
     *	- 17 - site
    */

    include 'header.php';

    $id_cliente = $_GET['id_cliente'];
    $razao = $_GET['razao'];

    
    $sql_msociais = "SELECT * FROM midias WHERE fk_cliente = $id_cliente";
    $result_msociais = mysqli_query($conn, $sql_msociais);

    echo "<div class='top-menu'>
            <button><a href='insere_msocial.php?id_cliente=$id_cliente'>NOVO</a></button>
            </div>
            <div class='bloco_centro'><div class='content'>
            <h1>Mídias Sociais de $razao</h1>
                <table>
                    <tr>
                        <th width='100'>Rede</th>
                        <th width='400px'>Nome</th>
                        <th>Seguidores</th>
                        <th>Editar</th>
                    </tr>";

        while ($row_msociais = mysqli_fetch_assoc($result_msociais)) {

            $rede = $row_msociais['rede'];
            $info = $row_msociais['info'];
            $nr_seguidores = $row_msociais['nr_seguidores'];

            switch($rede) {
                case '01':
                    $rede = 'Facebook';
                    break;
                case '02':
                    $rede = 'Instagram';
                    break;
                case '03':
                    $rede = 'Youtube';
                    break;
                case '04':
                    $rede = 'Linkedin';
                    break;
                case '05':
                    $rede = 'Tiktok';
                    break;
                case '06':
                    $rede = 'Kaway';
                    break;
                case '07':
                    $rede = 'Whatsapp';
                    break;
                case '08':
                    $rede = 'Telegram';
                    break;
                case '09':
                    $rede = 'Mastodon';
                    break;
                case '10':
                    $rede = 'Twitter';
                    break;
                case '11':
                    $rede = 'Bluesky';
                    break;
                case '12':
                    $rede = 'Threats';
                    break;
                case '13':
                    $rede = 'Zelo';
                    break;
                case '14':
                    $rede = 'Wechat';
                    break;
                case '15':
                    $rede = 'Pinterest';
                    break;
                case '16':
                    $rede = 'Twitch';
                    break;
                case '17':
                    $rede = 'Site';
                    break;
            }

            echo "<tr>
                    <td>$rede</td>
                    <td>/$info</td>
                    <td>$nr_seguidores</td>
                    <td><button><a href='edita_msocial.php?id_msocial=" . $row_msociais['id_msocial'] . "'>EDITAR</a></button></td>
                </tr>";
        }

    include "footer.php";  
?>