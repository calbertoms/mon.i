<div class="row">
    <div class="col-sm-12 col-md-12">        
        <?php if(!$permissoes){?>
        <div class="table-responsive">
            <table class="table table-condensed">
                <caption><h2 class="text-center">Gerenciamento de Permissões</h2></caption>
                <thead>
                    <tr>
                        <th class="col-md-4" style="text-align: center; vertical-align: middle;">Permissão</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Data Criação</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Data Alteração</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Usuário</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Situação</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCad"><i class="fa fa-fw fa-plus"></i> Permissão</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">Nenhuma permissão cadastrada.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php }else{ ?>
        <div class="table-responsive">
            <table class="table table-condensed">
                <caption><h2 class="text-center">Gerenciamento de Permissões</h2></caption>
                <thead>
                    <tr>
                        <th class="col-md-4" style="text-align: center; vertical-align: middle;">Permissão</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Data Criação</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Data Alteração</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Usuário</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Situação</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCad"><i class="fa fa-fw fa-plus"></i> Permissão</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($permissoes as $p) {
                        echo '<tr>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$p->permissao.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.date("d/m/Y H:i:s", strtotime($p->dataCadastro)).'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.date("d/m/Y H:i:s", strtotime($p->dataAlterado)).'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$p->usuario.'</td>';
                        if (($p->status) == 1) {
                            echo '<td style="text-align: center; vertical-align: middle;">Ativo</td>';                            
                        }
                        else{
                            echo '<td style="text-align: center; vertical-align: middle;">Desativo</td>'; 
                        }
                        echo '<td style="text-align: center; vertical-align: middle;">';
                        
                        if (($p->idPermissao) != 1) {
                        
                        echo '<a style="margin-right: 1%" href="#modalEdit" class="btn btn-info editar" role="button" data-toggle="modal" permissao="'.$p->idPermissao.'" title="Editar Permissão"><i class="fa fa-fw fa-pencil"></i></a>';                    
                        echo '<a  style="margin-right: 1%"href="#modalExcluir" class="btn btn-danger excluir" role="button" data-toggle="modal" idPermissao="'.$p->idPermissao.'" title="Excluir Permissão"><i class="fa fa-fw fa-remove"></i></a>';                    
                        };
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
<div id="modalCad" class="modal fade lg" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAdd">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ModalLabelAdd">Mon.I - Adicionar Permissões</h4>
            </div>
            <form id="formCad" action="<?php echo base_url('Permissoes_ctrl/adicionar'); ?>" method="post">
                <div class="modal-body">                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-lg-12 alert alert-info">Obrigatorio o preenchimento dos campos com asterisco (<span style="color: #EE0000">*</span>).</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="permissaoCad">Permissão<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="permissaoCad" name="permissaoCad" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">    
                                    <div class="form-group">
                                        <label for="codigoCad">Codigo<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="codigoCad" name="codigoCad" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">    
                                    <div class="form-group">
                                        <label for="siglaCad">Sigla<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="siglaCad" name="siglaCad" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="setorCad">Setor<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="setorCad" name="setorCad" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="categoriaCad">Categoria<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="categoriaCad" name="categoriaCad" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="efetivoCad">Efetivo<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="efetivoCad" class="form-control" name="efetivoCad" title="Selecione a situação">
                                            <option value="">Selecione...</option>
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                        </select>                    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="descricaoCad">Descrição<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="descricaoCad" name="descricaoCad" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-8 col-lg-8">
                                    <div class="form-group">
                                        <label for="observacaoCad">OBS<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="observacaoCad" name="observacaoCad" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="statusCad">Status<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="statusCad" class="form-control" name="statusCad" title="Selecione a situação">
                                            <option value="">Selecione...</option>
                                            <option value="1">Ativo</option>
                                            <option value="0">Desativo</option>
                                        </select>                    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <input type="checkbox" id="marcarTodosCad" name="marcarTodosCad" /> Marcar Todos                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <table class="table table-bordered">
                                            <tbody>                                                                                                                                                
                                                <tr>
                                                    <td class="col-sm-12 col-md-4 col-lg-4">                                                       
                                                        <input name="gGestaoDispositivosCad" type="checkbox" value="1" class="marcarCad">
                                                        <span> Gestão Dispositivos</span>                                                        
                                                    </td>
                                                    <td class="col-sm-12 col-md-4 col-lg-4">                                                       
                                                        <input name="gGraficosCad" type="checkbox" value="1" class="marcarCad">
                                                        <span> Gráficos</span>                                                        
                                                    </td>
                                                     <td class="col-sm-12 col-md-4 col-lg-4">                                                       
                                                        <input name="gConfiguracoesCad" type="checkbox" value="1" class="marcarCad">
                                                        <span> Configurações</span>                                                        
                                                    </td>
                                                </tr>                                                                                               
                                            </tbody>
                                        </table>
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
<div id="modalEdit" class="modal fade lg" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAdd">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ModalLabelAdd">Mon.I - Editar Permissões</h4>
            </div>
            <form id="formEdit" action="<?php echo base_url('Permissoes_ctrl/editar'); ?>" method="post">
                <div class="modal-body">                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" name="idPermissao" id="idPermissao" value=""/>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-lg-12 alert alert-info">Obrigatorio o preenchimento dos campos com asterisco (<span style="color: #EE0000">*</span>).</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="permissaoEdit">Permissão<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="permissaoEdit" name="permissaoEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">    
                                    <div class="form-group">
                                        <label for="codigoEdit">Codigo<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="codigoEdit" name="codigoEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">    
                                    <div class="form-group">
                                        <label for="siglaEdit">Sigla<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="siglaEdit" name="siglaEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="setorEdit">Setor<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="setorEdit" name="setorEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="categoriaEdit">Categoria<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="categoriaEdit" name="categoriaEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="efetivoEdit">Efetivo<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="efetivoEdit" class="form-control" name="efetivoEdit" title="Selecione a situação">
                                            <option value="">Selecione...</option>
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                        </select>                    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="descricaoEdit">Descrição<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="descricaoEdit" name="descricaoEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-8 col-lg-8">
                                    <div class="form-group">
                                        <label for="observacaoEdit">OBS<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="observacaoEdit" name="observacaoEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="statusEdit">Status<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="statusEdit" class="form-control" name="statusEdit" title="Selecione a situação">
                                            <option value="">Selecione...</option>
                                            <option value="1">Ativo</option>
                                            <option value="0">Desativo</option>
                                        </select>                    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <input type="checkbox" id="marcarTodosEdit" name="marcarTodosEdit" /> Marcar Todos                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <table class="table table-bordered">
                                            <tbody>                                                                                                                                                
                                                <tr>
                                                    <td class="col-sm-12 col-md-4 col-lg-4">                                                       
                                                        <input name="gGestaoDispositivosEdit" id="gGestaoDispositivosEdit" type="checkbox" value="1" class="marcarEdit">
                                                        <span> Gestão Dispositivos</span>                                                        
                                                    </td>
                                                    <td class="col-sm-12 col-md-4 col-lg-4">                                                       
                                                        <input name="gGraficosEdit" id="gGraficosEdit" type="checkbox" value="1" class="marcarEdit">
                                                        <span> Gráficos</span>                                                        
                                                    </td>
                                                     <td class="col-sm-12 col-md-4 col-lg-4">                                                       
                                                         <input name="gConfiguracoesEdit" id="gConfiguracoesEdit" type="checkbox" value="1" class="marcarEdit">
                                                        <span> Configurações</span>                                                        
                                                    </td>
                                                </tr>                                                                                               
                                            </tbody>
                                        </table>
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

<!-- Excluir Virtualmente -->

<div id="modalExcluir" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalLabelExcl">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ModalLabelExcl">Mon.I - Excluir Permissões</h4>
            </div>
            <form id="formExcluir" action="<?php echo base_url('Permissoes_ctrl/excluir'); ?>" method="post">
                <div class="modal-body">
                    <h5 style="text-align: center">Deseja realmente excluir essa Permissão ?</h5>
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
    
    //pega o id da permissao que deseja excluir e envia para o modal excluir
    $(document).on('click', '.excluir', function () {
        var permissao = $(this).attr('idPermissao');   
        $("#idExcluir").val(permissao);        
    });
    
    //pega o id da permissao que deseja editar e envia para o modal editar
    $(document).on('click', '.editar', function () {
        var permissao = $(this).attr('Permissao');
        $("#idPermissao").val(permissao); 
    });
    
    //carrega os dados do totem
    $('#modalEdit').on('shown.bs.modal', function () {
        var idPermissao = $('#idPermissao').val();
        
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url('Permissoes_ctrl/buscaPermissao');?>',
            data: 'idPermissao='+idPermissao,
            success: function (data)
            {
                if (data.result === true)
                {
                    $("#permissaoEdit").val(data.permissao);
                    $("#codigoEdit").val(data.codigo);
                    $("#siglaEdit").val(data.sigla);
                    $("#setorEdit").val(data.setor);
                    $("#categoriaEdit").val(data.categoria);
                    $("#efetivoEdit").val(data.efetivo);
                    $("#descricaoEdit").val(data.descricao);
                    $("#observacaoEdit").val(data.observacao);
                    $("#statusEdit").val(data.status);
                    $('#gGestaoDispositivosEdit').prop("checked", check(data.permissoes.gGestaoDispositivos));
                    $('#gGraficosEdit').prop("checked", check(data.permissoes.gGraficos));
                    $('#gConfiguracoesEdit').prop("checked", check(data.permissoes.gConfiguracoes));

                }
            }
        });
    });
    
    $('#formEdit').validate({
        
        rules:
                {
                    permissaoEdit: {required: true},
                    codigoEdit: {required: true},
                    siglaEdit: {required: true},
                    setorEdit: {required: true},
                    categoriaEdit: {required: true},
                    efetivoEdit: {required: true},
                    descricaoEdit: {required: false},
                    observacaoEdit: {required: false},
                    statusEdit: {required: true}
                },
        messages: 
                {
                    permissaoEdit: {required: 'Campo Requerido'},
                    codigoEdit: {required: 'Campo Requerido'},
                    siglaEdit: {required: 'Campo Requerido'},
                    setorEdit: {required: 'Campo Requerido'},
                    categoriaEdit: {required: 'Campo Requerido'},
                    efetivoEdit: {required: 'Campo Requerido'},
                    descricaoEdit: {required: 'Campo Requerido'},
                    observacaoEdit: {required: 'Campo Requerido'},
                    statusEdit: {required: 'Campo Requerido'}
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
                    permissaoCad: {required: true},
                    codigoCad: {required: true},
                    siglaCad: {required: true},
                    setorCad: {required: true},
                    categoriaCad: {required: true},
                    efetivoCad: {required: true},
                    descricaoCad: {required: false},
                    observacaoCad: {required: false},
                    statusCad: {required: true}
                },                        
        messages: 
                {
                    permissaoCad: {required: 'Campo Requerido'},
                    codigoCad: {required: 'Campo Requerido'},
                    siglaCad: {required: 'Campo Requerido'},
                    setorCad: {required: 'Campo Requerido'},
                    categoriaCad: {required: 'Campo Requerido'},
                    efetivoCad: {required: 'Campo Requerido'},
                    descricaoCad: {required: 'Campo Requerido'},
                    observacaoCad: {required: 'Campo Requerido'},
                    statusCad: {required: 'Campo Requerido'}
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
    
    $(function(){            
         $('#marcarTodosCad').click(function(){

             var val = this.checked;
             $('.marcarCad').each(function(){
                     $(this).prop('checked',val);
             });
         });
     });
     
     $(function(){            
         $('#marcarTodosEdit').click(function(){

             var val = this.checked;
             $('.marcarEdit').each(function(){
                     $(this).prop('checked',val);
             });
         });
     });
     
     function check(permissao){
         
         if(permissao === '1'){ 
            return true;
         }
         else{
            return false; 
         }
         
     }
        
});
</script>