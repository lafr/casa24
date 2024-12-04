<?php
  // relatório de brindes, total geral, log de retiradas, log de reposições
  // relatório de interações, total geral, serviços individuais
  // relatórios por serviços separados por período
  // Relatório de anotações

  include 'header.php';
?>

<div style="display: flex; flex-wrap: wrap; width: 100%;">
  <a href="relatorio_interacoes.php" style="flex: 1 0 25%; text-align: center; padding: 20px; box-sizing: border-box; background-color: #7B68EE;">Interações</a>
  <a href="relatorio_grafico.php" style="flex: 1 0 25%; text-align: center; padding: 20px; box-sizing: border-box; background-color: #CD853F;">Gráficos</a>
  <a href="relatorio_brindes.php" style="flex: 1 0 25%; text-align: center; padding: 20px; box-sizing: border-box; background-color: #20B2AA;">Brindes</a>
  <a href="relatorio_anotacoes.php" style="flex: 1 0 25%; text-align: center; padding: 20px; box-sizing: border-box; background-color: #708090;">Anotações das paradas</a>
  <a href="relatorios_clientes.php" style="flex: 1 0 25%; text-align: center; padding: 20px; box-sizing: border-box; background-color: #FFDAB9	;">Postos e Centros</a>
  <a href="relatorio_contatos.php" style="flex: 1 0 25%; text-align: center; padding: 20px; box-sizing: border-box; background-color: #BC8F8F;">Contatos</a>
  <a href="relatorio_sociais.php" style="flex: 1 0 25%; text-align: center; padding: 20px; box-sizing: border-box; background-color: #ADFF2F;">Mídias Sociais</a>
  <a href="relatorios_estatisticas.php" style="flex: 1 0 25%; text-align: center; padding: 20px; box-sizing: border-box; background-color: #D8BFD8;">Estatísticas</a>
</div>

<?php~
  include "footer.php";
?>