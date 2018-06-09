<div class="row">
    <div class="col-sm-12 col-md-12">        
        <?php if(!$recargas){?>
        <div class="table-responsive">
            <table class="table table-condensed">
                <caption><h2 class="text-center">Gerenciamento de Recargas</h2></caption>
                <thead>
                    <tr>
                        <th class="col-md-1" style="text-align: center; vertical-align: middle;">ID</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Cliente</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Fornecedor</th>
                        <th class="col-md-1" style="text-align: center; vertical-align: middle;">Monitor</th>                        
                        <th class="col-md-1" style="text-align: center; vertical-align: middle;">Data</th>
                        <th class="col-md-1" style="text-align: center; vertical-align: middle;">Carga</th>
                        <th class="col-md-1" style="text-align: center; vertical-align: middle;">Situação</th>
                        <th class="col-md-1" style="text-align: center; vertical-align: middle;">
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="8">Nenhuma recarga cadastrada.</td>
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
                        <th class="col-md-1" style="text-align: center; vertical-align: middle;">ID</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Cliente</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Fornecedor</th>
                        <th class="col-md-1" style="text-align: center; vertical-align: middle;">Monitor</th>                       
                        <th class="col-md-1" style="text-align: center; vertical-align: middle;">Data</th>
                        <th class="col-md-1" style="text-align: center; vertical-align: middle;">Carga</th>
                        <th class="col-md-1" style="text-align: center; vertical-align: middle;">Situação</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recargas as $r) {
                        echo '<tr>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$r->idRecarga.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$r->cliente.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$r->fornecedor.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$r->nome.'</td>';                        
                        echo '<td style="text-align: center; vertical-align: middle;">'.date("d/m/Y", strtotime($r->data)).'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$r->volumeRecarga.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">';
                            echo ($r->situacaoRecarga == 2)? "Fechada" : "Solicitada";
                        echo '</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">';                   
                        echo '<a style="margin-right: 1%" href="#modalTransportes" class="btn btn-warning exibir" role="button" data-toggle="modal" recarga="'.$r->idRecarga.'" title="Exibir Transportes"><i class="fa fa-fw fa-truck"></i></a>';
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
<!-- Transporte -->
<div id="modalTransportes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAdd">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ModalLabelTransporte">Mon.I - Lista Transportes da Recarga</h4>
            </div>              
            <div class="modal-body">                     
                <input type="hidden" name="idRecarga" id="idRecarga" value=""/>                  
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive">                                
                            <!-- Table -->
                            <table class="table table-condensed" id="listaTransporte">
                                <!-- <caption><h2 class="text-center">Gerenciamento de Permissões</h2></caption> -->
                                <thead>
                                    <tr>
                                        <th class="col-md-4" style="text-align: center; vertical-align: middle;">Placa</th>
                                        <th class="col-md-4" style="text-align: center; vertical-align: middle;">Modelo</th>
                                        <th class="col-md-4" style="text-align: center; vertical-align: middle;">Tara</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">                       
                    <button type="button" id="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>         

                </div>
            </div>
        </div>
    </div>
</div>                    


<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>

<script type="text/javascript">

$(document).ready(function () {
   
    //pega o id da recarga que deseja exibir os transportes
    $(document).on('click', '.exibir', function () {
        var recarga = $(this).attr('recarga');
        $("#idRecarga").val(recarga);         
    });
   
    //carrega os dados do totem
    $('#modalTransportes').on('shown.bs.modal', function () {
        var idRecarga = $('#idRecarga').val();
        
       // alert(idRecarga);
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: '<?php echo base_url('Recarga_ctrl/buscaTransportes');?>',
            data: 'idRecarga='+idRecarga,
            success: function (data)
            {
                if (data)
                {
                    $('#listaTransporte tbody').html(data);                    
                }
            }
        });
    });
});
</script>    