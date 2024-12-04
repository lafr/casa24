<?php
    /**
     * Faz a somatória dos serviços realizadoss
     */

    $sql = "SELECT * FROM paradas where cabelereiro > 0";
    $result = mysqli_query($conn, $sql);
    
    $sql_cabelereiro = "SELECT cabelereiro FROM paradas where cabelereiro > 0";
    $result_cabelereiro = mysqli_query($conn, $sql_cabelereiro);
        
    $total_cabelereiro = 0;
    while($row_cabelereiro = $result_cabelereiro->fetch_assoc()) {
        $total_cabelereiro += $row_cabelereiro['cabelereiro'];
    }

    $sql_manicure = "SELECT manicure FROM paradas where manicure > 0";
    $result_manicure = mysqli_query($conn, $sql_manicure);
        
    $total_manicure = 0;
    while($row_manicure = $result_manicure->fetch_assoc()) {
        $total_manicure += $row_manicure['manicure'];
    }

    $sql_acuidade = "SELECT acuidade FROM paradas where acuidade > 0";
    $result_acuidade = mysqli_query($conn, $sql_acuidade);
        
    $total_acuidade = 0;
    while($row_acuidade = $result_acuidade->fetch_assoc()) {
        $total_acuidade += $row_acuidade['acuidade'];
    }

    $sql_atd_saude = "SELECT atd_saude FROM paradas where atd_saude > 0";
    $result_atd_saude = mysqli_query($conn, $sql_atd_saude);
        
    $total_atd_saude = 0;
    while($row_atd_saude = $result_atd_saude->fetch_assoc()) {
        $total_atd_saude += $row_atd_saude['atd_saude'];
    }

    $sql_vacinas = "SELECT vacinas FROM paradas where vacinas > 0";
    $result_vacinas = mysqli_query($conn, $sql_vacinas);
        
    $total_vacinas = 0;
    while($row_vacinas = $result_vacinas->fetch_assoc()) {
        $total_vacinas += $row_vacinas['vacinas'];
    }

    $sql_telemedicina = "SELECT telemedicina FROM paradas where telemedicina > 0";
    $result_telemedicina = mysqli_query($conn, $sql_telemedicina);
        
    $total_telemedicina = 0;
    while($row_telemedicina = $result_telemedicina->fetch_assoc()) {
        $total_telemedicina += $row_telemedicina['telemedicina'];
    }

    $sql_pulseiras = "SELECT pulseiras FROM paradas where pulseiras > 0";
    $result_pulseiras = mysqli_query($conn, $sql_pulseiras);
        
    $total_pulseiras = 0;
    while($row_pulseiras = $result_pulseiras->fetch_assoc()) {
        $total_pulseiras += $row_pulseiras['pulseiras'];
    }

    $sql_sest = "SELECT sest FROM paradas where sest > 0";
    $result_sest = mysqli_query($conn, $sql_sest);

    $total_sest = 0;
    while($row_sest = $result_sest->fetch_assoc()) {
        $total_sest += $row_sest['sest'];
    }
    
    $sql_prf = "SELECT prf FROM paradas where prf > 0";
    $result_prf = mysqli_query($conn, $sql_prf);

    $total_prf = 0;
    while($row_prf = $result_prf->fetch_assoc()) {
        $total_prf += $row_prf['prf'];
    }

    $total_geral = $total_cabelereiro + $total_manicure + $total_acuidade + $total_atd_saude + $total_vacinas + $total_telemedicina + $total_pulseiras + $total_ssenat + $total_prf;
?>