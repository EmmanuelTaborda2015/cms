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

#called befor any of our controller being called
$hook['post_controller_constructor'] = array(
    'class' => '',
    'function' => 'autentification',
    #application/hooks/MyAccess.php
    'filename' => 'my_access.php',
    'filepath' => 'hooks',
    'params' => array()
);