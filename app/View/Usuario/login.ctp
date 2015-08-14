<?php   echo $this->Html->script('//maps.google.com/maps/api/js?sensor=false'); 
        echo $this->Html->script('/js/maps.js');?>
<!-- Modal -->
<div class="modal fade" id="contato">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Entre em Contato</h3>
            </div>
            <div class="modal-body">  
                <div class="col-md-5">                    
                    <?php
                        echo $this->Form->create('Contato', array('url' => array('controller' => 'Contatos','action' => 'save'),'class' => 'form-signin'));
                    ?>          
                    
                        <div class="row">
                            <h3 style="float: left;"><i class="glyphicon glyphicon-pencil"></i> Deixe seu recado</h3>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6 col-sm-4">
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
                                <div class="col-xs-6 col-sm-4">
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
                                <div class="col-xs-6 col-sm-4">
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
                                <div class="col-xs-6 col-sm-4">
                                    <?php 
                                        echo $this->Form->input(
                                            'mensagem',
                                            array('type' => 'textarea', 'escape' => false,'class'=>'form-control','rows' => '3')
                                        );
                                    ?>
                                </div>
                            </div>
                        </div>               
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6 col-sm-4">                        
                                    <?php echo $this->Form->end(array('label' => 'Enviar Mensagem','class' => 'btn btn-primary')); ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>                
                <div id="endereco" class="col-md-5">
                    <div class="row">                
                        <div class="col-xs-6 col-sm-4 no-padding-left">
                            <h3 class="margin-top"><i class="glyphicon glyphicon-globe"></i> Endereço:</h3>
                        </div>
                    </div>
                    <p>R. Felipe Bernd, 87, sala 01, B. Rio Branco,<br> Novo Hamburgo - RS</p> 
                    <br>
                    <div class="row">
                        <div class="col-xs-6 col-sm-4 no-padding-left">
                            <div id="map-container"></div>
                        </div>
                    </div>                       
                    <div class="row">
                        <div class="col-xs-6 col-sm-4 no-padding-left">
                            <h3 class="margin-top"><i class="glyphicon glyphicon-earphone"></i> Telefone:</h3>
                        </div>
                    </div>
                    <p>+55 (51) 3065-2624</p>
                </div>            
            </div>
            <div class="modal-footer">              
                
            </div>
        </div>
    </div>
</div>
<div class="container">
    <?php
    echo $this->Html->css('index');
    echo $this->Session->flash('auth');
    echo $this->Form->create('Usuario', array('url' => array('controller' => 'usuarios','action' => 'login'),'class' => 'form-signin'));
    ?>
    <h2 class="form-signin-heading">Escape News</h2>
    <?php
    echo $this->Form->input(
        'email',
        array('label' => array('class' => 'sr-only'),'class'=>'form-control','autofocus' => '','placeholder' => 'Email')
    );
    echo $this->Form->input(
        'password',
        array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder' => 'Senha')
    );    
    echo $this->Form->end(array('label' => 'Start','class' => 'btn btn-lg btn-primary btn-block'));
    echo $this->Html->link(
        'Entre em Contato',
        '#contato', array('style' => 'color:#eee; font-weight: bold;','data-toggle' => 'modal','data-target' => '#contato')       
    );   
    echo $this->Html->link(
        'Cadastre-se',
        '/Usuarios/Novo', array('style' => 'color:#eee; font-weight: bold; float: right;')       
    );    
    ?>
</div>