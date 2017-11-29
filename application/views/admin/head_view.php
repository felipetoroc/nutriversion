<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Nutrilife | Bienvenido Administrador</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>css/foundation.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 
	<script src="<?php echo base_url() ?>js/vendor/modernizr.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
  	<script src="<?php echo base_url() ?>js/validate-additional-methods.js"></script>
  	 <script src="<?php echo base_url() ?>js/jquery.dataTables.min.js"></script>
	<script>
		 $.validator.addMethod("noSpace", function(value, element) { 
			  return value.indexOf(" ") < 0 && value != ""; 
		 }, "No use espacios y no deje vacío el campo por favor");

		jQuery.validator.addMethod(
		    "dateUS",
		    function(value, element) {
		        var check = false;
		        var re = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
		        if( re.test(value)){
		            var adata = value.split('/');
		            var dd = parseInt(adata[0],10);
		            var mm = parseInt(adata[1],10);
		            var yyyy = parseInt(adata[2],10);
		            var xdata = new Date(yyyy,mm-1,dd);
		            if ( ( xdata.getFullYear() == yyyy ) && ( xdata.getMonth () == mm - 1 ) && ( xdata.getDate() == dd ) )
		                check = true;
		            else
		                check = false;
		        } else
		            check = false;
		        return this.optional(element) || check;
		    },
		    "Porfavor ingresar una fecha valida en el formato dd/mm/yyyy"
		);
		$.extend(jQuery.validator.messages, {
			  required: "Este campo es obligatorio.",
			  remote: "Por favor, rellena este campo.",
			  email: "Por favor, escribe una dirección de correo válida",
			  url: "Por favor, escribe una URL válida.",
			  date: "Por favor, escribe una fecha válida.",
			  dateISO: "Por favor, escribe una fecha (ISO) válida.",
			  number: "Por favor, escribe un número entero válido.",
			  digits: "Por favor, escribe sólo dígitos.",
			  creditcard: "Por favor, escribe un número de tarjeta válido.",
			  equalTo: "Por favor, escribe el mismo valor de nuevo.",
			  accept: "Por favor, escribe un valor con una extensión aceptada.",
			  maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
			  minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
			  rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
			  range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
			  max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
			  min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}."),
			  lettersonly: jQuery.validator.format("El campo acepta solo letras")
		});
	</script>
    
  
</head>
<body>

