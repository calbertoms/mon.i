<div class="row">
    <div class="col-sm-12 col-md-12">        
        <?php if(!$produtos){?>
        <div class="table-responsive">
            <table class="table table-condensed">
                <caption><h2 class="text-center">Gerenciamento de Produtos</h2></caption>
                <thead>
                    <tr>                        
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Nome</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Código</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Tipo</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">
                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCad"><i class="fa fa-fw fa-plus"></i> Produto</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4">Nenhum Produto cadastrado.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php }else{ ?>
        <div class="table-responsive">
            <table class="table table-condensed">
                <caption><h2 class="text-center">Gerenciamento de Produtos</h2></caption>
                <thead>
                    <tr>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Nome</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Código</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Tipo</th>                        
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCad"><i class="fa fa-fw fa-plus"></i> Produto</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $p) {
                        echo '<tr>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$p->nome.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$p->codigo.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$p->tipo.'</td>';                        
                        echo '<td style="text-align: center; vertical-align: middle;">';                   
                        echo '<a style="margin-right: 1%" href="#modalEdit" class="btn btn-info editar" role="button" data-toggle="modal" produto="'.$p->idProduto.'" title="Editar Produto"><i class="fa fa-fw fa-pencil"></i></a>';                                            
                        if($this->permission->checkPermission($this->session->userdata('permissao'),'gAdministradores')){
                            if($p->status == 1){
                                echo '<a style="margin-right: 1%"href="#modalExcluir" class="btn btn-danger excluir" role="button" data-toggle="modal" idProduto="'.$p->idProduto.'" title="Excluir Produto"><i class="fa fa-fw fa-remove"></i></a>';
                            }else{
                                echo '<a style="margin-right: 1%"href="#modalRestaurar" class="btn btn-success restaurar" role="button" data-toggle="modal" idProduto="'.$p->idProduto.'" title="Restaurar Produto"><i class="fa fa-fw fa-repeat"></i></a>';
                            }
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
                <h4 class="modal-title" id="ModalLabelAdd">Mon.I - Adicionar Produto</h4>
            </div>
            <form id="formCad" action="<?php echo base_url('Produto_ctrl/adicionar'); ?>" method="post">
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
                                        <label for="nomeCad">Nome<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="nomeCad" name="nomeCad" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="codigoCad">Código<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="codigoCad" name="codigoCad" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="tipoCad">Tipo<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="tipoCad" name="tipoCad" class="form-control" title="Selecione o tipo">
                                            <option value="">Selecione...</option>
                                            <option value="0">Gasoso</option>
                                            <option value="1">Líquido</option>
                                            <option value="2">Sólido</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="unidadeCad">Unidade<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="unidadeCad" name="unidadeCad" />                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="tipoTransporteCad">Tipo Transporte<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="tipoTransporteCad" name="tipoTransporteCad" class="form-control" title="Selecione o tipo do Transporte">
                                            <option value="">Selecione...</option>
                                            <option value="Gás">Gás</option>
                                            <option value="Líquido">Líquido</option>
                                            <option value="Granel">Granel</option>
                                        </select>                  
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="temperaturaCad">Temperatura<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="temperaturaCad" name="temperaturaCad" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="inflamavelCad">Inflamável<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="inflamavelCad" name="inflamavelCad" class="form-control" title="Selecione o tipo">
                                            <option value="">Selecione...</option>
                                            <option value="0">Não</option>
                                            <option value="1">Sim</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="densidadeCad">Densidade<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="densidadeCad" name="densidadeCad" />                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="descricaoCad">Descrição<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="descricaoCad" name="descricaoCad" />                       
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
                <h4 class="modal-title" id="ModalLabelAdd">Mon.I - Editar Produto</h4>
            </div>
            <form id="formEdit" action="<?php echo base_url('Produto_ctrl/editar'); ?>" method="post">
                <div class="modal-body">                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" name="idProduto" id="idProduto" value=""/>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-lg-12 alert alert-info">Obrigatorio o preenchimento dos campos com asterisco (<span style="color: #EE0000">*</span>).</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="nomeEdit">Nome<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="nomeEdit" name="nomeEdit" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="codigoEdit">Código<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="codigoEdit" name="codigoEdit" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="tipoEdit">Tipo<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="tipoEdit" name="tipoEdit" class="form-control" title="Selecione o tipo">
                                            <option value="">Selecione...</option>
                                            <option value="0">Gasoso</option>
                                            <option value="1">Líquido</option>
                                            <option value="2">Sólido</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="unidadeEdit">Unidade<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="unidadeEdit" name="unidadeEdit" />                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="tipoTransporteEdit">Tipo Transporte<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="tipoTransporteEdit" name="tipoTransporteEdit" class="form-control" title="Selecione o tipo do Transporte">
                                            <option value="">Selecione...</option>
                                            <option value="0">Gás</option>
                                            <option value="1">Líquido</option>
                                            <option value="2">Granel</option>
                                        </select>                  
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="temperaturaEdit">Temperatura<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="temperaturaEdit" name="temperaturaEdit" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="inflamavelEdit">Inflamável<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="inflamavelEdit" name="inflamavelEdit" class="form-control" title="Selecione o tipo">
                                            <option value="">Selecione...</option>
                                            <option value="0">Não</option>
                                            <option value="1">Sim</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="densidadeEdit">Densidade<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="densidadeEdit" name="densidadeEdit" />                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="descricaoEdit">Descrição<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="descricaoEdit" name="descricaoEdit" />                       
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
                <h4 class="modal-title" id="ModalLabelExcl">Mon.I - Excluir Produto</h4>
            </div>
            <form id="formExcluir" action="<?php echo base_url('Produto_ctrl/excluir'); ?>" method="post">
                <div class="modal-body">
                    <h5 style="text-align: center">Deseja realmente excluir esse produto ?</h5>
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

<!-- Restaurar Virtualmente -->

<div id="modalRestaurar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalLabelRestaurar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ModalLabelExcl">Mon.I - Restaurar Produto</h4>
            </div>
            <form id="formExcluir" action="<?php echo base_url('Produto_ctrl/restaurar'); ?>" method="post">
                <div class="modal-body">
                    <h5 style="text-align: center">Deseja realmente restaurar esse produto ?</h5>
                    <input name="id" id="idRestaurar" type="hidden" value=""/>
                </div>
                <div class="modal-footer">
                    <div class="form-group">                       
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-success">Restaurar</button>                        
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
        var produto = $(this).attr('idProduto');        
        $("#idExcluir").val(produto);        
    });
    
    //pega o id do funcionario que deseja restaurar e envia para o modal restaurar
    $(document).on('click', '.restaurar', function () {
        var produto = $(this).attr('idProduto');        
        $("#idRestaurar").val(produto);    
        
    });
    
    //pega o id do funcionario que deseja editar e envia para o modal editar
    $(document).on('click', '.editar', function () {
        var produto = $(this).attr('produto');
        $("#idProduto").val(produto); 
    });
    
    //carrega os dados do totem
    $('#modalEdit').on('shown.bs.modal', function () {
        var idProduto = $('#idProduto').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url('Produto_ctrl/buscaProduto');?>',
            data: 'idProduto='+idProduto,
           
            success: function (data)
            {
                
                if (data.result === true)
                {
  
                    $("#nomeEdit").val(data.nome);
                    $("#codigoEdit").val(data.codigo);
                    $("#tipoEdit").val(data.tipo);
                    $("#unidadeEdit").val(data.unidade);
                    $("#tipoTransporteEdit").val(data.tipoTransporte);
                    $("#temperaturaEdit").val(data.temperatura);
                    $("#densidadeEdit").val(data.densidade);
                    $("#inflamavelEdit").val(data.inflamavel);
                    $("#descricaoEdit").val(data.descricao);
                }
            }
        });
    });
    
    $('#formEdit').validate({
        
        rules:
                {
                    nomeEdit: {required: true},
                    codigoEdit: {required: true},
                    tipoEdit: {required: true},
                    unidadeEdit: {required: true},
                    tipoTransporteEdit: {required: true},
                    temperaturaEdit: {required: true},
                    densidadeEdit: {required: true},
                    inflamavelEdit: {required: true},
                    descricaoEdit: {required: true}
                },                        
        messages: 
                {
                    nomeEdit: {required: 'Campo Requerido.'},
                    codigoEdit: {required: 'Campo Requerido'},
                    tipoEdit: {required: 'Campo Requerido'},
                    unidadeEdit: {required: 'Campo Requerido'},
                    tipoTransporteEdit: {required: 'Campo Requerido.'},
                    temperaturaEdit: {required: 'Campo Requerido.'},
                    densidadeEdit: {required: 'Campo Requerido.'},
                    inflamavelEdit: {required: 'Campo Requerido.'},
                    descricaoEdit: {required: 'Campo Requerido.'},                    
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
                    codigoCad: {required: true},
                    tipoCad: {required: true},
                    unidadeCad: {required: true},
                    tipoTransporteCad: {required: true},
                    temperaturaCad: {required: true},
                    densidadeCad: {required: true},
                    inflamavelCad: {required: true},
                    descricaoCad: {required: true}
                },                        
        messages: 
                {
                    nomeCad: {required: 'Campo Requerido.'},
                    codigoCad: {required: 'Campo Requerido'},
                    tipoCad: {required: 'Campo Requerido'},
                    unidadeCad: {required: 'Campo Requerido'},
                    tipoTransporteCad: {required: 'Campo Requerido.'},
                    temperaturaCad: {required: 'Campo Requerido.'},
                    densidadeCad: {required: 'Campo Requerido.'},
                    inflamavelCad: {required: 'Campo Requerido.'},
                    descricaoCad: {required: 'Campo Requerido.'},                    
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

