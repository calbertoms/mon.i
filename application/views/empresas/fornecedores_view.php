<div class="row">
    <div class="col-sm-12 col-md-12">        
        <?php if(!$fornecedores){?>
        <div class="table-responsive">
            <table class="table table-condensed">
                <caption><h2 class="text-center">Gerenciamento de Fornecedores</h2></caption>
                <thead>
                    <tr>                        
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Nome Fantasia</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">E-mail</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Telefone</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCad"><i class="fa fa-fw fa-plus"></i> Fornecedores</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4">Nenhum Fornecedores cadastrado.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php }else{ ?>
        <div class="table-responsive">
            <table class="table table-condensed">
                <caption><h2 class="text-center">Gerenciamento de Fornecedores</h2></caption>
                <thead>
                    <tr>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Nome Fantasia</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">E-mail</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Telefone</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCad"><i class="fa fa-fw fa-plus"></i> Fornecedores</button>   
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($fornecedores as $f) {
                        echo '<tr>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$f->nomeFantasia.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$f->email.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$f->telefone.'</td>';                        
                        echo '<td style="text-align: center; vertical-align: middle;">';                   
                        echo '<a style="margin-right: 1%" href="#modalEdit" class="btn btn-info editar" role="button" data-toggle="modal" fornecedor="'.$f->idFornecedores.'" title="Editar Cliente"><i class="fa fa-fw fa-pencil"></i></a>';                                            
                        echo '<a style="margin-right: 1%"href="#modalExcluir" class="btn btn-danger excluir" role="button" data-toggle="modal" idFornecedor="'.$f->idFornecedores.'" title="Excluir Cliente"><i class="fa fa-fw fa-remove"></i></a>';
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
                <h4 class="modal-title" id="ModalLabelAdd">Mon.I - Adicionar Fornecedores</h4>
            </div>
            <form id="formCad" action="<?php echo base_url('Fornecedor_ctrl/adicionar'); ?>" method="post">
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
                <h4 class="modal-title" id="ModalLabelAdd">Mon.I - Editar Fornecedores</h4>
            </div>
            <form id="formEdit" action="<?php echo base_url('Fornecedor_ctrl/editar'); ?>" method="post">
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
                <h4 class="modal-title" id="ModalLabelExcl">Mon.I - Excluir Fornecedores</h4>
            </div>
            <form id="formExcluir" action="<?php echo base_url('Fornecedor_ctrl/excluir'); ?>" method="post">
                <div class="modal-body">
                    <h5 style="text-align: center">Deseja realmente excluir esse fornecedor ?</h5>
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
        var fornecedor = $(this).attr('idFornecedor');        
        $("#idExcluir").val(fornecedor);        
    });
    
    //pega o id do funcionario que deseja editar e envia para o modal editar
    $(document).on('click', '.editar', function () {
        var fornecedor = $(this).attr('fornecedor');
        $("#idFornecedor").val(fornecedor); 
    });
    
    //carrega os dados do totem
    $('#modalEdit').on('shown.bs.modal', function () {
        var idFornecedor = $('#idFornecedor').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url('Fornecedores_ctrl/buscaFornecedor');?>',
            data: 'idFornecedore='+idFornecedor,
           
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