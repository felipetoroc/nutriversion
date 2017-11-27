<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>NutriVersión | Bienvenido Paciente</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>css/foundation.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="<?php echo base_url() ?>js/Chart.js"></script>
    <script src="<?php echo base_url() ?>js/jquery-1.11.3.js"></script>
    <script src="<?php echo base_url() ?>js/jquery-ui.js"></script>
    <script src="<?php echo base_url() ?>js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
  	<script src="<?php echo base_url() ?>js/validate-additional-methods.js"></script>
	<script src="<?php echo base_url() ?>js/vendor/modernizr.js"></script>
    <script src="<?php echo base_url() ?>js/graficoPeso.js"></script>
    <script src="<?=base_url()?>/js/foundation.min.js"></script>
    <!--<script src="utils.js"></script> -->
    <script>
		 $.validator.addMethod("noSpace", function(value, element) { 
			  return value.indexOf(" ") < 0 && value != ""; 
		 }, "No use espacios y no deje vacío el campo por favor");

		 $.validator.addMethod('decimal', function(value, element) {
		  return this.optional(element) || /^((\d+(\\.\d{0,2})?)|((\d*(\.\d{1,2}))))$/.test(value);
		 }, "Porfavor ingrese un peso correcto en el formato 000.0");

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
    <style type= "text/css">
	        #chart-container{
				width: 640px;
				height:auto;
			}
	</style>
</head>
<body>
<div class="row">