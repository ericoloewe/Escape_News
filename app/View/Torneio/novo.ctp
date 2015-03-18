<?php echo $this->Html->css('/css/Pages/Torneio/Novo');      
      echo $this->Html->css('/css/Features/jquery.dataTables.min');
      echo $this->Html->css('/css/Features/dataTables.bootstrap.css');
      echo $this->Html->css('/css/Features/datepicker3.css');
      echo $this->Html->script('/js/Features/jquery.dataTables.min.js');
      echo $this->Html->script('/js/Features/dataTables.bootstrap.js');
      echo $this->Html->script('/js/Features/bootstrap-datepicker.js');
      echo $this->Html->script('/js/Features/bootstrap-datepicker.pt-BR.js');
?>

<?php echo $this->Form->create('Torneio', array('url' => array('controller' => 'torneios','action' => 'novo'),'class' => 'form-horizontal','role' => 'form')); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label">Nome:*</label>
        <div class="col-sm-10">            
            <?php echo $this->Form->input(
                'nome',
                array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder' => 'Insira o Nome do Torneio Completo')
            ); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Data:*</label>
        <div class="span5 col-sm-10">
            <div class="input-group date" id="calendar">                
                <?php echo $this->Form->input(
                    'date',
                    array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder' => 'DD/MM/AAAA')
                ); ?>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">CASH:*</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input(
                'cash',
                array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder' => 'R$')
            ); ?>
        </div>
    </div>
    <div class="form-group" id="dtable">
        <label class="col-sm-2 control-label">Participantes:</label>
        <table class="table table-striped table-bordered" id="playerstable" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th id="select">Selecionar</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Contato</th>
                    <th>BankHall</th>
                </tr>
            </thead>
            <tbody>                    
                {PLAYERS}
            </tbody>
        </table>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default btn-lg btn-block">Registrar</button>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('#playerstable').DataTable({
            "order": [[ 1, "asc" ]],
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