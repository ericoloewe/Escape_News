<?php echo $this->Html->css('/css/Pages/usuarios/Ver'); 
      echo $this->Html->css('/css/Features/searchform_large'); 
?>

<p id="actualpage" hidden><?php echo $this->request->params['action']; ?></p>

<?php if(!isset($Usuario)): ?>
<div class="row">
    <div class="center-block col-xs-12 col-sm-6 col-lg-8">
        <table id="sea">
            <tbody>
                <tr>
                    <td id="span">                     
                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    </td>
                    <td>
                        <input class="form-control" id="inameuser" type="search" placeholder="Buscar Usuario" autocomplete="off" aria-describedby="sizing-addon2">
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
        <p><img class="img-thumbnail" src="/app/webroot/img/pics/<?php echo $Usuario['Usuario']['id']; ?>.jpg" style="max-width: 200px; max-height: 200px;"/></p>
        <h3><?php echo $Usuario['Usuario']['nome']; ?></h3>
        <br>
    </div>
    <table class="table table-hover">       
        <tr>
            <td>Office Phone:</td>
            <td><i class="glyphicon glyphicon-phone-alt"></i> <?php echo $Usuario['Usuario']['phone']; ?> </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><i class="glyphicon glyphicon-envelope"></i> <a href="mailto:<?php echo $Usuario['Usuario']['email']; ?>"><?php echo $Usuario['Usuario']['email']; ?></a></td>
        </tr>
        <tr>
            <td>RG:</td>
            <td><i class="glyphicon glyphicon-user"></i><?php echo $Usuario['Usuario']['rg']; ?></a></td>
        </tr>
    </table>
<?php endif; ?>