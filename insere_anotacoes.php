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

    include ('header.php');
    $id_parada = $_GET['id_parada'];

    if ($_POST['acao'] == 'insere'){
        $id_parada = $_POST['id_parada'];
        $data_criacao = $hoje;
        $ultima_interacao = $hoje;
        $descricao = $_POST['descricao'];
        $brindes = $_POST['brindes'];
        $msociais = $_POST['msociais'];
        $contato_responsavel = $_POST['contato_responsavel'];
        $show_posto = $_POST['show_posto'];
        $ab = $_POST['ab'];
        $promocao = $_POST['promocao'];
        $opiniao_visitantes = $_POST['opiniao_visitantes'];
        $opiniao_geral = $_POST['opiniao_geral'];
        $ver_status = $_POST['ver_status'];

        $sql_insere = "INSERT INTO anotacoes (fk_parada, data_criacao, ultima_interacao, descricao, brindes, msociais, contato_responsavel, show_posto, ab, promocao, opiniao_visitantes, opiniao_geral, ver_status) VALUES ('$id_parada', '$data_criacao', '$ultima_interacao', '$descricao', '$brindes', '$msociais', '$contato_responsavel', '$show_posto', '$ab', '$promocao', '$opiniao_visitantes', '$opiniao_geral', '$ver_status')";
        $result_insere = mysqli_query($conn, $sql_insere);

        header("Location: principal.php");
    }
?>

//TODO: Criar os checkbox e pontuação final

<div class='bloco_centro'><div class='content'>
    <fieldset>
        <h2>Diga como foi</h2>
        <form action="insere_anotacoes.php" method="POST">
            <input type="hidden" name="acao" value="insere">
            <input type="hidden" name="id_parada" value="<?php echo $id_parada; ?>">
            <textarea name='descricao' rows='6' placeholder="Descrição" style="margin-bottom:10px;"></textarea>
            <label for="brindes">O posto forneceu brindes?</label><input type="text" name="brindes" placeholder="Brindes">
            <label for="msociais">O posto informou suas mídias sociais?</label><input type="radio" name="msociais" value="1">Sim</input><input type="radio" name="msociais" value="0">Não</input>
            <input type=radio name="contato_responsavel" value="1">Sim</input><input type=radio name="contato_responsavel" value="0">Não</input>
            <input type="text" name="show_posto" placeholder="Show posto">
            <input type="text" name="ab" placeholder="Alimentação e Bebidas">
            <input type="text" name="promocao" placeholder="Promoção">
            <input type="text" name="opiniao_visitantes" placeholder="Opinião dos visitante">
            <input type="text" name="opiniao_geral" placeholder="Opinião geral">
            <input type="text" name="ver_status" placeholder="ver_status">
            <button type="submit">INSERIR</button>
        </form>
    </fieldset>
</div></div>

<?php include "footer.php"; ?>