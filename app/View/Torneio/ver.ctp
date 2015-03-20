<?php echo $this->Html->css('/css/Pages/Torneio/Ver'); 
      echo $this->Html->css('/css/Features/searchform_large');?>

<?php if(!isset($torneio)): ?>
    <p id="actualpage" hidden><?php echo $this->request->params['action']; ?></p>
    <table id="sea">
        <tbody>
            <tr>
                <td>                     
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                </td>
                <td>
                    <input id="inametournament" class="form-control" type="search" placeholder="Buscar" autocomplete="off">
                </td>
                <td>
                    <select id="type" class="form-control" autofocus>
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
    <!--<p><?php /*echo print_r($torneio);*/ ?></p>-->
    <br>
    <table class="table">       
        <tr>
            <td>Nome:</td>
            <td><i class="glyphicon glyphicon-asterisk"></i> <?php echo $torneio[0]['Torneio']['nome']; ?></td>            
        </tr>
        <tr>
            <td>Data:</td>
            <td><i class="glyphicon glyphicon-calendar"></i> <?php echo $torneio[0]['Torneio']['data']; ?></td>
        </tr>
        <tr>
            <td>CASH:</td>
            <td><i class="glyphicon glyphicon-usd"></i> <?php echo $torneio[0]['Torneio']['cash']; ?> </td>
        </tr>
        <tr>
            <td>Participantes:</td>
            <td><i class="glyphicon glyphicon-list-alt"></i>
                <dl class='players'>
                    <?php foreach ($torneio[0]['Jogador'] as $jogador): ?>                
                        <dt onmouseover="turnOn(<?php echo $jogador['id']; ?>)" onmouseout="turnOff(<?php echo $jogador['id']; ?>)"><?php echo $jogador["nome"]; ?></dt>
                        <dd id="<?php echo $jogador['id']; ?>" class='button bubble-top'>
                            <a><img class='img-rounded' style='float: left; width: 50px; height: 50px;' src='/app/webroot/img/pics/<?php echo $jogador['id']; ?>.jpg'/>
                                <p>Nome:</p><p><?php echo $jogador['nome']; ?></p>
                                <p>BankHall: <?php echo $jogador['bankhall']; ?></p>
                                <br>
                            </a>
                        </dd>
                    <?php endforeach; ?>             
                </dl>
            </td>
        </tr>
    </table>    
<?php endif; ?>