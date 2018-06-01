<div class="row">
    <div class="col-sm-12 col-md-12">        
        <?php if(!$clientes){?>
        <div class="table-responsive">
            <table class="table table-condensed">
                <caption><h2 class="text-center">Gerenciamento de Cliente</h2></caption>
                <thead>
                    <tr>                        
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Nome Fantasia</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">E-mail</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Telefone</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">
                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCad"><i class="fa fa-fw fa-plus"></i> Cliente</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4">Nenhum Cliente cadastrado.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php }else{ ?>
        <div class="table-responsive">
            <table class="table table-condensed">
                <caption><h2 class="text-center">Gerenciamento de Recargas</h2></caption>
                <thead>
                    <tr>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Nome Fantasia</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">E-mail</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Telefone</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $c) {
                        echo '<tr>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$c->nomeFantasia.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$c->email.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$c->telefone.'</td>';                        
                        echo '<td style="text-align: center; vertical-align: middle;">';                   
                        echo '<a style="margin-right: 1%" href="#modalEdit" class="btn btn-info editar" role="button" data-toggle="modal" cliente="'.$c->idCliente.'" title="Editar Cliente"><i class="fa fa-fw fa-pencil"></i></a>';                                            
                        echo '<a style="margin-right: 1%"href="#modalExcluir" class="btn btn-danger excluir" role="button" data-toggle="modal" idCliente="'.$c->idCliente.'" title="Excluir Cliente"><i class="fa fa-fw fa-remove"></i></a>';
                        echo '</td>';
                        echo '</tr>';
                    }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php }?>

<div class="row">
    <div class="col-sm-12 col-md-12 text-center">
        <?php echo $this->pagination->create_links();?>
    </div>
</div>

<!-- Modal -->
<!-- Cadastro -->
<div id="modalCad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAdd">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ModalLabelAdd">Mon.I - Adicionar Cliente</h4>
            </div>
            <form id="formCad" action="<?php echo base_url('Cliente_ctrl/adicionar'); ?>" method="post">
                <div class="modal-body">                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-lg-12 alert alert-info">Obrigatorio o preenchimento dos campos com asterisco (<span style="color: #EE0000">*</span>).</div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">                       
                        <button type="button" id="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-success">Adicionar</button>                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- edição -->
<div id="modalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAdd">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ModalLabelAdd">Mon.I - Editar Cliente</h4>
            </div>
            <form id="formEdit" action="<?php echo base_url('Cliente_ctrl/editar'); ?>" method="post">
                <div class="modal-body">                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" name="idCliente" id="idCliente" value=""/>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-lg-12 alert alert-info">Obrigatorio o preenchimento dos campos com asterisco (<span style="color: #EE0000">*</span>).</div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">                       
                        <button type="button" id="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-success">Editar</button>                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Excluir Virtualmente -->

<div id="modalExcluir" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalLabelExcl">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ModalLabelExcl">Mon.I - Excluir Cliente</h4>
            </div>
            <form id="formExcluir" action="<?php echo base_url('Cliente_ctrl/excluir'); ?>" method="post">
                <div class="modal-body">
                    <h5 style="text-align: center">Deseja realmente excluir esse cliente ?</h5>
                    <input name="id" id="idExcluir" type="hidden" value=""/>
                </div>
                <div class="modal-footer">
                    <div class="form-group">                       
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-danger">Excluir</button>                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>

<script type="text/javascript">
    
$(document).ready(function () {
    
    //pega o id do funcionario que deseja excluir e envia para o modal excluir
    $(document).on('click', '.excluir', function () {
        var cliente = $(this).attr('idCliente');        
        $("#idExcluir").val(cliente);        
    });
    
    //pega o id do funcionario que deseja editar e envia para o modal editar
    $(document).on('click', '.editar', function () {
        var cliente = $(this).attr('cliente');
        $("#idCliente").val(cliente); 
    });
    
    //carrega os dados do totem
    $('#modalEdit').on('shown.bs.modal', function () {
        var idCliente = $('#idCliente').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url('Cliente_ctrl/buscaCliente');?>',
            data: 'idCliente='+idCliente,
           
            success: function (data)
            {

                if (data.result === true)
                {
  
                    $("#nomeCompletoEdit").val(data.nomeCompleto);
                    $("#usuarioEdit").val(data.usuario);
                    $("#telefoneEdit").val(data.telefone);
                    $("#emailEdit").val(data.email);
                    $("#situacaoEdit").val(data.situacao);
                    $("#permissaoEdit").val(data.permissao);

                }
            }
        });
    });
    
    $('#formEdit').validate({
        
        rules:
                {
                    nomeCompletoEdit: {required: true},
                    usuarioEdit: {required: true},
                    telefoneEdit: {required: true},
                    emailEdit: {required: true},
                    situacaoEdit: {required: true},
                    permissaoEdit: {required: true},
                    confirmaEdit: {equalTo: '#senhaEdit'}
                },
        messages: 
                {
                    nomeCompletoEdit: {required: 'Campo Requerido'},
                    usuarioEdit: {required: 'Campo Requerido'},
                    telefoneEdit: {required: 'Campo Requerido'},
                    emailEdit: {required: 'Campo Requerido'},
                    situacaoEdit: {required: 'Campo Requerido.'},
                    permissaoEdit: {required: 'Campo Requerido.'},
                    confirmaEdit: {equalTo: 'Senhas diferentes'}
                },

        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
    
    $('#formCad').validate({
        
        rules:
                {
                    nomeCompletoCad: {required: true},
                    usuarioCad: {required: true},
                    telefoneCad: {required: true},
                    emailCad: {required: true},
                    situacaoCad: {required: true},
                    permissaoCad: {required: true},
                    senhaCad: {required: true},
                    confirmaCad: {required: true,
                               equalTo: '#senhaCad'}
                },                        
        messages: 
                {
                    nomeCompletoCad: {required: 'Campo Requerido.'},
                    usuarioCad: {required: 'Campo Requerido'},
                    telefoneCad: {required: 'Campo Requerido'},
                    emailCad: {required: 'Campo Requerido'},
                    situacaoCad: {required: 'Campo Requerido.'},
                    permissaoCad: {required: 'Campo Requerido.'},
                    senhaCad: {required: 'Campo Requerido.'},
                    confirmaCad: {required: 'Campo Requerido.',
                        equalTo: 'Senhas diferentes'}
                },

        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
    
        
});
</script>