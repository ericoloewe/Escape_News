<?php echo $this->Html->css('/css/Pages/Torneio/Novo');      
      echo $this->Html->css('/css/Features/jquery.dataTables.min');      
      echo $this->Html->script('/js/Features/jquery.dataTables.min.js');
      echo $this->Html->script('/js/Features/dataTables.bootstrap.js');      
?>
<?php echo $this->Form->create('Torneio', array('url' => array('controller' => 'torneios','action' => 'novo'),'class' => 'form-horizontal','role' => 'form')); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label">Nome:*</label>
        <div class="col-sm-10">            
            <?php echo $this->Form->input(
                'Torneio.nome',
                array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder' => 'Insira o Nome do Torneio Completo')
            ); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Data:*</label>
        <div class="span5 col-sm-10">
            <div class="input-group date" id="calendar">                
                <input id="inputDataTorneio" class="form-control" placeholder="DD/MM/AAAA" onkeypress="mascaraData(this)" maxlength="10" type="text"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>           
            </div>
            <?php echo $this->Form->input(
                    'Torneio.data',
                    array('hidden'=>'','label' => array('class' => 'sr-only'),'type' => 'text','maxlength'=>'10')
                ); ?>
                
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">CASH:*</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input(
                'Torneio.cash',
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
                <?php foreach($jogadores as $jogador):?>                    
                <tr>
                    <td>
                        <div class='checkbox'>
                            <?php echo $this->Form->checkbox('JogadorTorneio..jogador_id', array('value' => $jogador["Jogador"]["id"],'hiddenField' => false)); ?>
                        </div>
                    </td>
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
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">            
            <?php echo $this->Form->end(array('label' => 'Registrar','class' => 'btn btn-default btn-lg btn-block'));?>
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