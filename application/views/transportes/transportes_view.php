<div class="row">
    <div class="col-sm-12 col-md-12">        
        <?php if(!$transportes){?>
        <div class="table-responsive">
            <table class="table table-condensed">
                <caption><h2 class="text-center">Gerenciamento de Transporte</h2></caption>
                <thead>
                    <tr>                        
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Placa</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Modelo</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Bruto</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">
                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCad"><i class="fa fa-fw fa-plus"></i> Transporte</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4">Nenhum Transporte cadastrado.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php }else{ ?>
        <div class="table-responsive">
            <table class="table table-condensed">
                <caption><h2 class="text-center">Gerenciamento de Transportes</h2></caption>
                <thead>
                    <tr>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Placa</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Modelo</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Bruto</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCad"><i class="fa fa-fw fa-plus"></i> Transporte</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transportes as $t) {
                        echo '<tr>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$t->placa.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$t->modelo.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$t->bruto.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">';                   
                        echo '<a style="margin-right: 1%" href="#modalEdit" class="btn btn-info editar" role="button" data-toggle="modal" transporte="'.$t->idTransporte.'" title="Editar Transporte"><i class="fa fa-fw fa-pencil"></i></a>';                                            
                        if($this->permission->checkPermission($this->session->userdata('permissao'),'gAdministradores')){
                            if($t->status == 1){
                                echo '<a style="margin-right: 1%"href="#modalExcluir" class="btn btn-danger excluir" role="button" data-toggle="modal" idTransporte="'.$t->idTransporte.'" title="Excluir Transporte"><i class="fa fa-fw fa-remove"></i></a>';
                            }else{
                                 echo '<a style="margin-right: 1%"href="#modalRestaurar" class="btn btn-success restaurar" role="button" data-toggle="modal" idTransporte="'.$t->idTransporte.'" title="Restaurar Transporte"><i class="fa fa-fw fa-repeat"></i></a>';
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
<div id="modalCad" class="modal fade bd-modal-lg" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAdd">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ModalLabelAdd">Mon.I - Adicionar Transporte</h4>
            </div>
            <form id="formCad" action="<?php echo base_url('Transporte_ctrl/adicionar'); ?>" method="post">
                <div class="modal-body">                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-lg-12 alert alert-info">Obrigatorio o preenchimento dos campos com asterisco (<span style="color: #EE0000">*</span>).</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="placaCad">Placa<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="placaCad" name="placaCad" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="modeloCad">Modelo<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="modeloCad" name="modeloCad" />                       
                                    </div>
                                </div>                                
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="corCad">Cor<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="corCad" name="corCad" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
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
                                        <label for="anoFabricacaoCad">Ano Fabricação<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="number" class="form-control" id="anoFabricacaoCad" name="anoFabricacaoCad" />                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="disponibilidadeCad">Disponibilidade<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="disponibilidadeCad" name="disponibilidadeCad" class="form-control" title="Selecione a disponivilidade">
                                            <option value="">Selecione...</option>
                                            <option value="0">Sim</option>
                                            <option value="1">Não</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="anttCad">ANTT<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="anttCad" name="anttCad" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="taraCad">Tara<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="number" class="form-control" id="taraCad" name="taraCad" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="brutoCad">Bruto<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="number" class="form-control" id="brutoCad" name="brutoCad" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="dataManutCad">Data Manutenção<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="date" class="form-control" id="dataManutCad" name="dataManutCad" />                       
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
<div id="modalEdit" class="modal fade bd-modal-lg" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAdd">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ModalLabelAdd">Mon.I - Editar Transporte</h4>
            </div>
            <form id="formEdit" action="<?php echo base_url('Transporte_ctrl/editar'); ?>" method="post">
                <div class="modal-body">                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" name="idTransporte" id="idTransporte" value=""/>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-lg-12 alert alert-info">Obrigatorio o preenchimento dos campos com asterisco (<span style="color: #EE0000">*</span>).</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="placaEdit">Placa<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="placaEdit" name="placaEdit" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="modeloEdit">Modelo<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="modeloEdit" name="modeloEdit" />                       
                                    </div>
                                </div>                                
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="corEdit">Cor<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="corEdit" name="corEdit" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
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
                                        <label for="anoFabricacaoEdit">Ano Fabricação<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="number" class="form-control" id="anoFabricacaoEdit" name="anoFabricacaoEdit" />                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="disponibilidadeEdit">Disponibilidade<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="disponibilidadeEdit" name="disponibilidadeEdit" class="form-control" title="Selecione a disponivilidade">
                                            <option value="">Selecione...</option>
                                            <option value="0">Sim</option>
                                            <option value="1">Não</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="anttEdit">ANTT<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="anttEdit" name="anttEdit" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="taraEdit">Tara<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="number" class="form-control" id="taraEdit" name="taraEdit" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="brutoEdit">Bruto<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="number" class="form-control" id="brutoEdit" name="brutoEdit" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="dataManutEdit">Data Manutenção<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="date" class="form-control" id="dataManutEdit" name="dataManutEdit" />                       
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
                <h4 class="modal-title" id="ModalLabelExcl">Mon.I - Excluir Usuário</h4>
            </div>
            <form id="formExcluir" action="<?php echo base_url('Transporte_ctrl/excluir'); ?>" method="post">
                <div class="modal-body">
                    <h5 style="text-align: center">Deseja realmente excluir esse transporte ?</h5>
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
            <form id="formExcluir" action="<?php echo base_url('Transporte_ctrl/restaurar'); ?>" method="post">
                <div class="modal-body">
                    <h5 style="text-align: center">Deseja realmente restaurar esse transporte ?</h5>
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
        var transporte = $(this).attr('idTransporte');        
        $("#idExcluir").val(transporte);        
    });
    
    //pega o id do funcionario que deseja restaurar e envia para o modal restaurar
    $(document).on('click', '.restaurar', function () {
        var transporte = $(this).attr('idTransporte');        
        $("#idRestaurar").val(transporte);            
        
    });
    
    //pega o id do funcionario que deseja editar e envia para o modal editar
    $(document).on('click', '.editar', function () {
        var transporte = $(this).attr('transporte');
        $("#idTransporte").val(transporte); 
    });
    
    //carrega os dados do totem
    $('#modalEdit').on('shown.bs.modal', function () {
        var idTransporte = $('#idTransporte').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url('Transporte_ctrl/buscaTransporte');?>',
            data: 'idTransporte='+idTransporte,
           
            success: function (data)
            {

                if (data.result === true)
                {
  
                    $("#disponibilidadeEdit").val(data.disponibilidade);
                    $("#placaEdit").val(data.placa);
                    $("#anttEdit").val(data.antt);
                    $("#modeloEdit").val(data.modelo);
                    $("#corEdit").val(data.cor);
                    $("#anoFabricacaoEdit").val(data.anoFabricacao);
                    $("#taraEdit").val(data.tara);
                    $("#brutoEdit").val(data.bruto);
                    $("#dataManutEdit").val(data.dataManutencao);
                    $("#tipoEdit").val(data.tipo);
                }
            }
        });
    });
    
    $('#formEdit').validate({
        
        rules:
                {
                    disponibilidadeEdit: {required: true},
                    placaEdit: {required: true},
                    anttEdit: {required: true},
                    modeloEdit: {required: true},
                    corEdit: {required: true},
                    anoFabricacaoEdit: {required: true},
                    taraEdit: {required: true},
                    brutoEdit: {required: true},
                    dataManutEdit: {required: true},
                    tipoEdit: {required: true}
                },
        messages: 
                {
                    disponibilidadeEdit: {required: 'Campo Requerido'},
                    placaEdit: {required: 'Campo Requerido'},
                    anttEdit: {required: 'Campo Requerido'},
                    modeloEdit: {required: 'Campo Requerido'},
                    corEdit: {required: 'Campo Requerido.'},
                    anoFabricacaoEdit: {required: 'Campo Requerido.'},
                    taraEdit: {required: 'Campo Requerido.'},
                    brutoEdit: {required: 'Campo Requerido.'},
                    dataManutEdit: {required: 'Campo Requerido.'},
                    tipoEdit: {equalTo: 'Senhas diferentes'}
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
                    disponibilidadeCad: {required: true},
                    placaCad: {required: true},
                    anttCad: {required: true},
                    modeloCad: {required: true},
                    corCad: {required: true},
                    anoFabricacaoCad: {required: true},
                    taraCad: {required: true},
                    brutoCad: {required: true},
                    dataManutCad: {required: true},
                    tipoCad: {required: true}
                },
        messages: 
                {
                    disponibilidadeCad: {required: 'Campo Requerido'},
                    placaCad: {required: 'Campo Requerido'},
                    anttCad: {required: 'Campo Requerido'},
                    modeloCad: {required: 'Campo Requerido'},
                    corCad: {required: 'Campo Requerido.'},
                    anoFabricacaoCad: {required: 'Campo Requerido.'},
                    taraCad: {required: 'Campo Requerido.'},
                    brutoCad: {required: 'Campo Requerido.'},
                    dataManutCad: {required: 'Campo Requerido.'},
                    tipoCad: {equalTo: 'Senhas diferentes'}
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