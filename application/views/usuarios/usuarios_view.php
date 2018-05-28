<div class="row">
    <div class="col-sm-12 col-md-12">        
        <?php
        if(!$usuarios){?>
        <div class="table-responsive">
            <table class="table table-condensed">
                <caption><h2 class="text-center">Gerenciamento de Usuários</h2></caption>
                <thead>
                    <tr>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Usuário</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Email</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Permissão</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Situação</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCad"><i class="fa fa-fw fa-plus"></i> Usuário</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">Nenhum usuário cadastrado.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php }else{ ?>
        <div class="table-responsive">
            <table class="table table-condensed">
                <caption><h2 class="text-center">Gerenciamento de Usuários</h2></caption>
                <thead>
                    <tr>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Usuário</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Email</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Permissão</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Situação</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCad"><i class="fa fa-fw fa-plus"></i> Usuário</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $u) {
                        echo '<tr>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$u->usuario.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$u->email.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$u->permissao.'</td>';
                        if (($u->situacao) == 1) {
                            echo '<td style="text-align: center; vertical-align: middle;">Ativo</td>';                            
                        }
                        else{
                            echo '<td style="text-align: center; vertical-align: middle;">Desativo</td>'; 
                        }
                        echo '<td style="text-align: center; vertical-align: middle;">';
                            if (($u->idUsuario) != 0) {
                                echo '<a style="margin-right: 1%" href="#modalEdit" class="btn btn-info editar" role="button" data-toggle="modal" usuario="'.$u->idUsuario.'" title="Editar Usuário"><i class="fa fa-fw fa-pencil"></i></a>';                    
                                echo '<a style="margin-right: 1%"href="#modalExcluir" class="btn btn-danger excluir" role="button" data-toggle="modal" idUsuario="'.$u->idUsuario.'" title="Excluir Usuário"><i class="fa fa-fw fa-remove"></i></a>';
                            }
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
                <h4 class="modal-title" id="ModalLabelAdd">Mon.I - Adicionar Usuário</h4>
            </div>
            <form id="formCad" action="<?php echo base_url('Usuario_ctrl/adicionar'); ?>" method="post">
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
                                        <label for="nomeCompletoCad">Nome Completo<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="nomeCompletoCad" name="nomeCompletoCad" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="usuarioCad">Usuário<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="usuarioCad" name="usuarioCad" maxlength="100"/>                       
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
                                        <label for="senhaCad">Senha<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="password" class="form-control" id="senhaCad" name="senhaCad" placeholder="Digitar senha" maxlength="20"/>                      
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="confirmaCad">Confirmar<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="password" class="form-control" id="confirmaCad" name="confirmaCad" placeholder="Confirmar senha" maxlength="20"/>                      
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
                <h4 class="modal-title" id="ModalLabelAdd">Mon.I - Editar Usuário</h4>
            </div>
            <form id="formEdit" action="<?php echo base_url('Usuario_ctrl/editar'); ?>" method="post">
                <div class="modal-body">                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" name="idUsuario" id="idUsuario" value=""/>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-lg-12 alert alert-info">Obrigatorio o preenchimento dos campos com asterisco (<span style="color: #EE0000">*</span>).</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="nomeCompletoEdit">Nome Completo<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="nomeCompletoEdit" name="nomeCompletoEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="usuarioEdit">Usuário<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="usuarioEdit" name="usuarioEdit" maxlength="100"/>                       
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
                                        <label for="senhaEdit">Senha<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="password" class="form-control" id="senhaEdit" name="senhaEdit" placeholder="Digitar senha" maxlength="20"/>                      
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="confirmaEdit">Confirmar<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="password" class="form-control" id="confirmaEdit" name="confirmaEdit" placeholder="Confirmar senha" maxlength="20"/>                      
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

<!-- Excluir -->

<div id="modalExcluir" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalLabelExcl">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ModalLabelExcl">Mon.I - Excluir Usuário</h4>
            </div>
            <form id="formExcluir" action="<?php echo base_url('Usuarios_ctrl/excluir'); ?>" method="post">
                <div class="modal-body">
                    <h5 style="text-align: center">Deseja realmente excluir esse Usuário ?</h5>
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
        var usuario = $(this).attr('idUsuario');        
        $("#idExcluir").val(usuario);        
    });
    
    //pega o id do funcionario que deseja editar e envia para o modal editar
    $(document).on('click', '.editar', function () {
        var usuario = $(this).attr('usuario');
        $("#idUsuario").val(usuario); 
    });
    
    //carrega os dados do totem
    $('#modalEdit').on('shown.bs.modal', function () {
        var idUsuario = $('#idUsuario').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url('Usuario_ctrl/buscaUsuario');?>',
            data: 'idUsuario='+idUsuario,
           
            success: function (data)
            {


                if (data.result === true)
                {
  
                    $("#nomeCompletoEdit").val(data.nomeCompleto);
                    $("#usuarioEdit").val(data.usuario);
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
                    emailEdit: {required: true},
                    situacaoEdit: {required: true},
                    permissaoEdit: {required: true},
                    confirmaEdit: {equalTo: '#senhaEdit'}
                },
        messages: 
                {
                    nomeCompletoEdit: {required: 'Campo Requerido'},
                    usuarioEdit: {required: 'Campo Requerido'},
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