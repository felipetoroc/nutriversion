<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>NutriVersion | Bienvenido Profesional</title>
    
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
  	<script src="<?php echo base_url() ?>js/validate-additional-methods.js"></script>
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
</head>
<body>

