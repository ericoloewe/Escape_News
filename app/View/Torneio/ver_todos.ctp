<?php echo $this->Html->css('/css/Pages/Jogadores/VerTodos');      
      echo $this->Html->css('/css/Features/jquery.dataTables.min');      
      echo $this->Html->script('/js/Features/jquery.dataTables.min.js');
      echo $this->Html->script('/js/Features/dataTables.bootstrap.min.js');      
?>

<table class="table table-striped table-bordered" id="tabeladeJogadores" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Data</th>
            <th>Cash</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($torneios as $torneio):?>                    
        <tr>
            <td>
                <?php echo $torneio['Torneio']['nome']; ?>                
            <td>
                <?php echo $this->Link->converteDataSemHora($torneio['Torneio']['data']); ?>
            </td>
            <td>
                <?php echo $torneio['Torneio']['cash']; ?>
            </td>
            <td>
                <?php echo $this->Link->getTipo($torneio['Torneio']['tipo']); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function () {
        $('#tabeladeJogadores').DataTable({
            "order": [[1, "asc"]],
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
    });
</script>