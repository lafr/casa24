<?php

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

    include ('header.php');

    $id_cliente = $_GET['id_cliente'];
    $razao = $_GET['razao'];

    if ($_POST) {
        $id_cliente = $_POST['id_cliente'];
        $rede = $_POST['rede'];
        $info = $_POST['info'];
        $nr_seguidores = $_POST['nr_seguidores'];

        $sql_insere_msocial = "INSERT INTO midias (fk_cliente, rede, info, nr_seguidores) VALUES ($id_cliente, '$rede', '$info', $nr_seguidores)";
        $result_insere_msocial = mysqli_query($conn, $sql_insere_msocial);

        if ($result_insere_msocial) {
            echo "<script>window.location.href='clientes.php';</script>";
        } else {
            echo "<script>alert('Erro ao inserir Mídia Social!');</script>";
        }
    }
?>

<div class="bloco_centro"><div class="content">
    <h1>Nova Mídia Social para <?php echo $razao; ?></h1>
    <form action="insere_msocial.php" method="POST">
        <input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">
        <label for="nome">Nome:</label>
        <select name="rede">
            <<option value="01">Facebook</option>
            <option value="02">Instagram</option>
            <option value="03">Youtube</option>
            <option value="04">Linkedin</option>
            <option value="05">Tiktok</option>
            <option value="06">Kaway</option>
            <option value="07">Whatsapp</option>
            <option value="08">Telegram</option>
            <option value="09">Mastodon</option>
            <option value="10">Twitter</option>
            <option value="11">Bluesky</option>
            <option value="12">Threats</option>
            <option value="13">Zelo</option>
            <option value="14">Wechat</option>
            <option value="15">Pinterest</option>
            <option value="16">Twitch</option>
            <option value="17">Site</option>
        </select>
        <label for="info">Endereço:</label>
        <input type="text" name="info" id="info" required>
        <input type="number" name="nr_seguidores" id="nr_seguidores" placeholder="Número de Seguidores">
        <button type="submit">SALVAR</button>
    </form>

</div></div>

<?php
    include ('footer.php');
?>