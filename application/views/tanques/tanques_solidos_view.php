<div class="row">
    <div class="col-sm-12 col-md-12">        
        <?php if(!$tanques){?>
        <div class="table-responsive">
            <table class="table table-condensed">
                <caption><h2 class="text-center">Gerenciamento de Tanques Sólidos</h2></caption>
                <thead>
                    <tr>                        
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Identificação</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Peso</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Capacidade</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCad"><i class="fa fa-fw fa-plus"></i> Tanque</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4">Nenhum Tanque cadastrado.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php }else{ ?>
        <div class="table-responsive">
            <table class="table table-condensed">
                <caption><h2 class="text-center">Gerenciamento de Tanques Sólidos</h2></caption>
                <thead>
                    <tr>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Identificação</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Peso</th>
                        <th class="col-md-3" style="text-align: center; vertical-align: middle;">Capacidade</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCad"><i class="fa fa-fw fa-plus"></i> Tanque</button>   
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tanques as $t) {
                        echo '<tr>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$t->identificacao.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$t->peso.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$t->capacidade.'</td>';                        
                        echo '<td style="text-align: center; vertical-align: middle;">';                   
                        echo '<a style="margin-right: 1%" href="#modalEdit" class="btn btn-info editar" role="button" data-toggle="modal" tanque="'.$t->idTanque.'" title="Editar Tanque"><i class="fa fa-fw fa-pencil"></i></a>';                                            
                        if($this->permission->checkPermission($this->session->userdata('permissao'),'gAdministradores')){
                            if($t->status == 1){
                                echo '<a style="margin-right: 1%"href="#modalExcluir" class="btn btn-danger excluir" role="button" data-toggle="modal" idTanque="'.$t->idTanque.'" title="Excluir Tanque"><i class="fa fa-fw fa-remove"></i></a>';
                            }else{
                                 echo '<a style="margin-right: 1%"href="#modalRestaurar" class="btn btn-success restaurar" role="button" data-toggle="modal" idTanque="'.$t->idTanque.'" title="Restaurar Tanque"><i class="fa fa-fw fa-repeat"></i></a>';
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
                <h4 class="modal-title" id="ModalLabelAdd">Mon.I - Adicionar Tanque</h4>
            </div>
            <form id="formCad" action="<?php echo base_url('TanqueSolido_ctrl/adicionar'); ?>" method="post">
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
                                        <label for="identificacaoCad">Identificação<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="identificacaoCad" name="identificacaoCad" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="dataFabricacaoCad">Data de Fabricação<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="date" class="form-control" id="dataFabricacaoCad" name="dataFabricacaoCad" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="dataInspecaoCad">Data de Inspeção<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="date" class="form-control" id="dataInspecaoCad" name="dataInspecaoCad" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="dataManutencaoCad">Data de Manutenção<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="date" class="form-control" id="dataManutencaoCad" name="dataManutencaoCad" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="capacidadeCad">Capacidade em Kg<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="capacidadeCad" name="capacidadeCad" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="comprimentoCad">Comprimento em M<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="comprimentoCad" name="comprimentoCad" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="alturaCad">Altura em mm<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="alturaCad" name="alturaCad" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="larguraCad">Largura<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="larguraCad" name="larguraCad" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="nivelCad">Nivel<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="nivelCad" name="nivelCad" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="pesoCad">Peso em Kg<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="pesoCad" name="pesoCad" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="fornecedorCad">Fornecedor<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="fornecedorCad" class="form-control" name="fornecedorCad" title="Selecione um Fornecedor">
                                            <option value="">Selecione...</option>
                                            <?php
                                            foreach ($fornecedores as $f) {
                                                echo '<option value=' . $f->idEmpresa . '>' . $f->nomeFantasia . '</option>';
                                            }
                                            ?>
                                        </select>                     
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="clienteCad">Cliente<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="clienteCad" class="form-control" name="clienteCad" title="Selecione um Cliente">
                                            <option value="">Selecione...</option>
                                            <?php
                                            foreach ($clientes as $c) {
                                                echo '<option value=' . $c->idEmpresa . '>' . $c->nomeFantasia . '</option>';
                                            }
                                            ?>
                                        </select>                     
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="monitorCad">Monitor<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="monitorCad" class="form-control" name="monitorCad" title="Selecione um Monitor">
                                            <option value="">Selecione...</option>
                                            <?php
                                            foreach ($monitores as $m) {
                                                echo '<option value=' . $m->idMonitor . '>' . $m->nome . '</option>';
                                            }
                                            ?>
                                        </select>                     
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                            <label for="produtoCad">Produto<span class="required" style="color: #EE0000">*</span>: </label>
                                            <select id="produtoCad" class="form-control" name="produtoCad" title="Selecione um usuario">
                                                <option value="">Selecione...</option>
                                                <?php
                                                foreach ($produtos as $p) {
                                                    echo '<option value=' . $p->idProduto . '>' . $p->nome . '</option>';
                                                }
                                                ?>
                                            </select>                     
                                    </div>
                                  </div>
                            </div>
                           <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="statusCad">Situação<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="statusCad" class="form-control" name="statusCad" title="Selecione a situação">
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
                <h4 class="modal-title" id="ModalLabelAdd">Mon.I - Editar Tanque</h4>
            </div>
            <form id="formEdit" action="<?php echo base_url('TanqueSolido_ctrl/editar'); ?>" method="post">
                <div class="modal-body">                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" name="idTanque" id="idTanque" value=""/>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-lg-12 alert alert-info">Obrigatorio o preenchimento dos campos com asterisco (<span style="color: #EE0000">*</span>).</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="identificacaoEdit">Identificação<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="identificacaoEdit" name="identificacaoEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="dataFabricacaoEdit">Data de Fabricação<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="date" class="form-control" id="dataFabricacaoEdit" name="dataFabricacaoEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="dataInspecaoEdit">Data de Inspeção<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="date" class="form-control" id="dataInspecaoEdit" name="dataInspecaoEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="dataManutencaoEdit">Data de Manutenção<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="date" class="form-control" id="dataManutencaoEdit" name="dataManutencaoEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="capacidadeEdit">Capacidade em Kg<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="capacidadeEdit" name="capacidadeEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="comprimentoEdit">Comprimento em M<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="comprimentoEdit" name="comprimentoEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="alturaEdit">Altura em mm<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="alturaEdit" name="alturaEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="larguraEdit">Largura<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="larguraEdit" name="larguraEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="nivelEdit">Nivel<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="nivelEdit" name="nivelEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="pesoEdit">Peso em Kg<span class="required" style="color: #EE0000">*</span>: </label>
                                        <input type="text" class="form-control" id="pesoEdit" name="pesoEdit" maxlength="100"/>                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="fornecedorEdit">Fornecedor<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="fornecedorEdit" class="form-control" name="fornecedorEdit" title="Selecione um Fornecedor">
                                            <option value="">Selecione...</option>
                                            <?php
                                            foreach ($fornecedores as $f) {
                                                echo '<option value=' . $f->idEmpresa . '>' . $f->nomeFantasia . '</option>';
                                            }
                                            ?>
                                        </select>                     
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="clienteEdit">Cliente<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="clienteEdit" class="form-control" name="clienteEdit" title="Selecione um Cliente">
                                            <option value="">Selecione...</option>
                                            <?php
                                            foreach ($clientes as $c) {
                                                echo '<option value=' . $c->idEmpresa . '>' . $c->nomeFantasia . '</option>';
                                            }
                                            ?>
                                        </select>                     
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="monitorEdit">Monitor<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="monitorEdit" class="form-control" name="monitorEdit" title="Selecione um Monitor">
                                            <option value="">Selecione...</option>
                                            <?php
                                            foreach ($monitores as $m) {
                                                echo '<option value=' . $m->idMonitor . '>' . $m->nome . '</option>';
                                            }
                                            ?>
                                        </select>                     
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                            <label for="produtoEdit">Produto<span class="required" style="color: #EE0000">*</span>: </label>
                                            <select id="produtoEdit" class="form-control" name="produtoEdit" title="Selecione um usuario">
                                                <option value="">Selecione...</option>
                                                <?php
                                                foreach ($produtos as $p) {
                                                    echo '<option value=' . $p->idProduto . '>' . $p->nome . '</option>';
                                                }
                                                ?>
                                            </select>                     
                                    </div>
                                  </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="statusEdit">Situação<span class="required" style="color: #EE0000">*</span>: </label>
                                        <select id="statusEdit" class="form-control" name="statusEdit" title="Selecione a situação">
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
                <h4 class="modal-title" id="ModalLabelExcl">Mon.I - Excluir Tanque</h4>
            </div>
            <form id="formExcluir" action="<?php echo base_url('TanqueSolido_ctrl/excluir'); ?>" method="post">
                <div class="modal-body">
                    <h5 style="text-align: center">Deseja realmente excluir esse tanque ?</h5>
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
                <h4 class="modal-title" id="ModalLabelRest">Mon.I - Restaurar Tanque</h4>
            </div>
            <form id="formRest" action="<?php echo base_url('TanqueSolido_ctrl/restaurar'); ?>" method="post">
                <div class="modal-body">
                    <h5 style="text-align: center">Deseja realmente restaurar esse tanque?</h5>
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
        var tanque = $(this).attr('idTanque');        
        $("#idExcluir").val(tanque);        
    });
    
    //pega o id do funcionario que deseja restaurar e envia para o modal restaurar
    $(document).on('click', '.restaurar', function () {
        var tanque = $(this).attr('idTanque');        
        $("#idRestaurar").val(tanque);                       
    });
    
    //pega o id do funcionario que deseja editar e envia para o modal editar
    $(document).on('click', '.editar', function () {
        var tanque = $(this).attr('tanque');
        $("#idTanque").val(tanque); 
    });
    
    //carrega os dados do totem
    $('#modalEdit').on('shown.bs.modal', function () {
        var idTanque = $('#idTanque').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url('TanqueSolido_ctrl/buscaTanque');?>',
            data: 'idTanque='+idTanque,
           
            success: function (data)
            {
                
                if (data.result === true)
                {                    
                    $("#identificacaoEdit").val(data.identificacao);
                    $("#dataFabricacaoEdit").val(data.dataFabricacao);
                    $("#dataInspecaoEdit").val(data.dataInspecao);
                    $("#dataManutencaoEdit").val(data.dataManutencao);
                    $("#capacidadeEdit").val(data.capacidade);
                    $("#comprimentoEdit").val(data.comprimento);
                    $("#alturaEdit").val(data.altura);
                    $("#larguraEdit").val(data.largura);
                    $("#nivelEdit").val(data.nivel);
                    $("#pesoEdit").val(data.peso);
                    $("#fornecedorEdit").val(data.idFornecedor);
                    $("#clienteEdit").val(data.idCliente);
                    $("#monitorEdit").val(data.idMonitor);
                    $("#produtoEdit").val(data.idProduto);                    
                    $("#statusEdit").val(data.status);
                }
            }
        });
    });
    
    $('#formEdit').validate({
        
        rules:
                {
                    identificacaoEdit: {required: true},
                    dataFabricacaoEdit: {required: true},
                    dataInspecaoEdit: {required: true},
                    dataManutencaoEdit: {required: true},
                    capacidadeEdit: {required: true},
                    comprimentoEdit: {required: true},
                    alturaEdit: {required: true},
                    larguraEdit: {required: true},
                    nivelEdit: {required: true},
                    pesoEdit: {required: true},
                    fornecedorEdit: {required: true},
                    clienteEdit: {required: true},
                    monitorEdit: {required: true},
                    produtoEdit: {required: true},
                    statusEdit: {required: true}                    
                    
                },
        messages: 
                {
                    identificacaoEdit: {required: 'Campo Requerido'},
                    dataFabricacaoEdit: {required: 'Campo Requerido'},
                    dataInspecaoEdit: {required: 'Campo Requerido'},
                    dataManutencaoEdit: {required: 'Campo Requerido'},
                    capacidadeEdit: {required: 'Campo Requerido'},
                    comprimentoEdit: {required: 'Campo Requerido'},
                    alturaEdit: {required: 'Campo Requerido'},
                    larguraEdit: {required: 'Campo Requerido'},
                    nivelEdit: {required: 'Campo Requerido'},
                    pesoEdit: {required: 'Campo Requerido'},
                    fornecedorEdit: {required: 'Campo Requerido'},
                    clienteEdit: {required: 'Campo Requerido'},
                    monitorEdit: {required: 'Campo Requerido'},
                    produtoEdit: {required: 'Campo Requerido'},
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
                    identificacaoCad: {required: true},
                    dataFabricacaoCad: {required: true},
                    dataInspecaoCad: {required: true},
                    dataManutencaoCad: {required: true},
                    capacidadeCad: {required: true},
                    comprimentoCad: {required: true},
                    alturaCad: {required: true},
                    larguraCad: {required: true},
                    nivelCad: {required: true},
                    pesoCad: {required: true},
                    fornecedorCad: {required: true},
                    clienteCad: {required: true},
                    monitorCad: {required: true},
                    produtoCad: {required: true},
                    statusCad: {required: true}                    
                    
                },
        messages: 
                {
                    identificacaoCad: {required: 'Campo Requerido'},
                    dataFabricacaoCad: {required: 'Campo Requerido'},
                    dataInspecaoCad: {required: 'Campo Requerido'},
                    dataManutencaoCad: {required: 'Campo Requerido'},
                    capacidadeCad: {required: 'Campo Requerido'},
                    comprimentoCad: {required: 'Campo Requerido'},
                    alturaCad: {required: 'Campo Requerido'},
                    larguraCad: {required: 'Campo Requerido'},
                    nivelCad: {required: 'Campo Requerido'},
                    pesoCad: {required: 'Campo Requerido'},
                    fornecedorCad: {required: 'Campo Requerido'},
                    clienteCad: {required: 'Campo Requerido'},
                    monitorCad: {required: 'Campo Requerido'},
                    produtoCad: {required: 'Campo Requerido'},
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
    
        
});
</script>