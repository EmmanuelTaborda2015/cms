<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?= form_open('user/update', array('class'=>'form-horizontal')); ?>

<legend>Actualizar registro</legend>

<!--Format possible errors-->
<?= my_validation_errors(validation_errors()); ?>

<div class="control-group">
    <?= form_label('ID: ', 'id', array('class'=>'control-label')); ?>
    <!--Hidden id to user, it musn't be edited-->
    <span class="uneditable-input"> <?= $register->id; ?> </span>
    <?= form_hidden('id', $register->id);?>
</div>

<div class="control-group">
    <?= form_label('Nombre: ', 'name', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'text', 'name'=>'name', 'id'=>'name', 'value'=>$register->name));?>
</div>

<div class="control-group">
    <?= form_label('Login: ', 'login', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'text', 'name'=>'login', 'id'=>'login', 'value'=>$register->login));?>
</div>

<div class="control-group">
    <?= form_label('eMail: ', 'email', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'email', 'name'=>'email', 'id'=>'email', 'value'=>$register->email));?>
</div>

<div class="control-group">
    <?= form_label('Profile: ', 'profile_id', array('class'=>'control-label')); ?>
    <!--profile_id => profile_name-->
    <?= form_dropdown('profile_id', $profile, $register->profile_id); ?>
</div>

<div class="control-group">
    <?= form_label('Creado: ', 'created', array('class'=>'control-label')); ?>
    <!--Hidden created field to user, it couldn't be edited-->
    <span class="uneditable-input"> <?= date("d/m/Y - H:i", strtotime($register->created)); ?> </span>
    <?= form_hidden('created', $register->created);?>
</div>

<div class="control-group">
    <?= form_label('Modificado: ', 'updated', array('class'=>'control-label')); ?>
    <!--Hidden updated field to user, it's updated by the system-->
    <span class="uneditable-input"> <?= date("d/m/Y - H:i", strtotime($register->updated)); ?> </span>
    <?= form_hidden('updated', $register->updated);?>
</div>

<div class="form-actions">
    <?= form_button(array('type'=>'submit', 'content'=>'Acertar', 'class'=>'btn btn-primary')); ?>
    <?= anchor('user/index', 'Cancelar', array('class'=>'btn')); ?>
    <?= anchor('user/delete/' . $register->id, 'Eliminar', array('class'=>'btn btn-warning', 'onClick'=>"return confirm('¿Está seguro que desea eliminar el campo?')")); ?>
</div>

<?= form_close(); ?>