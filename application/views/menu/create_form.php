<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?= form_open('menu/insert', array('class'=>'form-horizontal')); ?>

<legend>Crear registro</legend>

<!--Format possible errors-->
<?= my_validation_errors(validation_errors()); ?>

<div class="control-group">
    <?= form_label('Nombre: ', 'name', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'text', 'name'=>'name', 'id'=>'name', 'value'=>set_value('name')));?>
</div>

<div class="control-group">
    <?= form_label('Controlador: ', 'controller', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'text', 'name'=>'controller', 'id'=>'controller', 'value'=>set_value('controller')));?>
</div>

<div class="control-group">
    <?= form_label('Acción: ', 'action', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'text', 'name'=>'action', 'id'=>'action', 'value'=>set_value('action')));?>
</div>

<div class="control-group">
    <?= form_label('URL: ', 'url', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'text', 'name'=>'url', 'id'=>'url', 'value'=>set_value('url')));?>
</div>

<div class="control-group">
    <?= form_label('Orden: ', 'menu_order', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'number', 'name'=>'menu_order', 'id'=>'menu_order', 'value'=>set_value('menu_order')));?>
</div>

<div class="form-actions">
    <?= form_button(array('type'=>'submit', 'content'=>'Acertar', 'class'=>'btn btn-primary')); ?>
    <?= anchor('menu/index', 'Cancelar', array('class'=>'btn')); ?>
</div>

<?= form_close(); ?>