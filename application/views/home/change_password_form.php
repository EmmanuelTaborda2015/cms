<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?= form_open('home/validate_password', array('class'=>'form-horizontal')); ?>

<legend>Cambiar la clave de usuario</legend>

<?= my_validation_errors(validation_errors()); ?>

<div class="control-group">
    <?= form_label('Clave Actual', 'current_password', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'password', 'name'=>'current_password', 'id'=>'current_password', 'value'=>set_value('current_password'))); ?>
</div>

<div class="control-group">
    <?= form_label('Clave Nueva', 'new_password', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'password', 'name'=>'new_password', 'id'=>'new_password', 'value'=>set_value('new_password'))); ?>
</div>
 
<div class="control-group">
    <?= form_label('Repita Nueva', 'rewrite_password', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'password', 'name'=>'rewrite_password', 'id'=>'rewrite_password', 'value'=>set_value('rewrite_password'))); ?>
</div>
 
<div class="form-actions">
    <?= form_button(array('type'=>'submit', 'content'=>'Confirmar', 'class'=>'btn btn-primary')); ?>
    <?= anchor('home/index', 'Cancelar', array('class'=>'btn')); ?>
</div>

<?= form_close(); ?>