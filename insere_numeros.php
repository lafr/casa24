<?php 
    include 'header.php';

    $acao = $_POST['acao'];
    
    if ($acao == 'insere'){
        $id_parada = $_POST['id_parada'];
        $cabelereiro = $_POST['cabelereiro'];
        $manicure = $_POST['manicure'];
        $acuidade = $_POST['acuidade'];
        $atd_saude = $_POST['atd_saude'];
        $vacinas = $_POST['vacinas'];
        $telemedicina = $_POST['telemedicina'];
        $pulseiras = $_POST['pulseiras'];

        $sql_insere = "UPDATE paradas set cabelereiro='$cabelereiro', manicure='$manicure', acuidade='$acuidade', atd_saude='$atd_saude', vacinas='$vacinas', telemedicina='$telemedicina', pulseiras='$pulseiras' where id_parada = '$id_parada'";
        $result_insere = mysqli_query($conn, $sql_insere);

        header("Location: principal.php");
    }
?>

<div class='bloco_centro'>
    <fieldset>
    <div class='content'>
        <h2>Inserir números em <?php echo $_GET['razao']; ?></h2>
    <form action="insere_numeros.php" method="POST">
        <label for="cabelereiro">Corte de cabelo:</label>
        <input type="number" name="cabelereiro" id="cabelereiro" required min="0">
        <label for="manicure">Manicure:</label>
        <input type="number" name="manicure" id="manicure" required min="0">
        <label for="acuidade">Acuidade Visual:</label>
        <input type="number" name="acuidade" id="acuidade" required min="0">
        <label for="atd_saude">Serviços de saúde:</label>
        <input type="number" name="atd_saude" id="atd_saude" required min="0">
        <label for="vacinas">Vacinas:</label>
        <input type="number" name="vacinas" id="vacinas" required min="0">
        <label for="telemedicina">Telemedicina:</label>
        <input type="number" name="telemedicina" id="telemedicina" required min="0">
        <label for="pulseiras">Pulseira de identificação:</label>
        <input type="number" name="pulseiras" id="pulseiras" required min="0">
        <input type="hidden" name="id_parada" id="id_parada" value="<?php echo $id_parada = $_GET['id_parada']; ?>">
        <input type="hidden" name="acao" value="insere">
        <input type="submit" value="Inserir">
    </form>
    </div>
    </fieldset>
</div>

<?php
    include 'footer.php';
?>