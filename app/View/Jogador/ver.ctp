<?php echo $this->Html->css('/css/Pages/Jogadores/Ver'); 
      echo $this->Html->css('/css/Features/searchform_large'); 
?>

<p id="actualpage" hidden><?php echo $this->request->params['action']; ?></p>

<?php if(!isset($jogador)): ?>
<div class="row">
    <div class="center-block col-xs-12 col-sm-6 col-lg-8">
        <table id="sea">
            <tbody>
                <tr>
                    <td id="span">                     
                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    </td>
                    <td>
                        <input class="form-control" id="inameuser" type="search" placeholder="Buscar Jogador" autocomplete="off" aria-describedby="sizing-addon2">
                    </td>
                </tr>
                <tr>
                    <td id="span">                
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
    <div class="begin">
        <p><img class="img-thumbnail" src="/app/webroot/img/pics/<?php echo $jogador['Jogador']['id']; ?>.jpg" style="max-width: 200px; max-height: 200px;"/></p>
        <h3><?php echo $jogador['Jogador']['nome']; ?></h3>
        <br>
    </div>
    <table class="table table-hover">       
        <tr>
            <td>Office Phone:</td>
            <td><i class="glyphicon glyphicon-phone-alt"></i> <?php echo $jogador['Jogador']['phone']; ?> </td>
        </tr>
        <tr>
            <td>BankHall:</td>
            <td><i class="glyphicon glyphicon-usd"></i> <?php echo $jogador['Jogador']['bankhall']; ?> </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><i class="glyphicon glyphicon-envelope"></i> <a href="mailto:<?php echo $jogador['Jogador']['email']; ?>"><?php echo $jogador['Jogador']['email']; ?></a></td>
        </tr>
        <tr>
            <td>RG:</td>
            <td><i class="glyphicon glyphicon-user"></i><?php echo $jogador['Jogador']['rg']; ?></a></td>
        </tr>
    </table>
<?php endif; ?>