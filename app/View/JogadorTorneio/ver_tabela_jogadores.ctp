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
                <th rowspan="2">Nome</th>
                <th colspan="<?php echo $secoes[0]["secao"]; ?>" style="border-bottom-color: #fff;">Pontuação</th>
                <th rowspan="2">Total</th>
                <th rowspan="2">Posição</th>
            </tr>
            <tr>
                <?php for($i=1;$i<=$secoes[0]["secao"];$i++): ?>
                    <?php if($i==$secoes[0]["secao"]): ?>
                        <th id='end'>Secao <?php echo $i; ?></th>
                    <?php else: ?>
                        <th>Secao <?php echo $i; ?></th>
                    <?php endif; ?>
                <?php endfor; ?>
            </tr>
        </thead>
 
        <tbody>
            <?php $i=1;
                  $tamanho = count($torneio);                  
 ?>
            <?php foreach($torneio as $jogador): ?>
                <?php if($i!=$tamanho): ?>                
                    <tr>                        
                        <td>
                            <a href="/jogadores/ver/<?php echo $jogador["Jogador"]['id']; ?>">
                                <dl class='players'>                                         
                                    <dt onmouseover="turnOn(<?php echo $jogador["Jogador"]['id']; ?>)" onmouseout="turnOff(<?php echo $jogador["Jogador"]['id']; ?>)"><?php echo $jogador["Jogador"]["nome"]; ?></dt>
                                        <dd id="<?php echo $jogador["Jogador"]['id']; ?>" class='button bubble-top'>
                                            <a><img class='img-rounded' style='float: left; width: 50px; height: 50px;' src='/app/webroot/img/pics/<?php echo $jogador["Jogador"]['id']; ?>.jpg'/>
                                                <p>Nome:</p><p><?php echo $jogador["Jogador"]['nome']; ?></p>
                                                <p>BankHall: <?php echo $jogador["Jogador"]['bankhall']; ?></p>
                                                <br>
                                            </a>
                                        </dd>                                        
                                 </dl>
                             </a>
                        </td>
                        <?php for($j=1;$j<=$secoes[0]["secao"];$j++)
                        {                            
                            echo "<td>".$jogador["JogadorTorneio"]["secao"][$j]."</td>";
                        } ?>
                        <td><?php echo $jogador[0]['total']; ?></td>
                        <td><?php echo $this->Link->getPosicaoJogador($i,$tamanho-1); ?></td>
                    </tr>
                <?php $i++; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#table-Players').DataTable(
            {
                "order": [[ 3 ]],
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