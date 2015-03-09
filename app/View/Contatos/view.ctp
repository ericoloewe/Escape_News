<?php echo $this->Html->css('/css/Pages/Contato/View'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2>Contato</h2>
        </div>
        <form action="home.php?u=/Contact/Contact" class="form-horizontal" method="post" role="form">                
            <div class="col-md-5">
                <div class="row">
                    <h3 style="float: left;"><i class="glyphicon glyphicon-pencil"></i> Deixe seu recado</h3>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Nome:</label>
                            <input class="form-control" name="Nome" type="text" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Email:</label>
                            <input class="form-control" name="Email" type="text" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Assunto:</label>
                            <input class="form-control" data-val="true" name="Assunto" type="text" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Mensagem:</label>
                            <textarea class="form-control" cols="20" name="Mensagem" rows="2"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-0 col-md-10">
                        <button style="margin:15px 0 15px 0;" type="submit" class="btn btn-primary">Enviar</button>
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
