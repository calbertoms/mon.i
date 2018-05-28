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
                        echo '<td style="text-align: center; vertical-align: middle;">';                   
                            echo '<a style="margin-right: 1%" href="#modalEdit" class="btn btn-info editar" role="button" data-toggle="modal" permissao="'.$p->idPermissao.'" title="Editar Permissão"><i class="fa fa-fw fa-pencil"></i></a>';                    
                            echo '<a  style="margin-right: 1%"href="#modalExcluir" class="btn btn-danger excluir" role="button" data-toggle="modal" idPermissao="'.$p->idPermissao.'" title="Excluir Permissão"><i class="fa fa-fw fa-remove"></i></a>';                    
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
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="permissaoCad">Permissão<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="permissaoCad" name="permissaoCad" maxlength="100"/>                       
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
<div id="modalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAdd">
    <div class="modal-dialog" role="document">
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
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="permissaoEdit">Permissão<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="permissaoEdit" name="permissaoEdit" maxlength="100"/>                       
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

<!-- Excluir -->

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
    
    //pega o id do funcionario que deseja excluir e envia para o modal excluir
    $(document).on('click', '.excluir', function () {
        var permissao = $(this).attr('idPermissao');   
        $("#idExcluir").val(permissao);        
    });
    
    //pega o id do funcionario que deseja editar e envia para o modal editar
    $(document).on('click', '.editar', function () {
        var permissao = $(this).attr('permissao');
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
                    permissaoEdit: {required: true}
                },
        messages: 
                {
                    permissaoEdit: {required: 'Campo Requerido'}
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
                    permissaoCad: {required: true,
                               remote: "<?php echo base_url('Permissoes_ctrl/verificaPermissao'); ?>"}
                },                        
        messages: 
                {
                    permissaoCad: {required: 'Campo Requerido',
                               remote: 'Permissao já existe.'}
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