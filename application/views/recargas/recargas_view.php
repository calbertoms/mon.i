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
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Transporte</th>
                        <th class="col-md-1" style="text-align: center; vertical-align: middle;">Data</th>
                        <th class="col-md-1" style="text-align: center; vertical-align: middle;">Carga</th>
                        <th class="col-md-1" style="text-align: center; vertical-align: middle;">Status</th>
                        <th class="col-md-1" style="text-align: center; vertical-align: middle;">
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="9">Nenhuma recarga cadastrada.</td>
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
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">Transporte</th>
                        <th class="col-md-1" style="text-align: center; vertical-align: middle;">Data</th>
                        <th class="col-md-1" style="text-align: center; vertical-align: middle;">Carga</th>
                        <th class="col-md-1" style="text-align: center; vertical-align: middle;">Status</th>
                        <th class="col-md-2" style="text-align: center; vertical-align: middle;">
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recargas as $r) {
                        echo '<tr>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$r->idRecarga.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$r->nomeCliente.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$r->nomeFornecedor.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$r->nomeMonitor.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$r->placa.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.date("d/m/Y", strtotime($r->data)).'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$r->volumeRecarga.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">'.$r->status.'</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">';                   
                        echo '<a style="margin-right: 1%" href="#modalEdit" class="btn btn-info editar" role="button" data-toggle="modal" permissao="'.$p->idPermissao.'" title="Editar Permissão"><i class="fa fa-fw fa-pencil"></i></a>';                                            
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