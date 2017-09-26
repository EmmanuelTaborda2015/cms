<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?= form_open_multipart('upload_file/insert', 'id="file"', array('class'=>'form-horizontal'));?>

<legend>Cargar Archivo</legend>

<!--Format possible errors-->
<?= my_validation_errors(validation_errors()); ?>

<div class="control-group">
    <?= form_label('Nombre de Archivo: ', 'name', array('class'=>'control-label')); ?>
    <?= form_dropdown('id_type_file', $type_file, 1);?>
</div>

<div class="control-group">
    <?= form_label('Usuario: ', 'user', array('class'=>'control-label')); ?>
    <?= form_dropdown('id', $user, 1);?>
</div>

<div class="control-group">
    <?= form_label('Archivo: ', 'file', array('class'=>'control-label')); ?>
    <input type="file" name="file" size="20" />
</div>

<div class="form-actions">
    <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
    <?= anchor('upload_file/index', 'Cancelar', array('class'=>'btn')); ?>
</div>

<?= form_close(); ?>