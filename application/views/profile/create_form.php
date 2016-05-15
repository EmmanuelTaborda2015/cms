<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?= form_open('profile/insert', array('class'=>'form-horizontal')); ?>

<legend>Actualizar registro</legend>

<!--Format possible errors-->
<?= my_validation_errors(validation_errors()); ?>

<div class="control-group">
    <?= form_label('Nombre: ', 'name', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'text', 'name'=>'name', 'id'=>'name', 'placeholder'=>'Nombre...'));?>
</div>

<div class="form-actions">
    <?= form_button(array('type'=>'submit', 'content'=>'Acertar', 'class'=>'btn btn-primary')); ?>
    <?= anchor('profile/index', 'Cancelar', array('class'=>'btn')); ?>
</div>

<?= form_close(); ?>