<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?= form_open('home/user_register', array('class'=>'form-horizontal')); ?>

<legend>Ingreso al sistema</legend>

<?= my_validation_errors(validation_errors()); ?>

<div class="control-group">
    <?= form_label('Usuario: ', 'login', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'text', 'name'=>'login', 'id'=>'login', 'placeholder' => 'Usuario...', 'value'=>set_value('login')));?>
</div>

<div class="control-group">
    <?= form_label('Password: ', 'password', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'password', 'name'=>'password', 'id'=>'password', 'value'=>set_value('password')));?>
</div>

<div class="form-actions">
    <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
    <?= anchor('user/create', 'Registro', array('class'=>'btn')); ?>
    <?= anchor('home/index', 'Cancelar', array('class'=>'btn')); ?>
</div>

<?= form_close(); ?>