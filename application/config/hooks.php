<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['post_controller_constructor'][] = [
    'class'    => 'UsuarioNoIniciado',
    'function' => 'verificarAcceso',
    'filename' => 'UsuarioNoIniciado.php',
    'filepath' => 'hooks',
    'params' => []
];
$hook['post_controller_constructor'][] = [
    'class'    => 'UsuarioIniciadoPaciente',
    'function' => 'verificarAcceso',
    'filename' => 'UsuarioIniciadoPaciente.php',
    'filepath' => 'hooks',
    'params' => []
];
/*$hook['post_controller_constructor'][] = [
    'class'    => 'UsuarioIniciadoProfesional',
    'function' => 'verificarAcceso',
    'filename' => 'UsuarioIniciadoProfesional.php',
    'filepath' => 'hooks',
    'params' => []
];*/

?>