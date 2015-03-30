<?php echo $this->Html->css('/css/Pages/Torneio/VerTabelaJogadores');      
      echo $this->Html->css('/css/Features/jquery.dataTables.min');      
      echo $this->Html->script('/js/Features/jquery.dataTables.min.js');
      echo $this->Html->script('/js/Features/dataTables.bootstrap.js');
      echo $this->Html->css('/css/Features/searchform_large');
?>

<?php if(!isset($torneio)): ?>
    <p id="actualaction" hidden><?php echo $this->request->params['action']; ?></p>
    <p id="actualcontroller" hidden><?php echo $this->request->params['controller']; ?></p>
    <table id="sea">
        <tbody>
            <tr>
                <td>                     
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                </td>
                <td>
                    <input id="inametournament" class="form-control" type="search" placeholder="Buscar" autocomplete="off" autofocus="true">
                </td>
                <td>
                    <select id="type" class="form-control">
                        <option value="nome">Nome</option>
                        <option value="data">Data</option>
                        <option value="cash">Cash</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>                
                </td>
                <td>
                    <div id="searchTable">
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
<?php else: ?>
<div class="panel panel-default">
  <div class="panel-heading" id="panelHead">Tabela de jogadores do <?php echo $torneio['Torneio']['nome']; ?></div>
    <table id="table-Players" class="table table-striped table-bordered" cellspacing="0" width="100%" style="margin-top: 5px;">
        <thead>
            <tr>
                <th rowspan="2">Posição</th>
                <th rowspan="2">Nome</th>
                <th colspan="{bsecion}" style="border-bottom-color: #fff;">Pontuação</th>
                <th rowspan="2">Total</th>
                <th rowspan="2">Nivel</th>
            </tr>
            <tr>
                {tabSections}
            </tr>
        </thead>
 
        <tbody>
            {tableBody}
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#table-Players').DataTable(
            {
                "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                }
            });
        } );
    </script>
</div>
<?php endif; ?>