<script>
    $(document).ready(function(){
        $('#sea').removeClass('form-group has-error');
        $('#sea').removeClass('form-group has-success');
        $('#sear').remove();
    });
</script>

<?php if(empty($usuarios)): ?>

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
    <?php foreach ($usuarios as $Usuario): ?>
        <li>
            <a href="/usuarios/<?php echo $page."/".$Usuario["Usuario"]["id"]; ?>">
                <img class='img-circle' style='float: left; width: 50px; height: 50px;' src='/app/webroot/img/pics/<?php echo $Usuario['Usuario']['id']; ?>.jpg'>
                <p><?php echo $Usuario["Usuario"]["nome"]; ?></p>
                <p><?php echo $Usuario["Usuario"]["email"]; ?></p>
            </a>
        </li>
    <?php endforeach; ?>
</ul>        

<?php endif; ?>