<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!--Format possible errors-->
<?= my_validation_success($this->session->flashdata('message')); ?>

<?= my_validation_errors(validation_errors()); ?>

<?= form_open_multipart('upload_file/insert', 'id="file"', array('class'=>'form-horizontal'));?>

<div class="page-header">
    <h1>Cargar Archivos <small> Archivos usuario</small></h1>
</div>


<div class="control-group">
    <?= form_label('Nombre de Archivo: ', 'name', array('class'=>'control-label'));?>
    <?= form_dropdown('name', array("" => "Seleccione ...") + $type_file, set_value('name'), ' id="name" class="form-control"');?>
</div>

<div class="control-group">
    <?= form_label('Usuario: ', 'user', array('class'=>'control-label')); ?>
    <?= form_dropdown('user', array("" => "Seleccione ...") + $user, set_value('user'), ' id="user" class="form-control" ');?>
</div>

<div class="control-group">
    <?= form_label('Archivo: ', 'file', array('class'=>'control-label'));?>
    <?= form_input(array('type'=>'file', 'name'=>'file', 'id'=>'file', 'value'=>set_value('file')));?>
    
</div>

<div class="form-actions">
    <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
    <?= anchor('upload_file', 'Cancelar', array('class'=>'btn')); ?>
</div>

<?= form_close(); ?>