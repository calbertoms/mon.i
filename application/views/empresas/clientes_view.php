<div class="row">
    <div class="col-sm-12 col-md-12">        
        <?php if(!$clientes){?>
        <div class="table-responsive">
            <table class="table table-condensed">
                <caption><h2 class="text-center">Gerenciamento de Clientes</h2></caption>
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
                <caption><h2 class="text-center">Gerenciamento de Clientes</h2></caption>
                <thead>
                    <tr>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Nome Fantasia</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">E-mail</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Telefone</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCad"><i class="fa fa-fw fa-plus"></i> Cliente</button>   
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
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="nomeCad">Nome<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="nomeCad" name="nomeCad" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="nomeFantasiaCad">Nome Fantasia<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="nomeFantasiaCad" name="nomeFantasiaCad" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="cnpjCad">cnpj<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="cnpjCad" name="cnpjCad" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="emailCad">Email<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="email" class="form-control" id="emailCad" name="emailCad" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="telefoneCad">Telefone<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="telefone" class="form-control" id="telefoneCad" name="telefoneCad" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="inscEstadualCad">Inscrição Estadual<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="inscEstadualCad" name="inscEstadualCad" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="areaUtilm2Cad">Area Util M2<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="areaUtilm2Cad" name="areaUtilm2Cad" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="cepCad">CEP<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="cepCad" name="cepCad" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="logradouroCad">Logradouro<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="logradouroCad" name="logradouroCad" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="complementoCad">Complemento<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="complementoCad" name="complementoCad" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="numeroCad">Numero<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="numeroCad" name="numeroCad" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="ufCad">UF<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="ufCad" name="ufCad" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="permissaoCad">Permissão<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="permissaoCad" class="form-control" name="permissaoCad" title="Selecione a permissão">
                                            <option value="">Selecione...</option>
                                            <?php
                                            foreach ($permissoes as $p) {
                                                echo '<option value=' . $p->idPermissao . '>' . $p->permissao . '</option>';
                                            }
                                            ?>
                                        </select>                     
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="situacaoCad">Situação<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="situacaoCad" class="form-control" name="situacaoCad" title="Selecione a situação">
                                            <option value="">Selecione...</option>
                                            <option value="1">Ativo</option>
                                            <option value="0">Desativo</option>
                                        </select>                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">                       
                        <button type="button" id="cancelarCad" class="btn btn-default" data-dismiss="modal">Cancelar</button>
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
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="nomeEdit">Nome<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="nomeEdit" name="nomeEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="nomeFantasiaEdit">Nome Fantasia<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="nomeFantasiaEdit" name="nomeFantasiaEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="cnpjEdit">cnpj<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="cnpjEdit" name="cnpjEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="emailEdit">Email<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="email" class="form-control" id="emailEdit" name="emailEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="telefoneEdit">Telefone<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="telefone" class="form-control" id="telefoneEdit" name="telefoneEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="inscEstadualEdit">Inscrição Estadual<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="inscEstadualEdit" name="inscEstadualEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="areaUtilm2Edit">Area Util M2<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="areaUtilm2Edit" name="areaUtilm2Edit" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="cepEdit">CEP<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="cepEdit" name="cepEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="logradouroEdit">Logradouro<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="logradouroEdit" name="logradouroEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="complementoEdit">Complemento<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="complementoEdit" name="complementoEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="numeroEdit">Numero<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="numeroEdit" name="numeroEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="ufEdit">UF<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="ufEdit" name="ufEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="permissaoEdit">Permissão<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="permissaoEdit" class="form-control" name="permissaoEdit" title="Selecione a permissão">
                                            <option value="">Selecione...</option>
                                            <?php
                                            foreach ($permissoes as $p) {
                                                echo '<option value=' . $p->idPermissao . '>' . $p->permissao . '</option>';
                                            }
                                            ?>
                                        </select>                     
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="situacaoEdit">Situação<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="situacaoEdit" class="form-control" name="situacaoEdit" title="Selecione a situação">
                                            <option value="">Selecione...</option>
                                            <option value="1">Ativo</option>
                                            <option value="0">Desativo</option>
                                        </select>                    
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
               </div> <div class="modal-footer">
                    <div class="form-group">                       
                        <button type="button" id="cancelarEdit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
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
  
                    $("#nomeEdit").val(data.nome);
                    $("#nomeFantasiaEdit").val(data.nomeFantasia);
                    $("#cnpjEdit").val(data.cnpj);
                    $("#emailEdit").val(data.email);
                    $("#telefoneEdit").val(data.telefone);
                    $("#inscEstadualEdit").val(data.inscEstadual);
                    $("#areaUtilm2Edit").val(data.areaUtilm2);
                    $("#cepEdit").val(data.cep);
                    $("#numeroEdit").val(data.numero);
                    $("#logradouroEdit").val(data.logradouro);
                    $("#complementoEdit").val(data.complemento);
                    $("#ufEdit").val(data.uf);
                    $("#statusEdit").val(data.status);
                

                }
            }
        });
    });
    
    $('#formEdit').validate({
        
        rules:
                {
                    nomeEdit: {required: true},
                    nomeFantasiaEdit: {required: true},
                    cnpjEdit: {required: true},
                    emailEdit: {required: true},
                    telefoneEdit: {required: true},
                    inscEstadualEdit: {required: true},
                    areaUtilm2Edit: {equalTo: true},
                    cepEdit: {equalTo: true},
                    numeroEdit: {equalTo: true},
                    complementoEdit: {equalTo: true},
                    ufEdit: {equalTo: true},
                    statusEdit: {equalTo: true}
                    
                },
        messages: 
                {
                    nomeEdit: {required: 'Campo Requerido'},
                    nomeFantasiaEdit: {required: 'Campo Requerido'},
                    cnpjEdit: {required: 'Campo Requerido'},
                    emailEdit: {required: 'Campo Requerido'},
                    telefoneEdit: {required: 'Campo Requerido'},
                    inscEstadualEdit: {required: 'Campo Requerido'},
                    areaUtilm2Edit: {equalTo: 'Campo Requerido'},
                    cepEdit: {equalTo: 'Campo Requerido'},
                    numeroEdit: {equalTo: 'Campo Requerido'},
                    complementoEdit: {equalTo: 'Campo Requerido'},
                    ufEdit: {equalTo: 'Campo Requerido'},
                    statusEdit: {equalTo: 'Campo Requerido'}
 
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
                    nomeCad: {required: true},
                    nomeFantasiaCad: {required: true},
                    cnpjCad: {required: true},
                    emailCad: {required: true},
                    telefoneCad: {required: true},
                    inscEstadualCad: {required: true},
                    areaUtilm2Cad: {equalTo: true},
                    cepCad: {equalTo: true},
                    numeroCad: {equalTo: true},
                    complementoCad: {equalTo: true},
                    ufCad: {equalTo: true},
                    statusCad: {equalTo: true}
                    
                },
        messages: 
                {
                    nomeCad: {required: 'Campo Requerido'},
                    nomeFantasiaCad: {required: 'Campo Requerido'},
                    cnpjCad: {required: 'Campo Requerido'},
                    emailCad: {required: 'Campo Requerido'},
                    telefoneCad: {required: 'Campo Requerido'},
                    inscEstadualCad: {required: 'Campo Requerido'},
                    areaUtilm2Cad: {equalTo: 'Campo Requerido'},
                    cepCad: {equalTo: 'Campo Requerido'},
                    numeroCad: {equalTo: 'Campo Requerido'},
                    complementoCad: {equalTo: 'Campo Requerido'},
                    ufCad: {equalTo: 'Campo Requerido'},
                    statusCad: {equalTo: 'Campo Requerido'}
 
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