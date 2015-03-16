<?php   echo $this->Html->script('/js/maps.js'); 
        echo $this->Html->script('//maps.google.com/maps/api/js?sensor=false'); ?>
<!-- Modal -->
<div class="modal fade" id="contato">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Entre em Contato</h3>
            </div>
            <div class="modal-body">                
                <?php
                    echo $this->Form->create('Contato', array('url' => array('controller' => 'Contatos','action' => 'save'),'class' => 'form-signin'));
                ?>          
                    <div class="col-md-5">
                        <div class="row">
                            <h3 style="float: left;"><i class="glyphicon glyphicon-pencil"></i> Deixe seu recado</h3>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        echo $this->Form->input(
                                            'nome',
                                            array('class'=>'form-control')
                                        );
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        echo $this->Form->input(
                                            'email',
                                            array('class'=>'form-control')
                                        );
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        echo $this->Form->input(
                                            'assunto',
                                            array('class'=>'form-control')
                                        );
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        echo $this->Form->input(
                                            'mensagem',
                                            array('type' => 'textarea', 'escape' => false,'class'=>'form-control','rows' => '3')
                                        );
                                    ?>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </form>
                <div id="endereco" class="col-md-5">
                    <div class="row">                
                        <div class="col-md-8 no-padding-left">
                            <h3 class="margin-top"><i class="glyphicon glyphicon-globe"></i> Endereço:</h3>
                        </div>
                    </div>
                    <p>Rua Professor Miguel de Vargas, 285 Portao/RS - Brasil</p>
                    <br>
                    <!--<div class="maps" id="api-maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d866.4790789064892!2d-51.22299689999999!3d-29.693205799999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95195c7da5ae5d5b%3A0xf980cfcc0c9a44a1!2sR.+Prof.+Miguel+de+Vargas%2C+285+-+Vila+Rica%2C+Port%C3%A3o+-+RS%2C+93180-000%2C+Brasil!5e0!3m2!1spt-BR!2sbr!4v1426521902143" frameborder="0" style="border:0"></iframe>                     
                    </div>-->
                    <div id="map-container">
                    </div>
                    <div class="row">
                        <div class="col-md-8 no-padding-left">
                            <h3 class="margin-top"><i class="glyphicon glyphicon-earphone"></i> Telefone:</h3>
                        </div>
                    </div>
                    <p>+55 (51) 9834-0648</p>
                </div>            
            </div>
            <div class="modal-footer">                
                <?php echo $this->Form->end(array('label' => 'Enviar Mensagem','class' => 'btn btn-primary')); ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<?php
    echo $this->Html->css('index');
    echo $this->Session->flash('auth');
    echo $this->Form->create('Jogador', array('url' => array('controller' => 'jogadores','action' => 'login'),'class' => 'form-signin'));
?>
    <h2>K9StreetPoker</h2>
<?php
    echo $this->Form->input(
        'email',
        array('label' => array('class' => 'sr-only'),'class'=>'form-control','autofocus' => '','placeholder' => 'Email')
    );
    echo $this->Form->input(
        'password',
        array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder' => 'Password')
    );    
    echo $this->Form->end(array('label' => 'Start','class' => 'btn btn-lg btn-primary btn-block'));
    echo $this->Html->link(
        'Entre em Contato',
        '#contato', array('style' => 'color:#eee; font-weight: bold;','data-toggle' => 'modal','data-target' => '#contato')       
    );    
?>