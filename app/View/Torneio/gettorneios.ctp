<script>
    $(document).ready(function(){
        $('#sea').removeClass('form-group has-error');
        $('#sea').removeClass('form-group has-success');
        $('#sear').remove();
    });
</script>

<?php if(empty($torneios)): ?>

<script>
$(document).ready(function() {
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
    <?php foreach ($torneios as $torneio): ?>
        <li>
            <a href="/Torneios/<?php echo $page; ?>/<?php echo $torneio["Torneio"]["id"]; ?>">
                <p>
                    <?php echo $torneio["Torneio"]["nome"]; ?>
                </p>
                <p>
                    R$ <?php echo $torneio["Torneio"]["cash"];?> - <?php echo $this->Time->format($torneio["Torneio"]["data"], '%d/%m/%Y'); ?>
                </p>
                <br>
            </a>
        </li>
    <?php endforeach; ?>
</ul>        

<?php endif; ?>