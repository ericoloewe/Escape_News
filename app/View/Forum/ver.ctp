<?php echo $this->Html->css('/css/Pages/Espaco K9/Forum/Ver'); ?>
<div class="panel panel-default">
    <div class="panel-heading" id="panelHead">
        <?php if($this->Session->read('Auth.User.privilegio') == 1): ?>
        <?php
        echo $this->Form->create('Forum', array('url' => array('controller' => 'forum','action' => 'novo'),'class' => 'form-signin','style'=>'float: left;'));
        ?>
        <i class="glyphicon glyphicon-plus" style="float: left; margin-top: 2px;" onclick="turnOn('inputAssunto')"></i>
        <div id="inputAssunto">
            <input type="text" name="data[Forum][titulo]" placeholder="Insira um Titulo">
            <button type="submit" class="btn btn-default">Criar</button>
        </div>
        </form>
        <?php endif; ?>

        K9 STREET POKER Forum
    </div>
<div style="overflow-x: auto;">
    <table class='table table-bordered' style="height: 100%;">
        <thead>
            <tr>
                <th>Assunto</th>
                <th>Visualizacoes</th>
                <th>Respostas</th>
                <th>Autor</th>
                <?php if($this->Session->read('Auth.User.privilegio') == 1): ?>
                <th>Editar/Deletar</th>
                <?php endif; ?>
                <th>Ultimo Post</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($forum as $topico): ?>
                <tr>
                    <td><a href="/Forum/VerAssunto/<?php echo $topico["Forum"]["id"]; ?>/1"><?php echo $topico["Forum"]["titulo"]; ?></a></td>
                    <td><?php echo $topico["Forum"]["visualizacoes"]; ?></td>
                    <td><?php echo $topico["Forum"]["respostas"]; ?></td>
                    <td><?php echo $this->Link->getJogador($topico["Forum"]["autor"],'nome'); ?></td>
                    <?php if($this->Session->read('Auth.User.privilegio') == 1): ?>
                    <td>
                        <a href="/Forum/Editar/<?php echo $topico["Forum"]["id"]; ?>" class="glyphicon glyphicon-pencil"></a>
                        /
                        <?php echo $this->Form->postLink(
                            "",
                            array('action' => 'delete', $topico["Forum"]["id"]),
                            array('confirm' => 'Are you sure?','class'=>'glyphicon glyphicon-remove')
                        )?>
                    </td>
                    <?php endif; ?>
                    <td><?php echo $this->Link->converteData($topico["Forum"]["ultimoPost"]); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>