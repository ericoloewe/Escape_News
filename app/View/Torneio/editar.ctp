<?php echo $this->Html->css('/css/Pages/Torneio/Editar');      
      echo $this->Html->css('/css/Features/jquery.dataTables.min');      
      echo $this->Html->script('/js/Features/jquery.dataTables.min.js');
      echo $this->Html->script('/js/Features/dataTables.bootstrap.js');
      echo $this->Html->css('/css/Features/searchform_large');     
?>

<?php if(!isset($torneio)): ?>
    <p id="actualaction" hidden><?php echo $this->request->params['action']; ?></p>
    <p id="actualcontroller" hidden><?php echo $this->request->params['controller']; ?></p>
<div class="row">
    <div class="center-block col-xs-12 col-sm-6 col-lg-8">
        <table id="sea">
            <tbody>
                <tr>
                    <td id="span">                     
                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    </td>
                    <td>
                        <input id="inametournament" class="form-control" type="search" placeholder="Buscar" autocomplete="off" autofocus="true">
                    </td>
                    <td id="select">
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
    </div>
</div>

<?php else: ?>

    <div id="deletarJogador" class="label label-danger">
        <?php echo $this->Form->postLink(
                "",
                array('action' => 'delete', $torneio['Torneio']['id']),
                array('confirm' => 'Are you sure?','class'=>'glyphicon glyphicon-remove')
            ); ?>
    </div>

    <?php echo $this->Form->create('Torneio', array('url' => array('controller' => 'torneios','action' => 'editar'),'class' => 'form-horizontal','role' => 'form')); ?>
    <div class="form-group">        
        <div class="col-sm-10">
            <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
        </div>
    </div>
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
                <?php if(isset($jogadoresForadoTorneio))
                        foreach($jogadoresForadoTorneio as $jogador):?> 
                        <tr>
                            <td>
                                <div class='checkbox'>
                                    <?php echo $this->Form->checkbox('JogadorTorneio..jogador_id', array('value' => $jogador["id"],'hiddenField' => false,'onchange'=>"addJogadorTorneio(this,'{$jogador['id']}','{$torneio['Torneio']['id']}')")); ?>
                                </div>
                            </td>
                            <td>
                                <a onmouseover='turnOn(<?php echo $jogador['id']; ?>)' onmouseout='turnOff(<?php echo $jogador['id']; ?>)' href='/jogadores/ver/<?php echo $jogador['id']; ?>'>
                                    <?php echo $jogador['nome']; ?>
                                </a>
                                <b id="<?php echo $jogador['id']; ?>" class='button bubble-top'><img class='img-rounded' style='float: left; width: 50px; height: 50px;' src='/app/webroot/img/pics/<?php echo $jogador['id']; ?>.jpg'/></b></td>
                            <td>
                                <a href='mailto:<?php echo $jogador['email']; ?>'>
                                    <?php echo $jogador['email']; ?>
                                </a>
                            </td>
                            <td>
                                <?php echo $jogador['phone']; ?>
                            </td>
                            <td>
                                <?php echo $jogador['bankhall']; ?>
                            </td>
                        </tr>                    
                <?php endforeach; ?>
                <?php foreach($torneio["Jogador"] as $jogador):?>      
                    <?php if($jogador["JogadoresTorneio"]["secao"]==1): ?>                 
                <tr>                    
                    <td>
                        <div class='checkbox'>
                            <?php echo $this->Form->checkbox('JogadorTorneio..jogador_id', array('value' => $jogador["id"],'hiddenField' => false,'onchange'=>"addJogadorTorneio(this,'{$jogador['id']}','{$torneio['Torneio']['id']}')",'checked')); ?>
                        </div>
                    </td>
                    <td>
                        <a onmouseover='turnOn(<?php echo $jogador['id']; ?>)' onmouseout='turnOff(<?php echo $jogador['id']; ?>)' href='/jogadores/ver/<?php echo $jogador['id']; ?>'>
                            <?php echo $jogador['nome']; ?>
                        </a>
                        <b id="<?php echo $jogador['id']; ?>" class='button bubble-top'><img class='img-rounded' style='float: left; width: 50px; height: 50px;' src='/app/webroot/img/pics/<?php echo $jogador['id']; ?>.jpg'/></b></td>
                    <td>
                        <a href='mailto:<?php echo $jogador['email']; ?>'>
                            <?php echo $jogador['email']; ?>
                        </a>
                    </td>
                    <td>
                        <?php echo $jogador['phone']; ?>
                    </td>
                    <td>
                        <?php echo $jogador['bankhall']; ?>
                    </td>
                </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">            
            <?php echo $this->Form->end(array('label' => 'Atualizar Torneio','class' => 'btn btn-default btn-lg btn-block'));?>
        </div>
    </div>
</form>
<div id="teste"></div>
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
<?php endif; ?>