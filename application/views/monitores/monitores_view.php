<div class="row">
    <div class="col-sm-12 col-md-12">        
        <?php if(!$monitores){?>
        <div class="table-responsive">
            <table class="table table-condensed">
                <caption><h2 class="text-center">Gerenciamento de Monitores</h2></caption>
                <thead>
                    <tr>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Monitor</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Tipo</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Nível Alarme</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Data Calibração</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">
                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCad"><i class="fa fa-fw fa-plus"></i> Monitor</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">Nenhuma recarga cadastrada.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php }else{ ?>
        <div class="table-responsive">
            <table class="table table-condensed">
                <caption><h2 class="text-center">Gerenciamento de Monitores</h2></caption>
                <thead>
                    <tr>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Monitor</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Tipo</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Nível Alarme</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Data Calibração</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">
                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCad"><i class="fa fa-fw fa-plus"></i> Monitor</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($monitores as $m) {
                        echo '<tr>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$m->nome.'</td>';
                        if($m->tipo == 0){
                            echo '<td style="text-align: center; vertical-align: middle;">Gasoso</td>';
                        }elseif ($m->tipo == 1) {
                            echo '<td style="text-align: center; vertical-align: middle;">Líquido</td>';
                        }else{
                            echo '<td style="text-align: center; vertical-align: middle;">Sólido</td>';
                        }                        
                        echo '<td style="text-align: center; vertical-align: middle;">'.$m->nivelAlarme.'</td>';                        
                        echo '<td style="text-align: center; vertical-align: middle;">'.date("d/m/Y", strtotime($m->dataCalibracao)).'</td>';                                                
                        echo '<td style="text-align: center; vertical-align: middle;">';                   
                        echo '<a style="margin-right: 1%" href="#modalEdit" class="btn btn-info editar" role="button" data-toggle="modal" monitor="'.$m->idMonitor.'" title="Editar Monitor"><i class="fa fa-fw fa-pencil"></i></a>';                                            
                        if($this->permission->checkPermission($this->session->userdata('permissao'),'gAdministradores')){
                            if($m->status == 1){
                                echo '<a style="margin-right: 1%"href="#modalExcluir" class="btn btn-danger excluir" role="button" data-toggle="modal" idMonitor="'.$m->idMonitor.'" title="Excluir Monitor"><i class="fa fa-fw fa-remove"></i></a>';
                            }else{
                                 echo '<a style="margin-right: 1%"href="#modalRestaurar" class="btn btn-success restaurar" role="button" data-toggle="modal" idMonitor="'.$m->idMonitor.'" title="Restaurar Monitor"><i class="fa fa-fw fa-repeat"></i></a>';
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
                <h4 class="modal-title" id="ModalLabelAdd">Mon.I - Adicionar Monitor</h4>
            </div>
            <form id="formCad" action="<?php echo base_url('Monitor_ctrl/adicionar'); ?>" method="post">
                <div class="modal-body">                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-lg-12 alert alert-info">Obrigatorio o preenchimento dos campos com asterisco (<span style="color: #EE0000">*</span>).</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="nomeCad">Nome<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="nomeCad" name="nomeCad" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="macCad">MAC<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="macCad" name="macCad" />                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label for="capacidadeCad">Capacidade<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="number" class="form-control" id="capacidadeCad" name="capacidadeCad" />                       
                                    </div>
                                </div>                                
                                <div class="col-sm-12 col-md-5 col-lg-5">
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
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="nivelAlarmeCad">Nível de Alarme<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="number" class="form-control" id="nivelAlarmeCad" name="nivelAlarmeCad" />                       
                                    </div>
                                </div>  
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="nivelCheioCad">Nível Cheio<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="number" class="form-control" id="nivelCheioCad" name="nivelCheioCad" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="tempoColetaCad">Tempo Coleta<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="number" class="form-control" id="tempoColetaCad" name="tempoColetaCad" />                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="sensorCalibracaoCad">Sensor Calibração<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="number" class="form-control" id="sensorCalibracaoCad" name="sensorCalibracaoCad" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="tipoSensorCad">Tipo<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="tipoSensorCad" name="tipoSensorCad" class="form-control" title="Selecione o tipo">
                                            <option value="">Selecione...</option>
                                            <option value="0">Pressão</option>
                                            <option value="1">Gravimetrico</option>
                                            <option value="2">Volumetrico</option>
                                            <option value="3">Barometrico</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="dataCalibracaoCad">Data Calibração<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="date" class="form-control" id="dataCalibracaoCad" name="dataCalibracaoCad" />                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">                       
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
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
                <h4 class="modal-title" id="ModalLabelAdd">Mon.I - Editar Monitor</h4>
            </div>
            <form id="formEdit" action="<?php echo base_url('Monitor_ctrl/editar'); ?>" method="post">
                <div class="modal-body">                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" name="idMonitor" id="idMonitor" value=""/>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-lg-12 alert alert-info">Obrigatorio o preenchimento dos campos com asterisco (<span style="color: #EE0000">*</span>).</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="nomeEdit">Nome<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="nomeEdit" name="nomeEdit" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="macEdit">MAC<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="macEdit" name="macEdit" />                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label for="capacidadeEdit">Capacidade<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="number" class="form-control" id="capacidadeEdit" name="capacidadeEdit" />                       
                                    </div>
                                </div>                                
                                <div class="col-sm-12 col-md-5 col-lg-5">
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
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="nivelAlarmeEdit">Nível de Alarme<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="number" class="form-control" id="nivelAlarmeEdit" name="nivelAlarmeEdit" />                       
                                    </div>
                                </div>  
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="nivelCheioEdit">Nível Cheio<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="number" class="form-control" id="nivelCheioEdit" name="nivelCheioEdit" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="tempoColetaEdit">Tempo Coleta<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="number" class="form-control" id="tempoColetaEdit" name="tempoColetaEdit" />                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="sensorCalibracaoEdit">Sensor Calibração<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="number" class="form-control" id="sensorCalibracaoEdit" name="sensorCalibracaoEdit" />                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="tipoSensorEdit">Tipo Sensor<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="tipoSensorEdit" name="tipoSensorEdit" class="form-control" title="Selecione o tipo">
                                            <option value="">Selecione...</option>
                                            <option value="0">Pressão</option>
                                            <option value="1">Gravimetrico</option>
                                            <option value="2">Volumetrico</option>
                                            <option value="3">Barometrico</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="dataCalibracaoEdit">Data Calibração<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="date" class="form-control" id="dataCalibracaoEdit" name="dataCalibracaoEdit" />                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">                       
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
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
            <form id="formExcluir" action="<?php echo base_url('Monitor_ctrl/excluir'); ?>" method="post">
                <div class="modal-body">
                    <h5 style="text-align: center">Deseja realmente excluir esse monitor ?</h5>
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
                <h4 class="modal-title" id="ModalLabelRest">Mon.I - Restaurar Transporte</h4>
            </div>
            <form id="formRest" action="<?php echo base_url('Monitor_ctrl/restaurar'); ?>" method="post">
                <div class="modal-body">
                    <h5 style="text-align: center">Deseja realmente restaurar esse monitor ?</h5>
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
        var monitor = $(this).attr('idMonitor');        
        $("#idExcluir").val(monitor);        
    });
    
    //pega o id do funcionario que deseja restaurar e envia para o modal restaurar
    $(document).on('click', '.restaurar', function () {
        var monitor = $(this).attr('idMonitor');        
        $("#idRestaurar").val(monitor);            
        
    });
    
    //pega o id do funcionario que deseja editar e envia para o modal editar
    $(document).on('click', '.editar', function () {
        var monitor = $(this).attr('monitor');
        $("#idMonitor").val(monitor); 
    });
    
    //carrega os dados do totem
    $('#modalEdit').on('shown.bs.modal', function () {
        var idMonitor = $('#idMonitor').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url('Monitor_ctrl/buscaMonitor');?>',
            data: 'idMonitor='+idMonitor,
           
            success: function (data)
            {

                if (data.result === true)
                {
  
                    $("#nomeEdit").val(data.nome);
                    $("#macEdit").val(data.mac);
                    $("#capacidadeEdit").val(data.capacidade);
                    $("#tipoEdit").val(data.tipo);
                    $("#unidadeEdit").val(data.unidade);
                    $("#nivelAlarmeEdit").val(data.nivelAlarme);
                    $("#nivelCheioEdit").val(data.nivelCheio);
                    $("#tempoColetaEdit").val(data.tempoColeta);
                    $("#sensorCalibracaoEdit").val(data.sensorCalibracao);
                    $("#tipoSensorEdit").val(data.sensorTipo);
                    $("#dataCalibracaoEdit").val(data.dataCalibracao);
                }
            }
        });
    });
    
    $('#formEdit').validate({
        
        rules:
                {
                    nomeEdit: {required: true},
                    macEdit: {required: true},
                    capacidadeEdit: {required: true},
                    tipoEdit: {required: true},
                    unidadeEdit: {required: true},
                    nivelAlarmeEdit: {required: true},
                    nivelCheioEdit: {required: true},
                    tempoColetaEdit: {required: true},
                    sensorCalibracaoEdit: {required: true},
                    tipoSensorEdit: {required: true},
                    dataCalibracaoEdit: {required: true}
                },
        messages: 
                {
                    nomeEdit: {required: 'Campo Requerido'},
                    macEdit: {required: 'Campo Requerido'},
                    capacidadeEdit: {required: 'Campo Requerido'},
                    tipoEdit: {required: 'Campo Requerido'},
                    unidadeEdit: {required: 'Campo Requerido'},
                    nivelAlarmeEdit: {required: 'Campo Requerido'},
                    nivelCheioEdit: {required: 'Campo Requerido'},
                    tempoColetaEdit: {required: 'Campo Requerido'},
                    sensorCalibracaoEdit: {required: 'Campo Requerido'},
                    tipoSensorEdit: {required: 'Campo Requerido'},
                    dataCalibracaoEdit: {required: 'Campo Requerido'}
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
                    macCad: {required: true},
                    capacidadeCad: {required: true},
                    tipoCad: {required: true},
                    unidadeCad: {required: true},
                    nivelAlarmeCad: {required: true},
                    nivelCheioCad: {required: true},
                    tempoColetaCad: {required: true},
                    sensorCalibracaoCad: {required: true},
                    tipoSensorCad: {required: true},
                    dataCalibracaoCad: {required: true}
                },
        messages: 
                {
                    nomeCad: {required: 'Campo Requerido'},
                    macCad: {required: 'Campo Requerido'},
                    capacidadeCad: {required: 'Campo Requerido'},
                    tipoCad: {required: 'Campo Requerido'},
                    unidadeCad: {required: 'Campo Requerido'},
                    nivelAlarmeCad: {required: 'Campo Requerido'},
                    nivelCheioCad: {required: 'Campo Requerido'},
                    tempoColetaCad: {required: 'Campo Requerido'},
                    sensorCalibracaoCad: {required: 'Campo Requerido'},
                    tipoSensorCad: {required: 'Campo Requerido'},
                    dataCalibracaoCad: {required: 'Campo Requerido'}
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