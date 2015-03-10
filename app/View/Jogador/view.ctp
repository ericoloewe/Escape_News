<?php echo $this->Html->css('/css/Pages/Jogadores/View'); 
 
if(isset($jogador)):
?>

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
<?php
endif;
?>