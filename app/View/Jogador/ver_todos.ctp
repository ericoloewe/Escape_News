<?php echo $this->Html->css('/css/Pages/Jogadores/VerTodos');      
      echo $this->Html->css('/css/Features/jquery.dataTables.min');      
      echo $this->Html->script('/js/Features/jquery.dataTables.min.js');
      echo $this->Html->script('/js/Features/dataTables.bootstrap.min.js');      
?>

<table class="table table-striped table-bordered" id="tabeladeJogadores" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Contato</th>
            <th>BankHall</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($jogadores as $jogador):?>                    
        <tr>
            <td>
                <a onmouseover='turnOn(<?php echo $jogador['Jogador']['id']; ?>)' onmouseout='turnOff(<?php echo $jogador['Jogador']['id']; ?>)' href='/jogadores/ver/<?php echo $jogador['Jogador']['id']; ?>'>
                    <?php echo $jogador['Jogador']['nome']; ?>
                </a>
                <b id="<?php echo $jogador['Jogador']['id']; ?>" class='button bubble-top'><img class='img-rounded' style='float: left; width: 50px; height: 50px;' src='/app/webroot/img/pics/<?php echo $jogador['Jogador']['id']; ?>.jpg'/></b></td>
            <td>
                <a href='mailto:<?php echo $jogador['Jogador']['email']; ?>'>
                    <?php echo $jogador['Jogador']['email']; ?>
                </a>
            </td>
            <td>
                <?php echo $jogador['Jogador']['phone']; ?>
            </td>
            <td>
                <?php echo $jogador['Jogador']['bankhall']; ?>
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