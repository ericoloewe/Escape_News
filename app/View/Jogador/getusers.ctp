<script>
    $(document).ready(function(){
        $('#sea').removeClass('form-group has-error');
        $('#sea').removeClass('form-group has-success');
        $('#sear').remove();
    });
</script>

<?php if(empty($jogadores)): ?>

<script>
$(document).ready(function(){
    $('#sea').addClass('form-group has-error');
    $('#sea').append("<span id='sear' class='glyphicon glyphicon-remove form-control-feedback' aria-hidden='true'></span>");
    });
</script>

<?php else: ?>
<script>
    $(document).ready(function(){
        $('#sea').addClass('form-group has-success');
    });
</script>
<ul id='stable'>    
    <?php foreach ($jogadores as $jogador): ?>
        <li>
            <a href="/jogadores/<?php echo $page."/".$jogador["Jogador"]["id"]; ?>">
                <img class='img-circle' style='float: left; width: 50px; height: 50px;' src='/app/webroot/img/pics/<?php echo $jogador['Jogador']['id']; ?>.jpg'>
                <p><?php echo $jogador["Jogador"]["nome"]; ?></p>
                <p><?php echo $jogador["Jogador"]["email"]; ?></p>
            </a>
        </li>
    <?php endforeach; ?>
</ul>        

<?php endif; ?>