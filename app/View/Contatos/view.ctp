<?php echo $this->Html->css('/css/Pages/Contato/View'); ?>

<div class="row" <?php if(!$this->Session->read('Auth.User')) echo "id=\"contato\"";?>>
    <div class="col-md-12">
        <div class="page-header">
            <h2>Contato</h2>
        </div>
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

                <div class="form-group">
                    <div class="col-md-12">                        
                        <?php echo $this->Form->end(array('label' => 'Enviar','class' => 'btn btn-primary')); ?>
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
            <div class="maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3465.916315625957!2d-51.22299689999999!3d-29.693205799999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95195c7da5ae5d5b%3A0xf980cfcc0c9a44a1!2sR.+Prof.+Miguel+de+Vargas%2C+285+-+Vila+Rica!5e0!3m2!1spt-BR!2sbr!4v1419122839110" frameborder="0" style="border:0">
                </iframe>
            </div>
            <div class="row">
                <div class="col-md-8 no-padding-left">
                    <h3 class="margin-top"><i class="glyphicon glyphicon-earphone"></i> Telefone:</h3>
                </div>
            </div>
            <p>+55 (51) 9834-0648</p>
        </div>               
    </div>
</div>
