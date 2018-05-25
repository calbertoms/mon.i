<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mon.I</title> 
	
	<!-- core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/fonts/css/font-awesome.min.css');?>" rel="stylesheet">
    
    
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script> 
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    
</head><!--/head-->

<body>
    


	<div class="login">
	  <div class="login-triangle"></div>
	
	  <h2 class="login-header">Log in</h2>
	
	  <form id="formLogin" class="login-container">
	        <p class="required"><input type="text" placeholder="Usuario ou Email" name="useremail"></p>
	        <p class="required"><input type="password" placeholder="Senha" name="password"></p>
	    <p><input type="submit" value="Entrar"></p>
	  </form>
	</div>

    
    <!-- Button trigger modal -->
    <button type="button" id="call-modal" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="display: none ">
    notification
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Mon.I</h4>
          </div>
          <div class="modal-body">
            <h5 style="text-align: center">Os dados de acesso estão incorretos ou o usuário está desativado, por favor tente novamente!</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
    
</body>

<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>

<script type="text/javascript">
    
$(document).ready(function () {
    
    
    $('#formLogin').validate({
     rules : {
           useremail:{ required: true},
           password:{ required: true}

     },
     messages: {
           useremail :{ required: 'Campo Requerido.'},
           password:{ required: 'Campo Requerido.',
                      maxlength: 'Numéro máximo de caracteres é 20'}

     },
    submitHandler: function( form ){       
          var dados = $( form ).serialize();


         $.ajax({
           type: "POST",
           url: "<?php echo base_url('Principal/verificarLogin');?>",
           data: dados,
           dataType: 'json',
           success: function(data)
           {                   
             if(data.result === true){
                 window.location.href = "<?php echo base_url('Principal');?>";
             }
             else{
                 $('#call-modal').trigger('click');
             }
           }
           });

           return false;
     },

    highlight: function(element) {
        $(element).closest('.required').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.required').removeClass('has-error');
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

<style>

body {
  background: #456;
  font-family: 'Open Sans', sans-serif;
}

.login {
  width: 400px;
  margin: 16px auto;
  font-size: 16px;
}

/* Reset top and bottom margins from certain elements */
.login-header,
.login p {
  margin-top: 0;
  margin-bottom: 0;
}

/* The triangle form is achieved by a CSS hack */
.login-triangle {
  width: 0;
  margin-right: auto;
  margin-left: auto;
  border: 12px solid transparent;
  border-bottom-color: #28d;
}

.login-header {
  background: #28d;
  padding: 20px;
  font-size: 1.4em;
  font-weight: normal;
  text-align: center;
  text-transform: uppercase;
  color: #fff;
}

.login-container {
  background: #ebebeb;
  padding: 12px;
}

/* Every row inside .login-container is defined with p tags */
.login p {
  padding: 12px;
}

.login input {
  box-sizing: border-box;
  display: block;
  width: 100%;
  border-width: 1px;
  border-style: solid;
  padding: 16px;
  outline: 0;
  font-family: inherit;
  font-size: 0.95em;
}

.login input[type="email"],
.login input[type="password"] {
  background: #fff;
  border-color: #bbb;
  color: #555;
}

/* Text fields' focus effect */
.login input[type="email"]:focus,
.login input[type="password"]:focus {
  border-color: #888;
}

.login input[type="submit"] {
  background: #28d;
  border-color: transparent;
  color: #fff;
  cursor: pointer;
}

.login input[type="submit"]:hover {
  background: #17c;
}

/* Buttons' focus effect */
.login input[type="submit"]:focus {
  border-color: #05a;
}
    
</style>

</html>