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

<div class='bloco_centro'><div class='content'>
    <fieldset>
        <h2>Diga como foi</h2>
        <form action="insere_anotacoes.php" method="POST">
            <input type="hidden" name="acao" value="insere">
            <input type="hidden" name="id_parada" value="<?php echo $id_parada; ?>">
            <input type="hidden" name="ver_status" value="1">
            <textarea name='descricao' rows='6' placeholder="Descrição" style="margin-bottom:10px;"></textarea>
            <span><label for="brindes">O posto forneceu brindes?</label><input type="radio" name="brindes" value="1">Sim</input><input type="radio" name="brindes" value="0">Não</input></span>
            <span><label for="msociais">O posto informou suas mídias sociais?</label><input type="radio" name="msociais" value="1">Sim</input><input type="radio" name="msociais" value="0">Não</input></span>
            <span><label for="contato_responsavel">Conseguiu contato com o responsável?</label><input type="radio" name="contato_responsavel" value="1">Sim</input><input type="radio" name="contato_responsavel" value="0">Não</input></span>
            <span><label for="show_posto">O posto organizou algum show?</label><input type="radio" name="show_posto" value="1">Sim</input><input type="radio" name="show_posto" value="0">Não</input></span>
            <span><label for="ab">O posto forneceu alimentos e/ou bebidas?</label><input type="radio" name="ab" value="1">Sim</input><input type="radio" name="ab" value="0">Não</input></span>
            <span><label for="promocao">O posto fez alguma promoção?</label><input type="radio" name="promocao" value="1">Sim</input><input type="radio" name="promocao" value="0">Não</input></span>     
            <span><label for="opiniao_visitantes">Qual foi a percepção dos visitantes?</label>
                <input type="radio" name="opiniao_visitantes" value="1">Fraca</input>
                <input type="radio" name="opiniao_visitantes" value="2">Média</input>
                <input type="radio" name="opiniao_visitantes" value="3">Boa</input>
            </span>
            <span><label for="opiniao_geral">Qual foi a sua opiniao?</label>
                <input type="radio" name="opiniao_geral" value="1">Fraca</input>
                <input type="radio" name="opiniao_geral" value="2">Média</input>
                <input type="radio" name="opiniao_geral" value="3">Boa</input>
            </span>
            <button type="submit">INSERIR</button>
        </form>
    </fieldset>
</div></div>

<?php include "footer.php"; ?>