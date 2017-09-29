<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?= form_open('user/insert', array('class'=>'form-horizontal')); ?>

<legend>Crear registro</legend>

<!--Format possible errors-->
<?= my_validation_errors(validation_errors()); ?>

<div class="control-group">
    <?= form_label('Nombre: ', 'name', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'text', 'name'=>'name', 'id'=>'name', 'value'=>set_value('name')));?>
</div>

<div class="control-group">
    <?= form_label('Login: ', 'login', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'text', 'name'=>'login', 'id'=>'login', 'value'=>set_value('login')));?>
</div>

<div class="control-group">
    <?= form_label('eMail: ', 'email', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'email', 'name'=>'email', 'id'=>'email', 'value'=>set_value('email')));?>
</div>

<div class="control-group">
    <?= form_label('Clave', 'password', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'password', 'name'=>'password', 'id'=>'password', 'value'=>set_value('password'))); ?>
</div>
 
<div class="control-group">
    <?= form_label('Repita la Clave', 'rewrite_password', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'password', 'name'=>'rewrite_password', 'id'=>'rewrite_password', 'value'=>set_value('rewrite_password'))); ?>
</div>

<div class="control-group">
    <?= form_label('Profile: ', 'profile_id', array('class'=>'control-label')); ?>
    <!--profile_id => profile_name-->
    <?= form_dropdown('profile_id', $profile, 1, ''); ?>
</div>

<div class="form-actions">
    <?= form_button(array('type'=>'submit', 'content'=>'Acertar', 'class'=>'btn btn-primary')); ?>
    <?= anchor('user/index', 'Cancelar', array('class'=>'btn')); ?>
</div>

<?= form_close(); ?>