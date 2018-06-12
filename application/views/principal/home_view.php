
<img class="img-responsive" src="<?php echo base_url('assets/img/tela.png');?>" alt="layout" usemap="layoutmap"/>

<map name="layoutmap">
    <!-- tanques solidos --->
    <area shape="rect" coords="316,115,362,204" href="<?php echo base_url("TanqueSolido_ctrl")?>" alt="Solidos1"/>
    <area shape="rect" coords="618,422,665,510" href="<?php echo base_url("TanqueSolido_ctrl")?>" alt="Solidos2"/>
    <area shape="rect" coords="833,146,883,234" href="<?php echo base_url("TanqueSolido_ctrl")?>" alt="Solidos3"/>
    <area shape="rect" coords="893,113,945,200" href="<?php echo base_url("TanqueSolido_ctrl")?>" alt="Solidos4"/>
    <area shape="rect" coords="954,79,1001,171" href="<?php echo base_url("TanqueSolido_ctrl")?>" alt="Solidos5"/>
    
    <!-- tanques liquidos -->
    <area shape="rect" coords="507,490,556,563" href="<?php echo base_url("TanqueLiquido_ctrl")?>" alt="Liquido1"/>
    <area shape="rect" coords="563,534,609,607" href="<?php echo base_url("TanqueLiquido_ctrl")?>" alt="Liquido2"/>
    <area shape="rect" coords="618,583,666,657" href="<?php echo base_url("TanqueLiquido_ctrl")?>" alt="Liquido3"/>
    
    <!-- tanques Gasosos -->
    <area shape="rect" coords="373,140,422,225" href="<?php echo base_url("TanqueGasoso_ctrl")?>" alt="Gasoso1"/>
    <area shape="rect" coords="428,171,471,259" href="<?php echo base_url("TanqueGasoso_ctrl")?>" alt="Gasoso2"/>
    <area shape="rect" coords="697,501,747,587" href="<?php echo base_url("TanqueGasoso_ctrl")?>" alt="Gasoso3"/>
    
    <!-- Clientes -->
    <area shape="rect" coords="6,353,87,425" href="<?php echo base_url("Cliente_ctrl")?>" alt="Cliente1"/>
    <area shape="rect" coords="1151,360,1227,429" href="<?php echo base_url("Cliente_ctrl")?>" alt="Cliente2"/>
    
    <!-- Fornecedor -->
    <area shape="rect" coords="399,700,444,768" href="<?php echo base_url("Fornecedor_ctrl")?>" alt="Fornecedor1"/>
    
    <!-- Transportes -->
    <area shape="poly" coords="478,237,505,219,503,208,584,168,615,182,617,236,517,293,480,273" href="<?php echo base_url("Transporte_ctrl")?>" alt="Transporte1"/>
    <area shape="poly" coords="770,370,772,320,898,243,939,270,939,328,823,400" href="<?php echo base_url("Transporte_ctrl")?>" alt="Transporte2"/>
    <area shape="poly" coords="390,683,391,633,494,573,530,596,533,639,427,693" href="<?php echo base_url("Transporte_ctrl")?>" alt="Transporte3"/>
</map>

<script src="<?php echo base_url('assets/js/imageMapResizer.min.js');?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('map').imageMapResize();
});


</script>