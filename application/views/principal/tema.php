<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>GC Automação</title> 
	
	<!-- core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/fonts/css/font-awesome.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/estilos.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/responsive.css');?>" rel="stylesheet">
    
    
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script> 
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    
</head><!--/head-->

<body id="top">
    
    <nav id="navbar-acesso" class="navbar navbar-default navbar-fixed-top" role="banner">
        <div class="container">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand" href="<?php echo base_url();?>"><img class="img-responsive" src="<?php echo base_url('assets/img/logo.png');?>" alt="logo"></a>-->
            </div>
            
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li <?php if (isset($menuprincipal)) { echo 'class="active"'; } ?> ><a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Home</a></li>
                    
                    <!--<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'gGestaoDispositivos')){ ?>
                        <li class="dropdown <?php if (isset($menudispositivos)) { echo 'active'; } ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i> Gestão Dispositivos <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li <?php if (isset($dis_gclix_i)) { echo 'class="active"'; } ?> ><a href="<?php echo base_url('Dispositivos/LixI');?>">GC Lix.I</a></li>
                                <li <?php if (isset($dis_gcesc_i)) { echo 'class="active"'; } ?> ><a href="<?php echo base_url('Dispositivos/EscI');?>">GC Esc.I</a></li>
                                <li <?php if (isset($dis_gctel_i)) { echo 'class="active"'; } ?> ><a href="<?php echo base_url('Dispositivos/TelI');?>">GC Tel.I</a></li>
                                <li class="dropdown dropdown-submenu <?php if (isset($submenulocais)) { echo 'active'; } ?>">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Localização</a>
                                    <ul class="dropdown-menu">
                                        <li <?php if (isset($locais_setores)) { echo 'class="active"'; } ?> ><a href="<?php echo base_url('Setores');?>">Setores</a></li>
                                        <li <?php if (isset($locais_pisos)) { echo 'class="active"'; } ?> ><a href="<?php echo base_url('Pisos');?>">Pisos</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown dropdown-submenu <?php if (isset($submenugrupos)) { echo 'active'; } ?>">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Grupos</a>
                                    <ul class="dropdown-menu">
                                        <li <?php if (isset($gr_gclix_i)) { echo 'class="active"'; } ?> ><a href="<?php echo base_url('Grupos/grupoLixI');?>">GC Lix.I</a></li>
                                        <li <?php if (isset($gr_gcesc_i)) { echo 'class="active"'; } ?> ><a href="<?php echo base_url('Grupos/grupoEscI');?>">GC Esc.I</a></li>
                                        <li <?php if (isset($gr_gctel_i)) { echo 'class="active"'; } ?> ><a href="<?php echo base_url('Grupos/grupoTelI');?>">GC Tel.I</a></li> 
                                    </ul>
                                </li>
                                <li class="dropdown dropdown-submenu <?php if (isset($submenuleituras)) { echo 'active'; } ?> ">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Leituras</a>
                                    <ul class="dropdown-menu">
                                        <li <?php if (isset($lei_gclix_i)) { echo 'class="active"'; } ?> ><a href="<?php echo base_url('Leituras/LixI');?>">GC Lix.I</a></li>
                                        <li <?php if (isset($lei_gcesc_i)) { echo 'class="active"'; } ?> ><a href="<?php echo base_url('Leituras/EscI');?>">GC Esc.I</a></li>
                                        <li <?php if (isset($lei_gctel_i)) { echo 'class="active"'; } ?> ><a href="<?php echo base_url('Leituras/TelI');?>">GC Tel.I</a></li>                            
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'gGraficos')){ ?>
                        <li class="dropdown <?php if (isset($menugraficos)) { echo 'active'; } ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-area-chart"></i> Gráficos <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li <?php if (isset($graf_gclix_i)) { echo 'class="active"'; } ?> ><a href="<?php echo base_url('Graficos/LixI');?>">GC Lix.I</a></li>
                                <li <?php if (isset($graf_gcesc_i)) { echo 'class="active"'; } ?> ><a href="<?php echo base_url('Graficos/EscI');?>">GC Esc.I</a></li>
                                <li <?php if (isset($graf_gctel_i)) { echo 'class="active"'; } ?> ><a href="<?php echo base_url('Graficos/TelI');?>">GC Tel.I</a></li>                            
                            </ul>
                        </li> 
                    <?php } ?>
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'gConfiguracoes')){ ?>
                        <li class="dropdown <?php if (isset($menuconfiguracao)) { echo 'active'; } ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i> Configurações <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li <?php if (isset($conf_usuarios)) { echo 'class="active"'; } ?> ><a href="<?php echo base_url('Usuarios');?>">Usuários</a></li>
                                <li <?php if (isset($conf_permissoes)) { echo 'class="active"'; } ?> ><a href="<?php echo base_url('Permissoes');?>">Permissões</a></li>                           
                            </ul>
                        </li> 
                    <?php } ?>
                    <li <?php if (isset($menusobre)) { echo 'class="active"'; } ?> ><a href="<?php echo base_url('Sobre');?>"><i class="fa fa-book"></i> Sobre</a></li>-->
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header"><?php echo $this->session->userdata('usuario');?></li>
                            <li><a href="#modalAlterar" data-toggle="modal" data-target="#modalAlterar"><i class="fa fa-cog"></i> Alterar Senha</a></li> 
                            <li><a href="<?php echo base_url('Principal/sair');?>"><i class="fa fa-sign-out"></i> Sair</a></li>                          
                        </ul>
                    </li>
                    
                </ul>
            </div>

        </div>
    </nav>
    
    
    <div class="container">
        
        <div class="row">

            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 text-center">

                <ol class="breadcrumb">
                    <li class="breadcrumb-item <?php if (($this->uri->segment(1) == null) && ($this->uri->segment(2) == null)) {
                        echo 'active';
                        } ?>">
                        <i class="fa fa-home"></i> <a href="<?php echo base_url() ?>" title="Principal"> Principal</a>
                    </li>
                        <?php if ($this->uri->segment(1) != null) { ?>
                        <li class="breadcrumb-item <?php if (($this->uri->segment(2) == null)) {
                            echo 'active';
                        } ?>">
                            <?php if ($this->uri->segment(2) == null) { ?>
                            <?php echo ucfirst($this->uri->segment(1)); ?>
                        <?php } else { ?>
                                <a href="<?php echo base_url($this->uri->segment(1).'/'.$this->uri->segment(2)) ?>" title="<?php echo ucfirst($this->uri->segment(1)); ?>"><?php echo ucfirst($this->uri->segment(1)); ?></a>
                        <?php } ?>
                        </li>
                        <?php } ?>
                        <?php if ($this->uri->segment(2) != null) { ?>
                        <li class="breadcrumb-item active">
                                <!--<a href="<?php echo base_url() . $this->uri->segment(2) ?>" title="<?php echo ucfirst($this->uri->segment(2)); ?>"><?php echo ucfirst($this->uri->segment(2)); ?></a>-->
                                <?php echo ucfirst($this->uri->segment(2)); ?>
                        </li>
                        <?php } ?>
                </ol> 
                

            </div>

        </div>

        <div class="row">

            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">

                <?php if($this->session->flashdata('error') != null){?>
                        <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i> <?php echo $this->session->flashdata('error');?>
                        </div>
                <?php }?>

                <?php if($this->session->flashdata('success') != null){?>
                        <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i> <?php echo $this->session->flashdata('success');?>
                        </div>
                <?php }?>

                <?php if(isset($view)){$this->load->view($view);}?>
                

            </div>

        </div>
        
        <!-- Modal -->
        <!-- Alterar Senha -->
        <div id="modalAlterar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalLabelAlt" style="">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="ModalLabelAlt">GC Automação - Alterar Senha</h4>
                    </div>
                    <form id="formAlterarSenha" action="<?php echo base_url('Principal/alterarSenha') ?>" method="post">            
                        <div class="modal-body">                    
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="col-lg-12 alert alert-info">Obrigatorio o preenchimento dos campos com asterisco (<span style="color: #EE0000">*</span>).</div>
                                            <input type="hidden" name="url" value="<?php echo $actual_link ="http://$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI]"; ?>"/>
                                        </div>
                                    </div>                            
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="oldSenha">Senha Atual<span class="required" style="color: #EE0000">*</span>: </label>
                                                <input type="password" class="form-control" id="oldSenha" name="oldSenha" maxlength="20"/>                      
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="novaSenha">Nova Senha<span class="required" style="color: #EE0000">*</span>: </label>
                                                <input type="password" class="form-control" id="novaSenha" name="novaSenha" maxlength="20"/>                      
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="confirmaSenha">Confirmar Senha<span class="required" style="color: #EE0000">*</span>: </label>
                                                <input type="password" class="form-control" id="confirmaSenha" name="confirmaSenha" maxlength="20"/>                      
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group">                       
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button class="btn btn-primary">Alterar </button>                       
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        

    </div>
  
    <footer class="navbar  navbar-inverse navbar-fixed-bottom"> 
        <div class="container">
            <div class="navbar-text">
                <p> ©  Monitores Inteligentes Mon.I - <?php echo date('Y'); ?> - Todos os Direitos Reservados.</p>
            </div>
        </div>
    </footer>
    
    <a class="scroll-to-top rounded" href="#top"> 
        <i class="fa fa-chevron-up"></i>
    </a>
    
</body>
</html>

<script type="text/javascript">
$(document).ready(function () {
    
    // Scroll to top button appear
    $(document).scroll(function() {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });

    // Smooth scrolling using jQuery easing
    $(document).on('click', 'a.scroll-to-top', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        event.preventDefault();
    });
    
    $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
            event.preventDefault(); 
            event.stopPropagation(); 
            $(this).parent().siblings().removeClass('open');
            $(this).parent().toggleClass('open');
    });
    
    
     $('#formAlterarSenha').validate({
      rules : {
            oldSenha:{ required: true},
            novaSenha:{ required: true},
            confirmaSenha:{ required: true,
                            equalTo: '#novaSenha'}

      },
      messages: {
            oldSenha :{ required: 'Campo Requerido.'},
            novaSenha :{ required: 'Campo Requerido.'},
            confirmaSenha:{ required: 'Campo Requerido.',
                            equalTo: 'As senhas se diferem'}


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
