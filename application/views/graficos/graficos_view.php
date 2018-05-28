<div class="row">
    <div class="col-sm-12 col-md-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Gráficos de Monitoramento Mon.I
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form method="post" id="gerarGrafico">
                    <div class="row">
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <label for="monitor">Monitores<span class="required" style="color: #EE0000">*</span>:</label>
                                <select name="monitor" id="dispositivo" class="form-control">
                                    <option value="">Selecione...</option>
                                    <?php
                                    foreach ($monitor as $m) {
                                            
                                        echo '<option value=' . $m->getId() . '>' . $m->getNome() . '</option>';
                                            
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <label for="tipoGrafico">Gráfico:<span class="required" style="color: #EE0000">*</span>:</label>
                                <select name="tipoGrafico" id="tipoGrafico" class="form-control">
                                    <option value="">Selecione...</option>
                                    <option value="0">Nível</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <label for="dataDe" class="control-label">Data Inicial<span class="required" style="color: #EE0000;">*</span>:</label>
                                <div class="controls">
                                    <input name="dataDe" type="date" id="dataDe" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <label for="dataPara" class="control-label">Data Final<span class="required" style="color: #EE0000;">*</span>:</label>
                                <div class="controls">
                                    <input name="dataPara" type="date" id="dataPara" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-3 col-md-offset-4">
                            <button class="btn btn-primary form-control" type="submit"><i class="fa fa-bar-chart-o fa-fw"></i> Gerar</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.panel-body -->
        </div>        

    </div>
</div>

<!--grafico-->
<div class="row" style="margin-top: 0; display: none;" id="panelGrafico" >

    <div class="col-sm-12 col-md-12 col-lg-12">
        
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> <span id="tituloPanel"></span>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12" id="dados" style="display: none;">
                        
                    </div>
                    <div class="col-md-12" id="semDados" style="display: none;">
                        <label>Infelizmente Não existem dados para essa consulta, tente outra !!!</label>
                    </div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        
    </div>
    
</div>



<script src="<?php echo base_url('assets/js/chart.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>

<script type="text/javascript">
    
$(document).ready(function () {
    
    //faz acesso via ajasx
    $('#gerarGrafico').validate({
    
        rules: {
                monitor: {required: true},
                tipoGrafico: {required: true},
                dataDe: {required: true},
                dataPara: {required: true}
        },
        messages: {
                monitor: {required: 'Campo Requerido.'},
                tipoGrafico: {required: 'Campo Requerido.'},
                dataDe: {required: 'Campo Requerido.'},
                dataPara: {required: 'Campo Requerido.'}

        },
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function(form){
            
            var dados = $(form).serialize();
			$("#dados").html('');
			$("#dados").append('<canvas id="grafico"></canvas>');

            $.ajax({
               type: "POST",
               url: "<?php echo base_url('Principal_ctrl/geraGrafico'); ?>",
               data: dados,
               dataType: 'text',
               success: function (data)
               {
                    
                    var result = $.parseJSON(data);
                    var tipo = '';
                    
                    if (result['labels'].length > 0){
                        
                        switch(parseInt($('#tipoGrafico').val())){
                            
                            case 0:

                                tipo = 'Nível';

                                break;
                            
                        }
                        
                        $('#panelGrafico').show();
                        $('#tituloPanel').text(tipo);
                        $('#dados').show();
                        $('#semDados').hide();

                        plotGrafico(result['labels'],result['dados'],tipo);
                        
                        
                    }
                    //não existe dados
                    else{
                        
                        $('#tituloPanel').text('Não existem dados !!!');
                        $('#dados').hide();
                        $('#panelGrafico').show();
                        $('#semDados').show();
                        
                    }

               },
               error: function(e) 
               {

                   alert('Erro: ' + e);

               }

           });

            return false;
        }
    });
    
    function plotGrafico(labels,dados,tipo){

        var ctx = document.getElementById("grafico").getContext('2d');
        var data = {
            labels: labels,
            datasets: [
                {
                    label: tipo,
                    display: true,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255,99,132,1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1,
                    data: dados
                }
            ]
        };

        var options = {
            responsive:true
        };

        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: options
        });
        
    }
    
        
});
</script>