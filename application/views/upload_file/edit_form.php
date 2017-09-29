<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!--Format possible errors-->
<?= my_validation_success($this->session->flashdata('message')); ?>

<?= my_validation_alert($this->session->flashdata('alert')); ?>

<?= my_validation_errors(validation_errors()); ?>

<?= form_open_multipart('upload_file/update', 'id="file"', array('class'=>'form-horizontal'));?>

<div class="page-header">
    <h1>Actualizar Archivo <small> Archivos usuario</small></h1>
</div>


<div class="control-group">
    <?= form_label('Nombre de Archivo: ', 'name', array('class'=>'control-label'));?>
    <?= form_dropdown('name', array("" => "Seleccione ...") + $type_file, $register->type_file, ' id="name" class="form-control" disabled=disabled');?>
</div>

<div class="control-group">
    <?= form_label('Usuario: ', 'user', array('class'=>'control-label')); ?>
    <?= form_dropdown('user', array("" => "Seleccione ...") + $user, $register->owner, ' id="user" class="form-control" disabled=disabled');?>
</div>

<div class="control-group">
    <?= form_label('Archivo: ', 'file', array('class'=>'control-label'));?>
    <?= form_input(array('type'=>'file', 'name'=>'file', 'id'=>'file', 'value'=>set_value('file')));?>
</div>

<?= form_hidden('id_file',$register->id_file);?>

<?= form_hidden('count',$register->count);?>

<div class="form-actions">
    <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary', 'onClick'=>"return remove_disabled()")); ?>
    <?= anchor('upload_file/index', 'Cancelar', array('class'=>'btn')); ?>
   <!-- <?= anchor('upload_file/delete/' . $register->id_file, 'Eliminar', array('class'=>'btn btn-warning', 'onClick'=>"return confirm('¿Está seguro que desea eliminar el archivo?')")); ?> -->
</div>

<script>
function remove_disabled() {
	$('#user').prop("disabled", false);
	$('#name').prop("disabled", false);
    return true;
}
</script>

<?= form_close(); ?>